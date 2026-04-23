@extends('layouts.appuser')

@section('title', 'Edit Penyewa')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Edit Penyewa</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('penyewa.update', $penyewa->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control"
                       value="{{ $penyewa->username }}" required>
            </div>

            <div class="mb-3">
                <label>Password (Kosongkan jika tidak diubah)</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="mb-3">
                <label>No HP</label>
                <input type="text" name="nohp" class="form-control"
                       value="{{ $penyewa->nohp }}">
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control">{{ $penyewa->alamat }}</textarea>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('penyewa.index') }}" class="btn btn-secondary">Kembali</a>

        </form>
    </div>
</div>
@endsection