@extends('admin.layout')

@section('title', 'Ubah Ucapan')

@section('judul', 'Ubah Ucapan')

@section('konten_admin')
<div class="card bg-white border-0 shadow p-4" style="min-height: 70vh">
    <div class="mb-3">
        <a href="/comments" class="btn btn-sm btn-outline-danger fw-bold me-2">Kembali</a>
    </div>
    <form action="/comment/edit/{{ $comment->id }}" method="post">
        @csrf
        @method("put")
        
        <div class="mb-3">
            <label for="rsvp_id" class="form-label fw-bold">RSVP</label>
            <select class="form-select bg-white @error('rsvp_id') is-invalid @enderror" name="rsvp_id">
                <option selected value="{{ $comment->rsvp_id }}">
                    {{ $comment->rsvp->name }}
                </option>
                @foreach($rsvps as $rsvp)
                    <option value="{{ $rsvp->id }}">{{ $rsvp->name }}</option>
                @endforeach
            </select>
            @error('rsvp_id')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="comment" class="form-label fw-bold">Komentar</label>
            <textarea name="comment" class="bg-white form-control @error('comment') is-invalid @enderror" rows="3" placeholder="Masukkan Komentar">{{ old('comment', $comment->comment) }}</textarea>
            @error('comment')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <button name="submit" type="submit" class="btn btn-info text-white" onclick="return confirm('Apakah anda yakin ingin mengubah ucapan tersebut?')">Simpan Perubahan</button>
        </div>
    </form>    
</div>
@endsection
