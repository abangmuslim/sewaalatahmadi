<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // ❗ Belum login
        if (!Auth::check()) {
            return redirect()->route('login.user');
        }

        // ❗ Normalisasi role user
        $userRole = trim(strtolower(Auth::user()->role));

        // ❗ Normalisasi role yang diizinkan
        $roles = array_map(fn($r) => trim(strtolower($r)), $roles);

        // ❗ Jika role tidak sesuai
        if (!in_array($userRole, $roles)) {
            abort(403);
        }

        return $next($request);
    }
}
