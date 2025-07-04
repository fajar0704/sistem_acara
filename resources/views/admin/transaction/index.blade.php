<x-admin-layout>
    
        <div class="container mt-4 ">
            <div class="border p-2 border-dark rounded bg-light shadow">
                <table id="example" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">Nama Event</th>
                            <th class="text-center">Nama Pemesan</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Status Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $trans)
                            <tr>
                                <td class="text-center">{{ $trans->event->name }}</td>
                                <td class="text-center">{{ $trans->user->name }}</td>
                                <td class="text-center">Rp.{{ number_format($trans->event->price) }}</td>
                                @if ($trans->status == 'Pending')
                                <td class="text-center"><span class="badge text-bg-warning">Belum Dibayar</span></td>
                                @else
                                <td class="text-center"><span class="badge text-bg-success">Sudah Dibayar</span></td>
                                  
                                @endif
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