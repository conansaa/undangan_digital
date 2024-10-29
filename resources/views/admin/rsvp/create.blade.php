@extends('admin.layout')

@section('title', 'Tambah RSVP')

@section('judul', 'Tambah RSVP')

@section('konten_admin')

<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="mb-3">
        <a href="/rsvps" class="btn btn-sm btn-outline-danger fw-bold me-2">Kembali</a>
    </div>
    <form action="/rsvps/create" method="post">
        @csrf
        <div class="mb-3">
            <label for="event_id" class="form-label fw-bold">Event</label>
            <select class="form-select bg-white @error('event_id') is-invalid @enderror" name="event_id">
                <option value="">Pilih Event</option>
                @foreach($eventDetails as $event)
                    <option value="{{ $event->id }}">{{ $event->event_name }}</option>
                @endforeach
            </select>
            @error('event_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="name" class="form-label fw-bold">Nama</label>
            <input type="text" name="name" class="bg-white form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone_number" class="form-label fw-bold">No Telp</label>
            <input type="text" name="phone_number" class="bg-white form-control @error('phone_number') is-invalid @enderror" placeholder="Masukkan No Telp">
            @error('phone_number')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="confirmation" class="form-label fw-bold">Konfirmasi Kehadiran</label>
            <select class="form-select bg-white @error('confirmation') is-invalid @enderror" name="confirmation">
                <option value="">Pilih Status Kehadiran</option>
                <option value="yes">Hadir</option>
                <option value="no">Tidak Hadir</option>
            </select>
            @error('confirmation')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="total_guest" class="form-label fw-bold">Jumlah Tamu</label>
            <input type="number" id="total_guest" name="total_guest" max="2" class="bg-white form-control @error('total_guest') is-invalid @enderror" placeholder="Masukkan Jumlah Tamu (Maksimal 2)">
            @error('total_guest')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>        

        <div class="mb-3">
            <button name="submit" type="submit" class="btn btn-info text-white" onclick="return confirm('Apakah anda yakin ingin menambahkan RSVP tersebut?')">Submit</button>
        </div>
    </form> 
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const confirmationSelect = document.querySelector('select[name="confirmation"]');
            const totalGuestInput = document.getElementById('total_guest');
    
            function updateTotalGuestInput() {
                if (confirmationSelect.value === 'yes') {
                    totalGuestInput.disabled = false; // Enable input jika konfirmasi "Hadir"
                    totalGuestInput.value = ''; // Reset nilai
                } else {
                    totalGuestInput.disabled = true; // Disable input jika konfirmasi "Tidak Hadir"
                    totalGuestInput.value = 0; // Set nilai menjadi 0
                }
            }
    
            // Initial check when page loads
            updateTotalGuestInput();
            // Add event listener for change on confirmation select
            confirmationSelect.addEventListener('change', updateTotalGuestInput);
        });
    </script>
    
</div>

@endsection
