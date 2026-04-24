<?php

use App\Models\ModelUser;
use App\Models\ModelPenyewa;

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    */
    'defaults' => [
        'guard' => 'web',
        'password' => 'user', // ✅ sesuai permintaan kamu
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    */
    'guards' => [

        // 🔥 ADMIN & PETUGAS
        'web' => [
            'driver' => 'session',
            'provider' => 'user',
        ],

        // 🔥 PENYEWA
        'penyewa' => [
            'driver' => 'session',
            'provider' => 'penyewa',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    */
    'providers' => [

        // 🔥 ADMIN & PETUGAS
        'user' => [
            'driver' => 'eloquent',
            'model' => ModelUser::class,
        ],

        // 🔥 PENYEWA
        'penyewa' => [
            'driver' => 'eloquent',
            'model' => ModelPenyewa::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Password
    |--------------------------------------------------------------------------
    */
    'password' => [

        // 🔥 ADMIN & PETUGAS
        'user' => [
            'provider' => 'user',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        // 🔥 PENYEWA
        'penyewa' => [
            'provider' => 'penyewa',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    */
    'password_timeout' => 10800,

];