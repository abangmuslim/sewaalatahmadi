<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role = null)
    {
        // =============================
        // CEK LOGIN
        // =============================
        if (!session()->has('login') || !session()->has('role')) {
            return redirect()->route('auth.user.login')
                ->with('error', 'Silakan login terlebih dahulu');
        }

        // =============================
        // CEK ROLE
        // =============================
        if ($role) {
            $roles = explode(',', $role);

            if (!in_array(session('role'), $roles)) {
                abort(403, 'Anda tidak memiliki akses ke halaman ini');
            }
        }

        return $next($request);
    }
}