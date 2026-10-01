<div class="sidebar">
    <h4 class="text-center py-4 border-bottom border-secondary mb-3">Admin Panel</h4>
    <nav class="nav flex-column">
        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
            Dashboard
        </a>
        <a class="nav-link {{ request()->routeIs('admin.event*') ? 'active' : '' }}" href="{{ route('admin.event') }}">
            Kelola Acara
        </a>
        <a class="nav-link {{ request()->routeIs('admin.transaction*') ? 'active' : '' }}" href="{{ route('admin.transaction') }}">
            Daftar Transaksi
        </a>
        <hr class="border-secondary my-3 mx-3">
        <a class="nav-link text-info" href="{{ route('dashboard') }}">
            &larr; Ke Website Utama
        </a>
        <form method="POST" action="{{ route('logout') }}" class="mt-2">
            @csrf
            <button type="submit" class="nav-link text-danger border-0 bg-transparent w-100 text-start">
                Logout
            </button>
        </form>
    </nav>
</div>
