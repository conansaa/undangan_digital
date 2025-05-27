@extends('admin.layout.template')

@section('pages', 'Laporan')

{{-- @section('pagestitle', 'Laporan') --}}

@section('sidebar')
    @include('client.layout')
@endsection

@section('content')
<div class="container">
    <form method="GET" action="{{ route('client.eventreport') }}" class="mb-2 d-inline-block">
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
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Laporan RSVP & Ucapan</h5>
            <button type="button" class="btn btn-warning me-2" data-bs-toggle="modal" data-bs-target="#exportGuestAndCommentModal">
                <i class="fas fa-file-export"></i> Export Tamu & Ucapan
            </button>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            @if ($rsvpData->isEmpty())
                <div class="text-center py-4">
                    <h6 class="text-secondary">Belum ada data.</h6>
                </div>
            @else
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Tamu</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Konfirmasi</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah Tamu</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ucapan</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Ucapan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rsvpData as $index => $rsvp)
                                <tr>
                                    <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $index + 1 }}</td>
                                    <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $rsvp->name }}</td>
                                    <td class="align-middle text-center text-secondary text-xs font-weight-bold">
                                        @if ($rsvp->confirmation == 'Hadir')
                                            <span class="badge bg-success">Hadir</span>
                                        @else
                                            <span class="badge bg-danger">Tidak Hadir</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $rsvp->total_guest }}</td>
                                    <td class="align-middle text-center text-secondary text-xs font-weight-bold">
                                        @if ($rsvp->comments->isNotEmpty())
                                            <ul class="list-unstyled">
                                                @foreach ($rsvp->comments as $comment)
                                                    <li>{{ $comment->comment }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <span class="text-muted">Belum ada ucapan</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center text-secondary text-xs font-weight-bold">
                                        @if ($rsvp->comments->isNotEmpty())
                                            @foreach ($rsvp->comments as $comment)
                                                <div>{{ $comment->created_at->format('d M Y H:i') }} WIB</div>
                                            @endforeach
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
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
@endsection

@section('footjs')
    @include('admin.layout.footer.admin')
@endsection