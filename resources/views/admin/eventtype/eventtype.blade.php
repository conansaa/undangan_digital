@extends('admin.layout.template')

@section('pages', 'Tipe Acara')

@section('pagestitle', 'Tipe Acara')

@section('sidebar')
    @include('admin.layout.sidebar.admin')
@endsection

@section('content')
<div class="card">
    <div class="card-header pb-0 mb-2">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0">Tabel Tipe Acara</h6>
            <a href="/event-type/create" class="btn btn-sm btn-success d-none d-lg-block">
                Tambah <i class="fa-solid fa-plus"></i>
            </a>
            <a href="/event-type/create" class="btn btn-sm btn-success d-lg-none">
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Tipe Acara</th>
                    <th class="text-secondary opacity-7"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($eventTypes as $type)
                    <tr>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $type->nama }}</td>
                        <td class="align-middle">
                            <a href="/event-type/delete/{{ $type->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="text-danger"><i class="fa-regular fa-trash-can"></i></span></a>
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