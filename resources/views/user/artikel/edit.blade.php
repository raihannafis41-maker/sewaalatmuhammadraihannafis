@extends('layouts.appuser')

@section('title', 'Edit Artikel')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Edit Artikel</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label>Judul</label>
                <input type="text" name="judul" value="{{ $artikel->judul }}" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label>Isi Artikel</label>
                <textarea name="isi" class="form-control" rows="6" required>{{ $artikel->isi }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label>Gambar Lama</label><br>
                @if($artikel->gambar)
                    <img src="{{ asset('uploads/artikel/'.$artikel->gambar) }}" width="150">
                @else
                    <small class="text-muted">Tidak ada gambar</small>
                @endif
            </div>

            <div class="form-group mb-3">
                <label>Upload Gambar Baru</label>
                <input type="file" name="gambar" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection