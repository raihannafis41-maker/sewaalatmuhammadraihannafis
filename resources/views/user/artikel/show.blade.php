@extends('layouts.appuser')

@section('title', 'Detail Artikel')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Detail Artikel</h5>
    </div>

    <div class="card-body">
        <h4>{{ $artikel->judul }}</h4>
        <p class="text-muted">{{ $artikel->created_at }}</p>

        @if($artikel->gambar)
            <img src="{{ asset('uploads/artikel/'.$artikel->gambar) }}" width="300" class="mb-3">
        @endif

        <p>{!! nl2br(e($artikel->isi)) !!}</p>

        <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection