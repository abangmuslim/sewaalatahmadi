{{-- ============================= --}}
{{-- layouts/tamu/navbar.blade.php --}}
{{-- ============================= --}}
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">

        <a href="{{ route('landing.home') }}" class="navbar-brand">
            <span class="brand-text font-weight-bold">SewaAlatAhmadi</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">

            {{-- MENU --}}
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a href="{{ route('landing.home') }}"
                       class="nav-link {{ request()->routeIs('landing.home') ? 'active' : '' }}">
                        Home
                    </a>
                </li>

                {{-- DETAIL ARTIKEL / LIST ARTIKEL (AMAN) --}}
                <li class="nav-item">
                    <a href="{{ url('/') }}"
                       class="nav-link">
                        Artikel
                    </a>
                </li>

            </ul>

            {{-- LOGIN --}}
            <ul class="navbar-nav ml-auto">

                <li class="nav-item mr-2">
                    <a href="{{ route('login.user') }}" class="btn btn-sm btn-primary">
                        Login User
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('login.penyewa') }}" class="btn btn-sm btn-success">
                        Login Penyewa
                    </a>
                </li>

            </ul>

        </div>
    </div>
</nav>