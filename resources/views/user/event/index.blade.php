<x-app-layout>
    <div class="container mt-4 mb-4">
        @forelse ($events as $ev)
            <div class="card mb-3 rounded">
                <div class="overflow-hidden w-100 rounded-top"
                    style="
                height: 18rem; 
                background-image: url({{ url('storage/' . $ev->photo) }}); 
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center;">
                    {{-- <img src="{{ url('storage/' . $ev->photo) }}" class="card-img img-fluid d-block" alt="..." style="margin: auto;"> --}}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $ev->name }}</h5>
                    <p class="card-text">Start from
                        {{ \Carbon\Carbon::parse($ev->start)->format('d M') }} to
                        {{ \Carbon\Carbon::parse($ev->end)->format('d M Y') }}</p>
                    <div class="d-flex justify-content-between border-top border-bottom p-2 align-items-center">
                        <p class="card-text">Rp.{{ number_format($ev->price) }}</p>
                        @if ($ev->status == 'Opened')
                            
                        <a href="{{ route('user.event.payment', $ev->slug) }}" class="btn btn-dark" style="width: 18rem;">Ikuti Acara</a>
                        @else
                        <a href="" class="btn btn-danger" style="width: 18rem;">Acara sudah Ditutup</a>

                        @endif
                    </div>
                </div>
                <div class="accordion accordion-flush" id="{{ $ev->slug . $ev->name }}">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#{{ $ev->slug }}" aria-expanded="false"
                                aria-controls="{{ $ev->slug }}">
                                Deskripsi Acara
                            </button>
                        </h2>
                        <div id="{{ $ev->slug }}" class="accordion-collapse collapse"
                            data-bs-parent="#{{ $ev->slug . $ev->name }}">
                            <div class="accordion-body"><small class="text-body-secondary">{{ $ev->description }}</small></div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
        @endforelse
    </div>
    <div class="container bg-light p-2 rounded">
        {{ $events->links() }}
    </div>
</x-app-layout>
