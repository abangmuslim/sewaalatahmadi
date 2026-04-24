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

        // 🔥 login pakai guard web
        Auth::guard('web')->login($user);

        // 🔥 penting untuk cegah session hijack / balik login
        $request->session()->regenerate();

        // 🔥 simpan role ke session (untuk UI sidebar kamu)
        session([
            'role' => $user->role,
            'nama' => $user->nama
        ]);

        // 🔥 redirect berdasarkan role
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