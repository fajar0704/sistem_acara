<x-admin-layout>
    <div class="container-fluid">
        <h3 class="fw-bold mb-4">Dashboard Overview</h3>

        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-3 bg-white h-100 p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-muted small d-block">Transaksi Berhasil</span>
                            <h2 class="fw-bold text-success mb-0">{{ count($transactions) }}</h2>
                        </div>
                        <div class="bg-success-subtle text-success p-3 rounded-circle fs-3">
                            &#10003;
                        </div>
                    </div>
                    <span class="text-muted small mt-2">Peserta acara yang sudah membayar</span>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-3 bg-white h-100 p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-muted small d-block">Total Acara</span>
                            <h2 class="fw-bold text-primary mb-0">{{ count($events) }}</h2>
                        </div>
                        <div class="bg-primary-subtle text-primary p-3 rounded-circle fs-3">
                            &#9733;
                        </div>
                    </div>
                    <span class="text-muted small mt-2">Acara yang diadakan</span>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-3 bg-white h-100 p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-muted small d-block">Total Pengguna</span>
                            <h2 class="fw-bold text-info mb-0">{{ count($users) }}</h2>
                        </div>
                        <div class="bg-info-subtle text-info p-3 rounded-circle fs-3">
                            &#9787;
                        </div>
                    </div>
                    <span class="text-muted small mt-2">Pengguna terdaftar di sistem</span>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-3 bg-white p-4">
            <h5 class="fw-bold mb-3">Daftar Pengguna Terdaftar</h5>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th class="text-center">Bergabung Pada</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $index => $usr)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="fw-semibold">{{ $usr->name }}</td>
                                <td>{{ $usr->email }}</td>
                                <td class="text-center text-muted">
                                    {{ $usr->created_at ? $usr->created_at->format('d M Y, H:i') : '-' }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">Belum ada pengguna terdaftar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>