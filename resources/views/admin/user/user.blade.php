@extends('admin.layout.template')

@section('pages', 'Pengguna')

@section('pagestitle', 'Pengguna')

@section('sidebar')
    @include('admin.layout.sidebar.admin')
@endsection

@section('content')
<div class="card">
    <div class="card-header pb-0 mb-2">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0">Tabel Pengguna</h6>
            <a href="/user/create" class="btn btn-sm btn-success d-none d-lg-block">
                Tambah <i class="fa-solid fa-plus"></i>
            </a>
            <a href="/user/create" class="btn btn-sm btn-success d-lg-none">
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>
    </div>
    
    
    <div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email Verified</th>
                    <th class="text-secondary opacity-7"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $user->name }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $user->email }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $user->email_verified_at ? \Carbon\Carbon::parse($user->email_verified_at)->format('d M Y H:i') : '-' }}</td>
                        <td class="align-middle">
                            {{-- <a href="/owners/edit/{{ $owner->id }}">
                                <span class="text-dark"><i class="fa-regular fa-pen-to-square"></i></span>
                            </a> --}}
                            <a href="/user/delete/{{ $user->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
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