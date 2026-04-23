<?php

use App\Models\ModelUser;
use App\Models\Penyewa;

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        // 🔥 tambahan untuk penyewa
        'penyewa' => [
            'driver' => 'session',
            'provider' => 'penyewa',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => ModelUser::class,
        ],

        // 🔥 provider penyewa
        'penyewa' => [
            'driver' => 'eloquent',
            'model' => Penyewa::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        // optional kalau nanti mau reset password penyewa
        'penyewa' => [
            'provider' => 'penyewa',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];