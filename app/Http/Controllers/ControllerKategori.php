<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControllerKategori extends Controller
{
    public function index()
    {
        return view('user.kategori.index');
    }

    public function create()
    {
        return "Form Tambah Kategori";
    }

    public function store()
    {
        return "Proses Simpan Kategori";
    }

    public function edit($id)
    {
        return "Form Edit Kategori ID: " . $id;
    }

    public function update($id)
    {
        return "Proses Update ID: " . $id;
    }

    public function delete($id)
    {
        return "Hapus Data ID: " . $id;
    }
}
