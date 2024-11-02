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
                <th scope="col" style="width: 15%;">Lokasi</th>
                <th scope="col" style="width: 10%;">Kuota</th>
                <th scope="col" class="text-center" style="width: 5%;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <th class="text-center">{{ $loop->iteration }}</th>
                    <td>{{ $event->user->name }}</td>
                    <td>{{ $event->event_name }}</td>
                    <td>{{ $event->eventType->nama }}</td> <!-- Menggunakan relasi ke tabel event_type_ref -->
                    <td>{{ \Carbon\Carbon::parse($event->event_date)->format('d-m-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($event->event_time)->format('H:i') }}</td>
                    <td>{{ $event->location }}</td>
                    <td>{{ $event->quota }}</td>
                    <td class="text-center">
                        <a href="/event/edit/{{ $event->id }}"><span class="text-dark"><i class="fa-regular fa-pen-to-square"></i></span></a>
                        {{-- <a href="/event/delete/{{ $event->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="text-danger ms-lg-3"><i class="fa-regular fa-trash-can"></i></span></a> --}}
                    </td>
                </tr>

                <!-- Modal Detail Event -->
                <div class="modal fade" id="detailEvent{{ $event->id }}" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Detail Event</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Nama Pemilik</div>
                                    <div class="col-6">{{ $event->user->name }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Nama Acara</div>
                                    <div class="col-6">{{ $event->event_name }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Tipe Acara</div>
                                    <div class="col-6">{{ $event->eventType->nama }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Tanggal</div>
                                    <div class="col-6">{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Waktu</div>
                                    <div class="col-6">{{ \Carbon\Carbon::parse($event->event_time)->format('H:i') }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Lokasi</div>
                                    <div class="col-6">{{ $event->location }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Kuota</div>
                                    <div class="col-6">{{ $event->quota }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Batas Modal --}}
            @endforeach
        </tbody>
    </table>
    <!-- Box Container with spacing and link buttons -->
    <div class="row gy-3">
        <!-- Tema Box -->
        <div class="col-md-6">
            <div class="p-3 border rounded shadow-sm bg-light">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fw-bold">Tema</span>
                    <a href="/themes" class="btn btn-link p-0 text-decoration-none">Lihat Detail</a>
                </div>
            </div>
        </div>

        <!-- Pemilik Acara Box -->
        <div class="col-md-6">
            <div class="p-3 border rounded shadow-sm bg-light">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fw-bold">Pemilik Acara</span>
                    <a href="/owners" class="btn btn-link p-0 text-decoration-none">Lihat Detail</a>
                </div>
            </div>
        </div>

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
