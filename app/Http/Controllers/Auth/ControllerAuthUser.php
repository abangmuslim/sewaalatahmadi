<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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

        // SIMPAN SESSION
        Session::put('login', true);
        Session::put('iduser', $user->iduser);
        Session::put('nama', $user->nama);
        Session::put('role', $user->role);

        // REDIRECT BERDASARKAN ROLE
        if ($user->role == 'admin') {
            return redirect()->route('dashboard.admin');
        } else {
            return redirect()->route('dashboard.petugas');
        }
    }

    /*
    =========================
    LOGOUT
    =========================
    */
    public function logout()
    {
        Session::flush();
        return redirect()->route('auth.user.login')->with('success', 'Berhasil logout');
    }
}
