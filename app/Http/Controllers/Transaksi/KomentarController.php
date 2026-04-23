<?php
public function store(Request $request)
{
    $request->validate([
        'isi' => 'required'
    ]);

    \App\Models\ModelKomentar::create([
        'penyewaid' => auth()->guard('penyewa')->id(),
        'artikelid' => $request->artikelid,
        'isi' => $request->isi,
    ]);

    return back()->with('success', 'Komentar berhasil dikirim');
}