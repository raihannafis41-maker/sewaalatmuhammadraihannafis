<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    {{-- Left navbar --}}
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>

    {{-- Right navbar --}}
    <ul class="navbar-nav ml-auto">

        @auth
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
                <span class="ml-1">{{ auth()->user()->nama }}</span>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <span class="dropdown-item-text">
                    Role: {{ auth()->user()->role }}
                </span>

                <div class="dropdown-divider"></div>

                <form action="{{ route('auth.user.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </li>
        @endauth

    </ul>

</nav>