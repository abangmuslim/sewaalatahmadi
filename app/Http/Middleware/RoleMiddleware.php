<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // cek login
        if (!Auth::check()) {
            return redirect()->route('login.user');
        }

        // ambil role user
        $userRole = strtolower(Auth::user()->role);

        // normalisasi roles dari parameter middleware
        $roles = array_map(fn($r) => strtolower(trim($r)), $roles);

        // cek akses role
        if (!in_array($userRole, $roles)) {
            abort(403, 'Anda tidak memiliki akses');
        }

        return $next($request);
    }
}