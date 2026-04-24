<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
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
        $artikel = Artikel::where('idartikel', $id)->firstOrFail();

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
        // sementara kosong karena artikel belum punya kategori
        $artikels = collect();

        return view('landing.kategori', [
            'artikels' => $artikels,
            'namaKategori' => 'Kategori'
        ]);
    }

    // ================= TAG =================
    public function tag($tag)
    {
        // sementara kosong karena belum ada kolom tag
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
}