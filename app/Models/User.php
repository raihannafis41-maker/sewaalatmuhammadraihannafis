<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // 🔥 WAJIB: karena tabel kamu bukan 'users'
    protected $table = 'user';

    // 🔥 FIELD SESUAI MIGRATION
    protected $fillable = [
        'nama',
        'username',
        'password',
        'role'
    ];

    // 🔥 HIDDEN
    protected $hidden = [
        'password',
    ];

    // 🔥 OPTIONAL (biar Laravel tau login pakai username)
    public function getAuthIdentifierName()
    {
        return 'username';
    }
}