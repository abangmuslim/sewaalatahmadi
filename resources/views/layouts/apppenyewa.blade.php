
{{-- ============================= --}}
{{-- apppenyewa.blade.php (Mobile Friendly) --}}
{{-- ============================= --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title','Penyewa')</title>

    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <style>
        body { font-size: 14px; }

        /* Bottom nav mobile */
        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 60px;
            background: #fff;
            border-top: 1px solid #ddd;
            display: flex;
            justify-content: space-around;
            align-items: center;
            z-index: 999;
        }

        .bottom-nav a {
            text-align: center;
            font-size: 12px;
            color: #333;
        }

        .content-wrapper {
            padding-bottom: 70px; /* space for bottom nav */
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    {{-- Navbar --}}
    @include('layouts.penyewa.navbar')

    {{-- Sidebar (tetap ada untuk desktop) --}}
    @include('layouts.penyewa.sidebar')

    {{-- Content --}}
    <div class="content-wrapper">
        <section class="content pt-2">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>

    {{-- Footer --}}
    @include('layouts.penyewa.footer')

    {{-- Bottom Navigation (Mobile UX) --}}
    <div class="bottom-nav d-md-none">
        <a href="/penyewa/dashboard">
            <i class="fas fa-home"></i><br>
            Home
        </a>
        <a href="/penyewa/pemesanan">
            <i class="fas fa-shopping-cart"></i><br>
            Pesan
        </a>
        <a href="/logout-penyewa" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i><br>
            Logout
        </a>
    </div>

    <form id="logout-form" action="/logout-penyewa" method="POST" class="d-none">
        @csrf
    </form>

</div>

<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

</body>
</html>