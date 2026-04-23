<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">

        {{-- Logo --}}
        <a href="/" class="navbar-brand">
            <span class="brand-text font-weight-bold">SewaAlat</span>
        </a>

        {{-- Toggle --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Menu --}}
        <div class="collapse navbar-collapse" id="navbarCollapse">

            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a href="/" class="nav-link">Home</a>
                </li>

                <li class="nav-item">
                    <a href="/kategori" class="nav-link">Kategori</a>
                </li>

                <li class="nav-item">
                    <a href="/tentang" class="nav-link">Tentang</a>
                </li>

                <li class="nav-item">
                    <a href="/kontak" class="nav-link">Kontak</a>
                </li>

                {{-- Auth --}}
                <a href="{{ route('auth.user.login') }}" class="btn btn-primary btn-sm me-2">
                    Login User
                </a>

                <a href="{{ route('auth.penyewa.login') }}" class="btn btn-success btn-sm">
                    Login Penyewa
                </a>

            </ul>
        </div>

    </div>
</nav>