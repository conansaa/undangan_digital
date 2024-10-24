@extends('admin.layout')

@section('title', 'Ubah Laporan Acara')

@section('judul', 'Ubah Laporan Acara')

@section('konten_admin')
<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="mb-3">
        <a href="/event-reports" class="btn btn-sm btn-outline-danger fw-bold me-2">Kembali</a>
    </div>
    <form action="/eventreport/edit/{{ $eventReport->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("put")
        <div class="mb-3">
            <label for="event_type_id" class="form-label fw-bold">Tipe Acara</label>
            <select class="form-select bg-white @error('event_type_id') is-invalid @enderror" name="event_type_id">
                <option selected value="{{ $eventReport->event_type_id }}">
                    {{ $eventReport->eventType->nama }}
                </option>
                @foreach($eventTypes as $eventType)
                    <option value="{{ $eventType->id }}">{{ $eventType->nama }}</option>
                @endforeach
            </select>
            @error('event_type_id')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="month" class="form-label fw-bold">Bulan</label>
            <select class="form-select bg-white @error('month') is-invalid @enderror" name="month">
                <option selected value="{{ $eventReport->month }}">
                    {{ \Carbon\Carbon::create()->month($eventReport->month)->format('F') }}
                </option>
                @for($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}">{{ \Carbon\Carbon::createFromDate(null, $i, 1)->format('F') }}</option>
                @endfor
            </select>
            @error('month')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="year" class="form-label fw-bold">Tahun</label>
            <input type="number" value="{{ old('year', $eventReport->year) }}" name="year" class="bg-white form-control @error('year') is-invalid @enderror" placeholder="Masukkan Tahun">
            @error('year')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="counter" class="form-label fw-bold">Counter</label>
            <input type="number" value="{{ old('counter', $eventReport->counter) }}" name="counter" class="bg-white form-control @error('counter') is-invalid @enderror" placeholder="Masukkan Counter">
            @error('counter')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <button name="submit" type="submit" class="btn btn-info text-white" onclick="return confirm('Apakah anda yakin ingin mengubah laporan acara tersebut?')">Simpan Perubahan</button>
        </div>
    </form>    
</div>
@endsection
