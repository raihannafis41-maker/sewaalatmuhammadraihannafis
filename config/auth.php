<?php

use App\Models\ModelUser;
use App\Models\ModelPenyewa;

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'user',
    ],

    /*
    |--------------------------------------------------------------------------
    | GUARDS
    |--------------------------------------------------------------------------
    */
    'guards' => [

        // 🔹 default (dipakai Laravel)
        'web' => [
            'driver' => 'session',
            'provider' => 'user',
        ],

        // 🔹 ADMIN & PETUGAS
        'user' => [
            'driver' => 'session',
            'provider' => 'user',
        ],

        // 🔹 PENYEWA
        'penyewa' => [
            'driver' => 'session',
            'provider' => 'penyewa',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | PROVIDERS
    |--------------------------------------------------------------------------
    */
    'providers' => [

        // 🔹 USER
        'user' => [
            'driver' => 'eloquent',
            'model' => ModelUser::class,
        ],

        // 🔹 PENYEWA
        'penyewa' => [
            'driver' => 'eloquent',
            'model' => ModelPenyewa::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | PASSWORD RESET
    |--------------------------------------------------------------------------
    */
    'passwords' => [

        'user' => [
            'provider' => 'user',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'penyewa' => [
            'provider' => 'penyewa',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,
];