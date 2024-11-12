@extends('client.layout')

@section('title', 'RSVP')

@section('judul', 'Data Tamu')

@section('konten_client')

<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="row justify-content-between mb-3">
        <h5 class="col-12 col-lg-6 fw-bold">List Data Tamu </h5>
        <div class="col-12 col-lg-6 d-flex justify-content-end">
            <div class="me-2">
                <a href="/rsvpclient/createtamu" class="text-decoration-none btn btn-sm btn-success d-none d-lg-block">Tambah <i class="fa-solid fa-plus"></i></a>
                <a href="/rsvpclient/createtamu" class="text-decoration-none btn btn-sm btn-success d-lg-none d-block"><i class="fa-solid fa-plus"></i></a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">No. Telp</th>
                    <th scope="col">Konfirmasi</th>
                    <th scope="col">Total Guest</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rsvps as $rsvp)
                    <tr>
                        <th scope="col" class="text-center">{{ $loop->iteration }}</th>
                        <td>{{ $rsvp->name }}</td>
                        <td>{{ $rsvp->phone_number }}</td>
                        <td>{{ $rsvp->confirmation}}</td>
                        <td>{{ $rsvp->total_guest }}</td>
                        <td class="text-center">
                            <a href="{{ route('rsvp.incrementSendingTrack', $rsvp->id) }}" 
                                onclick="window.open('https://wa.me/{{ $rsvp->phone_number }}?text={{ urlencode("Thank you for RSVPing! Here's the link http://127.0.0.1:8000/invitation/$rsvp->name") }}'); return true;" 
                                class="text-decoration-none ms-lg-3" 
                                style="color: {{ $rsvp->sending_track > 0 ? 'red' : 'green' }}"
                                title="{{ $rsvp->sending_track > 0 ? 'Anda sudah pernah mengirim ke WhatsApp' : '' }}">
                                 <i class="fa-brands fa-whatsapp"></i>
                             </a>
                             <a href="{{ route('rsvpclient.destroytamu', $rsvp->id) }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                 <i class="fa-regular fa-trash-can text-danger ms-lg-3"></i>
                             </a>
                            {{-- <a href="https://wa.me/{{ $rsvp->phone_number }}?text={{ urlencode('Thank you for RSVPing! Here\'s the link http://127.0.0.1:8000/invitation/'.$rsvp->name) }}"
                                target="_blank" 
                                class="text-decoration-none ms-lg-3 whatsapp-link" 
                                data-id="{{ $rsvp->id }}"
                                style="color: {{ isset($_COOKIE['clicked_'.$rsvp->id]) ? 'red' : 'green' }}">
                                 <i class="fa-brands fa-whatsapp"></i>
                             </a> --}}
                        </td>
                    </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
