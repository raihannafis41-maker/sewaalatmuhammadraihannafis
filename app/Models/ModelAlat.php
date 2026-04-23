<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelAlat extends Model
{
    protected $table = 'alat';

    protected $fillable = [
        'namaalat',
        'merkid',
        'kondisiid',
        'kategoriid',
        'stok',
        'hargasewa'
    ];

    // 🔥 RELASI

    public function merk()
    {
        return $this->belongsTo(ModelMerk::class, 'merkid');
    }

    public function kondisi()
    {
        return $this->belongsTo(ModelKondisi::class, 'kondisiid');
    }

    public function kategori()
    {
        return $this->belongsTo(ModelKategori::class, 'kategoriid');
    }

    public function detail()
    {
        return $this->hasMany(ModelDetailPemesanan::class, 'alatid');
    }
}