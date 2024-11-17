@extends('admin.layout')

@section('title', 'Ubah Pemilik Acara')

@section('judul', 'Ubah Pemilik Acara')

@section('konten_admin')
<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="mb-3">
        <a href="/owners" class="btn btn-sm btn-outline-danger fw-bold me-2">Kembali</a>
    </div>
    <form action="/owners/edit/{{ $owner->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("put")
        <div class="mb-3">
            <label for="owner_fullname" class="form-label fw-bold">Nama Lengkap Pemilik Acara</label>
            <input type="text" value="{{ $owner->owner_fullname }}" name="owner_fullname" class="bg-white form-control @error('owner_fullname') is-invalid @enderror">
            @error('owner_fullname')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="owner_name" class="form-label fw-bold">Nama Panggilan</label>
            <input type="text" value="{{ $owner->owner_name }}" name="owner_name" class="bg-white form-control @error('owner_name') is-invalid @enderror">
            @error('owner_name')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="fathers_name" class="form-label fw-bold">Nama Ayah</label>
            <input type="text" value="{{ $owner->fathers_name }}" name="fathers_name" class="bg-white form-control @error('fathers_name') is-invalid @enderror">
            @error('fathers_name')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="mothers_name" class="form-label fw-bold">Nama Ibu</label>
            <input type="text" value="{{ $owner->mothers_name }}" name="mothers_name" class="bg-white form-control @error('mothers_name') is-invalid @enderror">
            @error('mothers_name')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="ordinal_child_number" class="form-label fw-bold">Anak ke Berapa</label>
            <input type="number" value="{{ $owner->ordinal_child_number }}" name="ordinal_child_number" class="bg-white form-control @error('ordinal_child_number') is-invalid @enderror">
            @error('ordinal_child_number')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="social_media" class="form-label fw-bold">Sosial Media</label>
            <input type="text" value="{{ $owner->social_media }}" name="social_media" class="bg-white form-control @error('social_media') is-invalid @enderror">
            @error('social_media')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label fw-bold">Gender</label>
            <select class="form-select bg-white" name="gender">
                <option selected value="{{ $owner->gender->id }}">
                    {{ $owner->gender->name }}
                </option>
                @foreach($genders as $gender)
                    <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                @endforeach
            </select>
            @error('gender')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="owner_photo" class="form-label fw-bold">Foto</label>
            <input type="file" name="owner_photo" class="form-control @error('owner_photo') is-invalid @enderror">
            @error('owner_photo')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            @if ($owner->owner_photo)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $owner->owner_photo) }}" alt="Foto {{ $owner->owner_name }}" style="width: 100px; height: 100px;">
                </div>
            @endif
        </div>
        <div class="mb-3">
            <button name="submit" type="submit" class="btn btn-info text-white" onclick="return confirm('Apakah anda yakin ingin mengubah data tersebut?')">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
