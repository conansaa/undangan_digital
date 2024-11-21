@extends('admin.layout')

@section('title', 'Data Detail Pengguna')

@section('judul', 'Detail Pengguna')

@section('konten_admin')

<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="row justify-content-between mb-3">
        <h5 class="col-12 col-lg-6 fw-bold">Data Detail Pengguna</h5>
        <div class="col-12 col-lg-6 d-flex justify-content-end">
            <div class="me-2">
                <a href="/user/create" class="text-decoration-none btn btn-sm btn-success d-none d-lg-block">Tambah <i class="fa-solid fa-plus"></i></a>
                <a href="/user/create" class="text-decoration-none btn btn-sm btn-success d-lg-none d-block"><i class="fa-solid fa-plus"></i></a>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Email Verified</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="col" class="text-center">{{ $loop->iteration }}</th>
                    <td scope="col">{{ $user->name }}</td>
                    <td scope="col">{{ $user->email }}</td>
                    <td scope="col">{{ $user->email_verified_at ? \Carbon\Carbon::parse($user->email_verified_at)->format('d M Y H:i') : '-' }}</td>
                    <td scope="col" class="text-center">
                        {{-- <a href="/user/edit/{{ $user->id }}"><span class="text-dark"><i class="fa-regular fa-pen-to-square"></i></span></a> --}}
                        <a href="/user/delete/{{ $user->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="text-danger"><i class="fa-regular fa-trash-can"></i></span></a>
                    </td>
                </tr>

                <!-- Modal Detail User -->
                <div class="modal fade" id="detailUser{{ $user->id }}" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Detail Pengguna</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Nama</div>
                                    <div class="col-6">{{ $user->name }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Email</div>
                                    <div class="col-6">{{ $user->email }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Email Verified</div>
                                    <div class="col-6">{{ $user->email_verified_at ? \Carbon\Carbon::parse($user->email_verified_at)->format('d M Y H:i') : '-' }}</div>
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
