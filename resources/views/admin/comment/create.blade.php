@extends('admin.layout')

@section('title', 'Tambah Ucapan')

@section('judul', 'Tambah Ucapan')

@section('konten_admin')

<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="mb-3">
        <a href="/comments" class="btn btn-sm btn-outline-danger fw-bold me-2">Kembali</a>
    </div>
    <form action="/comments" method="post">
        @csrf
        <div class="mb-3">
            <label for="rsvp_id" class="form-label fw-bold">RSVP</label>
            <select class="form-select bg-white @error('rsvp_id') is-invalid @enderror" name="rsvp_id">
                <option value="">Pilih RSVP</option>
                @foreach($rsvps as $rsvp)
                    <option value="{{ $rsvp->id }}">{{ $rsvp->name }}</option>
                @endforeach
            </select>
            @error('rsvp_id')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="nama_tamu" class="form-label fw-bold">Nama Tamu</label>
            <input type="text" value="{{ old('nama_tamu') }}" name="nama_tamu" class="bg-white form-control @error('nama_tamu') is-invalid @enderror" placeholder="Masukkan Nama Tamu">
            @error('nama_tamu')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="komentar" class="form-label fw-bold">Komentar</label>
            <textarea name="komentar" class="bg-white form-control @error('komentar') is-invalid @enderror" rows="3" placeholder="Masukkan Komentar">{{ old('komentar') }}</textarea>
            @error('komentar')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <button name="submit" type="submit" class="btn btn-info text-white" onclick="return confirm('Apakah anda yakin ingin menambahkan ucapan tersebut?')">Submit</button>
        </div>
    </form>    
</div>

@endsection