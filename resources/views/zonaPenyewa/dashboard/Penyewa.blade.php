@extends('layouts.apppenyewa')

@section('title', 'Dashboard Penyewa')

@section('content')

<div class="row">

    {{-- INFO WELCOME --}}
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4>Selamat Datang, Penyewa 👋</h4>
                <p>Ini adalah dashboard penyewa.</p>
            </div>
        </div>
    </div>

    {{-- RINGKASAN --}}
    <div class="col-md-4">
        <div class="card bg-info">
            <div class="card-body text-white">
                <h5>Total Pemesanan</h5>
                <h3>0</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card bg-success">
            <div class="card-body text-white">
                <h5>Pembayaran Selesai</h5>
                <h3>0</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card bg-danger">
            <div class="card-body text-white">
                <h5>Tunggakan</h5>
                <h3>0</h3>
            </div>
        </div>
    </div>

    {{-- TABEL PEMESANAN TERAKHIR --}}
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5>5 Pemesanan Terakhir</h5>
            </div>
            <div class="card-body">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="3" class="text-center">
                                Belum ada data
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>

@endsection