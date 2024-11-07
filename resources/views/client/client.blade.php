@extends('layout.app')

@section('title', 'Client')

@section('judul', 'Selamat Datang!')

@section('content')

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

    <h5 class="heading-with-margin">Client Page diikatJanji</h5>
    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('rsvpclient') }}" style="text-decoration: none; color: inherit;">
                <div class="card shadow border-0 p-3" style="border-radius: 10px; background-color: #f8f9fa;">
                    <div class="card-body text-center">
                        <h5 class="card-title">Total Tamu Hadir</h5>
                        <p class="card-text" style="font-size: 24px; font-weight: bold;">{{ $totalGuests }}</p>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-md-4">
            <a href="{{ route('commentclient') }}" style="text-decoration: none; color: inherit;">
                <div class="card shadow border-0 p-3" style="border-radius: 10px; background-color: #f8f9fa;">
                    <div class="card-body text-center">
                        <h5 class="card-title">Total Ucapan</h5>
                        <p class="card-text" style="font-size: 24px; font-weight: bold;">{{ $totalComments }}</p>
                    </div>
                </div>
            </a>
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
