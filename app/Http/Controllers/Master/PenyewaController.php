<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penyewa;

class PenyewaController extends Controller
{
    public function index()
    {
        $data = Penyewa::latest()->get();
        return view('user.Penyewa.index', compact('data'));
    }

    public function create()
    {
        return view('user.Penyewa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'     => 'required',
            'username' => 'required|unique:penyewa,username',
            'password' => 'required|min:6',
            'hp'       => 'required',
            'alamat'   => 'nullable',
        ]);

        Penyewa::create($request->all());

        return redirect()->route('penyewa.index')
            ->with('success', 'Data penyewa berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Penyewa::findOrFail($id);
        return view('user.Penyewa.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Penyewa::findOrFail($id);

        $request->validate([
            'nama'     => 'required',
            'username' => 'required|unique:penyewa,username,' . $id . ',idpenyewa',
            'hp'       => 'required',
            'alamat'   => 'nullable',
        ]);

        $update = [
            'nama'     => $request->nama,
            'username' => $request->username,
            'hp'       => $request->hp,
            'alamat'   => $request->alamat,
        ];

        if (!empty($request->password)) {
            $update['password'] = $request->password;
        }

        $data->update($update);

        return redirect()->route('penyewa.index')
            ->with('success', 'Data penyewa berhasil diupdate');
    }

    public function show($id)
    {
        $data = Penyewa::findOrFail($id);
        return view('user.Penyewa.show', compact('data'));
    }

    public function destroy($id)
    {
        $data = Penyewa::findOrFail($id);
        $data->delete();

        return redirect()->route('penyewa.index')
            ->with('success', 'Data penyewa berhasil dihapus');
    }
}