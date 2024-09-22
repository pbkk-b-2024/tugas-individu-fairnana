<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$role)
    {
        // Log untuk debugging
        Log::info('Middleware RoleMiddleware diakses.');
        Log::info('Middleware RoleMiddleware diakses.');
        // Pastikan user terautentikasi
        if (!Auth::check()) {
            return redirect('/login'); // Redirect ke halaman login jika tidak terautentikasi
        }

        // Cek apakah role_id user ada dalam daftar role yang diizinkan
        if (!in_array(Auth::user()->role_id, $role)) {
            return redirect('/'); // Redirect ke halaman lain jika role tidak sesuai
        }

        return $next($request); // Lanjutkan request jika semua pengecekan lolos
    }
}
