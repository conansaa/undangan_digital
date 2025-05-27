@extends('admin.layout.template')

@section('pages', 'Ucapan')

{{-- @section('pagestitle', 'Client') --}}

@section('sidebar')
    @include('client.layout')
@endsection

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<form method="GET" action="{{ route('commentclient.viewcomment') }}" class="mb-2 d-inline-block">
    <label for="event_id" class="text-sm text-dark">Pilih Data dari Acara</label>
    <select name="event_id" id="event_id" class="form-select pe-5 w-auto" onchange="this.form.submit()">
        @foreach($eventDetails as $event)
            <option value="{{ $event->id }}" {{ $selectedEventId == $event->id ? 'selected' : '' }}>
                {{ $event->event_name }}
            </option>
        @endforeach
    </select>
</form>
<div class="card">
    <div class="card-header pb-0 mb-2">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0">List Data Ucapan</h6>
            <div class="d-flex">
                <button type="button" class="btn btn-warning me-2" data-bs-toggle="modal" data-bs-target="#exportGuestAndCommentModal">
                    <i class="fas fa-file-export"></i> Export Tamu & Ucapan
                </button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exportModal">
                    <i class="fas fa-file-export"></i> Export
                </button>
            </div>
        </div>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
        @if ($comments->isEmpty())
            <div class="text-center py-4">
                <h6 class="text-secondary">Belum ada ucapan.</h6>
            </div>
        @else
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                <a href="{{ route('commentclient.viewcomment', ['sort' => 'name', 'order' => request('order') == 'asc' ? 'desc' : 'asc']) }}" class="text-decoration-none" style="color: inherit;">
                                    Nama Tamu
                                    {{-- @if (request('sort') == 'name') 
                                        <i class="fa fa-sort{{ request('order') == 'asc' ? '-up' : '-down' }}"></i>
                                    @else
                                        <i class="fa fa-sort"></i>
                                    @endif --}}
                                </a>
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Komentar</th>
                            <th class="text-secondary opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                            <tr>
                                <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</td>
                                <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $comment->rsvp->name }}</td>
                                <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $comment->comment }}</td>
                                <td class="align-middle">
                                    <a href="{{ route('commentclient.destroycomment', $comment->id) }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                        <span class="text-danger ms-lg-3"><i class="fa-regular fa-trash-can"></i></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <!-- Modal Export -->
    <div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exportModalLabel">Pilih Format Export</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <p>Silakan pilih format file untuk export data Ucapan.</p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="{{ url('/export-comments/excel') }}" class="btn btn-success">
                            <i class="fas fa-file-excel"></i> Export Excel
                        </a>
                        <a href="{{ url('/export-comments/pdf') }}" class="btn btn-danger">
                            <i class="fas fa-file-pdf"></i> Export PDF
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Export Tamu & Ucapan -->
    <div class="modal fade" id="exportGuestAndCommentModal" tabindex="-1" aria-labelledby="exportGuestAndCommentLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exportGuestAndCommentLabel">Export Data Tamu & Ucapan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Pilih format file untuk mengekspor data tamu & ucapan:</p>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('export.tamu_ucapan', ['format' => 'excel']) }}" class="btn btn-success me-2">
                            <i class="fas fa-file-excel"></i> Export Excel
                        </a>
                        <a href="{{ route('export.tamu_ucapan', ['format' => 'pdf']) }}" class="btn btn-danger">
                            <i class="fas fa-file-pdf"></i> Export PDF
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- <div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
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
</div> --}}

@endsection

@section('footjs')
    @include('admin.layout.footer.admin')
@endsection