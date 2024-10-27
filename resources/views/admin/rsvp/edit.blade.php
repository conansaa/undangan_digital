@extends('admin.layout')

@section('title', 'Ubah RSVP')

@section('judul', 'Ubah RSVP')

@section('konten_admin')
<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="mb-3">
        <a href="/rsvps" class="btn btn-sm btn-outline-danger fw-bold me-2">Kembali</a>
    </div>
    <form action="/rsvp/edit/{{ $rsvp->id }}" method="post">
        @csrf
        @method("put")

        <div class="mb-3">
            <label for="event_id" class="form-label fw-bold">Event ID</label>
            <select class="form-select bg-white @error('event_id') is-invalid @enderror" name="event_id">
                <option selected value="{{ $rsvp->event_id }}">
                    {{ $rsvp->event->nama }}
                </option>
                @foreach($events as $event)
                    <option value="{{ $event->id }}">{{ $event->nama }}</option>
                @endforeach
            </select>
            @error('event_id')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label fw-bold">Nama</label>
            <input type="text" value="{{ old('nama', $rsvp->nama) }}" name="nama" class="bg-white form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama">
            @error('nama')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="no_telp" class="form-label fw-bold">No. Telp</label>
            <input type="text" value="{{ old('no_telp', $rsvp->no_telp) }}" name="no_telp" class="bg-white form-control @error('no_telp') is-invalid @enderror" placeholder="Masukkan No. Telp">
            @error('no_telp')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="konfirmasi" class="form-label fw-bold">Konfirmasi</label>
            <select class="form-select bg-white @error('konfirmasi') is-invalid @enderror" name="konfirmasi">
                <option value="Hadir" {{ $rsvp->konfirmasi == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                <option value="Tidak Hadir" {{ $rsvp->konfirmasi == 'Tidak Hadir' ? 'selected' : '' }}>Tidak Hadir</option>
            </select>
            @error('konfirmasi')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="total_guest" class="form-label fw-bold">Total Guest</label>
            <input type="number" value="{{ old('total_guest', $rsvp->total_guest) }}" name="total_guest" class="bg-white form-control @error('total_guest') is-invalid @enderror" placeholder="Masukkan Jumlah Tamu">
            @error('total_guest')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <button name="submit" type="submit" class="btn btn-info text-white" onclick="return confirm('Apakah anda yakin ingin mengubah RSVP ini?')">Simpan Perubahan</button>
        </div>
    </form>    
</div>
@endsection
