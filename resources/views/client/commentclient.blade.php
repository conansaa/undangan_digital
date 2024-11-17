@extends('client.layout')

@section('title', 'Comment')

@section('judul', 'Data Ucapan')

@section('konten_client')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="row justify-content-between mb-3">
        <h5 class="col-12 col-lg-6 fw-bold">List Data Ucapan</h5>
        <div class="col-12 col-lg-6 d-flex justify-content-end"></div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col">
                        <a href="{{ route('commentclient.viewcomment', ['sort' => 'name', 'order' => request('order') == 'asc' ? 'desc' : 'asc']) }}" 
                           class="text-decoration-none" style="color: inherit;">
                            Nama Tamu
                            @if (request('sort') == 'name') 
                                <i class="fa fa-sort{{ request('order') == 'asc' ? '-up' : '-down' }}"></i>
                            @else
                                <i class="fa fa-sort"></i>
                            @endif
                        </a>
                    </th>
                    <th scope="col">Komentar</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <th scope="col" class="text-center">{{ $loop->iteration }}</th>
                        <td scope="col">{{ $comment->name }}</td>
                        <td scope="col">{{ $comment->comment }}</td>
                        <td scope="col" class="text-center">
                            <a href="{{ route('commentclient.destroycomment', $comment->id) }}" 
                               onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                <span class="text-danger ms-lg-3"><i class="fa-regular fa-trash-can"></i></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>

@endsection
