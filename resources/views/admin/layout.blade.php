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
                <ul class="fw-bold p-2">
                    <li class="list-unstyled opacity-75 mb-3" style="font-size: 12px">PAGES</li>

                    <a href="/index" class="text-decoration-none text-white">
                        <li class="list-unstyled fs-5 mb-3"><i class="fa-solid fa-chart-simple me-2"></i> Dashboard</li>
                    </a>

                    <a href="/owners" class="text-decoration-none text-white">
                        <li class="list-unstyled fs-5 mb-3"><i class="fa-solid fa-user-tie me-2"></i> Event Owners</li>
                    </a>
    
                    <a href="/event" class="text-decoration-none text-white">
                        <li class="list-unstyled fs-5 mb-3"><i class="fa-solid fa-calendar-day me-2"></i> Event Details</li>
                    </a>
    
                    <a href="/event-type" class="text-decoration-none text-white">
                        <li class="list-unstyled fs-5 mb-3"><i class="fa-solid fa-tags me-2"></i> Event Types</li>
                    </a>

                    <a href="/event-reports" class="text-decoration-none text-white">
                        <li class="list-unstyled fs-5 mb-3"><i class="fa-solid fa-clipboard-list me-2"></i> Event Reports</li>
                    </a>

                    <a href="/event-reports-detail" class="text-decoration-none text-white">
                        <li class="list-unstyled fs-5 mb-3"><i class="fa-solid fa-clipboard-list me-2"></i> Event Reports Detail</li>
                    </a>

                    <a href="/genders" class="text-decoration-none text-white">
                        <li class="list-unstyled fs-5 mb-3"><i class="fa-solid fa-venus-mars me-2"></i> Gender References</li>
                    </a>
    
                    <a href="/timelines" class="text-decoration-none text-white">
                        <li class="list-unstyled fs-5 mb-3"><i class="fa-solid fa-clock me-2"></i> Timelines</li>
                    </a>
    
                    <a href="/rsvps" class="text-decoration-none text-white">
                        <li class="list-unstyled fs-5 mb-3"><i class="fa-solid fa-user-check me-2"></i> RSVPs</li>
                    </a>
    
                    <a href="/comments" class="text-decoration-none text-white">
                        <li class="list-unstyled fs-5 mb-3"><i class="fa-solid fa-comments me-2"></i> Comments</li>
                    </a>
    
                    <a href="/gifts" class="text-decoration-none text-white">
                        <li class="list-unstyled fs-5 mb-3"><i class="fa-solid fa-gift me-2"></i> Gifts</li>
                    </a>

                    <a href="/sections" class="text-decoration-none text-white">
                        <li class="list-unstyled fs-5 mb-3"><i class="fa-solid fa-gift me-2"></i> Sections</li>
                    </a>
    
                    <a href="/galleries" class="text-decoration-none text-white">
                        <li class="list-unstyled fs-5 mb-3"><i class="fa-solid fa-images me-2"></i> Galleries</li>
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
