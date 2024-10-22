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
                        <a data-bs-target="#detailOwner{{ $owner->id }}">{{ $owner->owner_name }}</a>
                    </td>
                    <td scope="col">{{ $owner->parents_name }}</td>
                    <td scope="col">
                        @if (empty($owner->owner_photo))
                            <span class="text-secondary">Tidak ada foto</span>
                        @else
                            <img src="{{ asset('owner_photos/' . $owner->owner_photo) }}" alt="{{ $owner->owner_name }}" style="width: 50px; height: 50px; background-size: cover">
                        @endif
                    </td>
                    <td scope="col">{{ $owner->social_media }}</td>
                    <td scope="col">{{ $owner->gender['name'] }}</td>
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
