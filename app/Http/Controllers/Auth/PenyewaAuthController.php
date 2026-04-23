<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penyewa;

class PenyewaAuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LOGIN
    |--------------------------------------------------------------------------
    */

    public function login()
    {
        return view('auth.loginpenyewa');
    }

    public function prosesLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $data = Penyewa::where('username', $request->username)->first();

        if (!$data || !password_verify($request->password, $data->password)) {
            return back()->with('error', 'Username atau password salah');
        }

        session([
            'login'      => true,
            'idpenyewa'  => $data->idpenyewa,
            'nama'       => $data->nama,
            'guard'      => 'penyewa',
        ]);

        // ✅ pakai route name (lebih aman)
        return redirect()->route('penyewa.dashboard');
    }

    /*
    |--------------------------------------------------------------------------
    | REGISTER
    |--------------------------------------------------------------------------
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
            'password' => $request->password, // auto hash di model
        ]);

        return redirect()->route('auth.penyewa.login')
            ->with('success', 'Registrasi berhasil, silakan login');
    }

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    public function logout()
    {
        session()->flush();
        return redirect()->route('auth.penyewa.login');
    }
}