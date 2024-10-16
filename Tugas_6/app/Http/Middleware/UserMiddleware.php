<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
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
        // Periksa apakah pengguna sudah login dan memiliki role 'user'
        if (Auth::check() && Auth::user()->role === 'user') {
            return $next($request);
        }

        // Jika tidak, redirect atau kembalikan error
        return redirect()->route('home'); // Ubah ke route yang sesuai
    }
}
