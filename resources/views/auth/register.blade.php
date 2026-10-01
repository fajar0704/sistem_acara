<x-guest-layout>
    <div class="card p-4 shadow-sm border-0 rounded-3" style="width: 100%; max-width: 460px;">
        <h3 class="text-center mb-1"><a href="{{ url('/') }}" class="text-decoration-none text-primary fw-bold">Pendaftaran Acara</a></h3>
        <p class="text-center text-muted mb-4 small">Daftar Akun Baru</p>

        @if ($errors->any())
            <div class="alert alert-danger mb-3 py-2">
                <ul class="mb-0 ps-3 small">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Nama lengkap Anda">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email Address</label>
                <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="nama@email.com">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label fw-semibold">Password</label>
                <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password" placeholder="Minimal 8 karakter">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password</label>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi password">
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">Daftar Sekarang</button>
            <div class="text-center mt-3">
                <a href="{{ route('login') }}" class="text-decoration-none small">Sudah Terdaftar? Login</a>
            </div>
        </form>
    </div>
</x-guest-layout>
