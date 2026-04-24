<aside class="main-sidebar sidebar-dark-primary elevation-4">

    {{-- Brand --}}
    <a href="{{ route('admin.dashboard') }}" class="brand-link text-center">
        <span class="brand-text font-weight-bold">ADMIN PANEL</span>
    </a>

    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">

                {{-- Dashboard --}}
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" 
                       class="nav-link {{ request()->routeIs('dashboard.admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                {{-- MASTER --}}
                <li class="nav-header">MASTER DATA</li>

                <li class="nav-item">
                    <a href="{{ url('/dashboard/user') }}" 
                       class="nav-link {{ request()->is('dashboard/user*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>User</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.penyewa.index') }}" 
                       class="nav-link {{ request()->is('dashboard/admin/penyewa*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Penyewa</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/dashboard/kategori') }}" 
                       class="nav-link {{ request()->is('dashboard/kategori*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Kategori</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/dashboard/merk') }}" 
                       class="nav-link {{ request()->is('dashboard/merk*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>Merk</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/dashboard/kondisi') }}" 
                       class="nav-link {{ request()->is('dashboard/kondisi*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-check"></i>
                        <p>Kondisi</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/dashboard/alat') }}" 
                       class="nav-link {{ request()->is('dashboard/alat*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>Alat</p>
                    </a>
                </li>

                {{-- TRANSAKSI --}}
                <li class="nav-header">TRANSAKSI</li>

                <li class="nav-item">
                    <a href="{{ url('/dashboard/pemesanan') }}" 
                       class="nav-link {{ request()->is('dashboard/pemesanan*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>Pemesanan</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/dashboard/pembayaran') }}" 
                       class="nav-link {{ request()->is('dashboard/pembayaran*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-money-bill"></i>
                        <p>Pembayaran</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/dashboard/denda') }}" 
                       class="nav-link {{ request()->is('dashboard/denda*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-exclamation-triangle"></i>
                        <p>Denda</p>
                    </a>
                </li>

                {{-- KONTEN --}}
                <li class="nav-header">KONTEN</li>

                <li class="nav-item">
                    <a href="{{ route('admin.artikel.index') }}" 
                       class="nav-link {{ request()->is('dashboard/admin/artikel*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>Artikel</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.komentar.index') }}" 
                       class="nav-link {{ request()->is('dashboard/admin/komentar*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>Komentar</p>
                    </a>
                </li>

                {{-- LAPORAN --}}
                <li class="nav-header">LAPORAN</li>

                <li class="nav-item">
                    <a href="{{ url('/dashboard/laporan') }}" 
                       class="nav-link {{ request()->is('dashboard/laporan*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Laporan</p>
                    </a>
                </li>

            </ul>
        </nav>

    </div>
</aside>