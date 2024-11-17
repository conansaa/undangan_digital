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
                            <td><img src="{{ asset('timelines/'.$timeline->photo) }}" alt="Foto" style="max-width: 150px;"></td>
                            <td scope="col" class="text-center">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#editTimelineModal{{ $timeline->id }}">
                                    <span class="text-dark"><i class="fa-regular fa-pen-to-square"></i></span>
                                </a>                                
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
                        <th scope="col" style="width: 10%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($event->rsvps as $rsvp)
                        <tr>
                            <td>{{ $rsvp->name }}</td>
                            <td>{{ $rsvp->phone_number }}</td>
                            <td>{{ $rsvp->confirmation === 'yes' ? 'Hadir' : 'Tidak Hadir' }}</td>
                            <td>{{ $rsvp->total_guest }}</td>
                            <td>
                                <a href="/rsvps/delete/{{ $rsvp->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="text-danger ms-lg-3"><i class="fa-regular fa-trash-can"></i></span></a>
                            </td>
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
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addGiftModal">
                    Tambah Data
                </button>
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
                                <a href="#" data-bs-toggle="modal" data-bs-target="#editHadiahModal{{ $gift->id }}">
                                    <span class="text-dark"><i class="fa-regular fa-pen-to-square"></i></span>
                                </a> 
                                <a href="/gift/delete/{{ $gift->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="text-danger ms-lg-3"><i class="fa-regular fa-trash-can"></i></span></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Tabel Gallery -->
            <h5 class="d-flex justify-content-between align-items-center">
                Galeri Acara
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addGalleryModal">
                    Tambah Data
                </button>
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
                                <img src="{{ asset('galleries/' . $gallery->photo) }}" alt="Foto Galeri" style="max-width: 100px;">
                            </td>
                            <td>{{ $gallery->description }}</td>
                            <td scope="col" class="text-center">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#editGaleriModal{{ $gallery->id }}">
                                    <span class="text-dark"><i class="fa-regular fa-pen-to-square"></i></span>
                                </a> 
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
                <form action="{{ route('timeline.storeModal', ['id' => $event->id]) }}" method="POST" enctype="multipart/form-data">
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

    <!-- Modal Edit Timeline -->
    @foreach ($event->timeline as $timeline)
        <div class="modal fade" id="editTimelineModal{{ $timeline->id }}" tabindex="-1" aria-labelledby="editTimelineModalLabel{{ $timeline->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <form id="editTimelineForm{{ $timeline->id }}" action="{{ route('timeline.update', ['id' => $timeline->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editTimelineModalLabel{{ $timeline->id }}">Edit Timeline</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Judul -->
                            <div class="mb-3">
                                <label for="title" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('Title', $timeline->title) }}" required>
                            </div>
                            <!-- Tanggal -->
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $timeline->date) }}" required>
                            </div>
                            <!-- Deskripsi -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $timeline->description) }}</textarea>
                            </div>
                            <!-- Foto -->
                            <div class="mb-3">
                                <label for="photo" class="form-label">Foto</label>
                                <input type="file" id="photo" name="photo" class="form-control">
                                @if ($timeline->photo)
                                    <div class="mt-2">
                                        <img src="{{ asset('timelines/' . old('photo', $timeline->photo)) }}" alt="Foto Timeline" style="width: 100px;">
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

    <!-- Modal Tambah RSVP -->
    <div class="modal fade" id="addRsvpModal" tabindex="-1" aria-labelledby="addRsvpModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('rsvps.storeRsvp', ['id' => $event->id]) }}" method="POST">
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

    <!-- Modal Tambah Hadiah -->
    <div class="modal fade" id="addGiftModal" tabindex="-1" aria-labelledby="addGiftModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('gift.storeGift', ['id' => $event->id]) }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addGiftModalLabel">Tambah Hadiah</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="category">Kategori</label>
                            <select name="category" id="category" class="form-control">
                                <option value="">Pilih Kategori</option>
                                @foreach(App\Models\Gifts::CATEGORIES as $value => $label)
                                    <option value="{{ $value }}" {{ old('category') == $value ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="notes">Catatan</label>
                            <textarea name="notes" class="form-control" placeholder="Tambahkan Catatan"></textarea>
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

    <!-- Modal Edit Hadiah -->
    @foreach ($event->gifts as $gift)
        <div class="modal fade" id="editHadiahModal{{ $gift->id }}" tabindex="-1" aria-labelledby="editHadiahModalLabel{{ $gift->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <form id="editHadiahForm{{ $gift->id }}" action="{{ route('gift.update', ['id' => $gift->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editHadiahModalLabel{{ $gift->id }}">Edit Hadiah</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Nama Hadiah -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Hadiah</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $gift->name) }}" required>
                            </div>
                            <!-- Kategori -->
                            <div class="mb-3">
                                <label for="category" class="form-label">Kategori</label>
                                <select class="form-select" id="category" name="category" required>
                                    <option value="Uang" {{ $gift->category == 'cash' ? 'selected' : '' }}>Uang</option>
                                    <option value="Barang" {{ $gift->category == 'physical' ? 'selected' : '' }}>Barang</option>
                                </select>
                            </div>
                            <!-- Catatan -->
                            <div class="mb-3">
                                <label for="notes" class="form-label">Catatan</label>
                                <textarea class="form-control" id="notes" name="notes" rows="3">{{ old('notes', $gift->notes) }}</textarea>
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

    <!-- Modal Tambah Galeri -->
    <div class="modal fade" id="addGalleryModal" tabindex="-1" aria-labelledby="addGalleryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('gallery.storeGallery', ['id' => $event->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addGalleryModalLabel">Tambah Galeri</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="section_id">Section</label>
                            <select class="form-select bg-white" name="section_id">
                                <option value="">Pilih Section</option>
                                @foreach($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="photo">Foto</label>
                            <input type="file" name="photo" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea name="description" class="form-control" placeholder="Tambahkan Deskripsi"></textarea>
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

    <!-- Modal Edit Galeri -->
    @foreach ($event->galleries as $gallery)
        <div class="modal fade" id="editGaleriModal{{ $gallery->id }}" tabindex="-1" aria-labelledby="editGaleriModalLabel{{ $gallery->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <form id="editGaleriForm{{ $gallery->id }}" action="{{ route('gallery.update', ['id' => $gallery->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editGaleriModalLabel{{ $gallery->id }}">Edit Galeri</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Nama Section -->
                            <div class="mb-3">
                                <label for="section_id" class="form-label">Nama Section</label>
                                <select class="form-select bg-white" name="section_id">
                                    @foreach($sections as $section)
                                        <option value="{{ $section->id }}" {{ $gallery->section_id == $section->id ? 'selected' : '' }}>
                                            {{ $section->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Foto -->
                            <div class="mb-3">
                                <label for="photo" class="form-label">Foto</label>
                                <input type="file" id="photo" name="photo" class="form-control">
                                @if ($gallery->photo)
                                    <div class="mt-2">
                                        <img src="{{ asset('galleries/' . old('photo', $gallery->photo)) }}" alt="Foto Galeri" style="width: 100px;">
                                    </div>
                                @endif
                            </div>
                            <!-- Deskripsi -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $gallery->description) }}</textarea>
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