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

        {{-- Nama Penyewa --}}
        <li class="nav-item d-none d-sm-block">
            <span class="nav-link text-sm">
                {{ auth()->guard('penyewa')->user()->nama }}
            </span>
        </li>

        {{-- Logout --}}
        <li class="nav-item">
            <form action="/logout-penyewa" method="POST">
                @csrf
                <button class="btn btn-danger btn-sm">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </form>
        </li>

    </ul>
</nav>