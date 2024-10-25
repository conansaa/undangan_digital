@extends('admin.layout')

@section('title', 'Ubah Gallery')

@section('judul', 'Ubah Data Gallery')

@section('konten_admin')
<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="mb-3">
        <a href="/galleries" class="btn btn-sm btn-outline-danger fw-bold me-2">Kembali</a>
    </div>
    <form action="/gallery/edit/{{ $gallery->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("put")
        
        <div class="mb-3">
            <label for="event_id" class="form-label fw-bold">Event</label>
            <select class="form-select bg-white" name="event_id">
                <option value="">Pilih Event</option>
                @foreach($events as $event)
                    <option value="{{ $event->id }}" {{ $gallery->event_id == $event->id ? 'selected' : '' }}>
                        {{ $event->event_name }}
                    </option>
                @endforeach
            </select>
            @error('event_id')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="section_id" class="form-label fw-bold">Section</label>
            <select class="form-select bg-white" name="section_id">
                <option value="">Pilih Section</option>
                @foreach($sections as $section)
                    <option value="{{ $section->id }}" {{ $gallery->section_id == $section->id ? 'selected' : '' }}>
                        {{ $section->name }}
                    </option>
                @endforeach
            </select>
            @error('section_id')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label fw-bold">Deskripsi</label>
            <input type="text" value="{{ $gallery->description }}" name="description" class="bg-white form-control @error('description') is-invalid @enderror">
            @error('description')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label fw-bold">Foto</label>
            <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
            @error('photo')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            @if ($gallery->photo)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $gallery->photo) }}" alt="Foto Gallery" style="width: 100px;">
                </div>
            @endif
        </div>

        <div class="mb-3">
            <button name="submit" type="submit" class="btn btn-info text-white" onclick="return confirm('Apakah anda yakin ingin mengubah data tersebut?')">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
