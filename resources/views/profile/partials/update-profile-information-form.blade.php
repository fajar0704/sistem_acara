<section>
    <header class="mb-4">
        <h4 class="fw-bold">
            Informasi Profil
        </h4>

        <p class="text-muted small mb-0">
            Perbarui informasi profil akun dan alamat email Anda.
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
            <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Email Address</label>
            <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required autocomplete="username">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary px-4">Simpan Perubahan</button>
    </form>
</section>
