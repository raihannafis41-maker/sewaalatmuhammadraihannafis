@extends('layouts.apptamu')

@section('title', 'Detail Artikel')

@section('content')

<div class="row">
    <div class="col-md-8">

        <div class="card">
            <img src="{{ asset('dist/img/photo1.png') }}" class="card-img-top">

            <div class="card-body">
                <h3>Judul Artikel</h3>
                <p class="text-muted">20 April 2026 | Admin</p>

                <p>
                    Ini adalah isi artikel lengkap. Kamu bisa isi dengan konten database nanti.
                </p>

                <span class="badge badge-info">Elektronik</span>
                <span class="badge badge-secondary">Tips</span>
            </div>
        </div>

    </div>

    @include('layouts.tamu.sidebar')
</div>

@endsection