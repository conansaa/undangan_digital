@extends('admin.layout')

@section('title', 'Tambah Pemilik Acara')

@section('judul', 'Tambah Data Pemilik Acara')

@section('konten_admin')

<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="mb-3">
        <a href="/owners" class="btn btn-sm btn-outline-danger fw-bold me-2">Kembali</a>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="owner_name" class="form-label fw-bold">Nama Pemilik Acara</label>
            <input type="text" value="{{ old('owner_name') }}" name="owner_name" class="bg-white form-control @error('owner_name') is-invalid @enderror" placeholder="Masukkan Nama Pemilik Acara">
            @error('owner_name')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="parents_name" class="form-label fw-bold">Nama Orangtua</label>
            <input type="text" value="{{ old('parents_name') }}" name="parents_name" class="bg-white form-control @error('parents_name') is-invalid @enderror" placeholder="Masukkan Nama Orangtua">
            @error('parents_name')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="social_media" class="form-label fw-bold">Sosial Media</label>
            <input type="text" value="{{ old('social_media') }}" name="social_media" class="bg-white form-control @error('social_media') is-invalid @enderror" placeholder="Masukkan Sosial Media">
            @error('social_media')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="gender_id" class="form-label fw-bold">Gender</label>
            <select class="form-select bg-white" aria-label="Default select example" name="gender_id">
                <option value="">Pilih Jenis Kelamin</option>
                @foreach($genders as $gender)
                    <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="owner_photo" class="form-label fw-bold">Foto</label>
            <input type="file" name="owner_photo" class="bg-white form-control @error('owner_photo') is-invalid @enderror">
            @error('owner_photo')
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
