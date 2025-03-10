<x-guest-layout>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg p-4 text-center" style="max-width: 400px;">
            <div class="card-body">
                <h2 class="h5 text-dark fw-bold mb-3">
                    {{ __('Terima kasih telah mendaftar!') }}
                </h2>
                <p class="text-muted small">
                    {{ __('Sebelum memulai, harap verifikasi alamat email Anda dengan mengeklik tautan yang baru saja kami kirimkan kepada Anda. Jika Anda tidak menerima email tersebut, Anda dapat meminta email lain di bawah ini.') }}
                </p>

                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success mt-3">
                        {{ __('Tautan verifikasi baru telah dikirim ke email Anda.') }}
                    </div>
                @endif

                <div class="mt-4 d-grid gap-2">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            {{ __('Kirim Ulang Email Verifikasi') }}
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
