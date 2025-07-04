<x-admin-layout>
    <div class="container mt-4 border rounded shadow p-4 bg-light">
        <form action="{{ route('admin.event.update', $event) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="status" class="form-label">Nama Event</label>
                <select name="status" id="status" class="form-control">
                    <option selected disabled>Pilih Status</option>
                    <option value="Opened" class="text-success">Dibuka</option>
                    <option value="Closed" class="text-danger">Ditutup</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nama Event</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $event->name }}">
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Foto Acara</label>
                <input accept="image/*" type="file" class="form-control" id="photo" aria-describedby="emailHelp" name="photo">
            </div>
            <div class="mb-3">
                <label for="start" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control" id="start" name="start" value="{{ $event->start }}">
            </div>
            <div class="mb-3">
                <label for="end" class="form-label">Tanggal Berakhir</label>
                <input type="date" class="form-control" id="end" name="end" value="{{ $event->end }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="description" name="description" style="height: 10rem;">{{ $event->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Harga (Rp.)</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $event->price }}">
            </div>
            <button type="submit" class="btn btn-dark d-block w-100">Submit</button>
        </form>
    </div>
</x-admin-layout>
