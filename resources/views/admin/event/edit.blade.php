<x-admin-layout>
    <div class="container mt-4 border rounded shadow p-4 bg-light">
        <h4 class="mb-4">Ubah Acara</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form enctype="multipart/form-data" action="{{ route('admin.event.update', $event) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="status" class="form-label">Status Acara</label>
                <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                    <option value="Opened" {{ old('status', $event->status) == 'Opened' ? 'selected' : '' }} class="text-success">Dibuka</option>
                    <option value="Closed" {{ old('status', $event->status) == 'Closed' ? 'selected' : '' }} class="text-danger">Ditutup</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nama Acara</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $event->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Foto Acara (Kosongkan jika tidak ingin mengubah)</label>
                @if($event->photo)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $event->photo) }}" alt="Preview" style="max-height: 120px; border-radius: 8px;">
                    </div>
                @endif
                <input accept="image/*" type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
                @error('photo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="start" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control @error('start') is-invalid @enderror" id="start" name="start" value="{{ old('start', $event->start ? \Carbon\Carbon::parse($event->start)->format('Y-m-d') : '') }}" required>
                @error('start')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="end" class="form-label">Tanggal Berakhir</label>
                <input type="date" class="form-control @error('end') is-invalid @enderror" id="end" name="end" value="{{ old('end', $event->end ? \Carbon\Carbon::parse($event->end)->format('Y-m-d') : '') }}" required>
                @error('end')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" style="height: 10rem;" required>{{ old('description', $event->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Harga (Rp.)</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $event->price) }}" required min="0">
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.event') }}" class="btn btn-secondary w-50">Batal</a>
                <button type="submit" class="btn btn-dark w-50">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</x-admin-layout>
