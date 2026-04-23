<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelDetailPemesanan extends Model
{
    protected $table = 'detailpemesanan';

    protected $fillable = [
        'pemesanan_id',
        'alatid',
        'dendaid',
        'jumlah',
        'subtotal'
    ];

    public function alat()
    {
        return $this->belongsTo(ModelAlat::class, 'alatid');
    }

    public function pemesanan()
    {
        return $this->belongsTo(ModelPemesanan::class, 'pemesanan_id');
    }
}