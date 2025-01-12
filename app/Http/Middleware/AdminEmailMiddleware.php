<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminEmailMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Daftar email admin
        $adminEmails = ['admin@gmail.com'];

        if (Auth::check() && in_array(Auth::user()->email, $adminEmails)) {
            return $next($request);
        }

        // Redirect jika bukan admin
        return redirect('/login')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
