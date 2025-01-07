@extends('admin.layout.template')

@section('pages', 'Laporan Acara')

@section('pagestitle', 'Laporan Acara')

@section('sidebar')
    @include('admin.layout.sidebar.admin')
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Tabel Laporan</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tipe Acara</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Bulan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tahun</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Progres</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Selesai</th>
                            <th class="text-secondary opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($eventReports as $report)
                            <tr>
                                <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $report->eventType->nama }}</td>
                                <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ \Carbon\Carbon::createFromFormat('m', $report->month)->format('F') }}</td>
                                <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $report->year }}</td>
                                <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $report->counter }}</td>
                                <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $report->progress_total }}</td>
                                <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $report->finish_total }}</td>
                                <td class="align-middle">
                                    <button type="button" class="btn btn-sm btn-info text-white" data-bs-toggle="modal" data-bs-target="#detailEventReport{{ $report->id }}">
                                        <i class="fa-solid fa-eye"></i> <!-- Ikon View -->
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @foreach ($eventReports as $report)
                    @foreach ($report->eventDetails as $detail)
                        <!-- Modal Detail Event Report -->
                        <div class="modal fade" id="detailEventReport{{ $report->id }}" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-bold" id="staticBackdropLabel">Detail Laporan Event</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="table-responsive">
                                            <table class="table align-items-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th class="text-secondary text-xs fw-bold">Nama Pemilik</th>
                                                        <th class="text-secondary text-xs fw-bold">Nama Acara</th>
                                                        <th class="text-secondary text-xs fw-bold">Tipe Acara</th>
                                                        <th class="text-secondary text-xs fw-bold">Tanggal</th>
                                                        <th class="text-secondary text-xs fw-bold">Waktu</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-secondary text-xs">{{ $detail->eventOwner->user->name ?? 'Tidak tersedia' }}</td>
                                                        <td class="text-secondary text-xs">{{ $detail->event_name }}</td>
                                                        <td class="text-secondary text-xs">{{ $detail->eventType->nama ?? 'Tidak tersedia' }}</td>
                                                        <td class="text-secondary text-xs">{{ $detail->event_date }}</td>
                                                        <td class="text-secondary text-xs">{{ $detail->event_time }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footjs')
    @include('admin.layout.footer.admin')
@endsection