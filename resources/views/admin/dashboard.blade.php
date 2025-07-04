<x-admin-layout>
    

        <div class="container d-flex gap-4 mb-4">
            <div class="card w-50">
                <h5 class="card-header bg-light text-center">Banyak Transaksi</h5>
                <div class="card-body bg-light">
                  <p class="card-text text-center">{{ count($transactions) }} Pengguna yang Mengikuti Acara</p>
                </div>
              </div>
            <div class="card w-50 text-light">
                <h5 class="card-header bg-dark text-center">Banyak Acara Diadakan</h5>
                <div class="card-body bg-dark">
                  <p class="card-text text-center">{{ count($events) }} Acara yang Diadakan</p>
                </div>
              </div>
        </div>

        <hr>

        <div class="container bg-light rounded shadow mt-4">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col" class="text-center">Nama</th>
                    <th scope="col" class="text-center">Email</th>
                    <th scope="col" class="text-center">Bergabung pada</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($users as $usr)
                    <tr>
                        <td class="text-center">{{ $usr->name }}</td>
                        <td class="text-center">{{ $usr->email }}</td>
                        <td class="text-center">{{ $usr->created_at }}</td>
                      </tr>
                        
                    @empty
                        
                    @endforelse
                  
                </tbody>
              </table>
        </div>

</x-admin-layout>