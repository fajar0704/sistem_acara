<x-app-layout>
    <div class="container mt-4 mb-4">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($message = Session::get('info'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0">Daftar Acara</h2>
            <span class="text-muted">Temukan acara menarik dan daftar sekarang</span>
        </div>

        <div class="row">
            @forelse ($events as $ev)
                <div class="col-lg-6 mb-4">
                    <div class="card h-100 shadow-sm border-0 rounded overflow-hidden">
                        <img src="{{ $ev->photo ? asset('storage/' . $ev->photo) : 'https://picsum.photos/800/400?random=' . $ev->id }}" class="card-img-top" alt="{{ $ev->name }}" style="height: 220px; object-fit: cover; width: 100%;">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title fw-bold mb-0">{{ $ev->name }}</h5>
                                @if ($ev->status == 'Opened')
                                    <span class="badge text-bg-success">Dibuka</span>
                                @else
                                    <span class="badge text-bg-danger">Ditutup</span>
                                @endif
                            </div>
                            <p class="card-text text-muted mb-3">
                                <i class="bi bi-calendar"></i>
                                {{ \Carbon\Carbon::parse($ev->start)->format('d M Y') }} - {{ \Carbon\Carbon::parse($ev->end)->format('d M Y') }}
                            </p>
                            <div class="accordion accordion-flush mb-3 mt-auto" id="accordion-event-{{ $ev->id }}">
                                <div class="accordion-item border rounded">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed py-2" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse-event-{{ $ev->id }}" aria-expanded="false"
                                            aria-controls="collapse-event-{{ $ev->id }}">
                                            Deskripsi Acara
                                        </button>
                                    </h2>
                                    <div id="collapse-event-{{ $ev->id }}" class="accordion-collapse collapse"
                                        data-bs-parent="#accordion-event-{{ $ev->id }}">
                                        <div class="accordion-body text-secondary small">
                                            {{ $ev->description }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                                <div>
                                    <span class="text-muted d-block small">Biaya</span>
                                    <span class="fw-bold fs-5 text-dark">Rp.{{ number_format($ev->price, 0, ',', '.') }}</span>
                                </div>
                                @if ($ev->status == 'Opened')
                                    <a href="{{ route('user.event.payment', $ev->slug) }}" class="btn btn-primary px-4">Ikuti Acara</a>
                                @else
                                    <button class="btn btn-secondary px-4" disabled>Acara Ditutup</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted fs-5">Belum ada acara yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-3">
            {{ $events->links() }}
        </div>
    </div>
</x-app-layout>
