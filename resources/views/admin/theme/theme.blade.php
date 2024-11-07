@extends('admin.layout')

@section('title', 'Data Tema Acara')

@section('judul', 'Tema Acara')

@section('konten_admin')

<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="row justify-content-between mb-3">
        <h5 class="col-12 col-lg-6 fw-bold">Data Tema Acara</h5>
        <div class="col-12 col-lg-6 d-flex justify-content-end">
            <div class="me-2">
                <a href="/themes/create" class="text-decoration-none btn btn-sm btn-success d-none d-lg-block">Tambah <i class="fa-solid fa-plus"></i></a>
                <a href="/themes/create" class="text-decoration-none btn btn-sm btn-success d-lg-none d-block"><i class="fa-solid fa-plus"></i></a>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col">Nama Acara</th>
                <th scope="col">Nama Tema</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Maksimal Gambar</th>
                <th scope="col">Tag</th>
                <th scope="col">Kategori</th>
                <th scope="col">Warna</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($themes as $theme)
                <tr>
                    <th scope="col" class="text-center">{{ $loop->iteration }}</th>
                    <td scope="col">{{ $theme->event->event_name }}</td> 
                    <td scope="col">{{ $theme->name }}</td>
                    <td scope="col">{{ Str::limit($theme->description, 50) }}</td>
                    <td scope="col">{{ $theme->max_images }}</td>
                    <td scope="col">{{ $theme->tag }}</td> 
                    <td scope="col">{{ $theme->category->name }}</td> 
                    <td scope="col"><span style="background-color: {{ $theme->color }}; padding: 2px 10px; border-radius: 5px;">{{ $theme->color }}</span></td>
                    <td scope="col" class="text-center">
                        <a href="/themes/edit/{{ $theme->id }}"><span class="text-dark"><i class="fa-regular fa-pen-to-square"></i></span></a>
                        <a href="/themes/delete/{{ $theme->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="text-danger ms-lg-3"><i class="fa-regular fa-trash-can"></i></span></a>
                    </td>
                </tr>

                <!-- Modal Detail Theme -->
                <div class="modal fade" id="detailTheme{{ $theme->id }}" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Detail Tema Acara</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Event ID</div>
                                    <div class="col-6">{{ $theme->event->event_name }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Nama Tema</div>
                                    <div class="col-6">{{ $theme->name }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Deskripsi</div>
                                    <div class="col-6">{{ $theme->description }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Maksimal Gambar</div>
                                    <div class="col-6">{{ $theme->max_images }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Tag</div>
                                    <div class="col-6">{{ $theme->tag }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Kategori</div>
                                    <div class="col-6">{{ $theme->category }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Warna</div>
                                    <div class="col-6"><span style="background-color: {{ $theme->color }}; padding: 2px 10px; border-radius: 5px;">{{ $theme->color }}</span></div>
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
