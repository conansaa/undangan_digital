@extends('admin.layout.template')

@section('pages', 'Ubah Detail Acara')

@section('pagestitle', 'Ubah Detail Acara')

@section('sidebar')
    @include('admin.layout.sidebar.admin')
@endsection

@section('content')
<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="mb-3">
        <a href="/event" class="btn btn-sm btn-outline-danger fw-bold me-2">Kembali</a>
    </div>
    <form action="/event/edit/{{ $event->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("put")
        <div class="mb-3">
            <label for="event_owner_id" class="form-label fw-bold">Nama Pemilik</label>
            <select class="form-select bg-white" name="event_owner_id">
                <option selected value="{{ $event->eventOwner->id }}">
                    {{ $event->eventOwner->user->name }}
                </option>
                @foreach($owners as $owner)
                    <option value="{{ $owner->id }}">{{ $owner->user->name }}</option>
                @endforeach
            </select>
            @error('event_owner_id')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

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
            <label for="theme_id" class="form-label fw-bold">Tema</label>
            <select class="form-select bg-white" name="theme_id">
                <option selected value="{{ $event->themes->id }}">
                    {{ $event->themes->name }}
                </option>
                @foreach($themes as $theme)
                    <option value="{{ $theme->id }}">{{ $theme->nama }}</option>
                @endforeach
            </select>
            @error('theme_id')
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
