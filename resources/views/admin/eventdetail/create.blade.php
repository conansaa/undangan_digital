@extends('admin.layout')

@section('title', 'Tambah Detail Acara')

@section('judul', 'Tambah Data Detail Acara')

@section('konten_admin')

<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="mb-3">
        <a href="/event" class="btn btn-sm btn-outline-danger fw-bold me-2">Kembali</a>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <!-- Nama Pengguna -->
        <div class="mb-3">
            <label for="user_id" class="form-label fw-bold">Nama Pengguna</label>
            <div class="d-flex">
                <select class="form-select bg-white me-2" aria-label="Default select example" name="user_id">
                    <option value="">Pilih Pengguna</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                <!-- Tombol Tambah Pengguna -->
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#tambahPenggunaModal">Tambah Pengguna</button>
            </div>
            @error('user_id')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Nama Event -->
        <div class="mb-3">
            <label for="event_name" class="form-label fw-bold">Nama Event</label>
            <input type="text" value="{{ old('event_name') }}" name="event_name" class="bg-white form-control @error('event_name') is-invalid @enderror" placeholder="Masukkan Nama Event">
            @error('event_name')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Tipe Event -->
        <div class="mb-3">
            <label for="event_type_id" class="form-label fw-bold">Tipe Event</label>
            <select class="form-select bg-white" aria-label="Default select example" name="event_type_id">
                <option value="">Pilih Tipe Event</option>
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

        <!-- Tanggal -->
        <div class="mb-3">
            <label for="event_date" class="form-label fw-bold">Tanggal</label>
            <input type="date" value="{{ old('event_date') }}" name="event_date" class="bg-white form-control @error('event_date') is-invalid @enderror">
            @error('event_date')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Waktu -->
        <div class="mb-3">
            <label for="event_time" class="form-label fw-bold">Waktu</label>
            <input type="time" value="{{ old('event_time') }}" name="event_time" class="bg-white form-control @error('event_time') is-invalid @enderror">
            @error('event_time')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Lokasi -->
        <div class="mb-3">
            <label for="location" class="form-label fw-bold">Titik Lokasi</label>
            <input type="text" value="{{ old('location') }}" name="location" class="bg-white form-control @error('location') is-invalid @enderror" placeholder="Masukkan Lokasi Event">
            @error('location')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Lokasi Lengkap-->
        <div class="mb-3">
            <label for="full_location" class="form-label fw-bold">Lokasi Lengkap</label>
            <input type="text" value="{{ old('full_location') }}" name="full_location" class="bg-white form-control @error('full_location') is-invalid @enderror" placeholder="Masukkan Lokasi Event">
            @error('full_location')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Kuota -->
        <div class="mb-3">
            <label for="quota" class="form-label fw-bold">Kuota</label>
            <input type="number" value="{{ old('quota') }}" name="quota" class="bg-white form-control @error('quota') is-invalid @enderror" placeholder="Masukkan Kuota Event">
            @error('quota')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Tombol Submit -->
        <div class="mb-3">
            <button name="submit" type="submit" class="btn btn-info text-white" onclick="return confirm('Apakah anda yakin ingin menambahkan data tersebut?')">Submit</button>
        </div>
    </form>    
</div>

<!-- Modal Tambah Pengguna -->
<div class="modal fade" id="tambahPenggunaModal" tabindex="-1" aria-labelledby="tambahPenggunaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPenggunaModalLabel">Tambah Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('user.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
