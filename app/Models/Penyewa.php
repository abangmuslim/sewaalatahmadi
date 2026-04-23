<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyewa extends Model
{
    protected $table = 'penyewa';
    protected $primaryKey = 'idpenyewa';
    public $timestamps = true;

    protected $fillable = [
        'nama',
        'username',
        'password',
        'hp',
        'alamat',
    ];

    // Auto hash password
    public function setPasswordAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['password'] = bcrypt($value);
        }
    }
}