<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{ route('dashboard') }}" class="brand-link text-center">
        <span class="brand-text font-weight-bold">ADMIN PANEL</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column">

                {{-- DASHBOARD --}}
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                       class="nav-link {{ request()->routeIs('dashboard*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                {{-- MASTER --}}
                <li class="nav-header">MASTER DATA</li>

                <li class="nav-item">
                    <a href="{{ route('user.index') }}"
                       class="nav-link {{ request()->routeIs('user.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>User</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('penyewa.index') }}"
                       class="nav-link {{ request()->routeIs('penyewa.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Penyewa</p>
                    </a>
                </li>

                {{-- CMS --}}
                <li class="nav-header">CMS</li>

                <li class="nav-item">
                    <a href="{{ route('artikel.index') }}"
                       class="nav-link {{ request()->routeIs('artikel.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>Artikel</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('komentar.index') }}"
                       class="nav-link {{ request()->routeIs('komentar.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>Komentar</p>
                    </a>
                </li>

            </ul>

        </nav>
    </div>
</aside>