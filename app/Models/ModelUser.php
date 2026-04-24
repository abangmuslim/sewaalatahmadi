<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class ModelUser extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';
    protected $primaryKey = 'iduser';

    public $timestamps = false;

    protected $fillable = [
        'nama',
        'username',
        'password',
        'role'
    ];

    protected $hidden = [
        'password'
    ];

    public function setPasswordAttribute($value)
    {
        // 🔥 anti double hash
        if (!empty($value) && !password_get_info($value)['algo']) {
            $this->attributes['password'] = Hash::make($value);
        } else {
            $this->attributes['password'] = $value;
        }
    }
}