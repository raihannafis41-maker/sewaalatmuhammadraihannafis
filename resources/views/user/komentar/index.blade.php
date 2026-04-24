@extends('layouts.appuser')

@section('title', 'Komentar')

@section('content')

<div class="card">
    <div class="card-header">
        <h5>Komentar & Balasan</h5>
    </div>

    <div class="card-body">

        @foreach($data as $komentar)
            @include('user.komentar.item', ['komentar' => $komentar, 'level' => 0])
        @endforeach

    </div>
</div>

@endsection