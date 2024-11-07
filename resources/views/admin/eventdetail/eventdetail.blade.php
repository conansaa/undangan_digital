@extends('admin.layout')

@section('title', 'Data Detail Acara')

@section('judul', 'Detail Acara')

@section('konten_admin')

<div>
    <div class="row justify-content-between mb-3">
        <div class="col-24 col-lg-12 d-flex justify-content-end">
            <div class="me-2">
                <a href="/event/create" class="text-decoration-none btn btn-sm btn-success d-none d-lg-block">Tambah <i class="fa-solid fa-plus"></i></a>
                <a href="/event/create" class="text-decoration-none btn btn-sm btn-success d-lg-none d-block"><i class="fa-solid fa-plus"></i></a>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center" style="width: 5%;">No</th>
                <th scope="col" style="width: 15%;">Nama Pengguna</th>
                <th scope="col" style="width: 15%;">Nama Acara</th>
                <th scope="col" style="width: 15%;">Tipe Acara</th>
                <th scope="col" style="width: 10%;">Tanggal</th>
                <th scope="col" style="width: 10%;">Waktu</th>
                <th scope="col" style="width: 10%;">Lokasi</th>
                <th scope="col" style="width: 10%;">Kuota</th>
                <th scope="col" class="text-center" style="width: 10%;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <th class="text-center">{{ $loop->iteration }}</th>
                    <td>{{ $event->user->name }}</td>
                    <td>{{ $event->event_name }}</td>
                    <td>{{ $event->eventType->nama }}</td>
                    <td>{{ \Carbon\Carbon::parse($event->event_date)->format('d-m-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($event->event_time)->format('H:i') }}</td>
                    <td>{{ $event->location }}</td>
                    <td>{{ $event->quota }}</td>
                    <td class="text-center">
                        <a href="/event/edit/{{ $event->id }}"><span class="text-dark"><i class="fa-regular fa-pen-to-square"></i></span></a>
                        <button style="border: none; background: none;" data-bs-toggle="modal" data-bs-target="#viewEvent{{ $event->id }}"><span class="text-dark ms-3"><i class="fa-regular fa-eye"></i></span></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @foreach ($events as $event)
                <!-- Modal View Event -->
                <div class="modal fade" id="viewEvent{{ $event->id }}" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Detail Data Event - {{ $event->event_name }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Tabel Event Owner -->
                                <h5>Pemilik</h5>
                                <table class="table table-sm table-bordered mb-4">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $event->user->name }}</td>
                                            <td>{{ $event->user->email }}</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <!-- Tabel Event Type -->
                                <h5>Tipe Acara</h5>
                                <table class="table table-sm table-bordered mb-4">
                                    <thead>
                                        <tr>
                                            <th>Nama Tipe</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $event->eventType->nama }}</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <!-- Tabel Timeline -->
                                <h5>Timeline Acara</h5>
                                <table class="table table-sm table-bordered mb-4">
                                    <thead>
                                        <tr>
                                            <th>Judul</th>
                                            <th>Tanggal</th>
                                            <th>Deskripsi</th>
                                            <th>Foto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($event->timeline as $timeline)
                                            <tr>
                                                <td>{{ $timeline->title }}</td>
                                                <td>{{ \Carbon\Carbon::parse($timeline->date)->format('d M Y') }}</td>
                                                <td>{{ $timeline->description }}</td>
                                                <td><img src="{{ asset('storage/'.$timeline->photo) }}" alt="Foto" style="max-width: 150px;"></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <!-- Tabel RSVP -->
                                <h5>Data RSVP</h5>
                                <table class="table table-sm table-bordered mb-4">
                                    <thead>
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
                                <h5>Data Hadiah</h5>
                                <table class="table table-sm table-bordered mb-4">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Kategori</th>
                                            <th>Catatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($event->gifts as $gift)
                                            <tr>
                                                <td>{{ $gift->name }}</td>
                                                <td>{{ $gift->category }}</td>
                                                <td>{{ $gift->notes }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <!-- Tabel Gallery -->
                                <h5>Galeri Acara</h5>
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Section</th>
                                            <th>Foto</th>
                                            <th>Deskripsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($event->galleries as $gallery)
                                            <tr>
                                                <td>{{ $gallery->section->name }}</td>
                                                <td><img src="{{ asset('storage/' . $gallery->photo) }}" alt="Foto Galeri" style="max-width: 100px;"></td>
                                                <td>{{ $gallery->description }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Batas Modal --}}
            @endforeach

    <!-- Box Container with spacing and link buttons -->
    <div class="row gy-3">
        <!-- Tema Box -->
        {{-- <div class="col-md-6">
            <div class="p-3 border rounded shadow-sm bg-light">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fw-bold">Tema</span>
                    <a href="/themes" class="btn btn-link p-0 text-decoration-none">Lihat Detail</a>
                </div>
            </div>
        </div> --}}

        <!-- Pemilik Acara Box -->
        {{-- <div class="col-md-6">
            <div class="p-3 border rounded shadow-sm bg-light">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fw-bold">Pemilik Acara</span>
                    <a href="/owners" class="btn btn-link p-0 text-decoration-none">Lihat Detail</a>
                </div>
            </div>
        </div> --}}

        <!-- Tipe Acara Box -->
        <div class="col-md-6">
            <div class="p-3 border rounded shadow-sm bg-light">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fw-bold">Tipe Acara</span>
                    <a href="/event-type" class="btn btn-link p-0 text-decoration-none">Lihat Detail</a>
                </div>
            </div>
        </div>

        <!-- Timeline Acara Box -->
        <div class="col-md-6">
            <div class="p-3 border rounded shadow-sm bg-light">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fw-bold">Timeline Acara</span>
                    <a href="/timelines" class="btn btn-link p-0 text-decoration-none">Lihat Detail</a>
                </div>
            </div>
        </div>

        <!-- Data Reservasi Box -->
        <div class="col-md-6">
            <div class="p-3 border rounded shadow-sm bg-light">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fw-bold">Data Reservasi</span>
                    <a href="/rsvps" class="btn btn-link p-0 text-decoration-none">Lihat Detail</a>
                </div>
            </div>
        </div>

        <!-- Data Ucapan Box -->
        <div class="col-md-6">
            <div class="p-3 border rounded shadow-sm bg-light">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fw-bold">Data Ucapan</span>
                    <a href="/comments" class="btn btn-link p-0 text-decoration-none">Lihat Detail</a>
                </div>
            </div>
        </div>

        <!-- Hadiah Box -->
        <div class="col-md-6">
            <div class="p-3 border rounded shadow-sm bg-light">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fw-bold">Hadiah</span>
                    <a href="/gifts" class="btn btn-link p-0 text-decoration-none">Lihat Detail</a>
                </div>
            </div>
        </div>

        <!-- Sections Box -->
        <div class="col-md-6">
            <div class="p-3 border rounded shadow-sm bg-light">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fw-bold">Sections</span>
                    <a href="/sections" class="btn btn-link p-0 text-decoration-none">Lihat Detail</a>
                </div>
            </div>
        </div>

        <!-- Galeri Acara Box -->
        <div class="col-md-6">
            <div class="p-3 border rounded shadow-sm bg-light">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fw-bold">Galeri Acara</span>
                    <a href="/galleries" class="btn btn-link p-0 text-decoration-none">Lihat Detail</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
