@extends('admin.layout')

@section('title', 'Data RSVP Acara')

@section('judul', 'RSVP Acara')

@section('konten_admin')

<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="row justify-content-between mb-3">
        <h5 class="col-12 col-lg-6 fw-bold">Data RSVP Acara</h5>
        <div class="col-12 col-lg-6 d-flex justify-content-end">
            <div class="me-2">
                <a href="/rsvp/create" class="text-decoration-none btn btn-sm btn-success d-none d-lg-block">Tambah <i class="fa-solid fa-plus"></i></a>
                <a href="/rsvp/create" class="text-decoration-none btn btn-sm btn-success d-lg-none d-block"><i class="fa-solid fa-plus"></i></a>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col">Event ID</th>
                <th scope="col">Nama</th>
                <th scope="col">No. Telp</th>
                <th scope="col">Konfirmasi</th>
                <th scope="col">Total Guest</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rsvps as $rsvp)
                <tr>
                    <th scope="col" class="text-center">{{ $loop->iteration }}</th>
                    <td scope="col">{{ $rsvp->eventDetail->event_id }}</td> <!-- Menggunakan relasi ke tabel event_detail -->
                    <td scope="col">{{ $rsvp->name }}</td>
                    <td scope="col">{{ $rsvp->phone }}</td>
                    <td scope="col">{{ $rsvp->confirmation ? 'Yes' : 'No' }}</td> <!-- Menggunakan status konfirmasi (boolean) -->
                    <td scope="col">{{ $rsvp->total_guest }}</td>
                    <td scope="col" class="text-center">
                        <a href="/rsvp/edit/{{ $rsvp->id }}"><span class="text-dark"><i class="fa-regular fa-pen-to-square"></i></span></a>
                        <a href="/rsvp/delete/{{ $rsvp->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="text-danger ms-lg-3"><i class="fa-regular fa-trash-can"></i></span></a>
                    </td>
                </tr>

                <!-- Modal Detail RSVP -->
                <div class="modal fade" id="detailRsvp{{ $rsvp->id }}" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Detail RSVP Acara</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Event ID</div>
                                    <div class="col-6">{{ $rsvp->eventDetail->event_id }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Nama</div>
                                    <div class="col-6">{{ $rsvp->name }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">No. Telp</div>
                                    <div class="col-6">{{ $rsvp->phone }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Konfirmasi</div>
                                    <div class="col-6">{{ $rsvp->confirmation ? 'Yes' : 'No' }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Total Guest</div>
                                    <div class="col-6">{{ $rsvp->total_guest }}</div>
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