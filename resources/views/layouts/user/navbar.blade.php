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

        {{-- User Info --}}
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
                <span class="ml-1">{{ auth()->user()->nama ?? 'User' }}</span>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <span class="dropdown-item-text">
                    Role: {{ auth()->user()->role }}
                </span>

                <div class="dropdown-divider"></div>

                <a href="/logout" class="dropdown-item text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>

    </ul>

</nav>