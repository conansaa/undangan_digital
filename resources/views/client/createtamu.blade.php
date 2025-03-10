@extends('admin.layout.template')

@section('pages', 'RSVP')

@section('pagestitle', 'Tamu')

@section('sidebar')
    @include('client.layout')
@endsection

@section('content')

<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="mb-3">
        <a href="/rsvpclient" class="btn btn-sm btn-outline-danger fw-bold me-2">Kembali</a>
    </div>
    <form action="{{ route('rsvpclient.storetamu') }}" method="post" id="rsvpForm">
        @csrf
        
        <!-- Hidden input for event_id -->
        <input type="hidden" name="event_id" value="{{ $eventDetails }}">
        
        <div id="guestInputs">
            @for ($i = 0; $i < 1; $i++)
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Nama<span class="text-danger ms-1">*</span></label>
                    <input type="text" name="name[]" class="bg-white form-control" placeholder="Contoh: Khansa Delphi. Pastikan nama berbeda." required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">No Telp (Opsional)</label>
                    <input type="text" name="phone_number[]" class="bg-white form-control" placeholder="Contoh: 081234567890">
                </div>
            </div>
            @endfor
        </div>

        <div class="mb-3">
            <button type="button" class="btn btn-secondary" onclick="addGuestInput()">Tambah Input</button>
        </div>

        {{-- <div class="mb-3">
            <button name="submit" type="submit" class="btn btn-info text-white" onclick="return confirm('Apakah anda yakin ingin menambahkan RSVP tersebut?')">Tambah Tamu</button>
        </div> --}}
        <div class="mb-3">
            <button id="submitBtn" name="submit" type="button" class="btn btn-info text-white">Tambah Tamu</button>
        </div>
        
    </form> 
</div>

<script>
    function addGuestInput() {
        const guestInputs = document.getElementById('guestInputs');
        if (guestInputs.children.length >= 10) {
            Swal.fire({
                icon: 'warning',
                title: 'Batas Maksimal Tercapai!',
                text: 'Anda hanya bisa menambahkan maksimal 10 tamu.',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Mengerti'
            });
            return; // Hentikan fungsi jika sudah mencapai batas
        }
        const newInput = document.createElement('div');
        newInput.classList.add('row', 'mb-3');
        newInput.innerHTML = `
            <div class="col-md-6">
                <label class="form-label fw-bold">Nama<span class="text-danger ms-1">*</span></label>
                <input type="text" name="name[]" class="bg-white form-control" placeholder="Contoh: Khansa Delphi. Pastikan nama berbeda." required>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-bold">No Telp (Opsional)</label>
                <input type="text" name="phone_number[]" class="bg-white form-control" placeholder="Contoh: 081234567890">
            </div>
        `;
        guestInputs.appendChild(newInput);
    }

    function validatePhoneNumber() {
        const phoneInput = document.getElementById('phone_number');
        const phoneError = document.getElementById('phoneError');
        if (phoneInput.value.length < 12) {
            phoneError.style.display = 'block';
            return false; // Prevent form submission
        } else {
            phoneError.style.display = 'none';
            return true;
        }
    }

    document.getElementById('submitBtn').addEventListener('click', function (e) {
        e.preventDefault(); // Mencegah reload halaman

        Swal.fire({
            title: 'Konfirmasi RSVP',
            text: 'Apakah Anda yakin ingin menambahkan RSVP ini?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Tambah!',
            cancelButtonText: 'Batal',
            width: '350px', // Lebar modal diperkecil
            customClass: {
                // popup: 'small-swal',
                icon: 'small-icon',
                title: 'small-title',
                content: 'small-text',
                confirmButton: 'small-button',
                cancelButton: 'small-button'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika user konfirmasi, kirimkan form dengan AJAX
                let form = document.getElementById('rsvpForm');
                let formData = new FormData(form);

                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire('Sukses!', 'Tamu berhasil ditambahkan.', 'success')
                        .then(() => {
                            window.location.reload(); // Reload halaman setelah sukses
                        });
                    } else {
                        Swal.fire('Gagal!', data.message || 'Terjadi kesalahan.', 'error');
                    }
                })
                .catch(error => {
                    Swal.fire('Error!', 'Gagal mengirim data.', 'error');
                    console.error('Error:', error);
                });
            }
        });
    });

    // Tambahkan CSS langsung ke dalam JavaScript
    const style = document.createElement('style');
    style.innerHTML = `
        .small-swal { width: 350px !important; }
        .small-icon { width: 50px !important;  height: 50px !important; }
        .small-title { font-size: 18px !important; }
        .small-text { font-size: 14px !important; }
        .small-button { font-size: 14px !important; padding: 5px 10px !important; }
    `;
    document.head.appendChild(style);

    // Optional: Real-time validation as the user types
    document.getElementById('phone_number').addEventListener('input', function() {
        const phoneError = document.getElementById('phoneError');
        if (this.value.length < 12) {
            phoneError.style.display = 'block';
        } else {
            phoneError.style.display = 'none';
        }
    });

</script>
@endsection

@section('footjs')
    @include('admin.layout.footer.admin')
@endsection