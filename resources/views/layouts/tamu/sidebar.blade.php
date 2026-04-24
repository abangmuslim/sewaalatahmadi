<div class="card shadow-sm border-0 mt-3">

    {{-- HEADER --}}
    <div class="card-header bg-primary text-white text-center sidebar-header">
        Menu
    </div>

    {{-- BODY --}}
    <div class="card-body bg-white p-2 sidebar-body">

        <ul class="nav flex-column">

            <li class="nav-item">
                <a href="{{ route('landing.home') }}"
                   class="nav-link {{ request()->routeIs('landing.home') ? 'active-sidebar' : '' }}">
                    <i class="fas fa-home mr-2"></i> Home
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('landing.daftarkategori') }}"
                   class="nav-link {{ request()->routeIs('landing.daftarkategori*') ? 'active-sidebar' : '' }}">
                    <i class="fas fa-list mr-2"></i> Kategori
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('landing.tentang') }}"
                   class="nav-link {{ request()->routeIs('landing.tentang') ? 'active-sidebar' : '' }}">
                    <i class="fas fa-info-circle mr-2"></i> Tentang
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('landing.kontak') }}"
                   class="nav-link {{ request()->routeIs('landing.kontak') ? 'active-sidebar' : '' }}">
                    <i class="fas fa-phone mr-2"></i> Kontak
                </a>
            </li>

        </ul>

    </div>

</div>