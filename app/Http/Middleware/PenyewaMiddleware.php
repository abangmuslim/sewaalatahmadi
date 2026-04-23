<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PenyewaMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // cek login + guard penyewa
        if (!session('login') || session('guard') !== 'penyewa') {
            return redirect()->route('auth.penyewa.login');
        }

        return $next($request);
    }
}