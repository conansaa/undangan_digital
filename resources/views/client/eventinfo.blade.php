@extends('admin.layout.template')

@section('content')
<div class="container text-center mt-5">
    <h1 class="text-warning">Halo! 👋</h1>
    <p class="lead mt-3">Tunggu sebentar yaa, admin sedang membuat acara untukmu! 😊</p>
    <p>Setelah acara siap, kamu bisa mengakses dashboard untuk mengelola undanganmu.</p>
    
    {{-- <div class="mt-4">
        <a href="{{ route('home') }}" class="btn btn-primary">Kembali ke Beranda</a>
    </div> --}}
</div>
@endsection

@section('footjs')
    @include('admin.layout.footer.admin')
@endsection