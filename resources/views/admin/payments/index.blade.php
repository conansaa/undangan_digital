@extends('admin.layout.template')

@section('pages', 'Verifikasi Pembayaran')

{{-- @section('pagestitle', ' Pembayaran') --}}

@section('sidebar')
    @include('admin.layout.sidebar.admin')
@endsection

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header pb-0 mb-2">
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="mb-0">Daftar Pembayaran</h6>
            </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Acara</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pengguna</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bukti</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($events as $event)
                            @php
                                $payment = $event->payment;
                                $user = $event->eventOwner->user;
                            @endphp
                            <tr>
                                <td class="align-middle text-center text-secondary text-xs font-weight-bold">
                                    {{ \Carbon\Carbon::parse($event->created_at)->translatedFormat('d F Y H:i') }}
                                </td>
                                <td class="align-middle text-center text-secondary text-xs font-weight-bold">
                                    {{ $event->event_name }}
                                </td>
                                <td class="align-middle text-center text-secondary text-xs font-weight-bold">
                                    {{ $user->name ?? '-' }}
                                </td>
                                <td class="align-middle text-center text-secondary text-xs font-weight-bold">
                                    Rp{{ number_format($event->themes->package->price ?? 0, 0, ',', '.') }}
                                </td>
                                <td class="align-middle text-center text-secondary text-xs font-weight-bold">
                                    @if ($payment && $payment->payment_proof)
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#paymentModal{{ $event->id }}">Lihat</a>
                                    @else
                                        <span class="text-muted">Belum Upload</span>
                                    @endif
                                </td>
                                <td class="align-middle text-center text-secondary text-xs font-weight-bold">
                                    <span class="badge 
                                        {{ $payment ? 
                                            ($payment->payment_status == 'verified' ? 'bg-success' : 
                                            ($payment->payment_status == 'rejected' ? 'bg-danger' : 'bg-warning text-dark')) : 
                                            'bg-secondary' }}">
                                        {{ $payment ? ucfirst($payment->payment_status) : 'Belum Bayar' }}
                                    </span>
                                </td>
                                <td class="align-middle text-center text-secondary text-xs font-weight-bold">
                                    @if ($payment && $payment->payment_status == 'pending')
                                        <form id="verifyForm{{ $payment->id }}" action="{{ route('admin.payments.verify', $payment->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="button" class="btn btn-sm btn-success" onclick="confirmVerification({{ $payment->id }})">Verifikasi</button>
                                        </form>
                                        <form id="rejectForm{{ $payment->id }}" action="{{ route('admin.payments.reject', $payment->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmRejection({{ $payment->id }})">Tolak</button>
                                        </form>
                                    @elseif (!$payment)
                                        <span class="text-muted">Belum Upload</span>
                                    @else
                                        <span class="text-muted">Selesai</span>
                                    @endif
                                </td>
                            </tr>

                            <!-- Modal untuk Bukti Pembayaran -->
                            @if ($payment && $payment->payment_proof)
                                <div class="modal fade" id="paymentModal{{ $event->id }}" tabindex="-1" aria-labelledby="paymentModalLabel{{ $event->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="paymentModalLabel{{ $event->id }}">Bukti Pembayaran</h5>
                                                <button type="button" class="btn-close" style="filter: invert(1);" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <img src="{{ asset('payment_proof/' . $payment->payment_proof) }}" class="img-fluid rounded" style="max-height: 500px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmVerification(paymentId) {
        Swal.fire({
            title: 'Verifikasi Pembayaran?',
            text: "Pastikan bukti pembayaran sudah valid.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Verifikasi'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('verifyForm' + paymentId).submit();
            }
        });
    }

    function confirmRejection(paymentId) {
        Swal.fire({
            title: 'Tolak Pembayaran?',
            text: "Data akan ditandai sebagai ditolak.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Tolak'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('rejectForm' + paymentId).submit();
            }
        });
    }
</script>
@endsection

@section('footjs')
    @include('admin.layout.footer.admin')
@endsection
