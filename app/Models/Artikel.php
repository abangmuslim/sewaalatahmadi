<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Komentar;
use App\Models\ModelUser;

class Artikel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'idartikel';

    protected $fillable = [
        'judul',
        'isi',
        'gambar',
        'iduser'
    ];

    // ================= RELASI =================

    public function user()
    {
        return $this->belongsTo(ModelUser::class, 'iduser', 'iduser');
    }

    // ⬇️ FIX DI SINI (WAJIB)
    public function komentars()
    {
        return $this->hasMany(Komentar::class, 'idartikel', 'idartikel')
                    ->latest();
    }
}