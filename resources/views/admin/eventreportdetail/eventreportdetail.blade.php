@extends('admin.layout')

@section('title', 'Detail Laporan Event')

@section('judul', 'Detail Laporan Event')

@section('konten_admin')

<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="row justify-content-between mb-3">
        <h5 class="col-12 col-lg-6 fw-bold">Detail Laporan Event</h5>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col">Event ID</th>
                <th scope="col">Laporan Event ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eventReportDetails as $detail)
                <tr>
                    <th scope="col" class="text-center">{{ $loop->iteration }}</th>
                    <td scope="col">{{ $detail->eventDetail->event_id }}</td> <!-- Mengambil event_id dari relasi tabel event_detail -->
                    <td scope="col">{{ $detail->eventReport->id }}</td> <!-- Mengambil event_report_id dari relasi tabel event_report -->
                </tr>

                <!-- Modal Detail Event Report Detail -->
                <div class="modal fade" id="detailEventReportDetail{{ $detail->id }}" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Detail Laporan Event Detail</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Event ID</div>
                                    <div class="col-6">{{ $detail->eventDetail->event_id }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Laporan Event ID</div>
                                    <div class="col-6">{{ $detail->eventReport->id }}</div>
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
