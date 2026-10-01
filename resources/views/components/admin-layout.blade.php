<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Admin</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css">

        <style>
            body {
                display: flex;
                background-color: #e8e8e8;
                min-height: 100vh;
            }
            .sidebar {
                width: 250px;
                min-height: 100vh;
                position: fixed;
                background-color: #0b1d2e;
                color: #fff;
                z-index: 100;
            }
            .sidebar .nav-link {
                color: #adb5bd;
                padding: 10px 20px;
            }
            .sidebar .nav-link:hover {
                color: #fff;
                background-color: rgba(255, 255, 255, 0.1);
            }
            .sidebar .nav-link.active {
                color: #fff;
                background-color: #1e3a58;
            }
            .content {
                margin-left: 250px;
                width: calc(100% - 250px);
                padding: 20px;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        @include('layouts.navigation-admin')

        <div class="content">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 rounded shadow-sm">
                <div class="container-fluid">
                    <span class="navbar-brand fw-bold mb-0">Panel Administrator</span>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto align-items-center gap-2">
                            <li class="nav-item">
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('dashboard') }}">Lihat Website &rarr;</a>
                            </li>
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    </body>
</html>
