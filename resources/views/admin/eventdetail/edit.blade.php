@extends('admin.layout')

@section('title', 'Ubah Event')

@section('judul', 'Ubah Event')

@section('konten_admin')
<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="mb-3">
        <a href="/event" class="btn btn-sm btn-outline-danger fw-bold me-2">Kembali</a>
    </div>
    <form action="/event/edit/{{ $event->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("put")
        {{-- <div class="mb-3">
            <label for="user_id" class="form-label fw-bold">Nama Pengguna</label>
            <select class="form-select bg-white" name="user_id">
                <option selected value="{{ $event->user->id }}">
                    {{ $event->user->name }}
                </option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div> --}}

        <div class="mb-3">
            <label for="event_name" class="form-label fw-bold">Nama Event</label>
            <input type="text" value="{{ $event->event_name }}" name="event_name" class="bg-white form-control @error('event_name') is-invalid @enderror">
            @error('event_name')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="event_type_id" class="form-label fw-bold">Tipe Event</label>
            <select class="form-select bg-white" name="event_type_id">
                <option selected value="{{ $event->eventType->id }}">
                    {{ $event->eventType->nama }}
                </option>
                @foreach($eventTypes as $eventType)
                    <option value="{{ $eventType->id }}">{{ $eventType->nama }}</option>
                @endforeach
            </select>
            @error('event_type_id')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="event_date" class="form-label fw-bold">Tanggal Event</label>
            <input type="date" value="{{ $event->event_date }}" name="event_date" class="bg-white form-control @error('event_date') is-invalid @enderror">
            @error('event_date')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="event_time" class="form-label fw-bold">Waktu Event</label>
            <input type="time" value="{{ $event->event_time }}" name="event_time" class="bg-white form-control @error('event_time') is-invalid @enderror">
            @error('event_time')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="location" class="form-label fw-bold">Titik Lokasi</label>
            <input type="text" value="{{ $event->location }}" name="location" class="bg-white form-control @error('location') is-invalid @enderror">
            @error('location')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="full_location" class="form-label fw-bold">Lokasi Lengkap</label>
            <input type="text" value="{{ $event->full_location }}" name="full_location" class="bg-white form-control @error('full_location') is-invalid @enderror">
            @error('full_location')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="quota" class="form-label fw-bold">Kuota</label>
            <input type="number" value="{{ $event->quota }}" name="quota" class="bg-white form-control @error('quota') is-invalid @enderror">
            @error('quota')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <button name="submit" type="submit" class="btn btn-info text-white" onclick="return confirm('Apakah anda yakin ingin mengubah data tersebut?')">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
