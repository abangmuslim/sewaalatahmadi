<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Komentar;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    // ================= HOME =================
    public function home()
    {
        $artikels = Artikel::latest()->get();

        return view('landing.home', compact('artikels'));
    }

    // ================= DETAIL ARTIKEL =================
    public function detailArtikel($id)
    {
        $artikel = Artikel::with('komentars')
            ->where('idartikel', $id)
            ->firstOrFail();

        return view('landing.detailartikel', compact('artikel'));
    }

    // ================= DAFTAR KATEGORI =================
    public function daftarKategori()
    {
        return view('landing.daftarkategori');
    }

    // ================= KATEGORI =================
    public function kategori($id)
    {
        $artikels = collect();

        return view('landing.kategori', [
            'artikels' => $artikels,
            'namaKategori' => 'Kategori'
        ]);
    }

    // ================= TAG =================
    public function tag($tag)
    {
        $artikels = collect();

        return view('landing.tag', compact('artikels', 'tag'));
    }

    // ================= TENTANG =================
    public function tentang()
    {
        return view('landing.tentang');
    }

    // ================= KONTAK =================
    public function kontak()
    {
        return view('landing.kontak');
    }

    // ================= DAFTAR ISI =================
    public function daftarIsi()
    {
        return view('landing.daftarisi');
    }

    // ================= KOMENTAR =================
    public function storeKomentar(Request $request)
    {
        $request->validate([
            'idartikel' => 'required',
            'isi' => 'required|string|min:3|max:1000',
        ]);

        // CEK LOGIN
        if (!session()->has('user') && !session()->has('penyewa')) {
            return redirect()
                ->route('login.user', ['redirect' => url()->previous()])
                ->with('error', 'Silakan login terlebih dahulu');
        }

        // SIMPAN KOMENTAR
        Komentar::create([
            'idartikel' => $request->idartikel,
            'idpenyewa' => session('penyewa.idpenyewa') ?? null,
            'isi' => $request->isi,
        ]);

        return redirect()
            ->route('landing.detailartikel', $request->idartikel)
            ->with('success', 'Komentar berhasil dikirim');
    }
}