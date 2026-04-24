<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelArtikel extends Model
{
    protected $table = 'artikel';

    protected $fillable = [
        'judul',
        'isi',
        'gambar',
        'userid'
    ];
}