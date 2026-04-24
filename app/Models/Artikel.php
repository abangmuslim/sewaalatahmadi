<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsTo(ModelUser::class, 'iduser');
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class, 'idartikel');
    }
}