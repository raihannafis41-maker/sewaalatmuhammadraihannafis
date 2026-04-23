<aside class="main-sidebar sidebar-dark-primary elevation-4">

    {{-- Brand --}}
    <a href="#" class="brand-link text-center">
        <span class="brand-text font-weight-bold">PENYEWA</span>
    </a>

    <div class="sidebar">

        <nav class="mt-3">
            <ul class="nav nav-pills nav-sidebar flex-column text-sm">

                <li class="nav-item">
                    <a href="/penyewa/dashboard" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('penyewa.pemesanan.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>Pemesanan Saya</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/penyewa/pembayaran" class="nav-link">
                        <i class="nav-icon fas fa-wallet"></i>
                        <p>Pembayaran</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/penyewa/profil" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Profil</p>
                    </a>
                </li>

                <li class="nav-item mt-3">
                    <form action="{{ route('auth.penyewa.logout') }}" method="POST">
                        @csrf
                        <button class="nav-link text-danger border-0 bg-transparent w-100 text-left">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </button>
                    </form>
                </li>

            </ul>
        </nav>

    </div>
</aside>