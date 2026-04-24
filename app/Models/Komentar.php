<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentar';
    protected $primaryKey = 'idkomentar';

    protected $fillable = [
        'idartikel',
        'idpenyewa',
        'isi'
    ];

    // RELASI
    public function artikel()
    {
        return $this->belongsTo(Artikel::class, 'idartikel');
    }

    public function penyewa()
    {
        return $this->belongsTo(Penyewa::class, 'idpenyewa');
    }
}