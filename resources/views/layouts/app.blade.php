<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css">

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        <style>
            body {  
                background-color: #e8e8e8;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main style="margin-bottom: 10rem;">
                {{ $slot }}
            </main>

            <!-- Footer -->
    <footer class="bg-light text-center text-lg-start mt-4">
        <div class="container p-4">

            <!-- Links section -->
            <section class="">
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Perusahaan</h5>
                        <ul class="list-unstyled mb-0">
                            <li><a href="{{ route('user.about') }}" class="text-dark">Tentang Kami</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Support</h5>
                        <ul class="list-unstyled mb-0">
                            <li><a href="#" class="text-dark">Help Center</a></li>
                            <li><a href="#" class="text-dark">Contact</a></li>
                            <li><a href="#" class="text-dark">FAQs</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Legal</h5>
                        <ul class="list-unstyled mb-0">
                            <li><a href="#" class="text-dark">Kebijakan Privasi</a></li>
                            <li><a href="#" class="text-dark">Ketentuan Layanan</a></li>
                            <li><a href="#" class="text-dark">Kebijakan Cookie</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Kontak</h5>
                        <ul class="list-unstyled mb-0">
                            <li><a href="#" class="text-dark">Email: eventity@gmail.com</a></li>
                            <li><a href="#" class="text-dark">hp: +123 456 789</a></li>
                            <li><a href="#" class="text-dark">Instagram: eventity@admin</a></li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </footer>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    </body>
</html>
