@extends('layout.app') 

@section('title', 'Data RSVP Acara')

@section('judul', 'RSVP Acara')

@section('content')

<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="mb-3">
        <a href="/rsvpclient" class="btn btn-sm btn-outline-danger fw-bold me-2">Kembali</a>
    </div>
    <form action="/rsvpclient/createtamu" method="post">
        @csrf
        
        <!-- Hidden input for event_id -->
        <input type="hidden" name="event_id" value="{{ $eventDetails->id }}">
        
        <div class="mb-3">
            <label for="name" class="form-label fw-bold">Nama</label>
            <input type="text" name="name" class="bg-white form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <small class="form-text text-muted">Pastikan nama tidak sama</small>
        </div>

        <div class="mb-3">
            <label for="phone_number" class="form-label fw-bold">No Telp</label>
            <input type="text" name="phone_number" class="bg-white form-control @error('phone_number') is-invalid @enderror" placeholder="Masukkan No Telp">
            @error('phone_number')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <!-- Add an instruction or hint about the phone number format -->
            <small class="form-text text-muted">Isikan dengan format internasional, contoh: 085xxxxxxxxx menjadi 6285xxxxxxxxx.</small>
        </div>

        <div class="mb-3">
            <button name="submit" type="submit" class="btn btn-info text-white" onclick="return confirm('Apakah anda yakin ingin menambahkan RSVP tersebut?')">Submit</button>
        </div>
    </form> 
</div>

@endsection
