@extends('admin.layout.template')

@section('pages', 'Tambah Tema')

@section('pagestitle', 'Tambah Tema')

@section('sidebar')
    @include('admin.layout.sidebar.admin')
@endsection

@section('content')

<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="mb-3">
        <a href="/themes" class="btn btn-sm btn-outline-danger fw-bold me-2">Kembali</a>
    </div>
    <form action="/themes/create" method="post">
        @csrf

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
            <label for="theme_category_id" class="form-label fw-bold">Kategori</label>
            <div class="d-flex">
                <select class="form-select bg-white me-2" aria-label="Default select example" name="theme_category_id">
                    <option value="">Pilih Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <!-- Tombol Tambah Kategori -->
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#tambahKategoriModal">Tambah Kategori</button>
            </div>
            @error('theme_category_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- color Field -->
        <div class="mb-3">
            <label for="color" class="form-label fw-bold">Warna</label><br>
            <input type="color" name="color" value="#000000" class="@error('color') is-invalid @enderror" title="Pilih color Tema">
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

<!-- Modal Tambah Kategori -->
<div class="modal fade" id="tambahKategoriModal" tabindex="-1" aria-labelledby="tambahKategoriModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahKategoriModalLabel">Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('category.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('footjs')
    @include('admin.layout.footer.admin')
@endsection