@extends('layouts.apppenyewa')

@section('title', 'Pemesanan Saya')

@section('content')

<a href="{{ route('penyewa.pemesanan.create') }}" class="btn btn-primary mb-3">
    <i class="fas fa-plus"></i> Tambah Pemesanan
</a>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal Pesan</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->tanggalpesan }}</td>
            <td>{{ $item->tanggalkembali }}</td>
            <td>{{ $item->status }}</td>
            <td>
                <a href="{{ route('penyewa.pemesanan.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>

                <a href="{{ route('penyewa.pemesanan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('penyewa.pemesanan.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection