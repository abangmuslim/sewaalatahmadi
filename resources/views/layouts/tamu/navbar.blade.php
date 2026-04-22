<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">

        <a href="/" class="navbar-brand">
            <span class="brand-text font-weight-bold">SewaAlatAhmadi</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/" class="nav-link">Home</a>
                </li>

                <li class="nav-item">
                    <a href="/daftarkategori" class="nav-link">Kategori</a>
                </li>

                <li class="nav-item">
                    <a href="/tentang" class="nav-link">Tentang</a>
                </li>

                <li class="nav-item">
                    <a href="/kontak" class="nav-link">Kontak</a>
                </li>
            </ul>

            <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

                <li class="nav-item mr-2">
                    <a href="{{ route('auth.user.login') }}"
                        class="btn btn-sm btn-primary {{ request()->routeIs('auth.user.login') ? 'active' : '' }}">
                        Login User
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('auth.penyewa.login') }}"
                        class="btn btn-sm btn-success {{ request()->routeIs('auth.penyewa.login') ? 'active' : '' }}">
                        Login Penyewa
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>