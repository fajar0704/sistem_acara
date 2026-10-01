<x-admin-layout>
    <div class="container py-4">
        <div class="card shadow-sm border-0 rounded-3 overflow-hidden mx-auto" style="max-width: 680px;">
            <img src="{{ $event->photo ? asset('storage/' . $event->photo) : 'https://picsum.photos/800/400?random=' . $event->id }}" class="card-img-top" alt="{{ $event->name }}" style="height: 320px; object-fit: cover; width: 100%;">
            
            <div class="card-body p-4 bg-white">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <h3 class="fw-bold mb-0 text-dark">{{ $event->name }}</h3>
                    @if ($event->status == 'Opened')
                        <span class="badge text-bg-success px-3 py-2 fs-6">Dibuka</span>
                    @else
                        <span class="badge text-bg-danger px-3 py-2 fs-6">Ditutup</span>
                    @endif
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-sm-6">
                        <div class="p-3 bg-light rounded-3">
                            <span class="text-muted small d-block">Jadwal Acara</span>
                            <span class="fw-semibold text-dark">
                                {{ \Carbon\Carbon::parse($event->start)->format('d M Y') }} - {{ \Carbon\Carbon::parse($event->end)->format('d M Y') }}
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 bg-light rounded-3">
                            <span class="text-muted small d-block">Harga Tiket</span>
                            <span class="fw-bold fs-5 text-primary">
                                Rp.{{ number_format($event->price, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <h6 class="fw-bold text-dark mb-2">Deskripsi Acara</h6>
                    <div class="p-3 bg-light rounded-3 text-secondary" style="white-space: pre-line;">
                        {{ $event->description }}
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ route('admin.event') }}" class="btn btn-outline-secondary w-50">
                        &larr; Kembali ke Daftar
                    </a>
                    <a href="{{ route('admin.event.edit', $event->slug) }}" class="btn btn-warning w-50">
                        Ubah Acara
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>