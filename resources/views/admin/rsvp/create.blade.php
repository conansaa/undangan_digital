@extends('admin.layout')

@section('title', 'Tambah RSVP')

@section('judul', 'Tambah RSVP')

@section('konten_admin')

<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="mb-3">
        <a href="/rsvps" class="btn btn-sm btn-outline-danger fw-bold me-2">Kembali</a>
    </div>
    <form action="/rsvp/create" method="post">
        @csrf
        <div class="mb-3">
            <label for="event_id" class="form-label fw-bold">Event</label>
            <select class="form-select bg-white @error('event_id') is-invalid @enderror" name="event_id">
                <option value="">Pilih Event</option>
                @foreach($eventDetails as $event)
                    <option value="{{ $event->id }}">{{ $event->name }}</option>
                @endforeach
            </select>
            @error('event_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="name" class="form-label fw-bold">Nama</label>
            <input type="text" name="name" class="bg-white form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="no_telp" class="form-label fw-bold">No Telp</label>
            <input type="text" name="no_telp" class="bg-white form-control @error('no_telp') is-invalid @enderror" placeholder="Masukkan No Telp">
            @error('no_telp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="konfirmasi" class="form-label fw-bold">Konfirmasi Kehadiran</label>
            <select class="form-select bg-white @error('konfirmasi') is-invalid @enderror" name="konfirmasi">
                <option value="">Pilih Status Kehadiran</option>
                <option value="1">Hadir</option>
                <option value="0">Tidak Hadir</option>
            </select>
            @error('konfirmasi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="total_guest" class="form-label fw-bold">Jumlah Tamu</label>
            <input type="number" name="total_guest" class="bg-white form-control @error('total_guest') is-invalid @enderror" placeholder="Masukkan Jumlah Tamu">
            @error('total_guest')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <button name="submit" type="submit" class="btn btn-info text-white" onclick="return confirm('Apakah anda yakin ingin menambahkan RSVP tersebut?')">Submit</button>
        </div>
    </form>    
</div>

@endsection
