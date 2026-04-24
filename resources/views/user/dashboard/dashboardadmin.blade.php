@extends('layouts.appuser')

@section('content')
<div class="container-fluid">

    <h4 class="mb-4">Dashboard Admin</h4>

    <div class="row">

        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $totalUser }}</h3>
                    <p>Total User</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalPenyewa }}</h3>
                    <p>Total Penyewa</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $totalAlat }}</h3>
                    <p>Total Alat</p>
                </div>
                <div class="icon">
                    <i class="fas fa-tools"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $totalPemesanan }}</h3>
                    <p>Total Pemesanan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
            </div>
        </div>

    </div>


    {{-- ===================== --}}
    {{-- PEMESANAN TERBARU --}}
    {{-- ===================== --}}
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Pemesanan Terbaru</h5>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th>Tanggal Pesan</th>
                        <th>Tanggal Kembali</th>
                        <th width="150">Status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($pemesananTerbaru as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggalpesan)->format('d M Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggalkembali)->format('d M Y') }}</td>
                            <td>
                                @if($item->status == 'pending')
                                    <span class="badge badge-warning">Pending</span>
                                @elseif($item->status == 'dipinjam')
                                    <span class="badge badge-primary">Dipinjam</span>
                                @elseif($item->status == 'selesai')
                                    <span class="badge badge-success">Selesai</span>
                                @else
                                    <span class="badge badge-secondary">{{ $item->status }}</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Belum ada pemesanan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


    {{-- ===================== --}}
    {{-- PENYEWA TERBARU --}}
    {{-- ===================== --}}
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Penyewa Terbaru</h5>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th width="180">Tanggal Daftar</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($penyewaTerbaru as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->username }}</td>
                            <td>{{ $p->nohp ?? '-' }}</td>
                            <td>{{ $p->alamat ?? '-' }}</td>
                            <td>{{ $p->created_at->format('d M Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada penyewa</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <a href="{{ route('admin.penyewa.index') }}" class="btn btn-primary btn-sm mt-2">
                Lihat Semua Penyewa
            </a>
        </div>
    </div>

</div>
@endsection