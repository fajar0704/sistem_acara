<x-app-layout>
    <div class="container my-5" style="max-width: 800px;">
        <h3 class="fw-bold mb-4">Pengaturan Profil</h3>

        @if (session('status') === 'profile-updated')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Informasi profil berhasil diperbarui.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('status') === 'password-updated')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Kata sandi berhasil diubah.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm border-0 rounded-3 mb-4 p-4 bg-white">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="card shadow-sm border-0 rounded-3 mb-4 p-4 bg-white">
            @include('profile.partials.update-password-form')
        </div>
    </div>
</x-app-layout>
