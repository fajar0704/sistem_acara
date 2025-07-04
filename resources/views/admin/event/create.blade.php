<x-admin-layout>
    <div class="container mt-4 border rounded shadow p-4 bg-light">
        <form enctype="multipart/form-data" action="{{ route('admin.event.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Acara</label>
                <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Foto Acara</label>
                <input accept="image/*" type="file" class="form-control" id="photo" aria-describedby="emailHelp" name="photo">
            </div>
            <div class="mb-3">
                <label for="start" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control" id="start" aria-describedby="emailHelp" name="start">
            </div>
            <div class="mb-3">
                <label for="end" class="form-label">Tanggal Berakhir</label>
                <input type="date" class="form-control" id="end" aria-describedby="emailHelp" name="end">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="description" aria-describedby="emailHelp" name="description" style="height: 10rem;"></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Harga (Rp.)</label>
                <input type="number" class="form-control" id="price" aria-describedby="emailHelp" name="price">
            </div>
            <button type="submit" class="btn btn-dark d-block w-100">Submit</button>
        </form>
    </div>
</x-admin-layout>
