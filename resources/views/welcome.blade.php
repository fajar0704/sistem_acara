<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Acara - Temukan & Ikuti Acara Favoritmu</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="{{ url('/') }}">Pendaftaran Acara</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link active fw-semibold" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#events">Acara</a>
                    </li>
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item ms-lg-2">
                                @if(Auth::user()->role === 'admin')
                                    <a class="btn btn-outline-primary" href="{{ route('admin.dashboard') }}">Dashboard Admin</a>
                                @else
                                    <a class="btn btn-outline-primary" href="{{ route('dashboard') }}">Dashboard</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item ms-lg-2">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item ms-lg-2">
                                    <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="bg-primary text-white text-center py-5">
        <div class="container py-4">
            <h1 class="display-4 fw-bold mb-3">Selamat Datang di Pendaftaran Acara</h1>
            <p class="lead mb-4 col-md-8 mx-auto">Platform terpercaya untuk menemukan, mendaftar, dan mengikuti berbagai kegiatan, seminar, konser, dan workshop pilihan.</p>
            <a href="#events" class="btn btn-light btn-lg px-4 fw-semibold shadow-sm">Jelajahi Acara Sekarang</a>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="py-5 bg-white border-bottom">
        <div class="container text-center py-3">
            <h2 class="fw-bold mb-3">Tentang Kami</h2>
            <p class="text-muted col-lg-8 mx-auto lead fs-6">
                Kami berkomitmen memberikan pengalaman acara yang menginspirasi, mengutamakan kepuasan pelanggan, mendorong inovasi, dan memudahkan proses pendaftaran serta pembayaran tiket acara favorit Anda.
            </p>
        </div>
    </section>

    <!-- Events Section -->
    <section id="events" class="py-5 flex-grow-1">
        <div class="container py-3">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Acara Pilihan</h2>
                <p class="text-muted">Pilih dan daftar pada acara yang Anda minati</p>
            </div>
            <div class="row">
                @forelse ($events as $ev)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden d-flex flex-column">
                            <img src="{{ $ev->photo ? asset('storage/' . $ev->photo) : 'https://picsum.photos/600/400?random=' . $ev->id }}" class="card-img-top" alt="{{ $ev->name }}" style="height: 220px; object-fit: cover; width: 100%;">
                            <div class="card-body d-flex flex-column">

                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="card-title fw-bold mb-0 text-truncate" title="{{ $ev->name }}">{{ $ev->name }}</h5>
                                    @if ($ev->status == 'Opened')
                                        <span class="badge text-bg-success">Dibuka</span>
                                    @else
                                        <span class="badge text-bg-danger">Ditutup</span>
                                    @endif
                                </div>
                                <p class="card-text text-muted small mb-2">
                                    {{ \Carbon\Carbon::parse($ev->start)->format('d M') }} - {{ \Carbon\Carbon::parse($ev->end)->format('d M Y') }}
                                </p>
                                <p class="card-text text-secondary small flex-grow-1">
                                    {{ Illuminate\Support\Str::limit($ev->description, 100) }}
                                </p>
                                <div class="d-flex justify-content-between align-items-center pt-3 border-top mt-auto">
                                    <span class="fw-bold text-dark fs-5">Rp.{{ number_format($ev->price, 0, ',', '.') }}</span>
                                    @auth
                                        @if ($ev->status == 'Opened')
                                            <a href="{{ route('user.event.payment', $ev->slug) }}" class="btn btn-sm btn-primary px-3">Daftar</a>
                                        @else
                                            <button class="btn btn-sm btn-secondary px-3" disabled>Ditutup</button>
                                        @endif
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary px-3">Login untuk Daftar</a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">Belum ada acara yang tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white text-center text-lg-start border-top mt-auto py-3">
        <div class="container text-center text-muted small">
            &copy; {{ date('Y') }} Pendaftaran Acara. All rights reserved.
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
