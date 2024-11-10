@extends('admin.layout')

@section('title', 'Data Detail Acara')

{{-- @section('judul', 'Detail Acara') --}}

@section('konten_admin')

<div>
    <div>
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
                <a href="{{ route('timeline.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
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
                                <a href="/timeline/edit/{{ $timeline->id }}"><span class="text-dark"><i class="fa-regular fa-pen-to-square"></i></span></a>
                                <a href="/timeline/delete/{{ $timeline->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="text-danger ms-lg-3"><i class="fa-regular fa-trash-can"></i></span></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Tabel RSVP -->
            <h5 class="d-flex justify-content-between align-items-center">
                Data RSVP
                <a href="{{ route('rsvps.create', ['event_id' => $event->id]) }}" class="btn btn-sm btn-primary">Tambah Data</a>
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
            {{-- <h5>Data Ucapan</h5>
            <table class="table table-sm table-bordered mb-4">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Ucapan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($event->rsvps->comments as $comment)
                        <tr>
                            <td>{{ $comment->rsvp->name }}</td>
                            <td>{{ $comment->comment }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table> --}}

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
                                <a href="/gift/edit/{{ $gift->id }}"><span class="text-dark"><i class="fa-regular fa-pen-to-square"></i></span></a>
                                <a href="/gift/delete/{{ $gift->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="text-danger ms-lg-3"><i class="fa-regular fa-trash-can"></i></span></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Tabel Gallery -->
            <h5 class="d-flex justify-content-between align-items-center">
                Galeri Acara
                <a href="{{ route('gallery.index', ['event_detail_id' => $event->id]) }}" class="btn btn-sm btn-primary">Lihat Semua</a>
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

</div>

@endsection