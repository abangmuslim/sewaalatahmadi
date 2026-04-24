<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penyewa;
use Illuminate\Support\Facades\Hash;

class PenyewaAuthController extends Controller
{
    /*
    =========================
    LOGIN FORM
    =========================
    */
    public function login(Request $request)
    {
        return view('auth.loginpenyewa');
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
            'password' => 'required',
        ]);

        $penyewa = Penyewa::where('username', $request->username)->first();

        if (!$penyewa || !Hash::check($request->password, $penyewa->password)) {
            return back()->with('error', 'Username atau password salah');
        }

        // 🔐 regenerate session
        $request->session()->regenerate();

        // 🔐 set session penyewa
        session([
            'penyewa' => [
                'idpenyewa' => $penyewa->idpenyewa,
                'nama'      => $penyewa->nama,
                'username'  => $penyewa->username,
            ]
        ]);

        /*
        =========================
        REDIRECT PINTAR (FIXED)
        =========================
        */

        $redirect = $request->query('redirect');

        // ✔ jika ada redirect dan bukan dashboard
        if ($redirect && !str_contains($redirect, '/dashboard')) {
            return redirect($redirect);
        }

        // ✔ fallback aman ke landing
        return redirect()->route('landing.home');
    }

    /*
    =========================
    REGISTER
    =========================
    */
    public function register()
    {
        return view('auth.registerpenyewa');
    }

    public function prosesRegister(Request $request)
    {
        $request->validate([
            'nama'     => 'required',
            'username' => 'required|unique:penyewa,username',
            'hp'       => 'required',
            'alamat'   => 'nullable',
            'password' => 'required|min:6|confirmed',
        ]);

        Penyewa::create([
            'nama'     => $request->nama,
            'username' => $request->username,
            'hp'       => $request->hp,
            'alamat'   => $request->alamat,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('login.penyewa')
            ->with('success', 'Registrasi berhasil, silakan login');
    }

    /*
    =========================
    LOGOUT
    =========================
    */
    public function logout()
    {
        session()->forget('penyewa');
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('landing.home')
            ->with('success', 'Berhasil logout');
    }
}