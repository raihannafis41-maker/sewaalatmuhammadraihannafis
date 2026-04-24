@extends('layouts.appuser')

@section('title', 'Detail Komentar')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Detail Komentar</h5>
    </div>

    <div class="card-body">
        <p><b>Artikel:</b> {{ $komentar->judul_artikel }}</p>
        <p><b>Penyewa:</b> {{ $komentar->nama_penyewa }}</p>
        <p><b>Komentar:</b></p>

        <div class="border p-3 rounded">
            {{ $komentar->isikomentar }}
        </div>

        <br>
        <a href="{{ route('admin.komentar.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection