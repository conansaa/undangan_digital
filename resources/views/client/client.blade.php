@extends('admin.layout.template')

@section('pages', 'Client')

@section('pagestitle', 'Client')

@section('sidebar')
    @include('client.layout')
@endsection

@section('content')
    {{-- <style>
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
    </style> --}}

<h5 class="heading-with-margin">Client Page diikatJanji</h5>
<div class="row">
    <div class="col-lg-6 col-12">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                {{-- <a href="{{ route('rsvpclient') }}" style="text-decoration: none; color: inherit;"> --}}
                <div class="card">
                    <span class="mask bg-primary opacity-10 border-radius-lg"></span>
                    <div class="card-body p-3 position-relative">
                        <div class="row">
                            <div class="col-8 text-start">
                                <div class="icon icon-shape bg-white shadow text-center border-radius-2xl">
                                    <i class="fa-solid fa-clipboard-list text-dark text-gradient text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                                <h5 class="text-white font-weight-bolder mb-0 mt-3">
                                    {{ $totalGuests }}
                                </h5>
                                <span class="text-white text-sm">Total Tamu</span>
                            </div>
                            <div class="col-4">
                                <div class="dropdown text-end mb-6">
                                    <a href="javascript:;" class="cursor-pointer" id="dropdownUsers1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h text-white"></i>
                                    </a>
                                    <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownUsers1">
                                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12 mt-4 mt-md-0">
                {{-- <a href="{{ route('commentclient.viewcomment') }}" style="text-decoration: none; color: inherit;"> --}}
                <div class="card">
                    <span class="mask bg-dark opacity-10 border-radius-lg"></span>
                    <div class="card-body p-3 position-relative">
                        <div class="row">
                            <div class="col-8 text-start">
                                <div class="icon icon-shape bg-white shadow text-center border-radius-2xl">
                                    <i class="fa-solid fa-tags text-dark text-gradient text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                                <h5 class="text-white font-weight-bolder mb-0 mt-3">
                                    {{ $totalComments }}
                                </h5>
                                <span class="text-white text-sm">Total Ucapan</span>
                            </div>
                            <div class="col-4">
                                <div class="dropstart text-end mb-6">
                                    <a href="javascript:;" class="cursor-pointer" id="dropdownUsers2" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h text-white"></i>
                                    </a>
                                    <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownUsers2">
                                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



    {{-- <div class="row">
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
    </div> --}}
@endsection

@section('footjs')
    @include('admin.layout.footer.admin')
@endsection