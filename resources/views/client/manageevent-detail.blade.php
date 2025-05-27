@extends('admin.layout.template')

@section('pages', 'Acara')
@section('pagestitle', 'Kelola Acara')

@section('sidebar')
    @include('client.layout')
@endsection

@section('content')
<div class="container mt-4">
    <a href="/manage-event" class="btn btn-sm btn-outline-danger fw-bold me-2 mb-4">Kembali</a>
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h6 class="mb-0">{{ $event->event_name }} - Detail</h6>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs" id="manageEventTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#figures" type="button">Tokoh Utama</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#eventcards" type="button">Detail Acara</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#timeline" type="button">Timeline</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#media" type="button">Media</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#gifts" type="button">Hadiah</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#gallery" type="button">Galeri</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#payment" type="button">Pembayaran</button>
                </li>
            </ul>

            <div class="tab-content mt-4">
                <!-- Figures -->
                <div class="tab-pane fade show active" id="figures">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="mb-0">Tokoh Utama Acara</h6>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addFigureModal">
                            Tambah Tokoh
                        </button>
                    </div>
                    @forelse ($event->figures as $figure)
                        <div class="card mb-4 shadow-sm">
                            <div class="position-absolute top-0 end-0 p-2">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#editFigureModal{{ $figure->id }}">
                                    <span class="text-dark"><i class="fas fa-edit"></i></span>
                                </a>
                                <a href="/manageevent/figure/delete/{{ $figure->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="text-danger ms-lg-3"><i class="fa-regular fa-trash-can"></i></span></a>
                            </div>
                            
                            <div class="row g-0">
                                <div class="col-md-4 text-center d-flex align-items-center justify-content-center p-3">
                                    @if ($figure->photo)
                                        <img src="{{ asset('figures/' . $figure->photo) }}" class="img-fluid rounded" alt="Foto {{ $figure->name }}" style="max-height: 250px; object-fit: cover;">
                                    @else
                                        <div class="bg-light d-flex align-items-center justify-content-center rounded" style="height: 200px;">
                                            <span class="text-muted">Tidak ada foto</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-8 p-3">
                                    <table class="table table-borderless align-middle small w-auto d-flex align-items-center h-100">
                                        <tbody>
                                            <tr>
                                                <td ><strong>Nama Lengkap</strong></td>
                                                <td>:</td>
                                                <td>{{ $figure->fullname }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Nama Panggilan</strong></td>
                                                <td>:</td>
                                                <td>{{ $figure->name }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Nama Ayah</strong></td>
                                                <td>:</td>
                                                <td>{{ $figure->fathers_name }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Nama Ibu</strong></td>
                                                <td>:</td>
                                                <td>{{ $figure->mothers_name }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Anak ke-</strong></td>
                                                <td>:</td>
                                                <td>{{ $figure->ordinal_child_number }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Media Sosial</strong></td>
                                                <td>:</td>
                                                <td>{{ $figure->social_media }}</td>
                                            </tr>
                                            
                                            <tr>
                                                <td><strong>Jenis Kelamin</strong></td>
                                                <td>:</td>
                                                <td>{{ $figure->gender->name }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>Belum ada data tokoh.</p>
                    @endforelse
                </div>                

                <!-- Event Cards -->
                <div class="tab-pane fade" id="eventcards">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="mb-0">Detail Acara</h6>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addCardModal">
                            Tambah Detail Acara
                        </button>
                    </div>
                    @forelse ($event->eventCards as $card)
                        <div class="card mb-4 shadow-sm g-0">
                            <div class="position-absolute top-0 end-0 p-2">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#editCardModal{{ $card->id }}">
                                    <span class="text-dark"><i class="fas fa-edit"></i></span>
                                </a>
                                <a href="/manageevent/card/delete/{{ $card->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="text-danger ms-lg-3"><i class="fa-regular fa-trash-can"></i></span></a>
                            </div>
                            
                            <div class="p-3 d-flex align-items-center h-100">
                                <table class="table table-borderless align-middle small w-auto m-0">
                                    <tbody>
                                        <tr>
                                            <td ><strong>Nama Acara</strong></td>
                                            <td>:</td>
                                            <td>{{ $card->event_name }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal</strong></td>
                                            <td>:</td>
                                            <td>{{ $card->event_date }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Waktu</strong></td>
                                            <td>:</td>
                                            <td>{{ $card->event_time }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Titik Lokasi</strong></td>
                                            <td>:</td>
                                            <td>{{ $card->location }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Lokasi</strong></td>
                                            <td>:</td>
                                            <td>{{ $card->full_location }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Kuota Tamu</strong></td>
                                            <td>:</td>
                                            <td>{{ $card->quota }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @empty
                        <p>Belum ada event cards.</p>
                    @endforelse
                </div>

                <!-- Timeline -->
                <div class="tab-pane fade" id="timeline">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="mb-0">Timeline</h6>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addTimelineModal">
                            Tambah Timeline/Cerita
                        </button>
                    </div>
                    @forelse ($event->timeline as $item)
                        <div class="card mb-4 shadow-sm">
                            <div class="position-absolute top-0 end-0 p-2">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#editTimelineModal{{ $item->id }}">
                                    <span class="text-dark"><i class="fas fa-edit"></i></span>
                                </a>
                                <a href="/manageevent/timeline/delete/{{ $item->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="text-danger ms-lg-3"><i class="fa-regular fa-trash-can"></i></span></a>
                            </div>
                            
                            <div class="row g-0">
                                <div class="col-md-4 text-center d-flex align-items-center justify-content-center p-3">
                                    @if ($item->photo)
                                        <img src="{{ asset('timelines/' . $item->photo) }}" class="img-fluid rounded" alt="Foto {{ $item->title }}" style="max-height: 200px; object-fit: cover;">
                                    @else
                                        <div class="bg-light d-flex align-items-center justify-content-center rounded" style="height: 200px;">
                                            <span class="text-muted">Tidak ada foto</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-8 p-3">
                                    <table class="table table-borderless align-middle small w-auto d-flex align-items-center h-100">
                                        <tbody>
                                            <tr>
                                                <td ><strong>Judul</strong></td>
                                                <td>:</td>
                                                <td>{{ $item->title }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tanggal</strong></td>
                                                <td>:</td>
                                                <td>{{ \Carbon\Carbon::parse($item->date)->translatedFormat('d F Y') }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Deskripsi</strong></td>
                                                <td>:</td>
                                                <td class="text-wrap text-break" style="max-width: 600px; text-align: justify;">{{ $item->description }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>Belum ada timeline/cerita.</p>
                    @endforelse
                </div>

                <!-- Media Assets -->
                <div class="tab-pane fade" id="media">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="mb-0">Media</h6>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addMediaModal">
                            Tambah Media
                        </button>
                    </div>
                    @forelse ($event->mediaAssets as $media)
                        <div class="card mb-4 shadow-sm">
                            <div class="position-absolute top-0 end-0 p-2">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#editMediaModal{{ $media->id }}">
                                    <span class="text-dark"><i class="fas fa-edit"></i></span>
                                </a>
                                <a href="/manageevent/media/delete/{{ $media->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="text-danger ms-lg-3"><i class="fa-regular fa-trash-can"></i></span></a>
                            </div>
                            
                            <div class="row g-0">
                                <div class="col-md-4 text-center d-flex align-items-center justify-content-center p-3">
                                    @if ($media->photo)
                                        <img src="{{ asset('media/' . $media->photo) }}" class="img-fluid rounded" style="max-height: 150px; object-fit: cover;">
                                    @else
                                        <div class="bg-light d-flex align-items-center justify-content-center rounded" style="height: 200px;">
                                            <span class="text-muted">Tidak ada foto</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-8 p-3">
                                    <table class="table table-borderless align-middle small w-auto d-flex align-items-center h-100">
                                        <tbody>
                                            <tr>
                                                <td ><strong>Link Media</strong></td>
                                                <td>:</td>
                                                <td>{{ $media->link }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>Belum ada media.</p>
                    @endforelse
                </div>

                <!-- Gifts -->
                <div class="tab-pane fade" id="gifts">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="mb-0">Hadiah</h6>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addGiftModal">
                            Tambah Hadiah
                        </button>
                    </div>
                    @forelse ($event->gifts as $gift)
                        {{-- <p>{{ $gift->type }} - {{ $gift->description }}</p> --}}
                        <div class="card mb-4 shadow-sm g-0">
                            <div class="position-absolute top-0 end-0 p-2">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#editHadiahModal{{ $gift->id }}">
                                    <span class="text-dark"><i class="fas fa-edit"></i></span>
                                </a>
                                <a href="/manageevent/gift/delete/{{ $gift->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="text-danger ms-lg-3"><i class="fa-regular fa-trash-can"></i></span></a>
                            </div>
                            
                            <div class="p-3 d-flex align-items-center h-100">
                                <table class="table table-borderless align-middle small w-auto m-0">
                                    <tbody>
                                        <tr>
                                            <td ><strong>Nama</strong></td>
                                            <td>:</td>
                                            <td>{{ $gift->name }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Kategori</strong></td>
                                            <td>:</td>
                                            <td>{{ $gift->category }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Catatan</strong></td>
                                            <td>:</td>
                                            <td>{{ $gift->notes }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @empty
                        <p>Belum ada data hadiah.</p>
                    @endforelse
                </div>

                <!-- Gallery -->
                <div class="tab-pane fade" id="gallery">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="mb-0">Galeri</h6>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addGiftModal">
                            Tambah Hadiah
                        </button>
                    </div>
                    <div class="row">
                        @forelse ($event->galleries as $photo)
                            <div class="col-md-3 mb-3 position-relative">
                                <img src="{{ asset('galleries/' . $photo->photo) }}" class="img-fluid rounded">
                            
                                <div class="position-absolute top-0 end-0 p-1 d-flex gap-2">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#editGalleryModal{{ $photo->id }}">
                                        <i class="fas fa-edit text-white bg-dark bg-opacity-75 rounded p-1"></i>
                                    </a>
                                    <a  onclick="return confirm('Yakin hapus foto ini?')">
                                        <i class="fas fa-trash text-danger bg-white bg-opacity-75 rounded p-1"></i>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <p>Belum ada foto galeri.</p>
                        @endforelse
                    </div>
                </div>                

                <!-- Payment -->
                <div class="tab-pane fade" id="payment">
                    <h6 class="mb-0">Detail Pembayaran</h6>
                        <div class="card mb-4 shadow-sm g-0">
                            {{-- <div class="p-3 d-flex align-items-center h-100">
                                <table class="table table-borderless align-middle small w-auto m-0">
                                    <tbody>
                                        <tr>
                                            <td ><strong>Total Harga yang DIbayar</strong></td>
                                            <td>:</td>
                                            <td>Rp {{ number_format($event->payment->amount, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Status</strong></td>
                                            <td>:</td>
                                            <td>
                                                @if ($event->payment && $event->payment->payment_status === 'verified')
                                                    Lunas
                                                @elseif ($event->payment && $event->payment->payment_status === 'pending')
                                                    Menunggu Verifikasi
                                                @elseif ($event->payment && $event->payment->payment_status === 'rejected')
                                                    Ditolak
                                                @else
                                                    Belum Bayar
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> --}}
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <!-- Kolom Kiri: Tabel Detail -->
                                    <div class="col-md-6">
                                        <table class="table table-borderless align-middle small w-auto m-0">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Total Harga yang Dibayar</strong></td>
                                                    <td>:</td>
                                                    <td>Rp {{ number_format($event->payment->amount, 0, ',', '.') }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Status</strong></td>
                                                    <td>:</td>
                                                    <td>
                                                        @if ($event->payment && $event->payment->payment_status === 'verified')
                                                            Lunas
                                                        @elseif ($event->payment && $event->payment->payment_status === 'pending')
                                                            Menunggu Verifikasi
                                                        @elseif ($event->payment && $event->payment->payment_status === 'rejected')
                                                            Ditolak
                                                        @else
                                                            Belum Bayar
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                    
                                    <!-- Kolom Kanan: Gambar Bukti Pembayaran -->
                                    <div class="col-md-6 text-center">
                                        @if ($event->payment && $event->payment->payment_proof)
                                            <img src="{{ asset('payment_proof/' . $event->payment->payment_proof) }}" 
                                                 alt="Bukti Pembayaran" 
                                                 class="img-fluid rounded shadow-sm" 
                                                 style="max-height: 200px;">
                                        @else
                                            <small class="text-muted">Belum ada bukti pembayaran.</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Figure -->
<div class="modal fade" id="addFigureModal" tabindex="-1" aria-labelledby="addFigureModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('figure.storeModalClient', $event->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addFigureModalLabel">Tambah Tokoh Utama</h5>
                    <button type="button" class="btn-close" style="filter: invert(1);" data-bs-dismiss="modal" aria-label="Close"></button>
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
        <form id="editFigureForm{{ $figure->id }}" action="{{ route('figure.updateModalClient', ['id' => $figure->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editFigureModalLabel{{ $figure->id }}">Edit Tokoh Utama</h5>
                    <button type="button" class="btn-close" style="filter: invert(1);" data-bs-dismiss="modal" aria-label="Close"></button>
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
            <form action="{{ route('card.storeModalClient', $event->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addCardModalLabel">Tambah Detail Acara</h5>
                    <button type="button" class="btn-close" style="filter: invert(1);" data-bs-dismiss="modal" aria-label="Close"></button>
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

<!-- Modal Edit Card -->
@foreach ($event->eventCards as $card)
    <div class="modal fade" id="editCardModal{{ $card->id }}" tabindex="-1" aria-labelledby="editCardModalLabel{{ $card->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <form id="editCardForm{{ $card->id }}" action="{{ route('card.updateClient', ['id' => $card->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCardModalLabel{{ $card->id }}">Edit Card</h5>
                        <button type="button" class="btn-close" style="filter: invert(1);" data-bs-dismiss="modal" aria-label="Close"></button>
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

<!-- Modal Tambah TImeline -->
<div class="modal fade" id="addTimelineModal" tabindex="-1" aria-labelledby="addTimelineModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('timeline.storeModalClient', $event->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addTimelineModalLabel">Tambah Timeline</h5>
                    <button type="button" class="btn-close" style="filter: invert(1);" data-bs-dismiss="modal" aria-label="Close"></button>
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
            <form id="editTimelineForm{{ $timeline->id }}" action="{{ route('timeline.updateClient', ['id' => $timeline->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editTimelineModalLabel{{ $timeline->id }}">Edit Timeline</h5>
                        <button type="button" class="btn-close" style="filter: invert(1);" data-bs-dismiss="modal" aria-label="Close"></button>
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

<!-- Modal Tambah Media -->
<div class="modal fade" id="addMediaModal" tabindex="-1" aria-labelledby="addMediaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('media.storeModalClient', $event->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addMediaModalLabel">Tambah Media</h5>
                    <button type="button" class="btn-close" style="filter: invert(1);" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="photo">Foto</label>
                        <input type="file" class="form-control" name="photo" required>
                    </div>
                    <div class="form-group">
                        <label for="link">Link</label>
                        <input type="text" class="form-control" name="link" required>
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

<!-- Modal Edit Media -->
@foreach ($event->mediaAssets as $media)
    <div class="modal fade" id="editMediaModal{{ $media->id }}" tabindex="-1" aria-labelledby="editMediaModalLabel{{ $media->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <form id="editMediaForm{{ $media->id }}" action="{{ route('media.updateClient', ['id' => $media->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editMediaModalLabel{{ $media->id }}">Edit Media</h5>
                        <button type="button" class="btn-close" style="filter: invert(1);" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Foto -->
                        <div class="mb-3">
                            <label for="photo" class="form-label">Foto</label>
                            <input type="file" id="photo" name="photo" class="form-control">
                            @if ($media->photo)
                                <div class="mt-2">
                                    <img src="{{ asset('media/' . old('photo', $media->photo)) }}" alt="Foto Media" style="width: 100px;">
                                </div>
                            @endif
                        </div>
                        <!-- Link -->
                        <div class="mb-3">
                            <label for="link" class="form-label">Link</label>
                            <input type="text" class="form-control" id="link" name="link" value="{{ old('Link', $media->link) }}" required>
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

<!-- Modal Tambah Hadiah -->
<div class="modal fade" id="addGiftModal" tabindex="-1" aria-labelledby="addGiftModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('gift.storeGiftClient', ['id' => $event->id]) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addGiftModalLabel">Tambah Hadiah</h5>
                    <button type="button" class="btn-close" style="filter: invert(1);" data-bs-dismiss="modal" aria-label="Close"></button>
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
            <form id="editHadiahForm{{ $gift->id }}" action="{{ route('gift.updateClient', ['id' => $gift->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editHadiahModalLabel{{ $gift->id }}">Edit Hadiah</h5>
                        <button type="button" class="btn-close" style="filter: invert(1);" data-bs-dismiss="modal" aria-label="Close"></button>
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Buka tab terakhir yang disimpan di localStorage
        const lastTab = localStorage.getItem("activeTab");
        if (lastTab) {
            const triggerEl = document.querySelector(`button[data-bs-target="${lastTab}"]`);
            if (triggerEl) {
                new bootstrap.Tab(triggerEl).show();
            }
        }

        // Simpan tab aktif ke localStorage setiap kali tab berubah
        const tabButtons = document.querySelectorAll('button[data-bs-toggle="tab"]');
        tabButtons.forEach(btn => {
            btn.addEventListener('shown.bs.tab', function (e) {
                const target = e.target.getAttribute("data-bs-target");
                localStorage.setItem("activeTab", target);
            });
        });
    });
</script>

@endsection

@section('footjs')
    @include('admin.layout.footer.admin')
@endsection
