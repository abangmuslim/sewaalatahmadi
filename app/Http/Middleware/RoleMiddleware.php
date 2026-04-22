<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role = null)
    {
        // cek apakah sudah login
        if (!session()->has('role')) {
            return redirect()->route('loginuser');
        }

        // kalau pakai multi role: admin,petugas
        if ($role) {
            $roles = explode(',', $role);

            if (!in_array(session('role'), $roles)) {
                abort(403);
            }
        }

        return $next($request);
    }
}