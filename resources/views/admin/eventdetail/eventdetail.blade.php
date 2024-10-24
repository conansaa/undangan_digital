@extends('admin.layout')

@section('title', 'Data Detail Acara')

@section('judul', 'Detail Acara')

@section('konten_admin')

<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="row justify-content-between mb-3">
        <h5 class="col-12 col-lg-6 fw-bold">Data Detail Acara</h5>
        <div class="col-12 col-lg-6 d-flex justify-content-end">
            <div class="me-2">
                <a href="/event/create" class="text-decoration-none btn btn-sm btn-success d-none d-lg-block">Tambah <i class="fa-solid fa-plus"></i></a>
                <a href="/event/create" class="text-decoration-none btn btn-sm btn-success d-lg-none d-block"><i class="fa-solid fa-plus"></i></a>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col">Nama Pengguna</th>
                <th scope="col">Nama Event</th>
                <th scope="col">Tipe Event</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Waktu</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Kuota</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <th scope="col" class="text-center">{{ $loop->iteration }}</th>
                    <td scope="col">{{ $event->user->name }}</td>
                    <td scope="col">{{ $event->event_name }}</td>
                    <td scope="col">{{ $event->eventType->nama }}</td> <!-- Menggunakan relasi ke tabel event_type_ref -->
                    <td scope="col">{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</td>
                    <td scope="col">{{ \Carbon\Carbon::parse($event->event_time)->format('H:i') }}</td>
                    <td scope="col">{{ $event->location }}</td>
                    <td scope="col">{{ $event->quota }}</td>
                    <td scope="col" class="text-center">
                        <a href="/event/edit/{{ $event->id }}"><span class="text-dark"><i class="fa-regular fa-pen-to-square"></i></span></a>
                        <a href="/event/delete/{{ $event->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="text-danger ms-lg-3"><i class="fa-regular fa-trash-can"></i></span></a>
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
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Nama Event</div>
                                    <div class="col-6">{{ $event->event_name }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Tipe Event</div>
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
</div>

@endsection
