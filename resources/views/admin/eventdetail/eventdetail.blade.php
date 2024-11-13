@extends('admin.layout')

@section('title', 'Data Detail Acara')

@section('judul', 'Detail Acara')

@section('konten_admin')

<div>
    <div class="row justify-content-between mb-3">
        <div class="col-24 col-lg-12 d-flex justify-content-end">
            <div class="me-2">
                <a href="/event/create" class="text-decoration-none btn btn-sm btn-success d-none d-lg-block">Tambah <i class="fa-solid fa-plus"></i></a>
                <a href="/event/create" class="text-decoration-none btn btn-sm btn-success d-lg-none d-block"><i class="fa-solid fa-plus"></i></a>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center" style="width: 5%;">No</th>
                <th scope="col" style="width: 15%;">Nama Pengguna</th>
                <th scope="col" style="width: 10%;">Nama Acara</th>
                <th scope="col" style="width: 10%;">Tipe Acara</th>
                <th scope="col" style="width: 10%;">Tanggal</th>
                <th scope="col" style="width: 10%;">Waktu</th>
                <th scope="col" style="width: 20%;">Lokasi</th>
                <th scope="col" style="width: 5%;">Kuota</th>
                <th scope="col" class="text-center" style="width: 15%;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <th class="text-center">{{ $loop->iteration }}</th>
                    <td>{{ $event->user->name }}</td>
                    <td>{{ $event->event_name }}</td>
                    <td>{{ $event->eventType->nama }}</td>
                    <td>{{ \Carbon\Carbon::parse($event->event_date)->format('d-m-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($event->event_time)->format('H:i') }}</td>
                    <td>{{ $event->location }}</td>
                    <td>{{ $event->quota }}</td>
                    <td class="text-center">
                        <a href="/event/edit/{{ $event->id }}"><span class="text-dark"><i class="fa-regular fa-pen-to-square"></i></span></a>
                        <a href="/details/{{ $event->id }}"><span class="text-dark ms-1"><i class="fa-regular fa-eye"></i></span></a>
                        <button type="button" class="btn btn-sm btn-success" onclick="markAsFinished({{ $event->id }})">Finish</button>                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function markAsFinished(eventId) {
        fetch(`/event-reports/finish/${eventId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-Token': '{{ csrf_token() }}' // Sertakan CSRF token jika diperlukan
            },
            body: JSON.stringify({ status: 'finished' }) // Tambahkan data jika diperlukan
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Event has been marked as finished!');
                location.reload(); // Muat ulang halaman untuk memperbarui tampilan
            } else {
                alert('Failed to mark as finished: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while marking the event as finished.');
        });
    }
</script>

@endsection
