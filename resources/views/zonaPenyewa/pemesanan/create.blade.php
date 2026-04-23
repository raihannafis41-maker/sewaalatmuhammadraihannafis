@extends('layouts.apppenyewa')

@section('title', 'Tambah Pemesanan')

@section('content')

<form action="{{ route('penyewa.pemesanan.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Tanggal Pesan</label>
        <input type="date" name="tanggalpesan" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Tanggal Kembali</label>
        <input type="date" name="tanggalkembali" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Pilih Alat</label>
        <select name="alatid" class="form-control" required>
            <option value="">-- pilih alat --</option>
            @foreach($alat as $a)
                <option value="{{ $a->id }}">{{ $a->namaalat }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Jumlah</label>
        <input type="number" name="jumlah" class="form-control" required>
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="{{ route('penyewa.pemesanan.index') }}" class="btn btn-secondary">Kembali</a>

</form>

@endsection