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

        {{-- USER INFO --}}
        <li class="nav-item d-flex align-items-center mr-3">
            <span class="text-sm">
                {{ Auth::user()->nama }} ({{ Auth::user()->role }})
            </span>
        </li>

        {{-- LOGOUT --}}
        <li class="nav-item">
            <form action="{{ route('logout.user') }}" method="POST">
                @csrf
                <button class="btn btn-danger btn-sm">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </li>

    </ul>

</nav>