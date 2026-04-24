<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ControllerAuthUser extends Controller
{
    /*
    =========================
    FORM LOGIN
    =========================
    */
    public function login()
    {
        return view('auth.loginuser');
    }

    /*
    =========================
    PROSES LOGIN
    =========================
    */
    public function prosesLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = ModelUser::where('username', $request->username)->first();

        if (!$user) {
            return back()->with('error', 'Username tidak ditemukan');
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Password salah');
        }

        // ✅ LOGIN
        Auth::guard('web')->login($user);

        // ✅ REGENERATE SESSION
        $request->session()->regenerate();

        // 🔥 FINAL FIX ADA DI SINI
        session([
            'iduser' => $user->iduser, // ⬅️ INI YANG KEMARIN HILANG
            'role'   => $user->role,
            'nama'   => $user->nama
        ]);

        // ✅ REDIRECT ROLE
        return match ($user->role) {
            'admin'   => redirect()->route('dashboard.admin'),
            'petugas' => redirect()->route('dashboard.petugas'),
            default   => redirect()->route('login.user')
                ->with('error', 'Role tidak valid'),
        };
    }

    /*
    =========================
    LOGOUT
    =========================
    */
    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login.user')
            ->with('success', 'Berhasil logout');
    }
}