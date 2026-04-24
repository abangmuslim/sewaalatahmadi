<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penyewa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PenyewaAuthController extends Controller
{
    /*
    =========================
    LOGIN FORM
    =========================
    */
    public function login()
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

        // 🔥 HAPUS SESSION LAMA (AMAN)
        Session::invalidate();
        Session::regenerateToken();

        // 🔐 SET SESSION PENYEWA
        Session::put([
            'login'     => true,
            'guard'     => 'penyewa',
            'role'      => 'penyewa',
            'idpenyewa' => $penyewa->idpenyewa,
            'nama'      => $penyewa->nama,
        ]);

        return redirect()->route('penyewa.dashboard');
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
            'password' => $request->password,
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
        Session::flush();
        Session::invalidate();
        Session::regenerateToken();

        return redirect()->route('login.penyewa');
    }
}