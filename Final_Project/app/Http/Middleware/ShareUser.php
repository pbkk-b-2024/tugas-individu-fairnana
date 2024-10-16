<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class ShareUser
{
    public function handle($request, Closure $next)
    {
        view()->share('user', Auth::user()); // Membagikan variabel $user ke semua view
        return $next($request);
    }
}
