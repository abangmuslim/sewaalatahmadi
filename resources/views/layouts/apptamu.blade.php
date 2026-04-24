<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title','Tamu')</title>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <style>
        body {
            background: #f4f6f9;
        }

        /* HERO */
        .hero-full {
            background: linear-gradient(135deg, #007bff, #00c6ff);
            color: white;
            padding: 60px 20px;
            text-align: center;
        }

        /* CARD */
        .card-custom {
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            border: none;
        }

        .card-header-dark {
            background: #007ffe;
            color: #fff;
            border-radius: 12px 12px 0 0;
            padding: 10px 15px;
            font-weight: 500;
        }

        .section-card {
            margin-top: 20px;
        }

        /* SIDEBAR */
        .sidebar-header {
            border-radius: 12px 12px 0 0;
            font-weight: 500;
            padding: 10px;
        }

        .sidebar-body {
            border-radius: 0 0 12px 12px;
            background: #ffffff;
        }

        .nav-link {
            color: #333;
            border-radius: 8px;
            margin-bottom: 5px;
            transition: all 0.2s ease-in-out;
        }

        .nav-link:hover {
            background: #f1f3f5;
        }

        .active-sidebar {
            background: #007bff;
            color: #fff !important;
            font-weight: 500;
        }
    </style>

    @stack('css')
</head>

<body class="hold-transition layout-top-nav">

<div class="wrapper">

    {{-- NAVBAR --}}
    @include('layouts.tamu.navbar')

    {{-- HERO --}}
    @hasSection('hero')
        @yield('hero')
    @else
        <div class="hero-full">
            <h2 class="font-weight-bold">Sewa Alat Jadi Lebih Mudah</h2>
            <p>Temukan berbagai alat terbaik untuk kebutuhan Anda</p>
        </div>
    @endif

    {{-- CONTENT --}}
    <div class="content-wrapper" style="margin-left:0 !important;">
        <div class="content p-3">
            <div class="container-fluid">

                <div class="row">

                    {{-- KONTEN --}}
                    <div class="col-md-9 col-12">

                        {{-- OPTIONAL WRAPPER (biar bisa dimatikan di halaman tertentu) --}}
                        @hasSection('no_card')
                            @yield('content')
                        @else
                            <div class="card card-custom section-card">

                                @hasSection('header')
                                <div class="card-header card-header-dark">
                                    @yield('header')
                                </div>
                                @endif

                                <div class="card-body">
                                    @yield('content')
                                </div>

                            </div>
                        @endif

                    </div>

                    {{-- SIDEBAR --}}
                    <div class="col-md-3 col-12">
                        @include('layouts.tamu.sidebar')
                    </div>

                </div>

            </div>
        </div>
    </div>

    {{-- FOOTER --}}
    @include('layouts.tamu.footer')

</div>

{{-- JS --}}
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

@stack('js')

</body>
</html>