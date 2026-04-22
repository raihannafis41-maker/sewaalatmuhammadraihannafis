@extends('layouts.apptamu')

@section('title', 'Kategori')

@section('content')

<div class="row">
    <div class="col-md-8">

        <h4>Artikel Kategori Elektronik</h4>

        @for($i=1; $i<=5; $i++)
        <div class="card mb-3">
            <div class="card-body">
                <h5>Judul Artikel {{ $i }}</h5>
                <p>Deskripsi singkat...</p>
                <a href="/detailartikel" class="btn btn-sm btn-primary">Baca</a>
            </div>
        </div>
        @endfor

    </div>

    @include('layouts.tamu.sidebar')
</div>

@endsection