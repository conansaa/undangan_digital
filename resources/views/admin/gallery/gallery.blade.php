@extends('admin.layout')

@section('title', 'Data Galeri Acara')

@section('judul', 'Galeri Acara')

@section('konten_admin')

<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="row justify-content-between mb-3">
        <h5 class="col-12 col-lg-6 fw-bold">Data Galeri Acara</h5>
        <div class="col-12 col-lg-6 d-flex justify-content-end">
            <div class="me-2">
                <a href="/gallery/create" class="text-decoration-none btn btn-sm btn-success d-none d-lg-block">Tambah <i class="fa-solid fa-plus"></i></a>
                <a href="/gallery/create" class="text-decoration-none btn btn-sm btn-success d-lg-none d-block"><i class="fa-solid fa-plus"></i></a>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col">Event ID</th>
                <th scope="col">Section ID</th>
                <th scope="col">Foto</th>
                <th scope="col">Deskripsi</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($galleries as $gallery)
                <tr>
                    <th scope="col" class="text-center">{{ $loop->iteration }}</th>
                    <td scope="col">{{ $gallery->event_id }}</td>
                    <td scope="col">{{ $gallery->section->name }}</td> <!-- Menggunakan relasi ke tabel section ref -->
                    <td scope="col"><img src="{{ asset('storage/'.$gallery->photo) }}" alt="Foto Galeri" style="max-width: 150px;"></td>
                    <td scope="col">{{ $gallery->description }}</td>
                    <td scope="col" class="text-center">
                        <a href="/gallery/edit/{{ $gallery->id }}"><span class="text-dark"><i class="fa-regular fa-pen-to-square"></i></span></a>
                        <a href="/gallery/delete/{{ $gallery->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="text-danger ms-lg-3"><i class="fa-regular fa-trash-can"></i></span></a>
                    </td>
                </tr>

                <!-- Modal Detail Galeri -->
                <div class="modal fade" id="detailGallery{{ $gallery->id }}" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Detail Galeri</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Event ID</div>
                                    <div class="col-6">{{ $gallery->event_id }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Section ID</div>
                                    <div class="col-6">{{ $gallery->section->name }}</div> <!-- Relasi ke Section -->
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Foto</div>
                                    <div class="col-6"><img src="{{ asset('storage/'.$gallery->photo) }}" alt="Foto Galeri" style="max-width: 150px;"></div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Deskripsi</div>
                                    <div class="col-6">{{ $gallery->description }}</div>
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
