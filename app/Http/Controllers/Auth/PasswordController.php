<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'password-updated');

        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required|confirmed|min:8', // Validasi password dan konfirmasi password
        // ]);

        // // Reset password menggunakan token
        // $status = Password::reset(
        //     $request->only('email', 'password', 'password_confirmation', 'token'),
        //     function ($user, $password) {
        //         $user->forceFill([
        //             'password' => bcrypt($password),
        //         ])->save();
        //     }
        // );

        // // Jika berhasil reset password, arahkan ke halaman login
        // if ($status == Password::PASSWORD_RESET) {
        //     return redirect()->route('login')->with('status', __('Your password has been reset!'));
        // }

        // // Jika gagal
        // return back()->withErrors(['email' => [__('We can\'t find a user with that e-mail address.')]]);
    }
}
