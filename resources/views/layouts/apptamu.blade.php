<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Sewa Alat')</title>

    <!-- AdminLTE -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    @stack('css')
</head>
<body class="hold-transition layout-top-nav">

<div class="wrapper">

    {{-- Navbar --}}
    @include('layouts.tamu.navbar')

    {{-- Content --}}
    <div class="content-wrapper">
        <div class="content pt-3">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>

    {{-- Footer --}}
    @include('layouts.tamu.footer')

</div>

<!-- Scripts -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

@stack('js')
</body>
</html>