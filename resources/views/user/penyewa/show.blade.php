@extends('layouts.appuser')

@section('title', 'Detail Penyewa')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Detail Penyewa</h5>
    </div>

    <div class="card-body">

        <div class="mb-3">
            <label>Username</label>
            <input type="text" class="form-control" value="{{ $penyewa->username }}" readonly>
        </div>

        <div class="mb-3">
            <label>No HP</label>
            <input type="text" class="form-control" value="{{ $penyewa->nohp }}" readonly>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea class="form-control" readonly>{{ $penyewa->alamat }}</textarea>
        </div>

        <a href="{{ route('penyewa.index') }}" class="btn btn-secondary">Kembali</a>

    </div>
</div>
@endsection