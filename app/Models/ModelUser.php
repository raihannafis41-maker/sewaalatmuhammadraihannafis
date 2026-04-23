<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelUser extends Authenticatable
{
    use HasFactory, Notifiable;

    // 🔥 Nama tabel kamu
    protected $table = 'user';

    // 🔥 Primary key (kalau bukan id, ubah di sini)
    protected $primaryKey = 'id';

    // 🔥 Field yang boleh diisi
    protected $fillable = [
        'nama',
        'username',
        'password',
        'role'
    ];

    // 🔥 Hidden
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // 🔥 PENTING: AUTO HASH PASSWORD (WAJIB DI LARAVEL 10+)
    protected $casts = [
        'password' => 'hashed',
    ];

    // 🔥 LOGIN PAKAI USERNAME (BUKAN EMAIL)
    public function getAuthIdentifierName()
    {
        return 'username';
    }
}