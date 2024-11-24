@extends('admin.layout.template')

@section('pages', 'Tambah Detail Acara')

@section('pagestitle', 'Tambah Detail Acara')

@section('sidebar')
    @include('admin.layout.sidebar.admin')
@endsection

@section('content')

<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="mb-3">
        <a href="/event" class="btn btn-sm btn-outline-danger fw-bold me-2">Kembali</a>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <!-- Nama Pengguna -->
        <div class="mb-3">
            <label for="event_owner_id" class="form-label fw-bold">Nama Pemilik</label>
            <div class="d-flex">
                <select class="form-select bg-white me-2" aria-label="Default select example" name="event_owner_id">
                    <option value="">Pilih Pemilik</option>
                    @foreach($owners as $owner)
                        <option value="{{ $owner->id }}">{{ $owner->user->name }}</option>
                    @endforeach
                </select>
                <!-- Tombol Tambah Pengguna -->
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#tambahPenggunaModal">Tambah Pengguna</button>
            </div>
            @error('event_owner_id')
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

        <!-- Theme ID -->
        <div class="mb-3">
            <label for="theme_id" class="form-label fw-bold">Tema</label>
            <select class="form-select bg-white" aria-label="Default select example" name="theme_id">
                <option value="">Pilih Tema</option>
                @foreach($themes as $theme)
                    <option value="{{ $theme->id }}">{{ $theme->name }}</option>
                @endforeach
            </select>
            @error('theme_id')
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
            <form action="{{ route('owner.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="user_id" class="form-label fw-bold">Nama Pengguna</label>
                        <select class="form-select bg-white" aria-label="Default select example" name="user_id">
                            <option value="">Pilih Pengguna</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
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

@section('footjs')
    @include('admin.layout.footer.admin')
@endsection