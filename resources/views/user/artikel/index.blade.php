@extends('layouts.appuser')

@section('title', 'Data Artikel')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5>Data Artikel</h5>

        <a href="{{ route('admin.artikel.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Artikel
        </a>
    </div>

    <div class="card-body">

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="50">No</th>
                    <th>Judul</th>
                    <th width="120">Gambar</th>
                    <th width="200">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->judul }}</td>
                    <td>
                        @if($row->gambar)
                        <img src="{{ asset('uploads/artikel/'.$row->gambar) }}" width="120" style="border-radius:5px;">
                        @else
                        <small class="text-muted">Tidak ada</small>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.artikel.show', $row->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('admin.artikel.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('admin.artikel.destroy', $row->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada artikel</td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>
@endsection