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
    public function login(Request $request)
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

        // ✅ SESSION SERAGAM
        session([
            'user' => [
                'iduser' => $user->iduser,
                'nama'   => $user->nama,
                'role'   => $user->role
            ]
        ]);

        /*
        =========================
        REDIRECT FINAL (CLEAN)
        =========================
        */

        // ambil redirect dari query (dari landing/artikel)
        $redirect = $request->input('redirect');

        // kalau dari halaman publik → balik ke situ
        if ($redirect && !str_contains($redirect, '/dashboard')) {
            return redirect($redirect);
        }

        // selain itu → serahkan ke route dashboard (auto role)
        return redirect()->route('dashboard');
    }

    /*
    =========================
    LOGOUT
    =========================
    */
    public function logout()
    {
        Auth::logout();

        session()->forget('user');

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('landing.home')
            ->with('success', 'Berhasil logout');
    }
}