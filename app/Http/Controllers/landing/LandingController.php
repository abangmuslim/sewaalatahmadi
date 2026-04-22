<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    // ================= DATA DUMMY =================
    private function getArtikel()
    {
        return [
            [
                'id' => 1,
                'judul' => 'Sewa Kamera DSLR',
                'isi' => 'Kamera DSLR berkualitas tinggi untuk kebutuhan fotografi.',
                'gambar' => 'https://via.placeholder.com/600x300',
                'kategori_id' => 1,
                'tag' => 'kamera'
            ],
            [
                'id' => 2,
                'judul' => 'Sewa Tenda Outdoor',
                'isi' => 'Tenda kuat untuk kegiatan camping dan outdoor.',
                'gambar' => 'https://via.placeholder.com/600x300',
                'kategori_id' => 2,
                'tag' => 'outdoor'
            ],
            [
                'id' => 3,
                'judul' => 'Sewa Sound System',
                'isi' => 'Sound system lengkap untuk acara besar.',
                'gambar' => 'https://via.placeholder.com/600x300',
                'kategori_id' => 3,
                'tag' => 'audio'
            ],
        ];
    }

    private function getKategori()
    {
        return [
            ['id' => 1, 'nama' => 'Kamera'],
            ['id' => 2, 'nama' => 'Outdoor'],
            ['id' => 3, 'nama' => 'Audio'],
        ];
    }

    // ================= HOME =================
    public function home()
    {
        $artikels = $this->getArtikel();

        return view('landing.home', compact('artikels'));
    }

    // ================= DETAIL ARTIKEL =================
    public function detailArtikel($id)
    {
        $artikel = collect($this->getArtikel())->firstWhere('id', $id);

        abort_if(!$artikel, 404);

        return view('landing.detailartikel', compact('artikel'));
    }

    // ================= DAFTAR KATEGORI =================
    public function daftarKategori()
    {
        $kategori = $this->getKategori();

        return view('landing.daftarkategori', compact('kategori'));
    }

    // ================= ARTIKEL PER KATEGORI =================
    public function kategori($id)
    {
        $kategori = collect($this->getKategori())->firstWhere('id', $id);

        abort_if(!$kategori, 404);

        $artikels = collect($this->getArtikel())
                        ->where('kategori_id', $id)
                        ->values();

        return view('landing.kategori', [
            'artikels' => $artikels,
            'namaKategori' => $kategori['nama']
        ]);
    }

    // ================= TAG =================
    public function tag($tag)
    {
        $artikels = collect($this->getArtikel())
                        ->filter(function ($item) use ($tag) {
                            return str_contains(strtolower($item['tag']), strtolower($tag));
                        })
                        ->values();

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