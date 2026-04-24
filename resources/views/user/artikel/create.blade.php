@extends('layouts.appuser')

@section('title', 'Tambah Artikel')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Tambah Artikel</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label>Isi Artikel</label>
                <textarea name="isi" class="form-control" rows="6" required></textarea>
            </div>

            <div class="form-group mb-3">
                <label>Gambar (opsional)</label>
                <input type="file" name="gambar" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection