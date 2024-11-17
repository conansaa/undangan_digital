@extends('client.layout')

@section('title', 'RSVP')

@section('judul')
    Data Tamu
    <h6 class="col-12 col-lg-6 fw-bold">Quota Terisi: {{ $totalGuests }}/{{ $totalQuota }}</h6> <br>
@endsection

@section('konten_client')

<style>
    .quota-text {
        margin-left: 0;
        text-align: left;
    }
</style>

<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="row justify-content-between mb-3">
        <h5 class="col-12 col-lg-6 fw-bold">List Data Tamu</h5>
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
                    <th scope="col">
                        <a href="{{ route('rsvpclient', ['sort' => 'name', 'order' => request('order') == 'asc' ? 'desc' : 'asc']) }}" 
                            class="text-decoration-none" style="color: inherit;">
                            Nama Tamu
                            <i class="fa fa-sort{{ request('sort') == 'name' ? (request('order') == 'asc' ? '-up' : '-down') : '' }}"></i>
                        </a>
                    </th>
                    <th scope="col">No. Telp</th>
                    <th scope="col">
                        <a href="{{ route('rsvpclient', ['sort' => 'confirmation', 'order' => request('order') == 'asc' && request('sort') == 'confirmation' ? 'desc' : 'asc']) }}" 
                            class="text-decoration-none" style="color: inherit;">
                            Konfirmasi
                            <i class="fa fa-sort{{ request('sort') == 'confirmation' ? (request('order') == 'asc' ? '-up' : '-down') : '' }}"></i>
                         </a>
                         
                         
                    </th>
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
                        <td>{{ $rsvp->confirmation }}</td>
                        <td>{{ $rsvp->total_guest }}</td>
                        <td class="text-center">
                            @php
                                $invitationLink = url('/invitation/'.$rsvp->name); 
                            @endphp
                            @if ($rsvp->phone_number)
                                <a href="#" onclick="copyLink('{{ $invitationLink }}')" 
                                    class="text-decoration-none ms-lg-3" 
                                    title="Salin Link">
                                    <i class="fa-solid fa-copy"></i>
                                </a>
                                <a href="{{ route('rsvp.incrementSendingTrack', $rsvp->id) }}" 
                                    onclick="window.open('https://wa.me/{{ $rsvp->WhatsAppNumber }}?text={{ urlencode("Thank you for RSVPing! Here's the link $invitationLink") }}'); return true;" 
                                    class="text-decoration-none ms-lg-3" 
                                    style="color: {{ $rsvp->sending_track > 0 ? 'red' : 'green' }}"
                                    title="{{ $rsvp->sending_track > 0 ? 'Anda sudah pernah mengirim ke WhatsApp' : '' }}">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                            @else
                                <a href="#" onclick="copyLink('{{ $invitationLink }}')" 
                                    class="text-decoration-none ms-lg-3" 
                                    title="Salin Link">
                                    <i class="fa-solid fa-copy"></i>
                                </a>
                            @endif
                            <a href="{{ route('rsvpclient.destroytamu', $rsvp->id) }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                <i class="fa-regular fa-trash-can text-danger ms-lg-3"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    function copyLink(link) {
        var tempInput = document.createElement('input');
        tempInput.value = link;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);

        alert('Link telah disalin: ' + link);
    }
</script>

@endsection
