@extends('admin.layout')

@section('title', 'Tambah Tema')

@section('judul', 'Tambah Tema')

@section('konten_admin')

<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="mb-3">
        <a href="/themes" class="btn btn-sm btn-outline-danger fw-bold me-2">Kembali</a>
    </div>
    <form action="/themes/create" method="post">
        @csrf
        <div class="mb-3">
            <label for="event_id" class="form-label fw-bold">Nama Acara</label>
            <select class="form-select bg-white @error('event_id') is-invalid @enderror" name="event_id">
                <option value="">Pilih Acara</option>
                @foreach($eventDetails as $event)
                    <option value="{{ $event->id }}">{{ $event->event_name }}</option>
                @endforeach
            </select>
            @error('event_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="name" class="form-label fw-bold">Nama Tema</label>
            <input type="text" name="name" class="bg-white form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Tema">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label fw-bold">Deskripsi Tema</label>
            <textarea name="description" class="bg-white form-control @error('description') is-invalid @enderror" placeholder="Masukkan Deskripsi Tema"></textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="max_images" class="form-label fw-bold">Maksimal Gambar</label>
            <input type="number" name="max_images" class="bg-white form-control @error('max_images') is-invalid @enderror" placeholder="Masukkan Maksimal Jumlah Gambar">
            @error('max_images')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>   
        
        <!-- Tag Field -->
        <div class="mb-3">
            <label for="tag" class="form-label fw-bold">Tag</label>
            <input type="text" name="tag" class="bg-white form-control @error('tag') is-invalid @enderror" placeholder="Masukkan Tag Tema (misalnya: romantis, elegan)">
            @error('tag')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- category Field as Text Input -->
        <div class="mb-3">
            <label for="category" class="form-label fw-bold">Kategori</label>
            <input type="text" name="category" class="bg-white form-control @error('category') is-invalid @enderror" placeholder="Masukkan category Tema (misalnya: Formal, Casual)">
            @error('category')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- color Field -->
        <div class="mb-3">
            <label for="color" class="form-label fw-bold">Warna</label>
            <input type="color" name="color" class="form-control form-control-color @error('color') is-invalid @enderror" title="Pilih color Tema">
            @error('color')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <button name="submit" type="submit" class="btn btn-info text-white" onclick="return confirm('Apakah anda yakin ingin menambahkan tema tersebut?')">Submit</button>
        </div>
    </form> 
</div>

@endsection
