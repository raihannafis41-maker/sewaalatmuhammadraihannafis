<?php
protected $table = 'komentar';

protected $fillable = [
    'penyewaid',
    'artikelid',
    'isi'
];

public function penyewa()
{
    return $this->belongsTo(ModelPenyewa::class, 'penyewaid');
}