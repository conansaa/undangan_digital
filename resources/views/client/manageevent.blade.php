@extends('admin.layout.template')

@section('pages', 'Acara')

@section('sidebar')
    @include('client.layout')
@endsection

@section('content')
<div class="container mt-3">
    
    <div class="text-center mt-4">
        <a href="{{ route('create.event') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Buat Acara Baru
        </a>
    </div>
    
    <div class="row">
        @forelse ($eventDetails as $event)
            @php
                $payment = \App\Models\Payments::where('event_id', $event->id)
                                ->where('user_id', auth()->id())
                                ->first();
                $status = 'Belum Bayar';
                if ($payment) {
                    if ($payment->payment_status === 'verified') {
                        $status = 'Sudah Dibayar';
                    } elseif ($payment->payment_status === 'pending') {
                        $status = 'Menunggu Verifikasi';
                    } elseif ($payment->payment_status === 'rejected') {
                        $status = 'Ditolak';
                    }
                }
            @endphp

            <div class="col-lg-6 mb-4">
                <a href="{{ $payment && $payment->payment_status == 'verified' ? route('manageevent.detail', $event->id) : route('payment.confirm', $event->id) }}" 
                   class="text-decoration-none text-dark">
                    <div class="card shadow h-100">
                        <div class="card-body">
                            <h5 class="card-title text-primary">{{ $event->event_name }}</h5>
                            <table class="table table-borderless align-middle small w-auto">
                                <tbody>
                                    {{-- <tr>
                                        <td ><strong>Nama Acara</strong></td>
                                        <td>:</td>
                                        <td>{{ $selectedEvent->event_name }}</td>
                                    </tr> --}}
                                    <tr>
                                        <td><strong>Tipe Acara</strong></td>
                                        <td>:</td>
                                        <td>{{ $event->eventType->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Tanggal</strong></td>
                                        <td>:</td>
                                        <td>{{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('d F Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Waktu</strong></td>
                                        <td>:</td>
                                        <td>{{ \Carbon\Carbon::parse($event->event_time)->format('H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Tema</strong></td>
                                        <td>:</td>
                                        <td>{{ $event->theme_id ? $event->themes->name : 'Tidak ada tema' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <span class="badge 
                                {{ $status == 'Sudah Dibayar' ? 'bg-success' : 
                                   ($status == 'Menunggu Verifikasi' ? 'bg-warning text-dark' : 
                                   ($status == 'Ditolak' ? 'bg-danger' : 'bg-secondary') ) }}">
                                {{ $status }}
                            </span>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">Kamu belum memiliki acara. Yuk buat satu!</div>
            </div>
        @endforelse
    </div>
</div>
@endsection

@section('footjs')
    @include('admin.layout.footer.admin')
@endsection
