<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.reset-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, $token = null): RedirectResponse
    {
        if ($token === 'dummy-token') {
            // Token default untuk bypass validasi
            return view('auth.reset-password')->with(['token' => $token, 'email' => $request->email]);
        }
        
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // Generate token reset password
        $token = Str::random(64);

        // Simpan token di database
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'email' => $request->email,
                'token' => Hash::make($token), // Hash token
                'created_at' => now(),
            ]
        );

        // Tampilkan token langsung di layar (untuk keperluan demo/testing)
        return response()->json(['reset_token' => $token]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        // $status = Password::sendResetLink(
        //     $request->only('email')
        // );

        // return $status == Password::RESET_LINK_SENT
        //             ? back()->with('status', __($status))
        //             : back()->withInput($request->only('email'))
        //                 ->withErrors(['email' => __($status)]);
    }

    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8', // Validasi password dan konfirmasi password
        ]);

        // Reset password menggunakan token
        $status = Password::reset(
            $request->only('email', 'password', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password),
                ])->save();
            }
        );

        // Jika berhasil reset password, arahkan ke halaman login
        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', __('Your password has been reset!'));
        }

        // Jika gagal
        return back()->withErrors(['email' => [__('We can\'t find a user with that e-mail address.')]]);
    }
}
