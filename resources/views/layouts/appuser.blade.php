<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Dashboard')</title>

    <!-- AdminLTE -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    @stack('css')
</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">

        {{-- ✅ NAVBAR --}}
        @auth
        @include('layouts.user.navbar')
        @endauth

        {{-- ✅ SIDEBAR (AMAN DARI ERROR) --}}
        @auth
        @if(auth()->user()->role == 'admin')
        @include('layouts.user.sidebaradmin')
        @elseif(auth()->user()->role == 'petugas')
        @include('layouts.user.sidebarpetugas')
        @endif
        @endauth

        {{-- CONTENT --}}
        <div class="content-wrapper">

            {{-- HEADER --}}
            <div class="content-header">
                <div class="container-fluid">
                    <h1 class="m-0">@yield('title')</h1>
                </div>
            </div>

            {{-- MAIN CONTENT --}}
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>

        </div>

        {{-- FOOTER --}}
        @include('layouts.user.footer')

    </div>

    <!-- Scripts -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AdminLTE -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

    @stack('js')
</body>

</html>