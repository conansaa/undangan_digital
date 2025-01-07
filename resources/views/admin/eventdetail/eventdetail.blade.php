@extends('admin.layout.template')

@section('pages', 'Acara')

@section('pagestitle', 'Acara')

@section('sidebar')
    @include('admin.layout.sidebar.admin')
@endsection

@section('content')
<div class="card">
    <div class="card-header pb-0 mb-2">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0">Tabel Acara</h6>
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
                            <button type="button"
                                    id="finish-btn-{{ $event->id }}"
                                    style="@if(session('finished_event_ids') && in_array($event->id, session('finished_event_ids')))
                                            background-color: red; color: white; cursor: not-allowed; opacity: 0.7; border-radius: 10px; font-size: 0.75rem /* 12px */; line-height: 1rem /* 16px */;
                                        @else
                                            color: white; background-color: green; border: none; cursor: pointer; border-radius: 10px; font-size: 0.75rem /* 12px */; line-height: 1rem /* 16px */;
                                        @endif"
                                    @if(session('finished_event_ids') && in_array($event->id, session('finished_event_ids')))
                                        disabled
                                    @endif
                                    onclick="@if(!(session('finished_event_ids') && in_array($event->id, session('finished_event_ids'))) ) markAsFinished({{ $event->id }}) @endif">
                                @if(session('finished_event_ids') && in_array($event->id, session('finished_event_ids')))
                                    Finished
                                @else
                                    Finish
                                @endif
                            </button>
                            {{-- <button type="button" class="btn btn-link text-success text-xs p-0 m-0" onclick="markAsFinished({{ $event->id }})">
                                Finish
                            </button>   --}}
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
        fetch(`/event/finish/${eventId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const button = document.getElementById(`finish-btn-${eventId}`);
                button.style.backgroundColor = 'red';
                button.style.color = 'white';
                button.style.cursor = 'not-allowed';
                button.style.opacity = '0.7';
                button.textContent = 'Finished';
                button.disabled = true; // Disable tombol
                button.onclick = null; // Hapus onclick handler
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
</script>
@endsection

@section('footjs')
    @include('admin.layout.footer.admin')
@endsection