<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelPemesanan extends Model
{
    protected $table = 'pemesanan';

    protected $fillable = [
        'userid',
        'penyewaid',
        'tanggalpesan',
        'tanggalkembali',
        'status'
    ];

    // 🔥 FIX RELASI (WAJIB TAMBAH FK)
    public function detail()
    {
        return $this->hasMany(ModelDetailPemesanan::class, 'pemesanan_id', 'id'); 
    }
}