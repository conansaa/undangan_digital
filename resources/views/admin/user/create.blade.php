@extends('admin.layout')

@section('title', 'Tambah Pengguna')

@section('judul', 'Tambah Data Pengguna')

@section('konten_admin')

<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="mb-3">
        <a href="/users" class="btn btn-sm btn-outline-danger fw-bold me-2">Kembali</a>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label fw-bold">Nama</label>
            <input type="text" value="{{ old('name') }}" name="name" class="bg-white form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Pengguna">
            @error('name')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label fw-bold">Email</label>
            <input type="email" value="{{ old('email') }}" name="email" class="bg-white form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email Pengguna">
            @error('email')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <button name="submit" type="submit" class="btn btn-info text-white" onclick="return confirm('Apakah anda yakin ingin menambahkan data tersebut?')">Submit</button>
        </div>
    </form>    
</div>

@endsection
