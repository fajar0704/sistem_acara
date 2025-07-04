<x-app-layout>
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
        <div class="container mt-4 mb-4">
            @forelse ($transactions as $trans)
                <div class="card mb-3 rounded">
                    <div class="overflow-hidden w-100 rounded-top"
                        style="
                    height: 18rem; 
                    background-image: url({{ url('storage/' . $trans->event->photo) }}); 
                    background-repeat: no-repeat;
                    background-size: cover;
                    background-position: center;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $trans->event->name }}</h5>
                        <p class="card-text">Start from
                            {{ \Carbon\Carbon::parse($trans->event->start)->format('d M') }} to
                            {{ \Carbon\Carbon::parse($trans->event->end)->format('d M Y') }}</p>
                        <div class="d-flex justify-content-between border-top border-bottom p-2 align-items-center">
                            <p class="card-text">Rp.{{ number_format($trans->event->price) }}</p>
                            @if ($trans->event->status == 'Opened')
                            <span class="badge text-bg-success">Dibuka</span>
                            @else
                            <span class="badge text-bg-danger">Ditutup</span>
                              
                            @endif
                        </div>
                    </div>
                    <div class="accordion accordion-flush" id="{{ $trans->event->slug . $trans->event->name }}">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#{{ $trans->event->slug }}" aria-expanded="false"
                                    aria-controls="{{ $trans->event->slug }}">
                                    Deskripsi Acara
                                </button>
                            </h2>
                            <div id="{{ $trans->event->slug }}" class="accordion-collapse collapse"
                                data-bs-parent="#{{ $trans->event->slug . $trans->event->name }}">
                                <div class="accordion-body"><small class="text-body-secondary">{{ $trans->event->description }}</small></div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            <p class="">Anda Belum Memiliki Acara yang Diikuti. <a href="{{ route('user.event') }}">Ikuti Acara&raquo;</a></p>
            @endforelse
        </div>
        <div class="container bg-light p-2 rounded">
            {{ $transactions->links() }}
        </div> 
</x-app-layout>