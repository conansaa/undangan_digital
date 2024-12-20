@extends('layout.app')

@section('content')
    <style>
        footer {
            display: none;
        }
    </style>

    <div class="row m-0" style="min-height: 100vh">
        <div class="col-2 bg-info text-white shadow d-none d-lg-block">
            <div class="py-2">
                <ul class="fw-normal p-2">
                    <li class="list-unstyled opacity-75 mb-3" style="font-size: 12px">PAGES</li>

                    <a href="/dashboard" class="text-decoration-none text-white">
                        <li class="list-unstyled fs-5 mb-3"><i class="fa-solid fa-chart-simple me-2"></i> Dashboard</li>
                    </a>

                    <a href="/themes" class="text-decoration-none text-white">
                        <li class="list-unstyled fs-5 mb-3"><i class="fa-solid fa-palette me-2"></i> Tema</li>
                    </a>
                    
                    <a href="/owners" class="text-decoration-none text-white">
                        <li class="list-unstyled fs-5 mb-3"><i class="fa-solid fa-user-tie me-2"></i> Pemilik Acara</li>
                    </a>
    
                    <a href="/event" class="text-decoration-none text-white">
                        <li class="list-unstyled fs-5 mb-3"><i class="fa-solid fa-calendar-day me-2"></i> Detail Acara</li>
                    </a>
    
                    {{-- <a href="/event-type" class="text-decoration-none text-white">
                        <li class="list-unstyled fs-5 mb-3"><i class="fa-solid fa-tags me-2"></i> Tipe Acara</li>
                    </a> --}}

                    <a href="/event-reports" class="text-decoration-none text-white">
                        <li class="list-unstyled fs-5 mb-3"><i class="fa-solid fa-clipboard-list me-2"></i> Laporan Acara</li>
                    </a>
    
                    {{-- <a href="/timelines" class="text-decoration-none text-white">
                        <li class="list-unstyled fs-5 mb-3"><i class="fa-solid fa-clock me-2"></i> Timeline Acara</li>
                    </a> --}}
    
                    {{-- <a href="/rsvps" class="text-decoration-none text-white">
                        <li class="list-unstyled fs-5 mb-3"><i class="fa-solid fa-user-check me-2"></i> Daftar Reservasi</li>
                    </a>
    
                    <a href="/comments" class="text-decoration-none text-white">
                        <li class="list-unstyled fs-5 mb-3"><i class="fa-solid fa-comments me-2"></i> Daftar Ucapan</li>
                    </a>
    
                    <a href="/gifts" class="text-decoration-none text-white">
                        <li class="list-unstyled fs-5 mb-3"><i class="fa-solid fa-gift me-2"></i> Hadiah</li>
                    </a> --}}

                    <a href="/sections" class="text-decoration-none text-white">
                        <li class="list-unstyled fs-5 mb-3"><i class="fa-solid fa-columns me-2"></i> Sections</li>
                    </a>
    
                    {{-- <a href="/galleries" class="text-decoration-none text-white">
                        <li class="list-unstyled fs-5 mb-3"><i class="fa-solid fa-images me-2"></i> Galeri Foto</li>
                    </a> --}}

                    <a href="/users" class="text-decoration-none text-white">
                        <li class="list-unstyled fs-5 mb-3"><i class="fa-solid fa-users me-2"></i> Users</li>
                    </a>
                </ul>
            </div>
        </div>

        <div class="col-lg-10 col-12">
            <div class="container py-4">
                <h3 class="fw-bold mb-3">@yield('judul')</h3>
                @yield('konten_admin')
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="asider" aria-labelledby="staticBackdropLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="staticBackdropLabel">
                <a class="navbar-brand" href="{{ '/' }}"><img src="{{ asset('logodanteks.png') }}" alt="Logo Sanora" style="width: 100px"></a>
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body bg-info">
            <ul class="fw-bold p-2">
                <li class="list-unstyled opacity-75 mb-3 text-white" style="font-size: 12px">PAGES</li>

                <a href="/" class="text-decoration-none text-white">
                    <li class="list-unstyled fs-5 mb-3"><i class="fa-solid fa-chart-simple me-2"></i> Dashboard</li>
                </a>
                <a href="/event-reports" class="text-decoration-none text-white">
                    <li class="list-unstyled fs-5 mb-3"><i class="fa-solid fa-clipboard-list me-2"></i> Event Reports</li>
                </a>
            </ul>
        </div>
    </div>

@endsection
