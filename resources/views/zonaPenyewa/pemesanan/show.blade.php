@extends('layouts.apppenyewa')

@section('title', 'Detail Pemesanan')

@section('content')

<div class="card">
    <div class="card-body">

        <p><b>Tanggal Pesan:</b> {{ $data->tanggalpesan }}</p>
        <p><b>Tanggal Kembali:</b> {{ $data->tanggalkembali }}</p>
        <p><b>Status:</b> {{ $data->status }}</p>

        <hr>

        <h5>Detail Alat</h5>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Alat</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data->detail as $d)
                <tr>
                    <td>{{ $d->alat->namaalat }}</td>
                    <td>{{ $d->jumlah }}</td>
                    <td>{{ $d->subtotal }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('penyewa.pemesanan.index') }}" class="btn btn-secondary">Kembali</a>

    </div>
</div>

@endsection