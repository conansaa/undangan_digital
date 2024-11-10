@extends('client.layout')

@section('title', 'Comment')

@section('judul', 'Data Ucapan')

@section('konten_client')

<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="row justify-content-between mb-3">
        <h5 class="col-12 col-lg-6 fw-bold">List Data Ucapan</h5>
        <div class="col-12 col-lg-6 d-flex justify-content-end">
            {{-- <div class="me-2">
                <a href="/comment/create" class="text-decoration-none btn btn-sm btn-success d-none d-lg-block">Tambah <i class="fa-solid fa-plus"></i></a>
                <a href="/comment/create" class="text-decoration-none btn btn-sm btn-success d-lg-none d-block"><i class="fa-solid fa-plus"></i></a>
            </div> --}}
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col">Nama Tamu</th>
                    <th scope="col">Komentar</th>
                    {{-- <th scope="col" class="text-center">Aksi</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $greeting)
                    <tr>
                        <th scope="col" class="text-center">{{ $loop->iteration }}</th>
                        <td scope="col">{{ $greeting->rsvp->name }}</td>
                        <td scope="col">{{ $greeting->comment }}</td>
                        {{-- <td scope="col" class="text-center">
                            <a href="/comment/edit/{{ $greeting->id }}"><span class="text-dark"><i class="fa-regular fa-pen-to-square"></i></span></a>
                            <a href="/comment/delete/{{ $greeting->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="text-danger ms-lg-3"><i class="fa-regular fa-trash-can"></i></span></a>
                        </td> --}}
                    </tr>

                    <!-- Modal Detail Ucapan -->
                    <div class="modal fade" id="detailGreeting{{ $greeting->id }}" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Detail Ucapan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-5 col-md-4 label fw-bold mb-3">Nama Tamu</div>
                                        <div class="col-6">{{ $greeting->rsvp->name }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5 col-md-4 label fw-bold mb-3">Komentar</div>
                                        <div class="col-6">{{ $greeting->comment }}</div>
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
</div>

@endsection
