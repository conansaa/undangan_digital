@extends('layout.app')

@section('title', 'Data RSVP Acara')

@section('judul', 'RSVP Acara')

@section('content')

<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="row justify-content-between mb-3">
        <h5 class="col-12 col-lg-6 fw-bold">Data RSVP Acara</h5>
        <div class="col-12 col-lg-6 d-flex justify-content-end">
            <div class="me-2">
                <a href="createtamu" class="text-decoration-none btn btn-sm btn-success d-none d-lg-block">Tambah <i class="fa-solid fa-plus"></i></a>
                <a href="createtamu" class="text-decoration-none btn btn-sm btn-success d-lg-none d-block"><i class="fa-solid fa-plus"></i></a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    {{-- <th scope="col">Nama Acara</th> --}}
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
                        {{-- <td>{{ $rsvp->event->event_name }}</td> --}}
                        <td>{{ $rsvp->name }}</td>
                        <td>{{ $rsvp->phone_number }}</td>
                        <td>{{ $rsvp->confirmation}}</td>
                        <td>{{ $rsvp->total_guest }}</td>
                        <td class="text-center">
                            {{-- <a href="/rsvps/edit/{{ $rsvp->id }}"><i class="fa-regular fa-pen-to-square"></i></a> --}}
                            <a href="/rsvps/delete/{{ $rsvp->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="fa-regular fa-trash-can text-danger ms-lg-3"></i></a>
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
                                    <div class="col-6">{{ $rsvp->event_id }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Nama</div>
                                    <div class="col-6">{{ $rsvp->name }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">No. Telp</div>
                                    <div class="col-6">{{ $rsvp->phone_number }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Konfirmasi</div>
                                    <div class="col-6">{{ $rsvp->confirmation}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Total Guest</div>
                                    <div class="col-6">{{ $rsvp->total_guest }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
