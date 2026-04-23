@extends('layouts.apptamu')

@section('title', 'Register Penyewa')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">

        <div class="card">
            <div class="card-header text-center">
                <b>Registrasi Penyewa</b>
            </div>

            <div class="card-body">
                <form method="POST" action="#">
                    @csrf

                    <div class="form-group mb-3">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>No HP</label>
                        <input type="text" name="nohp" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <button class="btn btn-success w-100">
                        Daftar
                    </button>

                    <div class="text-center mt-3">
                        <a href="{{ route('auth.penyewalogin') }}">
                            Sudah punya akun? Login
                        </a>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>

@endsection