@extends('admin.layout')

@section('title', 'Ubah Tema')

@section('judul', 'Ubah Tema')

@section('konten_admin')
<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="mb-3">
        <a href="/themes" class="btn btn-sm btn-outline-danger fw-bold me-2">Kembali</a>
    </div>
    <form action="/themes/edit/{{ $theme->id }}" method="post">
        @csrf
        @method("put")

        <div class="mb-3">
            <label for="event_id" class="form-label fw-bold">Nama Acara</label>
            <select class="form-select bg-white @error('event_id') is-invalid @enderror" name="event_id">
                <option selected value="{{ $theme->event_id }}">
                    {{ $theme->event->event_name }}
                </option>
                @foreach($events as $event)
                    <option value="{{ $event->id }}">{{ $event->event_name }}</option>
                @endforeach
            </select>
            @error('event_id')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="name" class="form-label fw-bold">Nama Tema</label>
            <input type="text" value="{{ old('name', $theme->name) }}" name="name" class="bg-white form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Tema">
            @error('name')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label fw-bold">Deskripsi Tema</label>
            <textarea name="description" class="bg-white form-control @error('description') is-invalid @enderror" placeholder="Masukkan Deskripsi Tema">{{ old('description', $theme->description) }}</textarea>
            @error('description')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="max_images" class="form-label fw-bold">Maksimal Gambar</label>
            <input type="number" value="{{ old('max_images', $theme->max_images) }}" name="max_images" class="bg-white form-control @error('max_images') is-invalid @enderror" placeholder="Masukkan Maksimal Jumlah Gambar">
            @error('max_images')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tag" class="form-label fw-bold">Tag</label>
            <input type="text" value="{{ old('tag', $theme->tag) }}" name="tag" class="bg-white form-control @error('tag') is-invalid @enderror" placeholder="Masukkan Tag">
            @error('tag')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label fw-bold">Kategori</label>
            <input type="text" value="{{ old('category', $theme->category) }}" name="category" class="bg-white form-control @error('category') is-invalid @enderror" placeholder="Masukkan Kategori">
            @error('category')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="color" class="form-label fw-bold">Warna</label>
            <input type="color" value="{{ old('color', $theme->color) }}" name="color" class="bg-white form-control form-control-color @error('color') is-invalid @enderror" placeholder="Masukkan Warna (Hex)">
            @error('color')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>        

        <div class="mb-3">
            <button name="submit" type="submit" class="btn btn-info text-white" onclick="return confirm('Apakah anda yakin ingin mengubah tema ini?')">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
