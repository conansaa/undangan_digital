@extends('admin.layout')

@section('title', 'Data Detail Acara')

{{-- @section('judul', 'Detail Acara') --}}

@section('konten_admin')

<div>
    <div>
        <a href="/event" class="btn btn-sm btn-outline-danger fw-bold me-2 mb-4">Kembali</a>
        <h1 class="fs-5 fw-bold mb-4">Detail Data Event : {{ $event->event_name }}</h1>
        <div class="row justify-content-between mb-3">
            <!-- Tabel Event Owner -->
            <h5 class="d-flex justify-content-between align-items-center">
                Pengguna
                <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
            </h5>
            <table class="table table-sm table-bordered mb-4 text-center" style="max-width: 50%; margin: left;">
                <thead class="table-info">
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $event->user->name }}</td>
                        <td>{{ $event->user->email }}</td>
                        <td>
                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editUserModal"><span class="text-dark"><i class="fa-regular fa-pen-to-square"></i></span></a>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Tabel Event Type -->
            <h5 class="d-flex justify-content-between align-items-center">
                Tipe Acara
                <a href="{{ route('eventtype.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
            </h5>
            <table class="table table-sm table-bordered mb-4 text-center" style="max-width: 50%; margin: left;">
                <thead class="table-info">
                    <tr>
                        <th>Nama Tipe</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $event->eventType->nama }}</td>
                        <td scope="col">
                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editEventModal"><span class="text-dark"><i class="fa-regular fa-pen-to-square"></i></span></a>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Tabel Timeline -->
            <h5 class="d-flex justify-content-between align-items-center">
                Timeline
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addTimelineModal">
                    Tambah Data
                </button>
            </h5>
            <table class="table table-sm table-bordered mb-4 text-center" style="max-width: 80%; margin: left;">
                <thead class="table-info">
                    <tr>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Deskripsi</th>
                        <th>Foto</th>
                        <th scope="col" style="width: 10%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($event->timeline as $timeline)
                        <tr>
                            <td>{{ $timeline->title }}</td>
                            <td>{{ \Carbon\Carbon::parse($timeline->date)->format('d M Y') }}</td>
                            <td>{{ $timeline->description }}</td>
                            <td><img src="{{ asset('storage/'.$timeline->photo) }}" alt="Foto" style="max-width: 150px;"></td>
                            <td scope="col" class="text-center">
                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editTimelineModal"><span class="text-dark"><i class="fa-regular fa-pen-to-square"></i></span></a>
                                <a href="/timeline/delete/{{ $timeline->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="text-danger ms-lg-3"><i class="fa-regular fa-trash-can"></i></span></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Tabel RSVP -->
            <h5 class="d-flex justify-content-between align-items-center">
                Data RSVP
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addRsvpModal">
                    Tambah Data
                </button>
            </h5>                                
            <table class="table table-sm table-bordered mb-4 text-center" style="max-width: 80%; margin: left;">
                <thead class="table-info">
                    <tr>
                        <th>Nama Tamu</th>
                        <th>No Telp</th>
                        <th>Konfirmasi</th>
                        <th>Total Tamu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($event->rsvps as $rsvp)
                        <tr>
                            <td>{{ $rsvp->name }}</td>
                            <td>{{ $rsvp->phone_number }}</td>
                            <td>{{ $rsvp->confirmation === 'yes' ? 'Hadir' : 'Tidak Hadir' }}</td>
                            <td>{{ $rsvp->total_guest }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Tabel Comments -->
            <h5>Data Ucapan</h5>
            <table class="table table-sm table-bordered mb-4 text-center" style="max-width: 50%; margin: left;">
                <thead class="table-info">
                    <tr>
                        <th>Nama</th>
                        <th>Ucapan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $comment)
                        <tr>
                            <td>{{ $comment->rsvp->name }}</td>
                            <td>{{ $comment->comment }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Tabel Gift -->
            <h5 class="d-flex justify-content-between align-items-center">
                Data Hadiah
                <a href="{{ route('gift.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
            </h5>                                
            <table class="table table-sm table-bordered mb-4 text-center" style="max-width: 80%; margin: left;">
                <thead class="table-info">
                    <tr>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Catatan</th>
                        <th scope="col" style="width: 10%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($event->gifts as $gift)
                        <tr>
                            <td>{{ $gift->name }}</td>
                            <td>{{ $gift->category }}</td>
                            <td>{{ $gift->notes }}</td>
                            <td scope="col" class="text-center">
                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editHadiahModal"><span class="text-dark"><i class="fa-regular fa-pen-to-square"></i></span></a>
                                <a href="/gift/delete/{{ $gift->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="text-danger ms-lg-3"><i class="fa-regular fa-trash-can"></i></span></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Tabel Gallery -->
            <h5 class="d-flex justify-content-between align-items-center">
                Galeri Acara
                <a href="{{ route('gallery.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
            </h5>
            <table class="table table-sm table-bordered text-center" style="max-width: 80%; margin: left;">
                <thead class="table-info">
                    <tr>
                        <th>Section</th>
                        <th>Foto</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($event->galleries as $gallery)
                        <tr>
                            <td>{{ $gallery->section->name }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $gallery->photo) }}" alt="Foto Galeri" style="max-width: 100px;">
                            </td>
                            <td>{{ $gallery->description }}</td>
                            <td scope="col" class="text-center">
                                <a href="/gallery/edit/{{ $gallery->id }}"><span class="text-dark"><i class="fa-regular fa-pen-to-square"></i></span></a>
                                <a href="/gallery/delete/{{ $gallery->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="text-danger ms-lg-3"><i class="fa-regular fa-trash-can"></i></span></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Edit Pengguna -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="editUserForm" action="{{ route('user.edit', ['id' => $event->user->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editUserModalLabel">Edit Pengguna</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $event->user->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $event->user->email }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Tipe Acara -->
    <div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="editEventForm" action="{{ route('eventtype.edit', ['id' => $event->eventType->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editEventModalLabel">Edit Acara</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="event_type" class="form-label">Tipe Acara</label>
                            <select class="form-select" id="event_type" name="event_type_id" required>
                                @foreach ($eventTypes as $name)
                                    <option value="{{ $name->id }}" {{ $event->event_type_id == $name->id ? 'selected' : '' }}>
                                        {{ $name->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Tambah TImeline -->
    <div class="modal fade" id="addTimelineModal" tabindex="-1" aria-labelledby="addTimelineModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('event.storeTimeline', ['id' => $event->id]) }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addTimelineModalLabel">Tambah Timeline</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Judul</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="date">Tanggal</label>
                            <input type="date" class="form-control" name="date" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea class="form-control" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="photo">Foto</label>
                            <input type="file" class="form-control" name="photo" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Tambah RSVP -->
    <div class="modal fade" id="addRsvpModal" tabindex="-1" aria-labelledby="addRsvpModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('event.storeRsvp', ['id' => $event->id]) }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addRsvpModalLabel">Tambah RSVP</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nama Tamu</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Nomor Telepon</label>
                            <input type="text" class="form-control" name="phone_number" required>
                        </div>
                        <div class="form-group">
                            <label for="confirmation">Konfirmasi</label>
                            <select class="form-select" name="confirmation">
                                <option value="">Pilih Status Kehadiran</option>
                                <option value="yes">Hadir</option>
                                <option value="no">Tidak Hadir</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="total_guest">Total Tamu</label>
                            <input type="number" class="form-control" name="total_guest">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Timeline -->
    @foreach ($event->timeline as $timeline)
        <div class="modal fade" id="editTimelineModal" tabindex="-1" aria-labelledby="editTimelineModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="editTimelineForm{{ $timeline->id }}" action="{{ route('timeline.update', ['id' => $timeline->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editTimelineModalLabel">Edit Timeline</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Judul -->
                            <div class="mb-3">
                                <label for="title" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $timeline->title }}" required>
                            </div>
                            <!-- Tanggal -->
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date" value="{{ $timeline->date }}" required>
                            </div>
                            <!-- Deskripsi -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="description" name="description" rows="4" required>{{ $timeline->description }}</textarea>
                            </div>
                            <!-- Foto -->
                            <div class="mb-3">
                                <label for="photo" class="form-label">Foto</label>
                                <input type="file" id="photo" name="photo" class="form-control @error('photo') is-invalid @enderror">
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
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach

    <!-- Modal Edit Hadiah -->
    @foreach ($event->gifts as $gift)
        <div class="modal fade" id="editHadiahModal" tabindex="-1" aria-labelledby="editHadiahModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="editHadiahForm" action="{{ route('gift.edit', ['id' => $gift->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editHadiahModalLabel">Edit Hadiah</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Nama Hadiah -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Hadiah</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $gift->name }}" required>
                            </div>
                            <!-- Kategori -->
                            <div class="mb-3">
                                <label for="category" class="form-label">Kategori</label>
                                <select class="form-select" id="category" name="category" required>
                                    <option value="cash" {{ $gift->category == 'cash' ? 'selected' : '' }}>Uang Tunai</option>
                                    <option value="physical" {{ $gift->category == 'physical' ? 'selected' : '' }}>Barang</option>
                                </select>
                            </div>
                            <!-- Catatan -->
                            <div class="mb-3">
                                <label for="notes" class="form-label">Catatan</label>
                                <textarea class="form-control" id="notes" name="notes" rows="3">{{ $gift->notes }}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach

</div>

@endsection