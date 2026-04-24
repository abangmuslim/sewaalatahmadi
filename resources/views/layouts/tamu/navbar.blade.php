{{-- ============================= --}}
{{-- layouts/tamu/navbar.blade.php --}}
{{-- ============================= --}}

<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">

        {{-- BRAND --}}
        <a href="{{ route('landing.home') }}" class="navbar-brand">
            <span class="brand-text font-weight-bold">SewaAlatAhmadi</span>
        </a>

        {{-- TOGGLER --}}
        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">

            {{-- MENU KIRI --}}
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a href="{{ route('landing.home') }}"
                       class="nav-link {{ request()->routeIs('landing.home') ? 'active' : '' }}">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('landing.home') }}"
                       class="nav-link {{ request()->routeIs('landing.home') || request()->routeIs('landing.detailartikel') ? 'active' : '' }}">
                        Artikel
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('landing.daftarkategori') }}"
                       class="nav-link {{ request()->routeIs('landing.daftarkategori') ? 'active' : '' }}">
                        Kategori
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('landing.daftarisi') }}"
                       class="nav-link {{ request()->routeIs('landing.daftarisi') ? 'active' : '' }}">
                        Daftar Isi
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('landing.tentang') }}"
                       class="nav-link {{ request()->routeIs('landing.tentang') ? 'active' : '' }}">
                        Tentang
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('landing.kontak') }}"
                       class="nav-link {{ request()->routeIs('landing.kontak') ? 'active' : '' }}">
                        Kontak
                    </a>
                </li>

            </ul>

            {{-- MENU KANAN --}}
            <ul class="navbar-nav ml-auto">

                {{-- ================= USER LOGIN ================= --}}
                @if(session('user'))

                    <li class="nav-item mr-2">
                        <a href="{{ session('user.role') === 'admin' 
                                    ? route('dashboard.admin') 
                                    : route('dashboard.petugas') }}"
                           class="btn btn-sm btn-info">
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <form action="{{ route('logout.user') }}" method="POST">
                            @csrf
                            <button class="btn btn-sm btn-danger">
                                Logout
                            </button>
                        </form>
                    </li>

                {{-- ================= PENYEWA LOGIN ================= --}}
                @elseif(session('penyewa'))

                    <li class="nav-item mr-2">
                        <a href="{{ route('penyewa.dashboard') }}"
                           class="btn btn-sm btn-info">
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <form action="{{ route('logout.penyewa') }}" method="POST">
                            @csrf
                            <button class="btn btn-sm btn-danger">
                                Logout
                            </button>
                        </form>
                    </li>

                {{-- ================= GUEST ================= --}}
                @else

                    <li class="nav-item mr-2">
                        <a href="{{ route('login.user', ['redirect' => url()->current()]) }}"
                           class="btn btn-sm btn-primary">
                            Login User
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('login.penyewa', ['redirect' => url()->current()]) }}"
                           class="btn btn-sm btn-success">
                            Login Penyewa
                        </a>
                    </li>

                @endif

            </ul>

        </div>
    </div>
</nav>