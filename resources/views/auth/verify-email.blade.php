<x-guest-layout>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg p-4 text-center" style="max-width: 400px;">
            <div class="card-body">
                <h2 class="h5 text-dark fw-bold mb-3">
                    {{ __('Terima kasih telah mendaftar!') }}
                </h2>
                <p class="text-muted small">
                    {{ __('Sebelum memulai, harap melakukan verifikasi alamat email Anda, silakan klik tombol “Kirim Email Verifikasi” di bawah ini. Setelah itu, periksa kotak masuk Anda dan ikuti tautan yang kami kirimkan. Jika Anda belum menerima email, Anda dapat meminta pengiriman ulang setelah 1 menit.') }}
                </p>

                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success mt-3">
                        {{ __('Tautan verifikasi telah dikirim ke email Anda.') }}
                    </div>
                @endif

                <div class="mt-4 d-grid gap-2">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            {{ __('Kirim Email Verifikasi') }}
                        </button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-secondary">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
