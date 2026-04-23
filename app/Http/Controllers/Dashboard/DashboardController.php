<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('user.dashboard.dashboardadmin', [
            'totalUser' => ModelUser::count(),

            // 🔥 sementara dummy (karena model belum ada)
            'totalPenyewa' => 0,
            'totalAlat' => 0,
            'totalPemesanan' => 0,

            // 🔥 kosongkan dulu
            'pemesananTerbaru' => []
        ]);
    }

    public function petugas()
    {
        return view('user.dashboard.dashboardpetugas', [
            'totalUser' => ModelUser::count(),

            // 🔥 sementara dummy
            'totalPenyewa' => 0,
            'totalAlat' => 0,
            'totalPemesanan' => 0,

            // 🔥 kosongkan dulu
            'pemesananTerbaru' => []
        ]);
    }
}