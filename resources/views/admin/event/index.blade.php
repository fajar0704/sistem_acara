<x-admin-layout>
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

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Daftar Acara</h4>
            <a href="{{ route('admin.event.create') }}" class="btn btn-primary">+ Tambah Acara Baru</a>
        </div>
        <div class="border p-3 border-dark rounded bg-light shadow">
            <table id="example" class="display nowrap table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">Nama Event</th>
                        <th class="text-center">Tanggal Mulai</th>
                        <th class="text-center">Tanggal Selesai</th>
                        <th class="text-center">Harga</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($events as $ev)
                        <tr>
                            <td>{{ $ev->name }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($ev->start)->format('d M Y') }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($ev->end)->format('d M Y') }}</td>
                            <td class="text-end">Rp.{{ number_format($ev->price) }}</td>
                            <td class="text-center">
                                @if ($ev->status == 'Opened')
                                    <span class="badge text-bg-success">Dibuka</span>
                                @else
                                    <span class="badge text-bg-danger">Ditutup</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.event.detail', $ev->slug) }}" class="btn btn-sm btn-dark me-1">Detail</a>
                                <a href="{{ route('admin.event.edit', $ev->slug) }}" class="btn btn-sm btn-warning me-1">Ubah</a>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $ev->id }}">
                                    Hapus
                                </button>
                                
                                <!-- Modal Hapus -->
                                <div class="modal fade" id="modal-delete-{{ $ev->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $ev->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="modalLabel{{ $ev->id }}">Konfirmasi Hapus</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-start">
                                                Apakah Anda yakin ingin menghapus acara <strong>{{ $ev->name }}</strong>? Tindakan ini tidak dapat dibatalkan.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <form action="{{ route('admin.event.destroy', $ev) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus Sekarang</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>    
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            if (!$.fn.DataTable.isDataTable('#example')) {
                new DataTable('#example', {
                    layout: {
                        topStart: {
                            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                        }
                    }
                });
            }
        });
    </script>
</x-admin-layout>
