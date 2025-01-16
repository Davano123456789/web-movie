<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdminRole
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
        // Cek apakah pengguna login dan memiliki role_id 1
        if (Auth::check() && Auth::user()->role_id == 1) {
            return $next($request);
        }

        // Redirect ke home page atau halaman lain jika role_id bukan 1
        return redirect('/');
    }
}
