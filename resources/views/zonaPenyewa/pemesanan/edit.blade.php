@extends('layouts.apppenyewa')

@section('title', 'Edit Pemesanan')

@section('content')

<form action="{{ route('penyewa.pemesanan.update', $data->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Tanggal Pesan</label>
        <input type="date" name="tanggalpesan" value="{{ $data->tanggalpesan }}" class="form-control">
    </div>

    <div class="form-group">
        <label>Tanggal Kembali</label>
        <input type="date" name="tanggalkembali" value="{{ $data->tanggalkembali }}" class="form-control">
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('penyewa.pemesanan.index') }}" class="btn btn-secondary">Kembali</a>

</form>

@endsection