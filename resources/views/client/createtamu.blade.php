@extends('client.layout')

@section('title', 'RSVP')

@section('judul', 'Data Tamu')

@section('konten_client')

<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="mb-3">
        <a href="/rsvpclient" class="btn btn-sm btn-outline-danger fw-bold me-2">Kembali</a>
    </div>
    <form action="/rsvpclient/createtamu" method="post">
        @csrf
        
        <!-- Hidden input for event_id -->
        <input type="hidden" name="event_id" value="{{ $eventDetails->id }}">
        
        <div class="mb-3">
            <label for="name" class="form-label fw-bold">Nama<span class="text-danger ms-1">*</span></label> 
            <input type="text" name="name" class="bg-white form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama" required>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <small class="form-text text-muted">Pastikan nama tamu tidak sama</small>
        </div>

        <div class="mb-3">
            <label for="phone_number" class="form-label fw-bold">No Telp</label>
            <input type="text" id="phone_number" name="phone_number" class="bg-white form-control @error('phone_number') is-invalid @enderror" placeholder="Masukkan No Telp">
            @error('phone_number')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <div id="phoneError" class="invalid-feedback" style="display: none;">
                Nomor telepon harus minimal 12 digit.
            </div>
        </div>

        <div class="mb-3">
            <button name="submit" type="submit" class="btn btn-info text-white" onclick="return confirm('Apakah anda yakin ingin menambahkan RSVP tersebut?')">Tambah Tamu</button>
        </div>
    </form> 
</div>

<script>
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
