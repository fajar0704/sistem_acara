<section>
    <header class="mb-4">
        <h4 class="fw-bold">
            Perbarui Kata Sandi
        </h4>

        <p class="text-muted small mb-0">
            Pastikan akun Anda menggunakan kata sandi yang panjang dan aman.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="update_password_current_password" class="form-label fw-semibold">Kata Sandi Saat Ini</label>
            <input id="update_password_current_password" name="current_password" type="password" class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" autocomplete="current-password">
            @error('current_password', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="update_password_password" class="form-label fw-semibold">Kata Sandi Baru</label>
            <input id="update_password_password" name="password" type="password" class="form-control @error('password', 'updatePassword') is-invalid @enderror" autocomplete="new-password">
            @error('password', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label fw-semibold">Konfirmasi Kata Sandi Baru</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password">
        </div>

        <button type="submit" class="btn btn-primary px-4">Simpan Kata Sandi</button>
    </form>
</section>
