<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelKomentar extends Model
{
    protected $table = 'komentar';

    protected $fillable = [
        'artikelid',
        'penyewaid',
        'userid',
        'parent_id',
        'isikomentar'
    ];

    // ================= RELASI =================

    public function penyewa()
    {
        return $this->belongsTo(ModelPenyewa::class, 'penyewaid');
    }

    public function user()
    {
        return $this->belongsTo(ModelUser::class, 'userid');
    }

    public function replies()
    {
        return $this->hasMany(ModelKomentar::class, 'parent_id')
            ->with('replies', 'penyewa', 'user');
    }

    public function parent()
    {
        return $this->belongsTo(ModelKomentar::class, 'parent_id');
    }
}