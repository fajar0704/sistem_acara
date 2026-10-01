<x-app-layout>
    <div class="container mt-4">
        <!-- Banner Hero -->
        <div class="card border-0 rounded-4 overflow-hidden shadow-sm mb-5 text-white bg-dark position-relative">
            <div style="height: 320px; background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.7)), url('https://picsum.photos/1200/500?random=hero'); background-size: cover; background-position: center;" class="d-flex align-items-center">
                <div class="container p-4 p-md-5">
                    <span class="badge bg-primary px-3 py-2 rounded-pill mb-2">Platform Acara Terpercaya</span>
                    <h1 class="display-5 fw-bold">Selamat Datang, {{ Auth::user()->name }}!</h1>
                    <p class="lead mb-4 col-md-8">Temukan dan ikuti berbagai acara seru dan inspiratif bersama kami sekarang juga.</p>
                    <a href="{{ route('user.event') }}" class="btn btn-light btn-lg px-4 fw-semibold">Jelajahi Semua Acara</a>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">Acara Pilihan Terbaru</h3>
            <a href="{{ route('user.event') }}" class="text-decoration-none fw-semibold">Lihat Semua &rarr;</a>
        </div>

        <div class="row">
            @forelse ($events as $ev)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden d-flex flex-column">
                        <img src="{{ $ev->photo ? asset('storage/' . $ev->photo) : 'https://picsum.photos/600/400?random=' . $ev->id }}" class="card-img-top" alt="{{ $ev->name }}" style="height: 200px; object-fit: cover; width: 100%;">
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
                                {{ Illuminate\Support\Str::limit($ev->description, 90) }}
                            </p>
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top mt-auto">
                                <span class="fw-bold text-dark">Rp.{{ number_format($ev->price, 0, ',', '.') }}</span>
                                @if ($ev->status == 'Opened')
                                    <a href="{{ route('user.event.payment', $ev->slug) }}" class="btn btn-sm btn-primary">Daftar</a>
                                @else
                                    <button class="btn btn-sm btn-secondary" disabled>Ditutup</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-4">
                    <p class="text-muted">Belum ada acara yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>

        <div class="text-center mt-3 mb-5">
            <a href="{{ route('user.event') }}" class="btn btn-outline-dark px-4">Lihat Seluruh Daftar Acara</a>
        </div>
    </div>
</x-app-layout>
