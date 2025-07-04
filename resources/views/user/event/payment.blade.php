<x-app-layout>
     <!-- Payment Form -->
     <div class="container bg-light p-4 mt-4">
        <h2 class="mb-4">Detail Pembayaran</h2>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="cardName" class="form-label">Nama Acara</label>
                    <input type="text" class="form-control" id="cardName" placeholder="{{ $event->name }}" disabled>
                </div>
                <div class="col-md-6">
                    <label for="cardName" class="form-label">Nama Pengguna</label>
                    <input type="text" class="form-control" id="cardName" placeholder="{{ Auth::user()->name }}" disabled>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="expiryDate" class="form-label">Tanggal Mulai</label>
                    <input type="text" class="form-control" id="expiryDate" placeholder="{{ \Carbon\Carbon::parse($event->start)->format('d M Y') }}" disabled>
                </div>
                <div class="col-md-6">
                    <label for="expiryDate" class="form-label">Tanggal Berakhir</label>
                    <input type="text" class="form-control" id="expiryDate" placeholder="{{ \Carbon\Carbon::parse($event->end)->format('d M Y') }}" disabled>
                </div>
            </div>

            <div class="mb-3">
                <label for="billingAddress" class="form-label">Deskripsi Acara</label>
                <textarea class="form-control" id="billingAddress" rows="3" placeholder="{{ $event->description }}" disabled></textarea>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="cardName" class="form-label">Harga</label>
                    <input type="text" class="form-control" id="cardName" placeholder="Rp.{{ number_format($event->price) }}" disabled>
                </div>
            </div>

            <button id="pay-button" type="submit" class="btn btn-primary d-block w-100">Submit Payment</button>
            <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
            <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
            <script type="text/javascript">
            document.getElementById('pay-button').onclick = function(){
                // SnapToken acquired from previous step
                snap.pay('{{ $trans->snap_token }}', {
                // Optional
                onSuccess: function(result){
                    // /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);

                    window.location.href="{{ route('user.event.success', $trans) }}"
                },
                // Optional
                onPending: function(result){
                    /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                // Optional
                onError: function(result){
                    /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                }
                });
            };
            </script>
    </div>
</x-app-layout>