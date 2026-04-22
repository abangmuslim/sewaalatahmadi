<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelUser;

class ControllerUser extends Controller
{
    public function index()
    {
        $data = ModelUser::latest()->get();
        return view('user.user.index', compact('data'));
    }

    public function create()
    {
        return view('user.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'     => 'required',
            'username' => 'required|unique:user,username',
            'password' => 'required|min:6',
            'role'     => 'required|in:admin,petugas',
        ]);

        ModelUser::create($request->all());

        return redirect()->route('user.index')->with('success', 'Data user berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = ModelUser::findOrFail($id);
        return view('user.user.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = ModelUser::findOrFail($id);

        $request->validate([
            'nama'     => 'required',
            'username' => 'required|unique:user,username,' . $id . ',iduser',
            'role'     => 'required|in:admin,petugas',
        ]);

        $update = [
            'nama'     => $request->nama,
            'username' => $request->username,
            'role'     => $request->role,
        ];

        if (!empty($request->password)) {
            $update['password'] = $request->password; // auto hash di model
        }

        $data->update($update);

        return redirect()->route('user.index')->with('success', 'Data user berhasil diupdate');
    }

    public function show($id)
    {
        $data = ModelUser::findOrFail($id);
        return view('user.user.show', compact('data'));
    }

    public function destroy($id)
    {
        $data = ModelUser::findOrFail($id);
        $data->delete();

        return redirect()->route('user.index')->with('success', 'Data user berhasil dihapus');
    }
}