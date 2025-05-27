@extends('admin.layout.template')

@section('pages', 'Acara')
@section('pagestitle', 'Acara')

@section('sidebar')
    @include('client.layout')
@endsection

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-warning text-white">
            <h5 class="mb-0">Konfirmasi Pembayaran</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Form Upload Bukti Pembayaran -->
                <div class="col-md-6 border-end">
                    <form method="POST" action="{{ route('payment.store', $event->id) }}" enctype="multipart/form-data">
                        @csrf
                        {{-- <p><strong>Harga Paket:</strong> 
                            @if($event->themes && $event->themes->package)
                                Rp{{ number_format($event->themes->package->price, 0, ',', '.') }}
                            @else
                                Tidak tersedia
                            @endif
                        </p> --}}
                        @if($event->themes && $event->themes->package)
                            <input type="hidden" name="amount" value="{{ $event->themes->package->price }}">
                            <p><strong>Harga Paket:</strong> Rp{{ number_format($event->themes->package->price, 0, ',', '.') }}</p>
                        @else
                            <p><strong>Harga Paket:</strong> Tidak tersedia</p>
                        @endif
                        <p>Transfer ke rekening berikut:</p>
                        <p class="fw-bold">BCA: 123456789 a.n. Gleamvite</p>

                        <div class="mb-3">
                            <label for="payment_proof" class="form-label">Upload Bukti Pembayaran</label>
                            {{-- <input type="file" class="form-control" name="payment_proof" id="payment_proof" required> --}}
                            @if ($event->payment && $event->payment->payment_proof)
                                <!-- Tampilkan gambar dan tombol untuk ganti -->
                                <div class="mb-2">
                                    <img src="{{ asset('payment_proof/' . $event->payment->payment_proof) }}" 
                                        alt="Bukti Pembayaran" 
                                        class="img-fluid rounded shadow-sm" 
                                        style="max-height: 200px;">
                                </div>
                                <div>
                                    <label for="payment_proof" class="form-label">Ganti Bukti Pembayaran</label>
                                    <input type="file" class="form-control" name="payment_proof" id="payment_proof">
                                </div>
                            @else
                                <!-- Belum ada bukti, tampilkan form upload biasa -->
                                <input type="file" class="form-control" name="payment_proof" id="payment_proof" required>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Kirim Bukti</button>
                    </form>
                </div>

                <!-- Informasi Acara -->
                <div class="col-md-6 ps-md-4 mt-4 mt-md-0">
                    <table class="table table-borderless align-middle small w-auto">
                        <tbody>
                            <tr>
                                <td ><strong>Nama Acara</strong></td>
                                <td>:</td>
                                <td>{{ $event->event_name }}</td>
                            </tr>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footjs')
    @include('admin.layout.footer.admin')
@endsection
