<aside class="main-sidebar sidebar-dark-primary elevation-4">

    {{-- Brand --}}
    <a href="{{ route('penyewa.dashboard') }}" class="brand-link text-center">
        <span class="brand-text font-weight-bold">PENYEWA</span>
    </a>

    <div class="sidebar">

        {{-- User panel --}}
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">
                    {{ session('nama') }}
                </a>
            </div>
        </div>

        {{-- Menu --}}
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column">

                {{-- Dashboard --}}
                <li class="nav-item">
                    <a href="{{ route('penyewa.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                {{-- Pemesanan --}}
                <li class="nav-item">
                    {{-- route belum dibuat --}}
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>Pemesanan Saya</p>
                    </a>
                </li>

            </ul>
        </nav>

    </div>
</aside>