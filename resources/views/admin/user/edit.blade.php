@extends('admin.layout')

@section('title', 'Ubah Pengguna')

@section('judul', 'Ubah Pengguna')

@section('konten_admin')
<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="mb-3">
        <a href="/users" class="btn btn-sm btn-outline-danger fw-bold me-2">Kembali</a>
    </div>
    <form action="/user/edit/{{ $user->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("put")
        <div class="mb-3">
            <label for="name" class="form-label fw-bold">Nama Pengguna</label>
            <input type="text" value="{{ $user->name }}" name="name" class="bg-white form-control @error('name') is-invalid @enderror">
            @error('name')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label fw-bold">Email</label>
            <input type="email" value="{{ $user->email }}" name="email" class="bg-white form-control @error('email') is-invalid @enderror">
            @error('email')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label fw-bold">Password (Biarkan kosong jika tidak ingin mengubah)</label>
            <input type="password" name="password" class="bg-white form-control @error('password') is-invalid @enderror" placeholder="Masukkan password baru jika ingin mengubah">
            @error('password')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email_verified_at" class="form-label fw-bold">Email Verifikasi</label>
            <input type="text" value="{{ $user->email_verified_at }}" name="email_verified_at" class="bg-white form-control" readonly>
        </div>
        <div class="mb-3">
            <button name="submit" type="submit" class="btn btn-info text-white" onclick="return confirm('Apakah anda yakin ingin mengubah data tersebut?')">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
