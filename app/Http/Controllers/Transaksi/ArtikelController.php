<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    // ================= INDEX =================
    public function index()
    {
        $data = Artikel::with('user')->latest()->get();

        return view('user.artikel.index', compact('data'));
    }

    // ================= CREATE =================
    public function create()
    {
        return view('user.artikel.create');
    }

    // ================= STORE =================
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $namaFile = null;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/artikel'), $namaFile);
        }

        Artikel::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $namaFile,
            'iduser' => session('iduser') // custom auth kamu
        ]);

        return redirect()->route('artikel.index')
            ->with('success', 'Artikel berhasil ditambahkan');
    }

    // ================= SHOW =================
    public function show($id)
    {
        $data = Artikel::with(['user', 'komentar'])->findOrFail($id);

        return view('user.artikel.show', compact('data'));
    }

    // ================= EDIT =================
    public function edit($id)
    {
        $data = Artikel::findOrFail($id);

        return view('user.artikel.edit', compact('data'));
    }

    // ================= UPDATE =================
    public function update(Request $request, $id)
    {
        $data = Artikel::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('gambar')) {

            // hapus lama
            if ($data->gambar && file_exists(public_path('uploads/artikel/' . $data->gambar))) {
                unlink(public_path('uploads/artikel/' . $data->gambar));
            }

            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/artikel'), $namaFile);

            $data->gambar = $namaFile;
        }

        $data->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        return redirect()->route('artikel.index')
            ->with('success', 'Artikel berhasil diupdate');
    }

    // ================= DELETE =================
    public function destroy($id)
    {
        $data = Artikel::findOrFail($id);

        if ($data->gambar && file_exists(public_path('uploads/artikel/' . $data->gambar))) {
            unlink(public_path('uploads/artikel/' . $data->gambar));
        }

        $data->delete();

        return redirect()->route('artikel.index')
            ->with('success', 'Artikel berhasil dihapus');
    }
}