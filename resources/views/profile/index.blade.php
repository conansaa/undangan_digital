@extends('admin.layout.template')

@section('pages', 'Profile')
{{-- @section('pagestitle', 'Kelola Acara') --}}

@section('sidebar')
    @if (Auth::check() && Auth::user()->email === 'admin@gmail.com')
        @include('admin.layout.sidebar.admin')
    @else
        @include('client.layout')
    @endif
@endsection


@section('content')
<div class="mb-3">
    <a href="{{ auth()->user()->email === 'admin@gmail.com' ? '/dashboard' : '/client' }}" class="btn btn-sm btn-outline-danger fw-bold me-2">Kembali</a>
</div>

<div class="container mt-2">
    <h4 class="mb-4">Profil Pengguna</h4>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- CARD PROFIL --}}
    <div class="card p-4 mb-4 ms-0" style="max-width: 400px;">
        <table class="table table-borderless align-middle small w-auto d-flex align-items-center h-100">
            <tbody>
                <tr>
                    <td ><strong>Nama</strong></td>
                    <td>:</td>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <td><strong>Email</strong></td>
                    <td>:</td>
                    <td>{{ $user->email }}</td>
                </tr>
            </tbody>
        </table>

        <div class="text-center mt-3">
            <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                Ubah Password
            </button>
        </div>
    </div>

    {{-- MODAL GANTI PASSWORD --}}
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" action="{{ route('profile.changePassword') }}" id="changePasswordForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="changePasswordModalLabel">Ubah Password</h5>
                        <button type="button" class="btn-close" style="filter: invert(1);" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Password Lama</label>
                            <input type="password" name="current_password" id="current_password" class="form-control" required>
                            <div id="samePasswordWarning" class="text-danger small d-none">Password baru tidak boleh sama dengan password lama.</div>
                            @error('current_password')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="new_password" class="form-label">Password Baru</label>
                            <input type="password" name="new_password" id="new_password" class="form-control" required>
                            @error('new_password')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="new_password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
                            <div id="confirmPasswordWarning" class="text-danger small d-none">Konfirmasi password tidak cocok.</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" id="submitBtn">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const currentPassword = document.getElementById('current_password');
        const newPassword = document.getElementById('new_password');
        const confirmPassword = document.getElementById('new_password_confirmation');
        const samePasswordWarning = document.getElementById('samePasswordWarning');
        const confirmPasswordWarning = document.getElementById('confirmPasswordWarning');
        const submitBtn = document.getElementById('submitBtn');
        const form = document.getElementById('changePasswordForm');

        function validatePasswords() {
            let isValid = true;

            // Reset warnings
            samePasswordWarning.classList.add('d-none');
            confirmPasswordWarning.classList.add('d-none');

            // Password lama dan baru sama
            if (currentPassword.value && newPassword.value && currentPassword.value === newPassword.value) {
                samePasswordWarning.classList.remove('d-none');
                isValid = false;
            }

            // Konfirmasi password tidak cocok
            if (newPassword.value && confirmPassword.value && newPassword.value !== confirmPassword.value) {
                confirmPasswordWarning.classList.remove('d-none');
                isValid = false;
            }

            return isValid;
        }

        form.addEventListener('submit', function (e) {
            if (!validatePasswords()) {
                e.preventDefault(); // Hentikan pengiriman form jika tidak valid
            }
        });

        // Juga validasi saat input berubah
        currentPassword.addEventListener('input', validatePasswords);
        newPassword.addEventListener('input', validatePasswords);
        confirmPassword.addEventListener('input', validatePasswords);
    });
</script>
@endsection

@section('footjs')
    @include('admin.layout.footer.admin')
@endsection
