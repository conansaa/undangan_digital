@extends('admin.layout.template')

@section('pages', 'Client')

@section('pagestitle', 'Client')

@section('sidebar')
    @include('client.layout')
@endsection

@section('content')

{{-- <style>
    .quota-text {
        margin-left: 0;
        text-align: left;
    }
</style> --}}
<div class="row">
    <div class="col-lg-6 col-12">
        <div class="row">
        {{-- <a href="{{ route('rsvpclient') }}" style="text-decoration: none; color: inherit;"> --}}
            <div class="col-lg-6 col-md-6 col-12">
                <div class="card">
                    <span class="mask bg-primary opacity-10 border-radius-lg"></span>
                    <div class="card-body p-3 position-relative">
                        <div class="row">
                            <div class="col-8 text-start">
                                <div class="icon icon-shape bg-white shadow text-center border-radius-2xl">
                                    <i class="fa-solid fa-calculator text-dark text-gradient text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                                <h5 class="text-white font-weight-bolder mb-0 mt-3">
                                    {{ $totalGuests }}/{{ $totalQuota }}
                                </h5>
                                <span class="text-white text-sm">Kuota Terisi</span>
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
    <div class="col-lg-6 col-12 d-flex justify-content-end align-items-end mt-auto">
        <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#importModal">
            <i class="fas fa-file-import"></i> Import
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exportModal">
            <i class="fas fa-file-export"></i> Export
        </button>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header pb-0 mb-2">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0">List Data Tamu</h6>
            {{-- <div>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#importModal">
                    <i class="fas fa-file-import"></i> Import
                </button>
                <a href="/export-guests" class="btn btn-primary">
                    <i class="fas fa-file-export"></i> Export
                </a>
            </div> --}}
            <a href="/rsvpclient/createtamu" class="text-decoration-none btn btn-sm btn-success d-none d-lg-block">Tambah <i class="fa-solid fa-plus"></i></a>
            <a href="/rsvpclient/createtamu" class="text-decoration-none btn btn-sm btn-success d-lg-none d-block"><i class="fa-solid fa-plus"></i></a>
        </div>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Tamu</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No. Telpon</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Konfirmasi</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Tamu</th>
                    <th class="text-secondary opacity-7"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rsvps as $rsvp)
                    <tr>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $rsvp->name }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $rsvp->phone_number }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $rsvp->confirmation }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $rsvp->total_guest }}</td>
                        <td class="align-middle">
                            @php
                                $invitationLink = url('/caroline-hezron/to/'.$rsvp->name); 
                            @endphp
                            @if ($rsvp->phone_number)
                                <a href="#" onclick="copyLink('{{ $invitationLink }}')" 
                                    class="text-decoration-none ms-lg-3" 
                                    title="Salin Link">
                                    <i class="fa-solid fa-copy"></i>
                                </a>
                                <a href="{{ route('rsvp.incrementSendingTrack', $rsvp->id) }}" 
                                    onclick="window.open('https://wa.me/{{ $rsvp->WhatsAppNumber }}?text={{ urlencode("Hi ada undangan buat kamu nih $invitationLink, jangan lupa dateng yaa :D") }}'); return true;" 
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

    <!-- Modal Import -->
    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Import Daftar Tamu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('import.guests') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        
                        <!-- Info untuk pengguna -->
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i>  
                            Gunakan template berikut agar format file sesuai. Klik tombol <strong>"Download Template"</strong> sebelum mengunggah daftar tamu.
                        </div>
    
                        <!-- Tombol Download Template -->
                        <div class="mb-3">
                            <a href="{{ route('download.template') }}" class="btn btn-primary">
                                <i class="fas fa-download"></i> Download Template
                            </a>
                        </div>
    
                        <!-- Info Format Nama & Nomor Telepon -->
                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation-triangle"></i>  
                            <strong>Pastikan format penulisan benar:</strong>
                            <ul class="mb-0">
                                <li><strong>Nama:</strong> Gunakan huruf kapital di awal kata (contoh: <em>Khansa Delphi</em>) bisa menggunakan spasi ya!. Disarankan untuk menggunakan nama lengkap agar unik!</li>
                                <li><strong>Nomor Telepon:</strong> Tanpa kode negara (+62) dan tanpa 0 di depan (contoh: <em>81234567890</em>).</li>
                            </ul>
                        </div>
    
                        <!-- Input File -->
                        <div class="mb-3">
                            <label for="file" class="form-label">Pilih File Excel (CSV/XLSX)</label>
                            <input type="file" class="form-control" id="file" name="file" accept=".csv, .xlsx" required>
                        </div>
    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>        

    <!-- Modal Export -->
    <div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exportModalLabel">Pilih Format Export</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <p>Silakan pilih format file untuk export data RSVP.</p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="{{ url('/export-guests/excel') }}" class="btn btn-success">
                            <i class="fas fa-file-excel"></i> Export Excel
                        </a>
                        <a href="{{ url('/export-guests/pdf') }}" class="btn btn-danger">
                            <i class="fas fa-file-pdf"></i> Export PDF
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



{{-- <div>
<a href="{{ route('rsvpclient') }}" style="text-decoration: none; color: inherit;">
    <div class="card shadow border-0 p-3 d-flex align-items-center justify-content-center bg-white  mb-4" style="border-radius: 10px; background-color: #f8f9fa;">
        <div class="card-body text-center">
            <h5 class="card-title mb-2" style="font-size: 18px; font-weight: bold; color: #202229;">Kuota Terisi</h5>
            <p class="card-text" style="font-size: 16px; font-weight: bold; margin-bottom: 0;">
                {{ $totalGuests }}/{{ $totalQuota }}
            </p>
        </div>
    </div>
</a>
</div> --}}
{{-- <div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
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
</div> --}}

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

@section('footjs')
    @include('admin.layout.footer.admin')
@endsection