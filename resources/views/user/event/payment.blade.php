<x-app-layout>
    <div class="container mt-4">
        <div class="card shadow-sm border-0 bg-light p-4 mx-auto" style="max-width: 720px;">
            <h3 class="mb-4 text-center fw-bold">Detail Pembayaran Acara</h3>

            @if(empty($trans->snap_token))
                <div class="alert alert-warning">
                    <strong>Peringatan:</strong> Token pembayaran belum berhasil dimuat dari payment gateway. Pastikan kunci API Midtrans Anda valid dan periksa koneksi internet Anda.
                </div>
            @endif

            <div class="row mb-3">
                <div class="col-md-6 mb-3 mb-md-0">
                    <label class="form-label fw-semibold">Nama Acara</label>
                    <input type="text" class="form-control bg-white" value="{{ $event->name }}" readonly>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Nama Pengguna</label>
                    <input type="text" class="form-control bg-white" value="{{ Auth::user()->name }}" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6 mb-3 mb-md-0">
                    <label class="form-label fw-semibold">Tanggal Mulai</label>
                    <input type="text" class="form-control bg-white" value="{{ \Carbon\Carbon::parse($event->start)->format('d M Y') }}" readonly>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Tanggal Berakhir</label>
                    <input type="text" class="form-control bg-white" value="{{ \Carbon\Carbon::parse($event->end)->format('d M Y') }}" readonly>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Deskripsi Acara</label>
                <textarea class="form-control bg-white" rows="3" readonly>{{ $event->description }}</textarea>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Total Biaya Pendaftaran</label>
                <div class="input-group">
                    <span class="input-group-text bg-success text-white fw-bold">Rp</span>
                    <input type="text" class="form-control bg-white fw-bold fs-5 text-success" value="{{ number_format($event->price, 0, ',', '.') }}" readonly>
                </div>
            </div>

            <div class="d-grid gap-2">
                <button id="pay-button" type="button" class="btn btn-primary btn-lg" {{ empty($trans->snap_token) ? 'disabled' : '' }}>
                    Bayar Sekarang &rarr;
                </button>
                <a href="{{ route('user.event') }}" class="btn btn-outline-secondary">
                    Kembali ke Semua Acara
                </a>
            </div>
        </div>
    </div>

    @php
        $snapUrl = config('midtrans.isProduction')
            ? 'https://app.midtrans.com/snap/snap.js'
            : 'https://app.sandbox.midtrans.com/snap/snap.js';
    @endphp
    <script src="{{ $snapUrl }}" data-client-key="{{ config('midtrans.clientKey') }}"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            var token = '{{ $trans->snap_token }}';
            if (!token) {
                alert('Token pembayaran tidak ditemukan. Silakan muat ulang halaman.');
                return;
            }

            snap.pay(token, {
                onSuccess: function(result) {
                    window.location.href = "{{ route('user.event.success', $trans) }}";
                },
                onPending: function(result) {
                    alert('Pembayaran sedang diproses atau menunggu konfirmasi.');
                    window.location.href = "{{ route('user.event.myEvent') }}";
                },
                onError: function(result) {
                    alert('Pembayaran gagal atau dibatalkan.');
                },
                onClose: function() {
                    console.log('Payment modal closed');
                }
            });
        };
    </script>
</x-app-layout>