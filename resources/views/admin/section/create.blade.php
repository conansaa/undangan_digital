@extends('admin.layout.template')

@section('pages', 'Tambah Section')

@section('pagestitle', 'Tambah Section')

@section('sidebar')
    @include('admin.layout.sidebar.admin')
@endsection

@section('content')

<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="mb-3">
        <a href="/sections" class="btn btn-sm btn-outline-danger fw-bold me-2">Kembali</a>
    </div>
    <form action="" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label fw-bold">Nama Section</label>
            <input type="text" value="{{ old('name') }}" name="name" class="bg-white form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Section" required>
            @error('name')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <button name="submit" type="submit" class="btn btn-info text-white" onclick="return confirm('Apakah anda yakin ingin menambahkan section tersebut?')">Submit</button>
        </div>
    </form>    
</div>

@endsection

@section('footjs')
    @include('admin.layout.footer.admin')
@endsection