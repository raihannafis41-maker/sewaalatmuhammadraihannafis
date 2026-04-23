<?php

use App\Models\ModelUser;

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'user',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'user',
        ],
    ],

    'providers' => [
        'user' => [
            'driver' => 'eloquent',
            'model' => ModelUser::class,
        ],
    ],

    'passwords' => [
        'user' => [
            'provider' => 'user',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,
];