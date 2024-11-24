@extends('admin.layout.template')

@section('pages', 'Detail Acara')

@section('pagestitle', 'Detail Acara')

@section('sidebar')
    @include('admin.layout.sidebar.admin')
@endsection

@section('content')
<div class="card">
    <div class="card-header pb-0 mb-2">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0">Tabel Detail Acara</h6>
            <a href="/event/create" class="btn btn-sm btn-success d-none d-lg-block">
                Tambah <i class="fa-solid fa-plus"></i>
            </a>
            <a href="/event/create" class="btn btn-sm btn-success d-lg-none">
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pemilik Acara</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Acara</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tipe Acara</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Waktu</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tema</th>
                    <th class="text-secondary opacity-7"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $event->eventOwner->user->name }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $event->event_name }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $event->eventType->nama }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ \Carbon\Carbon::parse($event->event_date)->format('d-m-Y') }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ \Carbon\Carbon::parse($event->event_time)->format('H:i') }}</td>
                        <td class="align-middle text-center text-secondary text-xs font-weight-bold">{{ $event->themes->name }}</td>
                        <td class="align-middle">
                            <a href="/event/edit/{{ $event->id }}">
                                <span class="text-dark"><i class="fa-regular fa-pen-to-square"></i></span>
                            </a>
                            <a href="/details/{{ $event->id }}">
                                <span class="text-dark ms-1"><i class="fa-regular fa-eye"></i></span>
                            </a>
                            <button type="button" class="btn btn-link text-success text-xs p-0 m-0" onclick="markAsFinished({{ $event->id }})">
                                Finish
                            </button>  
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>

<script>
    function markAsFinished(eventId) {
        fetch(`/event-reports/finish/${eventId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-Token': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ status: 'finished' })
        })
        .then(response => {
            // Check if the response is JSON
            return response.json().catch(() => {
                throw new Error('Server returned non-JSON response');
            });
        })
        .then(data => {
            if (data.success) {
                alert('Event has been marked as finished!');
                location.reload();
            } else {
                alert('Failed to mark as finished: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error); 
            alert('An error occurred: ' + error.message);
        });
    }

</script>
@endsection

@section('footjs')
    @include('admin.layout.footer.admin')
@endsection