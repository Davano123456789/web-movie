<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah pengguna sudah login
        if (Auth::check()) {
            // Jika sudah login dan role_id 1, alihkan ke dashboard
            if (Auth::user()->role_id == 1) {
                return redirect()->route('dashboard'); // Ganti 'dashboard' dengan nama rute dashboard yang sesuai
            }
            // Jika sudah login dan role_id bukan 1, alihkan ke halaman utama
            return redirect('/');
        }

        return $next($request);
    }
}
