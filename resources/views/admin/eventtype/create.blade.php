@extends('admin.layout.template')

@section('pages', 'Tambah Tipe Acara')

@section('pagestitle', 'Tambah Tipe Acara')

@section('sidebar')
    @include('admin.layout.sidebar.admin')
@endsection

@section('content')

<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="mb-3">
        <a href="/event-type" class="btn btn-sm btn-outline-danger fw-bold me-2">Kembali</a>
    </div>
    <form action="" method="post">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label fw-bold">Nama Tipe Acara</label>
            <input type="text" value="{{ old('nama') }}" name="nama" class="bg-white form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama Tipe Acara" required>
            @error('nama')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <button name="submit" type="submit" class="btn btn-info text-white" onclick="return confirm('Apakah anda yakin ingin menambahkan tipe acara tersebut?')">Submit</button>
        </div>
    </form>    
</div>

@endsection

@section('footjs')
    @include('admin.layout.footer.admin')
@endsection