@extends('admin.layout.template')

@section('sidebar')
    {{-- <style>
        footer {
            display: none;
        }
    </style> --}}
<li class="nav-item mt-3">
    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">PAGES</h6>
</li>
<li class="nav-item">
    <a class="nav-link {{ Request::is('client*') ? 'active' : '' }}" href="/client">
        <div class="fa-solid fa-chart-simple icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <title>dashboard </title>
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                <g transform="translate(1716.000000, 291.000000)">
                    <g transform="translate(0.000000, 148.000000)">
                    <path class="color-background opacity-6" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                    <path class="color-background" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                    </g>
                </g>
                </g>
            </g>
            </svg>
        </div>
        <span class="nav-link-text ms-1">Dashboard</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ Request::is('manage-event*') ? 'active' : '' }}" href="/manage-event">
        <div class="fa-solid fa-calendar-check icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <title>Kelola Acara</title>
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                        <g id="calendar" transform="translate(153.000000, 2.000000)">
                            <path class="color-background opacity-6" d="M12 4h18v2H12V4zM3 8h36v30H3V8zm6 6h24v2H9v-2zm0 4h18v2H9v-2z"></path>
                            <path class="color-background" d="M36 2h-6V0h-2v2H14V0h-2v2H6C4.35 2 3 3.35 3 5v35c0 1.65 1.35 3 3 3h30c1.65 0 3-1.35 3-3V5c0-1.65-1.35-3-3-3zM6 40V8h30v30H6zm8-26h18v2H14v-2zm0 4h12v2H14v-2zm18 10H14v-2h18v2zm0 4H14v-2h18v2zm0 4H14v-2h18v2z"></path>
                        </g>
                    </g>
                </g>
            </g>
        </div>
        <span class="nav-link-text ms-1">Acara</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link  {{ Request::is('rsvpclient*') ? 'active' : '' }}" href="/rsvpclient">
        <div class="fa-solid fa-user-check icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <title>tamu</title>
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                <g transform="translate(1716.000000, 291.000000)">
                    <g id="office" transform="translate(153.000000, 2.000000)">
                    <path class="color-background opacity-6" d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z"></path>
                    <path class="color-background" d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"></path>
                    </g>
                </g>
                </g>
            </g>
            </svg>
        </div>
        <span class="nav-link-text ms-1">Data Tamu</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ Request::is('commentclient*') ? 'active' : '' }}" href="/commentclient">
        <div class="fa-solid fa-comments icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <title>ucapan</title>
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                <g transform="translate(1716.000000, 291.000000)">
                    <g transform="translate(453.000000, 454.000000)">
                    <path class="color-background opacity-6" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"></path>
                    <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                    </g>
                </g>
                </g>
            </g>
            </svg>
        </div>
        <span class="nav-link-text ms-1">Data Ucapan</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ Request::is('report*') ? 'active' : '' }}" href="/report">
        <div class="fa-solid fa-file-alt icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <title>Laporan</title>
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                        <g id="report" transform="translate(153.000000, 2.000000)">
                            <path class="color-background opacity-6" d="M12 4h18v2H12V4zM3 8h36v30H3V8zm6 6h24v2H9v-2zm0 4h18v2H9v-2z"></path>
                            <path class="color-background" d="M36 2h-6V0h-2v2H14V0h-2v2H6C4.35 2 3 3.35 3 5v35c0 1.65 1.35 3 3 3h30c1.65 0 3-1.35 3-3V5c0-1.65-1.35-3-3-3zM6 40V8h30v30H6zm8-26h18v2H14v-2zm0 4h12v2H14v-2zm18 10H14v-2h18v2zm0 4H14v-2h18v2zm0 4H14v-2h18v2z"></path>
                        </g>
                    </g>
                </g>
            </g>
        </div>
        <span class="nav-link-text ms-1">Laporan</span>
    </a>
</li>


                    {{-- <a href="/client" class="text-decoration-none text-white">
                        <li class="list-unstyled fs-5 mb-3"><i class="fa-solid fa-chart-simple me-2"></i> Dashboard</li>
                    </a> --}}
                    {{-- <a href="/rsvpclient" class="text-decoration-none text-white">
                        <li class="list-unstyled fs-5 mb-3"><i class="fa-solid fa-users me-2"></i> Data Tamu</li>
                    </a>
                    <a href="/commentclient" class="text-decoration-none text-white">
                        <li class="list-unstyled fs-5 mb-3"><i class="fa-solid fa-clipboard-list me-2"></i> Data Ucapan</li>
                    </a> --}}

        {{-- <div class="col-lg-10 col-12">
            <div class="container py-4">
                <h3 class="fw-bold mb-3">@yield('judul')</h3>
                @yield('konten_client')
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
                <a href="/rsvpclient" class="text-decoration-none text-white">
                    <li class="list-unstyled fs-5 mb-3"><i class="fa-solid fa-clipboard-list me-2"></i> Data Tamu</li>
                </a>
            </ul>
        </div>
    </div> --}}
@endsection
