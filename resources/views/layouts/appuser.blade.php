{{-- ============================= --}}
{{-- appuser.blade.php --}}
{{-- ============================= --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','User')</title>

    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">

    {{-- Navbar --}}
    @include('layouts.user.navbar')

    {{-- ROLE DARI AUTH (BUKAN SESSION) --}}
    @php
        $role = Auth::user()->role ?? null;
    @endphp

    @if($role === 'admin')
        @include('layouts.user.sidebaradmin')
    @elseif($role === 'petugas')
        @include('layouts.user.sidebarpetugas')
    @else
        <script>
            window.location.href = "{{ route('login.user') }}";
        </script>
    @endif

    {{-- Content --}}
    <div class="content-wrapper">
        <section class="content pt-3">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>

    {{-- Footer --}}
    @include('layouts.user.footer')

</div>

<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

</body>
</html>