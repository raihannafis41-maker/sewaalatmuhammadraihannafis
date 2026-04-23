@extends('layouts.appuser')

@section('title', 'Data User')

@section('content')
<div class="card">

    <div class="card-header d-flex justify-content-between">
        <h5>Data User</h5>
        <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah User
        </a>
    </div>

    <div class="card-body">

        {{-- ALERT SUCCESS --}}
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
                    <th>Role</th>
                    <th width="220">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $i => $user)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->role }}</td>
                    <td>

                        <a href="{{ route('user.show', $user->id) }}"
                            class="btn btn-info btn-sm">
                            Detail
                        </a>

                        <a href="{{ route('user.edit', $user->id) }}"
                            class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('user.destroy', $user->id) }}"
                            method="POST"
                            style="display:inline;"
                            onsubmit="return confirm('Yakin hapus data ini?')">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection