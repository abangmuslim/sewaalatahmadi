<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PenyewaMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!session()->has('penyewa')) {
            return redirect()->route('login.penyewa');
        }

        return $next($request);
    }
}
