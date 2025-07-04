<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Pendaftaran Acara</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#events">Acara</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="bg-success text-white text-center py-5">
        <div class="container">
            <h1>Selamat Datang di Pendaftaran Acara</h1>
            <p class="lead">Website Kami Merupakan Platform Penyedia Acara</p>
            <a href="#events" class="btn btn-light btn-lg mt-3">Jelajahi Acara</a>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container text-center">
            <h2>Tentang Kami</h2>
            <p class="text-muted">Memberikan pengalaman dengan mengikuti acara kami yang menginspirasi, Mengutamakan kepuasan pelanggan, Mendorong inovasi dalam industri acara, Membangun hubungan yang berkelanjutan.</p>
        </div>
    </section>

    <!-- Events Section -->
    <section id="events" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Acara Kami</h2>
            <div class="row">
                @foreach ($events as $ev)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ url('storage/'.$ev->photo) }}" class="card-img-top" alt="Event 1" style="width: 350px; height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $ev->name }}</h5>
                            <p class="card-text" align="justify">{{ Illuminate\Support\Str::limit($ev->description, 100) }}</p>
                        </div>
                    </div>
                </div>
                    
                @endforeach
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-light text-center text-lg-start mt-4">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2025 Pendaftaran Acara: <a class="text-dark" href="#">YourWebsite.com</a>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
