<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Komentar</title>
</head>
<body>
    <h1>Daftar Ucapan untuk Mempelai</h1>

    <!-- Tampilkan pesan sukses jika ada -->
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <!-- Form untuk menambahkan komentar -->
    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nama" required><br>
        <textarea name="message" placeholder="Pesan" required></textarea><br>
        <button type="submit">Kirim</button>
    </form>

    <!-- Daftar komentar -->
    <h2>Ucapan dari Tamu</h2>
    <ul>
        @foreach ($comments as $comment)
            <li>
                <strong>{{ $comment->name }}:</strong> {{ $comment->message }}
            </li>
        @endforeach
    </ul>
</body>
</html>
