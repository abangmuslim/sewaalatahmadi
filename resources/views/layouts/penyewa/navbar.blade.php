<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    {{-- Toggle sidebar --}}
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>

    {{-- Title --}}
    <span class="navbar-text font-weight-bold">
        Sewa Alat
    </span>

    {{-- Right --}}
    <ul class="navbar-nav ml-auto">

        {{-- Menu (sesuai treediagram) --}}
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('penyewa.dashboard') }}" class="nav-link">
                Dashboard
            </a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            {{-- route belum aktif --}}
            <a href="#" class="nav-link">
                Pemesanan
            </a>
        </li>

        {{-- Nama Penyewa --}}
        <li class="nav-item d-none d-sm-block">
            <span class="nav-link text-sm">
                {{ session('nama') }}
            </span>
        </li>

        {{-- Logout --}}
        <li class="nav-item">
            <a href="{{ route('auth.penyewa.logout') }}" class="btn btn-danger btn-sm">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </li>

    </ul>
</nav>