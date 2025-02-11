@extends('admin.layout')

@section('title', 'Tambah Hadiah')

@section('judul', 'Tambah Data Hadiah')

@section('konten_admin')

<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="mb-3">
        <a href="/gifts" class="btn btn-sm btn-outline-danger fw-bold me-2">Kembali</a>
    </div>
    <form action="/gift/create" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="event_id" class="form-label fw-bold">Nama Acara</label>
            <select class="form-select bg-white" aria-label="Default select example" name="event_id">
                <option value="">Pilih Event</option>
                @foreach($events as $event)
                    <option value="{{ $event->id }}">{{ $event->event_name }}</option> <!-- Sesuaikan nama field jika berbeda -->
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label fw-bold">Nama</label>
            <input type="text" value="{{ old('name') }}" name="name" class="bg-white form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama">
            @error('name')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label fw-bold">Kategori</label>
            <select name="category" id="category" class="bg-white form-control @error('category') is-invalid @enderror">
                <option value="">Pilih Kategori</option>
                @foreach(App\Models\Gifts::CATEGORIES as $value => $label)
                    <option value="{{ $value }}" {{ old('category') == $value ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
            @error('category')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="notes" class="form-label fw-bold">Catatan</label>
            <textarea name="notes" class="bg-white form-control @error('notes') is-invalid @enderror" placeholder="Tambahkan Catatan">{{ old('notes') }}</textarea>
            @error('notes')
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
