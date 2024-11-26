@extends('admin.layout.template')

@section('headmeta')
    <!-- Bootstrap CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" defer></script>
@endsection

@section('pages', 'Detail Acara')

@section('pagestitle', 'Detail Acara')

@section('sidebar')
    @include('admin.layout.sidebar.admin')
@endsection

@section('content')
<a href="/event" class="btn btn-sm btn-outline-danger fw-bold me-2 mb-4">Kembali</a>
<h1 class="fs-5 fw-bold mb-4">Detail Data Event : {{ $event->event_name }}</h1>

<!-- Tipe Acara -->
<div class="card mt-2">
    <div class="card-header pb-0 mb-2">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0">Tipe Acara</h6>
            <a href="{{ route('eventtype.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
        </div>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Tipe Acara</th>
                    <th class="text-secondary opacity-7"></th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($events as $event) --}}
                    <tr>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $event->eventType->nama }}</td>
                        <td class="align-middle">
                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editEventModal"><span class="text-dark"><i class="fa-regular fa-pen-to-square"></i></span></a>
                        </td>
                    </tr>
                {{-- @endforeach --}}
            </tbody>
        </table>
    </div>
    </div>
</div>

<!-- Figures -->
<div class="card mt-4">
    <div class="card-header pb-0 mb-2">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0">Tokoh Utama</h6>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addFigureModal">
                Tambah Data
            </button>
        </div>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Lengkap</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama ayah</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Ibu</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Anak Ke-</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Foto</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Media Sosial</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Kelamin</th>
                    <th class="text-secondary opacity-7"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($event->figures as $figure)
                    <tr>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $figure->fullname }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $figure->name }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $figure->fathers_name }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $figure->mothers_name }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $figure->ordinal_child_number }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">
                            <img src="{{ asset('figures/' . $figure->photo) }}" alt="Foto Galeri" style="max-width: 100px;">
                        </td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $figure->social_media }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $figure->gender->name }}</td>
                        <td class="align-middle">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#editFigureModal{{ $figure->id }}">
                                <span class="text-dark"><i class="fa-regular fa-pen-to-square"></i></span>
                            </a>                                
                            <a href="/figure/delete/{{ $figure->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="text-danger ms-lg-3"><i class="fa-regular fa-trash-can"></i></span></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>

<!-- Event Cards -->
<div class="card mt-4">
    <div class="card-header pb-0 mb-2">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0">Detail Acara</h6>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addCardModal">
                Tambah Data
            </button>
        </div>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Acara</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Waktu</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Titik Lokasi</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lokasi</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kuota</th>
                    <th class="text-secondary opacity-7"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($event->eventCards as $card)
                    <tr>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $card->event_name }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $card->event_date }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $card->event_time }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $card->location }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $card->full_location }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $card->quota }}</td>
                        <td class="align-middle">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#editCardModal{{ $card->id }}">
                                <span class="text-dark"><i class="fa-regular fa-pen-to-square"></i></span>
                            </a>                                
                            <a href="/card/delete/{{ $card->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="text-danger ms-lg-3"><i class="fa-regular fa-trash-can"></i></span></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>

<!-- Timeline -->
<div class="card mt-4">
    <div class="card-header pb-0 mb-2">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0">Timeline Acara</h6>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addTimelineModal">
                Tambah Data
            </button>
        </div>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"  scope="col" style="width: 15%;">Deskripsi</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Foto</th>
                    <th class="text-secondary opacity-7"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($event->timeline as $timeline)
                    <tr>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $timeline->title }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ \Carbon\Carbon::parse($timeline->date)->format('d M Y') }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold text-truncate" style="max-width: 150px;" title="{{ $timeline->description }}">{{ $timeline->description }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">
                            <img src="{{ asset('timelines/'.$timeline->photo) }}" alt="Foto" style="max-width: 150px;">
                        </td>
                        <td class="align-middle">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#editTimelineModal{{ $timeline->id }}">
                                <span class="text-dark"><i class="fa-regular fa-pen-to-square"></i></span>
                            </a>                                
                            <a href="/timeline/delete/{{ $timeline->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="text-danger ms-lg-3"><i class="fa-regular fa-trash-can"></i></span></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
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
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
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

<!-- RSVP -->
<div class="card mt-4">
    <div class="card-header pb-0 mb-2">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0">RSVP</h6>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addRsvpModal">
                Tambah Data
            </button>
        </div>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Tamu</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No. Telp</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Konfirmasi</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah Tamu</th>
                    <th class="text-secondary opacity-7"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($event->rsvps as $rsvp)
                    <tr>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $rsvp->name }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $rsvp->phone_number }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $rsvp->confirmation === 'Hadir' ? 'Hadir' : 'Tidak Hadir' }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $rsvp->total_guest }}</td>
                        <td class="align-middle">
                            <a href="/rsvps/delete/{{ $rsvp->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="text-danger ms-lg-3"><i class="fa-regular fa-trash-can"></i></span></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>

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

<!-- Comment -->
<div class="card mt-4">
    <div class="card-header pb-0 mb-2">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0">Ucapan</h6>
        </div>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ucapan</th>
                    <th class="text-secondary opacity-7"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $comment->rsvp->name }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $comment->comment }}</td>
                        <td class="align-middle">
                            <a href="/comment/delete/{{ $comment->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="text-danger"><i class="fa-regular fa-trash-can"></i></span></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>

<!-- Gift -->
<div class="card mt-4">
    <div class="card-header pb-0 mb-2">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0">Hadiah</h6>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addGiftModal">
                Tambah Data
            </button>
        </div>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kategori</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Catatan</th>
                    <th class="text-secondary opacity-7"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($event->gifts as $gift)
                    <tr>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $gift->name }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $gift->category }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $gift->notes }}</td>
                        <td class="align-middle">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#editHadiahModal{{ $gift->id }}">
                                <span class="text-dark"><i class="fa-regular fa-pen-to-square"></i></span>
                            </a> 
                            <a href="/gift/delete/{{ $gift->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="text-danger ms-lg-3"><i class="fa-regular fa-trash-can"></i></span></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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

<!-- Gallery -->
<div class="card mt-4">
    <div class="card-header pb-0 mb-2">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0">Galeri</h6>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addGalleryModal">
                Tambah Data
            </button>
        </div>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Section</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Foto</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deskripsi</th>
                    <th class="text-secondary opacity-7"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($event->galleries as $gallery)
                    <tr>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $gallery->section->name }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">
                            <img src="{{ asset('galleries/' . $gallery->photo) }}" alt="Foto Galeri" style="max-width: 100px;">
                        </td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $gallery->description }}</td>
                        <td class="align-middle">
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
</div>

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

    {{-- <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
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
    </div> --}}

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

    <!-- Modal Tambah Figure -->
    <div class="modal fade" id="addFigureModal" tabindex="-1" aria-labelledby="addFigureModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('figure.storeModal', ['id' => $event->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addFigureModalLabel">Tambah Tokoh Utama</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="fullname">Nama Lengkap</label>
                            <input type="text" class="form-control" name="fullname" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama Panggilan</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="fathers_name">Nama Ayah</label>
                            <input type="text" class="form-control" name="fathers_name" required>
                        </div>
                        <div class="form-group">
                            <label for="mothers_name">Nama Ibu</label>
                            <input type="text" class="form-control" name="mothers_name" required>
                        </div>
                        <div class="form-group">
                            <label for="ordinal_child_number" class="form-label">Anak ke-</label>
                            <input type="number" class="form-control" name="ordinal_child_number" required>
                        </div>
                        <div class="form-group">
                            <label for="photo">Foto</label>
                            <input type="file" class="form-control" name="photo" required>
                        </div>
                        <div class="form-group">
                            <label for="social_media">Media Sosial</label>
                            <input type="text" class="form-control" name="social_media" required>
                        </div>
                        <div class="form-group">
                            <label for="gender_id">Jenis Kelamis</label>
                            <select class="form-select" id="gender_id" name="gender_id" required>
                                @foreach ($genders as $gender)
                                    <option value="{{ $gender->id }}">
                                        {{ $gender->name }}
                                    </option>
                                @endforeach
                            </select>
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

    <!-- Modal Edit Figure -->
    @foreach ($event->figures as $figure)
        <div class="modal fade" id="editFigureModal{{ $figure->id }}" tabindex="-1" aria-labelledby="editFigureModalLabel{{ $figure->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <form id="editFigureForm{{ $figure->id }}" action="{{ route('figure.update', ['id' => $figure->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editFigureModalLabel{{ $figure->id }}">Edit Tokoh Utama</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Nama Lengkap -->
                            <div class="mb-3">
                                <label for="fullname" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="fullname" name="fullname" value="{{ old('fullname', $figure->fullname) }}" required>
                            </div>
                            <!-- Nama Panggilan -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Panggilan</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $figure->name) }}" required>
                            </div>
                            <!-- Nama Ayah -->
                            <div class="mb-3">
                                <label for="fathers_name" class="form-label">Nama Ayah</label>
                                <input type="text" class="form-control" id="fathers_name" name="fathers_name" value="{{ old('fathers_name', $figure->fathers_name) }}" required>
                            </div>
                            <!-- Nama Panggilan -->
                            <div class="mb-3">
                                <label for="mothers_name" class="form-label">Nama Ibu</label>
                                <input type="text" class="form-control" id="mothers_name" name="mothers_name" value="{{ old('mothers_name', $figure->mothers_name) }}" required>
                            </div>
                            <!-- Anak ke -->
                            <div class="mb-3">
                                <label for="ordinal_child_number" class="form-label">Anak ke-</label>
                                <input type="number" class="form-control" id="ordinal_child_number" name="ordinal_child_number" value="{{ old('ordinal_child_number', $figure->ordinal_child_number) }}" required>
                            </div>
                            <!-- Foto -->
                            <div class="mb-3">
                                <label for="photo" class="form-label">Foto</label>
                                <input type="file" id="photo" name="photo" class="form-control">
                                @if ($figure->photo)
                                    <div class="mt-2">
                                        <img src="{{ asset('figures/' . old('photo', $figure->photo)) }}" alt="Foto Tokoh Utama" style="width: 100px;">
                                    </div>
                                @endif
                            </div>
                            <!-- Media Sosial -->
                            <div class="mb-3">
                                <label for="social_media" class="form-label">Media Sosial</label>
                                <input type="text" class="form-control" id="social_media" name="social_media" value="{{ old('social_media', $figure->social_media) }}" required>
                            </div>
                            <!-- Jenis Kelamin -->
                            <div class="mb-3">
                                <label for="gender_id" class="form-label">Jenis Kelamin</label>
                                <select class="form-select bg-white" name="gender_id">
                                    @foreach($genders as $gender)
                                        <option value="{{ $gender->id }}" {{ $figure->gender_id == $gender->id ? 'selected' : '' }}>
                                            {{ $gender->name }}
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
    @endforeach

    <!-- Modal Tambah Card -->
    <div class="modal fade" id="addCardModal" tabindex="-1" aria-labelledby="addCardModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('card.storeModal', ['id' => $event->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCardModalLabel">Tambah Detail Acara</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="event_name">Nama Acara</label>
                            <input type="text" class="form-control" name="event_name" required>
                        </div>
                        <div class="form-group">
                            <label for="event_date">Tanggal</label>
                            <input type="date" class="form-control" name="event_date" required>
                        </div>
                        <div class="form-group">
                            <label for="event_time">Waktu</label>
                            <input type="time" class="form-control" name="event_time" required>
                        </div>
                        <div class="form-group">
                            <label for="location">Titik Lokasi</label>
                            <input type="text" class="form-control" name="location" required>
                        </div>
                        <div class="form-group">
                            <label for="full_location" class="form-label">Lokasi</label>
                            <input type="text" class="form-control" name="full_location" required>
                        </div>
                        <div class="form-group">
                            <label for="quota">Kuota</label>
                            <input type="number" class="form-control" name="quota" required>
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

    <!-- Modal Edit Figure -->
    @foreach ($event->eventCards as $card)
        <div class="modal fade" id="editCardModal{{ $card->id }}" tabindex="-1" aria-labelledby="editCardModalLabel{{ $card->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <form id="editCardForm{{ $card->id }}" action="{{ route('card.update', ['id' => $card->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editCardModalLabel{{ $card->id }}">Edit Detail</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Nama Acara -->
                            <div class="mb-3">
                                <label for="event_name" class="form-label">Nama Acara</label>
                                <input type="text" class="form-control" id="event_name" name="event_name" value="{{ old('event_name', $card->event_name) }}" required>
                            </div>
                            <!-- Tanggal -->
                            <div class="mb-3">
                                <label for="event_date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="event_date" name="event_date" value="{{ old('event_date', $card->event_date) }}" required>
                            </div>
                            <!-- Waktu -->
                            <div class="mb-3">
                                <label for="event_time" class="form-label">Waktu</label>
                                <input type="time" class="form-control" id="event_time" name="event_time" value="{{ old('event_time', $card->event_time) }}" required>
                            </div>
                            <!-- Titik Lokasi -->
                            <div class="mb-3">
                                <label for="location" class="form-label">Titik Lokasi</label>
                                <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $card->location) }}" required>
                            </div>
                            <!-- Lokasi -->
                            <div class="mb-3">
                                <label for="full_location" class="form-label">Lokasi</label>
                                <input type="text" class="form-control" id="full_location" name="full_location" value="{{ old('full_location', $card->full_location) }}" required>
                            </div>
                            <!-- Kuota -->
                            <div class="mb-3">
                                <label for="quota" class="form-label">Kuota</label>
                                <input type="number" class="form-control" id="quota" name="quota" value="{{ old('quota', $card->quota) }}" required>
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

@endsection

@section('footjs')
    @include('admin.layout.footer.admin')
@endsection