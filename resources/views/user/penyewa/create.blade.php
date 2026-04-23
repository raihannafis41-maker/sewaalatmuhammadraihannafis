@extends('layouts.appuser')

@section('title', 'Tambah Penyewa')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Tambah Penyewa</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('penyewa.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>No HP</label>
                <input type="text" name="nohp" class="form-control">
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control"></textarea>
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('penyewa.index') }}" class="btn btn-secondary">Kembali</a>

        </form>
    </div>
</div>
@endsection