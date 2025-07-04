<x-admin-layout>
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

    <div class="container mt-4 ">
        <a href="{{ route('admin.event.create') }}" class="btn btn-primary d-block">Tambah Acara</a>
        <div class="border p-2 border-dark rounded bg-light shadow">
            <table id="example" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">Nama Event</th>
                        <th class="text-center">Tanggal Mulai</th>
                        <th class="text-center">Tanggal Selesai</th>
                        <th class="text-center">Harga</th>
                        <th class="text-center">Status</th>
                        <th colspan="3" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($events as $ev)
                        <tr>
                            <td>{{ $ev->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($ev->start)->format('d M Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($ev->end)->format('d M Y') }}</td>
                            <td>Rp.{{ number_format($ev->price) }}</td>
                            @if ($ev->status == 'Opened')
                            <td><span class="badge text-bg-success">Dibuka</span></td>
                            @else
                            <td><span class="badge text-bg-danger">Ditutup</span></td>
                              
                            @endif
                            <td><a href="{{ route('admin.event.edit', $ev->slug) }}" class="badge text-bg-warning">Ubah</a></td>
                            <td><!-- Button trigger modal -->
                                <a type="button" class="badge text-bg-danger" data-bs-toggle="modal" data-bs-target="#{{ $ev->slug }}">
                                  Hapus
                                </a>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="{{ $ev->slug }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Anda Yakin</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        Saat anda menghapus, data akan terhapus selamanya
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <a href="{{ route('admin.event.destroy', $ev) }}" class="btn btn-danger">Delete</a>
                                      </div>
                                    </div>
                                  </div>
                                </div></td>
                                <td><a href="{{ route('admin.event.detail', $ev->slug) }}" class="badge text-bg-dark">Detail</a></td>
                            {{-- <td><a href="{{ route('admin.event.destroy', $ev) }}" class="badge text-bg-danger">Delete</a></td> --}}
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
        new DataTable('#example', {
            layout: {
                topStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                }
            }
        });
    </script>

    <script>
        import DataTable from 'datatables.net-dt';

        let table = new DataTable('#example');
    </script>
</x-admin-layout>
