<x-app-layout>
    <div class="container mt-4 mb-4">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
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
            <h2 class="fw-bold mb-0">Acara yang Diikuti</h2>
            <a href="{{ route('user.event') }}" class="btn btn-outline-primary">Jelajahi Acara Lainnya &rarr;</a>
        </div>

        <div class="row">
            @forelse ($transactions as $trans)
                <div class="col-lg-6 mb-4">
                    <div class="card h-100 shadow-sm border-0 rounded overflow-hidden">
                        <img src="{{ $trans->event?->photo ? asset('storage/' . $trans->event->photo) : 'https://picsum.photos/800/400?random=' . $trans->id }}" class="card-img-top" alt="{{ $trans->event?->name ?? 'Acara' }}" style="height: 220px; object-fit: cover; width: 100%;">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title fw-bold mb-0">{{ $trans->event?->name ?? 'Acara Tidak Ditemukan' }}</h5>
                                <span class="badge text-bg-success">Terdaftar</span>
                            </div>
                            <p class="card-text text-muted mb-2">
                                @if($trans->event)
                                    {{ \Carbon\Carbon::parse($trans->event->start)->format('d M Y') }} - {{ \Carbon\Carbon::parse($trans->event->end)->format('d M Y') }}
                                @else
                                    -
                                @endif
                            </p>

                            @if($trans->event)
                                <div class="accordion accordion-flush mb-3 mt-auto" id="accordion-trans-{{ $trans->id }}">
                                    <div class="accordion-item border rounded">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed py-2" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse-trans-{{ $trans->id }}" aria-expanded="false"
                                                aria-controls="collapse-trans-{{ $trans->id }}">
                                                Deskripsi Acara
                                            </button>
                                        </h2>
                                        <div id="collapse-trans-{{ $trans->id }}" class="accordion-collapse collapse"
                                            data-bs-parent="#accordion-trans-{{ $trans->id }}">
                                            <div class="accordion-body text-secondary small">
                                                {{ $trans->event->description }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="d-flex justify-content-between align-items-center pt-2 border-top mt-auto">
                                <div>
                                    <span class="text-muted d-block small">Status Pembayaran</span>
                                    <span class="badge text-bg-success">Lunas (Paid)</span>
                                </div>
                                <div class="text-end">
                                    <span class="text-muted d-block small">Biaya Dibayar</span>
                                    <span class="fw-bold fs-5 text-dark">Rp.{{ number_format($trans->price, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted fs-5 mb-3">Anda belum memiliki acara yang diikuti.</p>
                    <a href="{{ route('user.event') }}" class="btn btn-primary">Lihat dan Daftar Acara Sekarang</a>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-3">
            {{ $transactions->links() }}
        </div> 
    </div>
</x-app-layout>