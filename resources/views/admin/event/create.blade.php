<x-admin-layout>
    <div class="container mt-4 border rounded shadow p-4 bg-light">
        <h4 class="mb-4">Tambah Acara Baru</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form enctype="multipart/form-data" action="{{ route('admin.event.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Acara</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Foto Acara</label>
                <input accept="image/*" type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo" required>
                @error('photo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="start" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control @error('start') is-invalid @enderror" id="start" name="start" value="{{ old('start') }}" required>
                @error('start')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="end" class="form-label">Tanggal Berakhir</label>
                <input type="date" class="form-control @error('end') is-invalid @enderror" id="end" name="end" value="{{ old('end') }}" required>
                @error('end')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" style="height: 10rem;" required>{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Harga (Rp.)</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', 0) }}" required min="0">
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.event') }}" class="btn btn-secondary w-50">Batal</a>
                <button type="submit" class="btn btn-dark w-50">Simpan Acara</button>
            </div>
        </form>
    </div>
</x-admin-layout>
