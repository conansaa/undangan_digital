@extends('admin.layout')

@section('title', 'Dashboard')

@section('judul', 'Selamat Datang!')

@section('konten_admin')
    <style>
        .heading-with-margin {
            margin-bottom: 50px; /* Tambahkan jarak bawah yang diinginkan */
        }
        .card {
        border: 2px solid #ddd; /* Untuk mempertebal border */
        border-radius: 10px; /* Membuat sudut kotak melengkung */
        background-color: #fff; /* Warna background putih */
        }
        .card-body {
            padding: 20px;
        }
    </style>

    <h5 class="heading-with-margin">Dashboard diikatJanji</h5>
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow border-0 p-3" style="border-radius: 10px; background-color: #f8f9fa;">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Acara</h5>
                    <p class="card-text" style="font-size: 24px; font-weight: bold;">{{ $eventReportCount }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow border-0 p-3" style="border-radius: 10px; background-color: #f8f9fa;">
                <div class="card-body text-center">
                    <h5 class="card-title">Jenis Acara</h5>
                    <p class="card-text" style="font-size: 24px; font-weight: bold;">{{ $eventTypeCount }}</p>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Event ID</th>
                    <th>Report Type ID</th>
                </tr>
            </thead>
            <tbody>
                @foreach($eventReportDetails as $detail)
                    <tr>
                        <td>{{ $detail->id }}</td>
                        <td>{{ $detail->event_id }}</td>
                        <td>{{ $detail->report_type_id }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}
@endsection
