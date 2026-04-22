@extends('layouts.apptamu')

@section('title', 'Home')

@section('content')

<div class="row">

    <div class="col-md-8">

        {{-- Hero --}}
        <div class="jumbotron">
            <h3>Sewa Alat Mudah & Cepat</h3>
            <p>Temukan berbagai alat terbaik untuk kebutuhan Anda</p>
        </div>

        {{-- Artikel --}}
        <div class="row">

            @for($i=1; $i<=6; $i++)
            <div class="col-md-6">
                <div class="card">
                    <img src="{{ asset('dist/img/photo1.png') }}" class="card-img-top">
                    <div class="card-body">
                        <h5>Judul Artikel {{ $i }}</h5>
                        <p class="text-muted">Deskripsi singkat artikel...</p>
                        <a href="{{ route('detailartikel', ['id' => $i]) }}" class="btn btn-primary btn-sm">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
            @endfor

        </div>

    </div>

    @include('layouts.tamu.sidebar')

</div>

@endsection