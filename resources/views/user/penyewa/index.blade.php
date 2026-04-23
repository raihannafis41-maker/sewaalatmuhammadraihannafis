@extends('layouts.appuser')

@section('title', 'Data Penyewa')

@section('content')
<div class="card">

    <div class="card-header d-flex justify-content-between">
        <h5>Data Penyewa</h5>
        <a href="{{ route('penyewa.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Penyewa
        </a>
    </div>

    <div class="card-body">

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="50">No</th>
                    <th>Username</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th width="200">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $i => $row)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $row->username }}</td>
                    <td>{{ $row->nohp }}</td>
                    <td>{{ $row->alamat }}</td>
                    <td>

                        <a href="{{ route('penyewa.show', $row->id) }}"
                           class="btn btn-info btn-sm">Detail</a>

                        <a href="{{ route('penyewa.edit', $row->id) }}"
                           class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('penyewa.destroy', $row->id) }}"
                              method="POST"
                              style="display:inline;"
                              onsubmit="return confirm('Yakin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection