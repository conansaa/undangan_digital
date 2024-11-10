@extends('admin.layout')

@section('title', 'Tambah Timeline')

@section('judul', 'Tambah Data Timeline')

@section('konten_admin')

<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="mb-3">
        <a href="/timelines" class="btn btn-sm btn-outline-danger fw-bold me-2">Kembali</a>
    </div>
    <form action="/timeline/create" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="event_id" class="form-label fw-bold">Nama Acara</label>
            <select class="form-select bg-white @error('event_id') is-invalid @enderror" name="event_id">
                <option value="">Pilih Event</option>
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
            <label for="title" class="form-label fw-bold">Judul</label>
            <input type="text" value="{{ old('title') }}" name="title" class="bg-white form-control @error('title') is-invalid @enderror" placeholder="Masukkan Judul Timeline">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="date" class="form-label fw-bold">Tanggal</label>
            <input type="date" value="{{ old('date') }}" name="date" class="bg-white form-control @error('date') is-invalid @enderror">
            @error('date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label fw-bold">Deskripsi</label>
            <textarea name="description" class="bg-white form-control @error('description') is-invalid @enderror" rows="3" placeholder="Masukkan Deskripsi Timeline">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label fw-bold">Foto</label>
            <input type="file" name="photo" class="bg-white form-control @error('photo') is-invalid @enderror">
            @error('photo')
                <div class="invalid-feedback">
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
