@extends('layouts.apptamu')

@section('title', 'Detail Artikel')

@section('content')

<div class="row">
    <div class="col-md-8">

        {{-- DETAIL ARTIKEL --}}
        <div class="card">
            @if($artikel->gambar)
                <img src="{{ asset('uploads/artikel/' . $artikel->gambar) }}" class="card-img-top">
            @else
                <img src="{{ asset('dist/img/photo1.png') }}" class="card-img-top">
            @endif

            <div class="card-body">
                <h3>{{ $artikel->judul }}</h3>

                <p class="text-muted">
                    {{ $artikel->created_at->format('d M Y') }}
                </p>

                <p>{!! nl2br(e($artikel->isi)) !!}</p>
            </div>
        </div>


        {{-- ALERT --}}
        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger mt-3">
                @foreach($errors->all() as $err)
                    <div>{{ $err }}</div>
                @endforeach
            </div>
        @endif


        {{-- FORM KOMENTAR --}}
        <div class="card mt-4">
            <div class="card-header">
                <h5>Tulis Komentar</h5>
            </div>

            <div class="card-body">

                @auth('penyewa')
                    <form action="{{ route('komentar.store', ['id' => $artikel->id]) }}" method="POST">
                        @csrf

                        <textarea name="isikomentar"
                            class="form-control"
                            rows="4"
                            placeholder="Tulis komentar..."
                            required></textarea>

                        <button type="submit" class="btn btn-primary mt-2">
                            Kirim Komentar
                        </button>
                    </form>
                @else
                    <div class="alert alert-warning">
                        Silakan <a href="{{ route('auth.penyewa.login') }}">login sebagai penyewa</a>
                        untuk mengomentari artikel.
                    </div>
                @endauth

            </div>
        </div>


        {{-- LIST KOMENTAR --}}
        <div class="card mt-4 mb-4">
            <div class="card-header">
                <h5>Komentar</h5>
            </div>

            <div class="card-body">

                @forelse($komentar as $k)
                    {{-- KOMENTAR UTAMA --}}
                    <div class="border rounded p-3 mb-3">
                        <strong>{{ $k->nama }}</strong>
                        <br>
                        <small class="text-muted">
                            {{ $k->created_at->format('d M Y H:i') }}
                        </small>

                        <p class="mt-2 mb-2">
                            {{ $k->isikomentar }}
                        </p>

                        {{-- BUTTON BALAS --}}
                        @auth('penyewa')
                            <button class="btn btn-sm btn-link p-0"
                                onclick="document.getElementById('reply-{{ $k->id }}').classList.toggle('d-none')">
                                Balas
                            </button>

                            {{-- FORM BALAS --}}
                            <form action="{{ route('komentar.store', ['id' => $artikel->id]) }}"
                                  method="POST"
                                  class="mt-2 d-none"
                                  id="reply-{{ $k->id }}">
                                @csrf

                                <input type="hidden" name="parent_id" value="{{ $k->id }}">

                                <textarea name="isikomentar"
                                    class="form-control"
                                    rows="2"
                                    placeholder="Tulis balasan..."
                                    required></textarea>

                                <button class="btn btn-sm btn-primary mt-1">
                                    Kirim
                                </button>
                            </form>
                        @endauth

                        {{-- BALASAN --}}
                        @if($k->replies && count($k->replies))
                            <div class="mt-3 ms-4">
                                @foreach($k->replies as $r)
                                    <div class="border rounded p-2 mb-2 bg-light">
                                        <strong>{{ $r->nama }}</strong>
                                        <br>
                                        <small class="text-muted">
                                            {{ $r->created_at->format('d M Y H:i') }}
                                        </small>

                                        <p class="mt-1 mb-0">
                                            {{ $r->isikomentar }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                    </div>
                @empty
                    <p class="text-muted">Belum ada komentar.</p>
                @endforelse

            </div>
        </div>

    </div>

    {{-- SIDEBAR --}}
    @include('layouts.tamu.sidebar')

</div>

@endsection