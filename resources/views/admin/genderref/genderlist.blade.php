@extends('admin.layout')

@section('title', 'Data Gender')

@section('judul', 'Data Gender')

@section('konten_admin')

<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <h5 class="fw-bold mb-3">Data Gender</h5>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">Nama Gender</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($genders as $gender)
                <tr>
                    <th scope="col" class="text-center">{{ $loop->iteration }}</th>
                    <td scope="col" class="text-center">{{ $gender->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
