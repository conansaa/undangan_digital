@extends('admin.layout')

@section('title', 'Ubah Tipe Acara')

@section('judul', 'Ubah Tipe Acara')

@section('konten_admin')
<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="mb-3">
        <a href="/event-type" class="btn btn-sm btn-outline-danger fw-bold me-2">Kembali</a>
    </div>
    <form action="/event-types/edit/{{ $eventType->id }}" method="post">
        @csrf
        @method("put")
        <div class="mb-3">
            <label for="nama" class="form-label fw-bold">Nama Tipe Acara</label>
            <input type="text" value="{{ $eventType->nama }}" name="nama" class="bg-white form-control @error('nama') is-invalid @enderror">
            @error('nama')
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
