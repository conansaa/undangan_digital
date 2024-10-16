<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Undangan Pernikahan</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2, h3 {
            text-align: center;
        }
        .event-details {
            margin-bottom: 30px;
        }
        .section {
            margin: 20px 0;
        }
        .button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Undangan Pernikahan</h1>

        <div class="countdown-container">
            <h3>Countdown to the Wedding</h3>
            <div id="countdown">
                <span id="days"></span> Days
                <span id="hours"></span> Hours
                <span id="minutes"></span> Minutes
                <span id="seconds"></span> Seconds
            </div>
        </div>
        
        <script>
            // Ambil tanggal pernikahan dari Laravel dan parsing ke JavaScript
            var weddingDate = new Date("{{ $eventDetail->date }}").getTime();
        
            // Update hitungan mundur setiap detik
            var countdown = setInterval(function() {
        
                // Ambil tanggal dan waktu saat ini
                var now = new Date().getTime();
        
                // Hitung selisih waktu antara tanggal sekarang dan tanggal pernikahan
                var timeDifference = weddingDate - now;
        
                // Hitung waktu untuk hari, jam, menit, dan detik
                var days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
                var hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);
        
                // Tampilkan hasilnya di elemen dengan ID masing-masing
                document.getElementById("days").innerHTML = days;
                document.getElementById("hours").innerHTML = hours;
                document.getElementById("minutes").innerHTML = minutes;
                document.getElementById("seconds").innerHTML = seconds;
        
                // Jika hitungan mundur selesai, tampilkan pesan
                if (timeDifference < 0) {
                    clearInterval(countdown);
                    document.getElementById("countdown").innerHTML = "The wedding has begun!";
                }
            }, 1000);
        </script>
        
        
        <div class="event-details section">
            <h2>Detail Acara</h2>
            <p><strong>Nama Acara:</strong> {{ $eventDetail->event_name }}</p>
            <p><strong>Hari:</strong> {{ $eventDetail->day }}</p>
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($eventDetail->date)->format('d F Y') }}</p>
            <p><strong>Waktu:</strong> {{ $eventDetail->time }}</p>
            <p><strong>Tempat:</strong> {{ $eventDetail->venue }}</p>
        </div>

        <div class="map section">
            <h2>Lokasi Acara</h2>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.4721936303993!2d106.82860931528752!3d-6.175110395527297!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3eaf3e393d7%3A0x888f99ecae61e5f5!2sMonas!5e0!3m2!1sen!2sid!4v1631648432831!5m2!1sen!2sid{{ $eventDetail->latitude }},{{ $eventDetail->longitude }}"
                width="100%"
                height="400"
                style="border:0;"
                allowfullscreen=""
                loading="lazy">
            </iframe>
        </div>

        <div class="couple section">
            <h2>Selamat kepada</h2>
            <h3>{{ $groom->name }} & {{ $bride->name }}</h3>
            <img src="{{ asset($groom->photo) }}" alt="Foto Mempelai Pria" style="max-width: 200px; border-radius: 10px;">
            <img src="{{ asset($bride->photo) }}" alt="Foto Mempelai Wanita" style="max-width: 200px; border-radius: 10px;">
        </div>

        <div class="comments section">
            <h2>Komentar</h2>
        
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        
            <form method="POST" action="{{ route('invitation.detail') }}">
                @csrf
                <div>
                    <label for="name">Nama:</label>
                    <input type="text" name="name" id="name" required>
                </div>
                <div>
                    <label for="comment">Komentar:</label>
                    <textarea name="comment" id="comment" rows="4" required></textarea>
                </div>
                <button type="submit">Kirim Komentar</button>
            </form>
            
        
            <h3>Daftar Komentar:</h3>
            <ul>
                @if($comments->isNotEmpty())
                <div class="comments-section">
                    @foreach($comments as $comment)
                        <div class="comment">
                            <h5>{{ $comment->name }}</h5> <!-- Menampilkan nama pengirim komentar -->
                            <p>{{ $comment->comment }}</p> <!-- Menampilkan isi komentar -->
                            <small>Ditambahkan pada: {{ $comment->created_at->format('d M Y H:i') }}</small>
                        </div>
                    @endforeach
                </div>
            @else
                <p>Tidak ada komentar saat ini.</p>
            @endif

            </ul>
        </div>
        
    </div>
</body>
</html>
