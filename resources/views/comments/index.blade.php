<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Komentar dan Countdown</title>
    <style>
        #countdown {
            display: flex;
            justify-content: center; /* Agar elemen berada di tengah */
            gap: 20px; /* Jarak antar elemen */
        }
        #countdown p div {
            font-size: 24px;
            text-align: center;
            border: 2px solid #ccc; /* Batas (border) untuk styling */
            padding: 10px;
            border-radius: 5px;
            min-width: 100px; /* Lebar minimum kotak */
            background-color: #f4f4f4; /* Warna latar belakang */
        }
    </style>
</head>
<body>
    <h1>Hitung Mundur Menuju Pernikahan</h1>
    <div id="countdown">
        <div id="days"></div>
        <div id="hours"></div>
        <div id="minutes"></div>
        <div id="seconds"></div>
    </div>

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

    <script>
        // Tentukan tanggal acara
        var eventDate = new Date("December 31, 2024 12:00:00").getTime();
    
        // Update hitung mundur setiap detik
        var countdownFunction = setInterval(function() {
    
            // Dapatkan waktu sekarang
            var now = new Date().getTime();
    
            // Jarak waktu antara sekarang dan tanggal acara
            var distance = eventDate - now;
    
            // Hitung waktu dalam hari, jam, menit, dan detik
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
            // Tampilkan hasil di elemen HTML
            document.getElementById("days").innerHTML = days + " Hari";
            document.getElementById("hours").innerHTML = hours + " Jam";
            document.getElementById("minutes").innerHTML = minutes + " Menit";
            document.getElementById("seconds").innerHTML = seconds + " Detik";
    
            // Jika hitung mundur selesai, tampilkan pesan
            if (distance < 0) {
                clearInterval(countdownFunction);
                document.getElementById("countdown").innerHTML = "Acara Telah Dimulai!";
            }
    
        }, 1000);
        </script>
</body>
</html>
