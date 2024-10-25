@extends('admin.layout')

@section('title', 'Data Timeline Acara')

@section('judul', 'Timeline Acara')

@section('konten_admin')

<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="row justify-content-between mb-3">
        <h5 class="col-12 col-lg-6 fw-bold">Data Timeline Acara</h5>
        <div class="col-12 col-lg-6 d-flex justify-content-end">
            <div class="me-2">
                <a href="/timeline/create" class="text-decoration-none btn btn-sm btn-success d-none d-lg-block">Tambah <i class="fa-solid fa-plus"></i></a>
                <a href="/timeline/create" class="text-decoration-none btn btn-sm btn-success d-lg-none d-block"><i class="fa-solid fa-plus"></i></a>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col">Event ID</th>
                <th scope="col">Judul</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Foto</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($timelines as $timeline)
                <tr>
                    <th scope="col" class="text-center">{{ $loop->iteration }}</th>
                    <td scope="col">{{ $timeline->event_id }}</td> <!-- Menggunakan relasi ke tabel event_detail -->
                    <td scope="col">{{ $timeline->title }}</td>
                    <td scope="col">{{ \Carbon\Carbon::parse($timeline->date)->format('d M Y') }}</td> <!-- Mengonversi tanggal menjadi format yang lebih mudah dibaca -->
                    <td scope="col">{{ Str::limit($timeline->description, 50) }}</td> <!-- Membatasi deskripsi agar tidak terlalu panjang -->
                    <td scope="col">
                        <img src="{{ asset('storage/' . $timeline->photo) }}" alt="Foto Event" class="img-thumbnail" style="max-width: 100px;">
                    </td>
                    <td scope="col" class="text-center">
                        <a href="/timeline/edit/{{ $timeline->id }}"><span class="text-dark"><i class="fa-regular fa-pen-to-square"></i></span></a>
                        <a href="/timeline/delete/{{ $timeline->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="text-danger ms-lg-3"><i class="fa-regular fa-trash-can"></i></span></a>
                    </td>
                </tr>

                <!-- Modal Detail Event Timeline -->
                <div class="modal fade" id="detailEventTimeline{{ $timeline->id }}" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Detail Timeline Acara</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Event ID</div>
                                    <div class="col-6">{{ $timeline->event_id }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Judul</div>
                                    <div class="col-6">{{ $timeline->title }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Tanggal</div>
                                    <div class="col-6">{{ \Carbon\Carbon::parse($timeline->date)->format('d M Y') }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Deskripsi</div>
                                    <div class="col-6">{{ $timeline->description }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Foto</div>
                                    <div class="col-6">
                                        <img src="{{ asset('storage/' . $timeline->photo) }}" alt="Foto Event" class="img-thumbnail" style="max-width: 200px;">
                                    </div>
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
