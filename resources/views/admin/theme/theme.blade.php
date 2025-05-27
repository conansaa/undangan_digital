@extends('admin.layout.template')

@section('pages', 'Tema')

@section('pagestitle', 'Tema')

@section('sidebar')
    @include('admin.layout.sidebar.admin')
@endsection

@section('content')
<div class="card">
    <div class="card-header pb-0 mb-2">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0">Tabel Tema</h6>
            <a href="/themes/create" class="btn btn-sm btn-success d-none d-lg-block">
                Tambah <i class="fa-solid fa-plus"></i>
            </a>
            <a href="/themes/create" class="btn btn-sm btn-success d-lg-none">
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Tema</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" scope="col" style="width: 15%;">Deskripsi</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Maksimal Gambar</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tag</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kategori</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Warna</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Link Tema</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Preview Tema</th>
                    <th class="text-secondary opacity-7"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($themes as $theme)
                    <tr>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $theme->name }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold text-truncate" style="max-width: 150px;" title="{{ $theme->description }}">{{ Str::limit($theme->description, 50) }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $theme->max_images }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $theme->tag }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $theme->category->name }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">
                            <span style="background-color: {{ $theme->color }}; padding: 2px 10px; border-radius: 5px;">{{ $theme->color }}</span>
                        </td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold text-truncate" style="max-width: 150px;" title="{{ $theme->preview_url }}">{{ Str::limit($theme->preview_url, 50) }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">
                            <img src="{{ asset('themes/' . $theme->preview_image) }}" alt="Foto Tema" style="max-width: 100px;">
                        </td>
                        <td class="align-middle">
                            <a href="/themes/edit/{{ $theme->id }}">
                                <span class="text-dark"><i class="fa-regular fa-pen-to-square"></i></span>
                            </a>
                            <a href="/themes/delete/{{ $theme->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                <span class="text-danger ms-lg-3"><i class="fa-regular fa-trash-can"></i></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>
@endsection

@section('footjs')
    @include('admin.layout.footer.admin')
@endsection