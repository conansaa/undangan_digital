@extends('client.layout')

@section('title', 'Dashboard')

@section('judul', 'Selamat Datang!')

@section('konten_client')
    <style>
        .heading-with-margin {
            margin-bottom: 50px;
        }
        .card {
            border: 2px solid #ddd;
            border-radius: 10px;
            background-color: #fff;
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
                        <h5 class="card-title">Total Tamu</h5>
                        <p class="card-text" style="font-size: 24px; font-weight: bold;">{{ $totalGuests }}</p>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-md-4">
            <a href="{{ route('commentclient.viewcomment') }}" style="text-decoration: none; color: inherit;">
                <div class="card shadow border-0 p-3" style="border-radius: 10px; background-color: #f8f9fa;">
                    <div class="card-body text-center">
                        <h5 class="card-title">Total Ucapan</h5>
                        <p class="card-text" style="font-size: 24px; font-weight: bold;">{{ $totalComments }}</p>
                    </div>
                </div>
            </a>
        </div>           
    </div>
@endsection
