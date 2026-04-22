<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="/dashboard" class="brand-link text-center">
        <span class="brand-text font-weight-bold">ADMIN PANEL</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column">

                {{-- Dashboard --}}
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                {{-- MASTER --}}
                <li class="nav-header">MASTER DATA</li>

                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>User</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/penyewa" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Penyewa</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/kategori" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Kategori</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/merk" class="nav-link">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>Merk</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/kondisi" class="nav-link">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>Kondisi</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/alat" class="nav-link">
                        <i class="nav-icon fas fa-box"></i>
                        <p>Alat</p>
                    </a>
                </li>

                {{-- TRANSAKSI --}}
                <li class="nav-header">TRANSAKSI</li>

                <li class="nav-item">
                    <a href="/pemesanan" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>Pemesanan</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/pembayaran" class="nav-link">
                        <i class="nav-icon fas fa-money-bill"></i>
                        <p>Pembayaran</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/denda" class="nav-link">
                        <i class="nav-icon fas fa-exclamation-triangle"></i>
                        <p>Denda</p>
                    </a>
                </li>

                {{-- CMS --}}
                <li class="nav-header">CMS</li>

                <li class="nav-item">
                    <a href="/artikel" class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>Artikel</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/komentar" class="nav-link">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>Komentar</p>
                    </a>
                </li>

                {{-- LAPORAN --}}
                <li class="nav-header">LAPORAN</li>

                <li class="nav-item">
                    <a href="/laporan/bulanan" class="nav-link">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>Bulanan</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/laporan/tahunan" class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>Tahunan</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/laporan/aruskas" class="nav-link">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>Arus Kas</p>
                    </a>
                </li>

            </ul>

        </nav>
    </div>
</aside>