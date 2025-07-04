<div class="sidebar">
    <h4 class="text-center py-3">Admin</h4>
    <nav class="nav flex-column">
        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
            {{ __('Dashboard') }}
        </x-nav-link>
        <x-nav-link :href="route('admin.event')" :active="request()->routeIs('admin.event')">
            {{ __('Acara') }}
        </x-nav-link>
        <x-nav-link :href="route('admin.transaction')" :active="request()->routeIs('admin.transaction')">
            {{ __('Transaksi') }}
        </x-nav-link>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="nav-link">Logout</button>
        </form>
    </nav>
</div>

{{-- <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            
          </li>
          <li class="nav-item">
           
          </li>
        </ul>   
      </div>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
      </form>
    </div>
  </nav> --}}
