@extends('admin.layout.template')

@section('pages', 'Dashboard')

{{-- @section('pagestitle', '') --}}

@section('sidebar')
    @include('client.layout')
@endsection

@section('content')

<h5 class="heading-with-margin">Client Page diikatJanji</h5>

<form method="GET" action="{{ route('client.dashboard') }}" class="mb-3">
    <div class="input-group" style="width: 250px;">
        <select name="event_id" class="form-select" onchange="this.form.submit()">
            @foreach ($allEvents as $evt)
                <option value="{{ $evt->id }}" {{ $evt->id == $selectedEventId ? 'selected' : '' }}>
                    {{ $evt->event_name }}
                </option>
            @endforeach
        </select>
    </div>
</form>

<div class="row">
    <div class="col-lg-6 col-12">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                {{-- <a href="{{ route('rsvpclient') }}" style="text-decoration: none; color: inherit;"> --}}
                <div class="card d-flex flex-column h-100">
                    <span class="mask bg-primary opacity-10 border-radius-lg"></span>
                    <div class="card-body p-3 position-relative flex-grow-1">
                        <div class="row">
                            <div class="col-8 text-start">
                                <div class="icon icon-shape bg-white shadow text-center border-radius-2xl">
                                    <i class="fa-solid fa-clipboard-list text-dark text-gradient text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                                <h5 class="text-white font-weight-bolder mb-0 mt-3">
                                    {{ $totalGuests }}
                                </h5>
                                <span class="text-white text-sm text-truncate d-block" style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    Tamu {{ $event }}
                                </span>
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

            
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-lg-8 col-md-12 mb-2">
        <div class="card">
            <div class="card-body">
                <h5 class="text-center">Ucapan Terbaru</h5>

                <div class="chat-container">
                    @if ($latestComment->isEmpty())
                        <p class="text-muted text-center">Belum ada data.</p>
                    @else
                        @foreach ($latestComment as $comment)
                            <div class="d-flex align-items-center mt-2 mb-2">
                                <!-- Avatar dengan inisial -->
                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-2"
                                    style="width: 50px; height: 50px; font-size: 18px; font-weight: bold; flex-shrink: 0;">
                                    {{ strtoupper(substr($comment->rsvp->name, 0, 1)) }}
                                </div>
                
                                <!-- Kotak Ucapan -->
                                <div class="p-2 rounded-3 shadow-sm mt-2"
                                    style="max-width: 70%; border-left: 3px solid black; background-color: #f8f9fa; text-align: left;">
                                    <p class="mb-1 fw-bold">{{ $comment->rsvp->name }}</p>
                                    <p class="mb-0">{{ $comment->comment }}</p>
                                    <small class="d-block text-muted">{{ $comment->created_at->format('d M Y H:i') }} WIB</small>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>  
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 mb-2">
        <div class="card">
            <div class="card-body">
                <h5 class="text-center">Statistik Ucapan</h5>
                @if ($totalRsvpWithComments == 0 && $totalRsvpWithoutComments == 0)
                    <p class="text-center text-muted">Belum ada data.</p>
                @else
                    <div class="d-flex justify-content-center">
                        <canvas id="donutChart" style="height: 300px !important; width: 300px !important;"></canvas>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('donutChart').getContext('2d');
    var donutChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Sudah Ucapkan', 'Belum Ucapkan'],
            datasets: [{
                data: [{{ $totalRsvpWithComments }}, {{ $totalRsvpWithoutComments }}],
                backgroundColor: ['#BBF1C4', '#F4D0D5'],
                hoverBackgroundColor: ['#8AC6A3', '#F4B5C7']
            }]
        },
        options: {
            responsive: false,
            maintainAspectRatio: true,
            cutout: '65%', // Mengatur ukuran lubang tengah (default: 50%)
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>
@endsection

@section('footjs')
    @include('admin.layout.footer.admin')
@endsection