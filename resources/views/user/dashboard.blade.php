<x-app-layout>

    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://picsum.photos/1920/1080?random" class="w-100 img-fluid mb-4" alt="..."
                    style="height: 24rem;">
            </div>
        </div>
    </div>

    <div class="container mt-4 mb-4 mx-auto">
        @forelse ($events as $ev)
            <div class="card mb-3" style="">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ url('storage/' . $ev->photo) }}" class="img-fluid rounded-start h-100"
                            alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $ev->name }}</h5>
                            <p class="card-text">{{ $ev->description }}</p>
                            <div class="d-flex justify-content-between">
                                @if ($ev->status == 'Opened')
                            <span class="badge text-bg-success">Dibuka</span>
                            @else
                            <span class="badge text-bg-danger">Ditutup</span>
                              
                            @endif
                            <p class="card-text"><small class="text-body-secondary">Start from
                                    {{ \Carbon\Carbon::parse($ev->start)->format('d M') }} to
                                    {{ \Carbon\Carbon::parse($ev->end)->format('d M Y') }}</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
        <span>Belum Ada Acara yang Tersedia.</span>
        @endforelse

        <div class="d-flex">

            <a href="{{ route('user.event') }}" class="btn btn-secondary mx-auto">Show More</a>
        </div>
    </div>
</x-app-layout>
