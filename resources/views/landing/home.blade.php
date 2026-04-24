@extends('layouts.apptamu')

@section('title', 'Home')

@section('content')

<div class="row">
    <div class="col-md-8">

        <div class="jumbotron">
            <h2>Sewa Alat Mudah & Cepat</h2>
            <p>Temukan berbagai alat terbaik untuk kebutuhan Anda</p>
        </div>

        <div class="row">
            @forelse($artikel as $a)
            <div class="col-md-6">
                <div class="card mb-4">

                    @if($a->gambar)
                    <img src="{{ asset('uploads/artikel/' . $a->gambar) }}" class="card-img-top" style="height:220px; object-fit:cover;">
                    @else
                    <img src="{{ asset('dist/img/photo1.png') }}" class="card-img-top" style="height:220px; object-fit:cover;">
                    @endif

                    <div class="card-body">
                        <h5>{{ $a->judul }}</h5>

                        <p class="text-muted" style="font-size: 13px;">
                            {{ $a->created_at->format('d M Y') }}
                        </p>

                        <p>
                            {{ \Illuminate\Support\Str::limit($a->isi, 80) }}
                        </p>

                        <a href="{{ route('detailartikel', $a->id) }}" class="btn btn-primary btn-sm">
                            Baca Selengkapnya
                        </a>
                    </div>

                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-warning">
                    Belum ada artikel.
                </div>
            </div>
            @endforelse
        </div>

        <div class="mt-3">
            {{ $artikel->links() }}
        </div>

    </div>

    {{-- SIDEBAR --}}
    @include('layouts.tamu.sidebar')

</div>

@endsection