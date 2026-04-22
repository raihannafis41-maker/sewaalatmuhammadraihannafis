@extends('layouts.appuser')

@section('content')
<div class="container-fluid">

    <h4 class="mb-4">Dashboard Petugas</h4>

    <div class="row">

        <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalPenyewa }}</h3>
                    <p>Total Penyewa</p>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $totalAlat }}</h3>
                    <p>Total Alat</p>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $totalPemesanan }}</h3>
                    <p>Total Pemesanan</p>
                </div>
            </div>
        </div>

    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h5>Pemesanan Terbaru</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pemesananTerbaru as $item)
                    <tr>
                        <td>{{ $item->tanggalpesan }}</td>
                        <td>{{ $item->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection