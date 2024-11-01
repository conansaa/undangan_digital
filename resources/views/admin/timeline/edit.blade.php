@extends('admin.layout')

@section('title', 'Ubah Timeline')

@section('judul', 'Ubah Timeline')

@section('konten_admin')
<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="mb-3">
        <a href="/timelines" class="btn btn-sm btn-outline-danger fw-bold me-2">Kembali</a>
    </div>
    <form action="/timeline/edit/{{ $timeline->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("put")
        <div class="mb-3">
            <label for="event_id" class="form-label fw-bold">Event ID</label>
            <select class="form-select bg-white" name="event_id">
                
                @foreach($events as $event)
                    <option value="{{ $event->id }}" {{ $event->id == $timeline->event_id ? 'selected' : '' }}>{{ $event->event_name }}</option>
                @endforeach
            </select>
            @error('event_id')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="title" class="form-label fw-bold">Judul</label>
            <input type="text" value="{{ $timeline->title }}" name="title" class="bg-white form-control @error('title') is-invalid @enderror">
            @error('title')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="date" class="form-label fw-bold">Tanggal</label>
            <input type="date" value="{{ $timeline->date }}" name="date" class="bg-white form-control @error('date') is-invalid @enderror">
            @error('date')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label fw-bold">Deskripsi</label>
            <textarea name="description" class="bg-white form-control @error('description') is-invalid @enderror">{{ $timeline->description }}</textarea>
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
            @if ($timeline->photo)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $timeline->photo) }}" alt="Foto Timeline" style="width: 100px;">
                </div>
            @endif
        </div>
        <div class="mb-3">
            <button name="submit" type="submit" class="btn btn-info text-white" onclick="return confirm('Apakah anda yakin ingin mengubah data tersebut?')">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
