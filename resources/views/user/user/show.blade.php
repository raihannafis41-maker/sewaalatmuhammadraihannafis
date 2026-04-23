@extends('layouts.appuser')

@section('title', 'Detail User')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Detail User</h5>
    </div>
    <div class="card-body">

        <table class="table table-bordered">
            <tr>
                <th>Username</th>
                <td>{{ $user->username }}</td>
            </tr>
            <tr>
                <th>Role</th>
                <td>{{ $user->role }}</td>
            </tr>
        </table>

        <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>

    </div>
</div>
@endsection