<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="/dashboard" class="brand-link text-center">
        <span class="brand-text font-weight-bold">PETUGAS PANEL</span>
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

                {{-- CMS --}}
                <li class="nav-header">CMS</li>

                <li class="nav-item">
                    <a href="/artikel" class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>Artikel</p>
                    </a>
                </li>

            </ul>

        </nav>
    </div>
</aside>