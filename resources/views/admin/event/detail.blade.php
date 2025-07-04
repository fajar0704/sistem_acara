<x-admin-layout>
    <div class="container">
        <div class="card mx-auto mt-4 mb-4" style="width: 32rem;">
            <img src="{{ url('storage/'. $event->photo) }}" class="card-img-top w-100 h-50 mx-auto" alt="...">
            <div class="card-body border-top" style="background-color: #d2d2d2;">
              <p class="card-text h5 text-center text-dark mb-3">{{ $event->name }}</p>
              <div class="d-flex justify-content-between mb-4">
                  <p class="card-text text-dark">{{ \Carbon\Carbon::parse($event->start)->format('d M Y') }} - {{ \Carbon\Carbon::parse($event->end)->format('d M Y') }}</p>
                  <p class="card-text text-dark">Rp.{{ number_format($event->price) }}</p>
              </div>
              <div class="border border-dark rounded p-2 mt-4 mb-4">
                <span class="card-text h6 text-dark">Deskripsi</span>
                <p class="card-text text-dark">{{ $event->description }}</p>
              </div>
              <a href="{{ route('admin.event') }}" class="d-block w-full btn btn-dark">Back</a>
            </div>
          </div>
    </div>
</x-admin-layout>