@extends('admin.layout')

@section('title', 'Data Pemilik Acara')

@section('judul', 'Pemilik Acara')

@section('konten_admin')

<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="row justify-content-between mb-3">
        <h5 class="col-12 col-lg-6 fw-bold">Data Pemilik Acara</h5>
        <div class="col-12 col-lg-6 d-flex justify-content-end">
            <div class="me-2">
                <a href="/eventowner/create" class="text-decoration-none btn btn-sm btn-success d-none d-lg-block">Tambah <i class="fa-solid fa-plus"></i></a>
                <a href="/eventowner/create" class="text-decoration-none btn btn-sm btn-success d-lg-none d-block"><i class="fa-solid fa-plus"></i></a>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col">Nama Pemilik Acara</th>
                <th scope="col">Nama Orangtua</th>
                <th scope="col">Foto</th>
                <th scope="col">Sosial Media</th>
                <th scope="col">Gender</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eventOwner as $owner)
                <tr>
                    <th scope="col" class="text-center">{{ $loop->iteration }}</th>
                    <td scope="col">
                        <a type="button" class="fw-bold text-decoration-none" data-bs-toggle="modal" data-bs-target="#detailOwner{{ $owner->id }}">{{ $owner->name }}</a>
                    </td>
                    <td scope="col">{{ $owner->parent_name }}</td>
                    <td scope="col">
                        @if (empty($owner->profile))
                            <span class="text-secondary">Tidak ada foto</span>
                        @else
                            <img src="{{ asset('./storage/profile/' . $owner->profile) }}" alt="Profil {{ $owner->name }}" style="width: 50px; height: 50px; background-size: cover" class="rounded-circle">
                        @endif
                    </td>
                    <td scope="col">{{ $owner->social_media }}</td>
                    <td scope="col">{{ $owner->gender }}</td>
                    <td scope="col" class="text-center">
                        <a href="/eventowner/edit/{{ $owner->id }}"><span class="text-dark"><i class="fa-regular fa-pen-to-square"></i></span></a>
                        <a href="/eventowner/delete/{{ $owner->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="text-danger ms-lg-3"><i class="fa-regular fa-trash-can"></i></span></a>
                    </td>
                </tr>

                <!-- Modal Detail Owner -->
                <div class="modal fade" id="detailOwner{{ $owner->id }}" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Profile Event Owner</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center mb-5">
                                    @if (empty($owner->profile))
                                        <h1><i class="fa-regular fa-user bg-white shadow-sm rounded-circle p-5"></i></h1>
                                    @else
                                        <img src="{{ asset('./storage/profile/' . $owner->profile) }}" alt="Profil {{ $owner->name }}" style="width: 150px; height: 150px; background-size: cover" class="rounded-circle shadow my-5">
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Nama Lengkap</div>
                                    <div class="col-6">{{ $owner->name }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Email</div>
                                    <div class="col-6">{{ $owner->email }}</div>
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
