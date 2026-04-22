<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class seedersewaalatahmadi extends Seeder
{
    public function run(): void
    {
        /*
        USER
        */
        DB::table('user')->insert([
            [
                'nama' => 'Admin',
                'username' => 'admin',
                'password' => Hash::make('123'),
                'role' => 'admin'
            ],
            [
                'nama' => 'Petugas',
                'username' => 'petugas',
                'password' => Hash::make('123'),
                'role' => 'petugas'
            ]
        ]);

        /*
        PENYEWA
        */
        DB::table('penyewa')->insert([
            [
                'nama' => 'Ahmadi',
                'username' => 'ahmadi',
                'hp' => '08123456789',
                'alamat' => 'Aceh',
                'password' => Hash::make('123')
            ]
        ]);

        /*
        MASTER
        */
        DB::table('merk')->insert([
            ['nama' => 'Honda'],
            ['nama' => 'Yamaha']
        ]);

        DB::table('kondisi')->insert([
            ['nama' => 'Baik'],
            ['nama' => 'Rusak Ringan']
        ]);

        DB::table('kategori')->insert([
            ['nama' => 'Elektronik'],
            ['nama' => 'Alat Berat']
        ]);

        DB::table('denda')->insert([
            ['nama' => 'Terlambat', 'nominal' => 50000]
        ]);

        /*
        ARTIKEL
        */
        DB::table('artikel')->insert([
            [
                'judul' => 'Tips Sewa Alat',
                'isi' => 'Pastikan cek kondisi alat sebelum menyewa',
                'gambar' => null,
                'iduser' => 1
            ]
        ]);

        /*
        KOMENTAR
        */
        DB::table('komentar')->insert([
            [
                'idartikel' => 1,
                'idpenyewa' => 1,
                'isi' => 'Artikel sangat membantu'
            ]
        ]);

        /*
        ALAT
        */
        DB::table('alat')->insert([
            [
                'nama' => 'Bor Listrik',
                'hargasewa' => 50000,
                'stok' => 10,
                'idmerk' => 1,
                'idkondisi' => 1,
                'idkategori' => 1
            ]
        ]);
    }
}