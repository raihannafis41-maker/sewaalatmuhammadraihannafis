@extends('layouts.appuser')

@section('title', 'Edit User')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Edit User</h5>
    </div>
    <div class="card-body">

        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-2">
                <label>Username</label>
                <input type="text" name="username" class="form-control"
                    value="{{ $user->username }}" required>
            </div>

            <div class="form-group mb-2">
                <label>Password (kosongkan jika tidak diubah)</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="form-group mb-2">
                <label>Role</label>
                <select name="role" class="form-control">
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="petugas" {{ $user->role == 'petugas' ? 'selected' : '' }}>Petugas</option>
                </select>
            </div>

            <button class="btn btn-primary">Update</button>
        </form>

    </div>
</div>
@endsection