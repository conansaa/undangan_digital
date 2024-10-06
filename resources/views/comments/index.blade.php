<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Komentar</title>
</head>
<body>
    <h1>Daftar Konfirmasi Kehadiran Tamu</h1>

    <!-- Tampilkan pesan sukses jika ada -->
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <!-- Tampilkan URL spreadsheet jika ada -->
    @if (session('spreadsheetUrl'))
        <p>Link ke Google Sheets: <a href="{{ session('spreadsheetUrl') }}" target="_blank">{{ session('spreadsheetUrl') }}</a></p>
    @endif

    <!-- Form untuk menambahkan komentar -->
    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nama" required><br>
        <textarea name="message" placeholder="Pesan" required></textarea><br>
        <input type="checkbox" name="submit_to_google_sheets" id="submit_to_google_sheets" value="yes">
        <label for="submit_to_google_sheets">Submit data to Google Sheets</label><br>   
        <button type="submit">Kirim</button>
    </form>

    <!-- Daftar komentar -->
    <h2>Kehadiran Tamu</h2>
    <ul>
        @foreach ($comments as $comment)
            <li>
                <strong>{{ $comment->name }}:</strong> {{ $comment->message }}
            </li>
        @endforeach
    </ul>
</body>
</html>
