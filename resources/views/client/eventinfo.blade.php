@extends('admin.layout.template')

@section('content')
<div class="container text-center mt-5">
    <h1 class="text-warning">Halo! 👋</h1>
    <p class="lead mt-3">Buat acaramu bersama diikatJanji! 🎉</p>
    <p>Isi detail acaramu secara bertahap dengan panduan yang sudah kami siapkan.</p>

    <a href="{{ route('create.event') }}" class="btn btn-warning mt-3">
        Buat Acara Sekarang 🚀
    </a>
</div>
@endsection

@section('footjs')
    @include('admin.layout.footer.admin')
@endsection
