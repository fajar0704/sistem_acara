<x-guest-layout>
    <div class="card p-4 shadow-sm border-0 rounded-3" style="width: 100%; max-width: 420px;">
        <h3 class="text-center mb-1"><a href="{{ url('/') }}" class="text-decoration-none text-primary fw-bold">Pendaftaran Acara</a></h3>
        <p class="text-center text-muted mb-4 small">Masuk ke Akun Anda</p>

        <x-auth-session-status class="mb-3 alert alert-info" :status="session('status')" />

        @if ($errors->any())
            <div class="alert alert-danger mb-3 py-2">
                <ul class="mb-0 ps-3 small">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email Address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    value="{{ old('email') }}" placeholder="nama@email.com" required autofocus>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label fw-semibold">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                    placeholder="Masukkan password" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label small text-muted" for="remember">Ingat Saya</label>
            </div>
            <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">Login</button>
            <div class="text-center mt-3">
                <a href="{{ route('register') }}" class="text-decoration-none small">Belum Memiliki Akun? Daftar</a>
            </div>
        </form>
    </div>
</x-guest-layout>
