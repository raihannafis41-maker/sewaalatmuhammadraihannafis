@extends('layouts.apptamu')

@section('title', 'Daftar Kategori')

@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h5>Daftar Kategori</h5>
            </div>

            <div class="card-body">
                <div class="row">

                    @for($i=1; $i<=6; $i++)
                    <div class="col-md-4">
                        <a href="/kategori" class="btn btn-outline-primary btn-block mb-2">
                            Kategori {{ $i }}
                        </a>
                    </div>
                    @endfor

                </div>
            </div>
        </div>

    </div>
</div>

@endsection