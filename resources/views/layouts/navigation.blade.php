<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="{{ route('dashboard') }}">Pendaftaran Acara</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-semibold' : '' }}" href="{{ route('dashboard') }}">
                        Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('user.event') ? 'active fw-semibold' : '' }}" href="{{ route('user.event') }}">
                        Semua Acara
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('user.event.myEvent') ? 'active fw-semibold' : '' }}" href="{{ route('user.event.myEvent') }}">
                        Acara yang Diikuti
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('user.about') ? 'active fw-semibold' : '' }}" href="{{ route('user.about') }}">
                        Tentang Kami
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto align-items-center">
                @if(Auth::user()->role === 'admin')
                    <li class="nav-item me-2">
                        <a class="btn btn-sm btn-outline-dark" href="{{ route('admin.dashboard') }}">
                            Panel Admin
                        </a>
                    </li>
                @endif
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fw-semibold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                Profil Saya
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
