@extends('admin.layout')

@section('title', 'Laporan Acara')

@section('judul', 'Laporan Acara')

@section('konten_admin')

<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="row justify-content-between mb-3">
        <h5 class="col-12 col-lg-6 fw-bold">Data Laporan Acara</h5>
        <div class="col-12 col-lg-6 d-flex justify-content-end">
            {{-- <div class="me-2">
                <a href="/eventreport/create" class="text-decoration-none btn btn-sm btn-success d-none d-lg-block">Tambah <i class="fa-solid fa-plus"></i></a>
                <a href="/eventreport/create" class="text-decoration-none btn btn-sm btn-success d-lg-none d-block"><i class="fa-solid fa-plus"></i></a>
            </div> --}}
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col">ID</th>
                <th scope="col">Tipe Acara</th>
                <th scope="col">Bulan</th>
                <th scope="col">Tahun</th>
                <th scope="col">Counter</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eventReports as $report)
                <tr>
                    <td scope="col" class="text-center">{{ $loop->iteration }}</th>
                    <td scope="col">{{ $report->id }}</td>
                    <td scope="col">{{ $report->eventType->nama }}</td> <!-- Menggunakan relasi ke tabel event_type_ref -->
                    <td scope="col">{{ \Carbon\Carbon::createFromFormat('m', $report->month)->format('F') }}</td> <!-- Mengonversi bulan menjadi nama bulan -->
                    <td scope="col">{{ $report->year }}</td>
                    <td scope="col">{{ $report->counter }}</td>
                    <td scope="col" class="text-center">
                        <button type="button" class="btn btn-sm btn-info text-white" data-bs-toggle="modal" data-bs-target="#detailEventReport{{ $report->id }}">
                            <i class="fa-solid fa-eye"></i> <!-- Ikon View -->
                        </button>
                    </td>
                </tr>
            @endforeach

            @foreach ($eventDetails as $detail)
                <!-- Modal Detail Event Report -->
                <div class="modal fade" id="detailEventReport{{ $report->id }}" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold" id="staticBackdropLabel">Detail Laporan Event</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Nama Pengguna</div>
                                    <div class="col-7">{{ $detail->user->name }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Nama Acara</div>
                                    <div class="col-7">{{ $detail->event_name }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Tipe Acara</div>
                                    <div class="col-7">{{ $detail->eventType->nama }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Tanggal</div>
                                    <div class="col-7">{{ $detail->event_date }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Waktu</div>
                                    <div class="col-7">{{ $detail->event_time }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Lokasi</div>
                                    <div class="col-7">{{ $detail->location }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-md-4 label fw-bold mb-3">Kuota</div>
                                    <div class="col-7">{{ $detail->quota }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Batas Modal --}}
                {{-- {{ dd($report) }} --}}
            @endforeach
        </tbody>
    </table>
</div>

@endsection
