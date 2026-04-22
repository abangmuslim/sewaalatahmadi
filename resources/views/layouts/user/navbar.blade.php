<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    {{-- Left navbar --}}
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>

    {{-- Right navbar --}}
    <ul class="navbar-nav ml-auto">

        {{-- Nama user --}}
        <li class="nav-item d-flex align-items-center mr-3">
            <span class="text-sm">
                {{ session('nama') }} ({{ session('role') }})
            </span>
        </li>

        {{-- Logout --}}
        <li class="nav-item">
            <form action="{{ route('auth.user.logout') }}" method="GET">
                <button class="btn btn-danger btn-sm">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </li>

    </ul>
</nav>