<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class ModelPenyewa extends Authenticatable
{
    protected $table = 'penyewa';

    protected $fillable = [
        'nama',
        'username',
        'password',
        'nohp',
        'alamat'
    ];

    protected $hidden = [
        'password'
    ];
}