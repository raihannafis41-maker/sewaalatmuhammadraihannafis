<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\ModelPenyewa;
use App\Models\ModelAlat;
use App\Models\ModelPemesanan;

class DashboardController extends Controller
{
    public function admin()
    {
        $totalUser = ModelUser::count();
        $totalPenyewa = ModelPenyewa::count();
        $totalAlat = ModelAlat::count();
        $totalPemesanan = ModelPemesanan::count();

        // ambil 10 penyewa terbaru
        $penyewaTerbaru = ModelPenyewa::orderBy('created_at', 'desc')->take(10)->get();

        // ambil 5 pemesanan terbaru
        $pemesananTerbaru = ModelPemesanan::orderBy('created_at', 'desc')->take(5)->get();

        return view('user.dashboard.dashboardadmin', compact(
            'totalUser',
            'totalPenyewa',
            'totalAlat',
            'totalPemesanan',
            'penyewaTerbaru',
            'pemesananTerbaru'
        ));
    }

    public function petugas()
    {
        $totalUser = ModelUser::count();
        $totalPenyewa = ModelPenyewa::count();
        $totalAlat = ModelAlat::count();
        $totalPemesanan = ModelPemesanan::count();

        // ambil 5 pemesanan terbaru
        $pemesananTerbaru = ModelPemesanan::orderBy('created_at', 'desc')->take(5)->get();

        return view('user.dashboard.dashboardpetugas', compact(
            'totalUser',
            'totalPenyewa',
            'totalAlat',
            'totalPemesanan',
            'pemesananTerbaru'
        ));
    }
}