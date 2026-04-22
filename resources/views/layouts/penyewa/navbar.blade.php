<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    {{-- Menu toggle --}}
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>

    {{-- Title --}}
    <span class="navbar-brand mx-auto font-weight-bold">
        Sewa Alat
    </span>

    {{-- User --}}
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user-circle"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <span class="dropdown-item-text">
                    {{ auth()->guard('penyewa')->user()->nama ?? 'Penyewa' }}
                </span>

                <div class="dropdown-divider"></div>

                <form action="/logout-penyewa" method="POST">
                    @csrf
                    <button class="dropdown-item text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </li>
    </ul>

</nav>