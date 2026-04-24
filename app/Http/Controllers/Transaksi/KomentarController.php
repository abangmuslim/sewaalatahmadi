<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Komentar;
use App\Models\Artikel;
use App\Models\Penyewa;

class KomentarController extends Controller
{
    // ================= INDEX =================
    public function index()
    {
        $data = Komentar::with(['artikel', 'penyewa'])->latest()->get();

        return view('user.komentar.index', compact('data'));
    }

    // ================= CREATE =================
    public function create()
    {
        $artikel = Artikel::all();
        $penyewa = Penyewa::all();

        return view('user.komentar.create', compact('artikel', 'penyewa'));
    }

    // ================= STORE =================
    public function store(Request $request)
    {
        $request->validate([
            'idartikel' => 'required',
            'isi' => 'required'
        ]);

        Komentar::create([
            'idartikel' => $request->idartikel,
            'idpenyewa' => $request->idpenyewa, // boleh null
            'isi' => $request->isi
        ]);

        return redirect()->route('komentar.index')
            ->with('success', 'Komentar berhasil ditambahkan');
    }

    // ================= SHOW =================
    public function show($id)
    {
        $data = Komentar::with(['artikel', 'penyewa'])->findOrFail($id);

        return view('user.komentar.show', compact('data'));
    }

    // ================= EDIT =================
    public function edit($id)
    {
        $data = Komentar::findOrFail($id);
        $artikel = Artikel::all();
        $penyewa = Penyewa::all();

        return view('user.komentar.edit', compact('data', 'artikel', 'penyewa'));
    }

    // ================= UPDATE =================
    public function update(Request $request, $id)
    {
        $data = Komentar::findOrFail($id);

        $request->validate([
            'idartikel' => 'required',
            'isi' => 'required'
        ]);

        $data->update([
            'idartikel' => $request->idartikel,
            'idpenyewa' => $request->idpenyewa,
            'isi' => $request->isi
        ]);

        return redirect()->route('komentar.index')
            ->with('success', 'Komentar berhasil diupdate');
    }

    // ================= DELETE =================
    public function destroy($id)
    {
        $data = Komentar::findOrFail($id);
        $data->delete();

        return redirect()->route('komentar.index')
            ->with('success', 'Komentar berhasil dihapus');
    }
}