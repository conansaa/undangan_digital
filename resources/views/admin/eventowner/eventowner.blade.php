@extends('admin.layout')

@section('title', 'Data Pemilik Acara')

@section('judul', 'Pemilik Acara')

@section('konten_admin')

<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="row justify-content-between mb-3">
        <h5 class="col-12 col-lg-6 fw-bold">Data Pemilik Acara</h5>
        <div class="col-12 col-lg-6 d-flex justify-content-end">
            <div class="me-2">
                <a href="/owner/create" class="text-decoration-none btn btn-sm btn-success d-none d-lg-block">Tambah <i class="fa-solid fa-plus"></i></a>
                <a href="/owner/create" class="text-decoration-none btn btn-sm btn-success d-lg-none d-block"><i class="fa-solid fa-plus"></i></a>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center">No</th>
                {{-- <th scope="col">Nama Acara</th> --}}
                <th scope="col">Nama Pengguna</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eventOwner as $owner)
                <tr>
                    <th scope="col" class="text-center">{{ $loop->iteration }}</th>
                    {{-- <td scope="col">{{ $owner->event->event_name }}</td> --}}
                    <td scope="col">{{ $owner->user->name }}</td>
                    <td scope="col" class="text-center">
                        <a href="/owners/edit/{{ $owner->id }}"><span class="text-dark"><i class="fa-regular fa-pen-to-square"></i></span></a>
                        <a href="/owners/delete/{{ $owner->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="text-danger ms-lg-3"><i class="fa-regular fa-trash-can"></i></span></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
