<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSVP</title>
    <style>
        #countdown {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        #countdown div {
            font-size: 24px;
            text-align: center;
            border: 2px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            min-width: 100px;
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Hitung Mundur Menuju Pernikahan</h1>

    @if ($errors->has('event_error'))
        <p style="color: red;">{{ $errors->first('event_error') }}</p>
    @else
        <div id="countdown">
            <div id="days"></div>
            <div id="hours"></div>
            <div id="minutes"></div>
            <div id="seconds"></div>
        </div>
    @endif

    <h1>Konfirmasi Kehadiran RSVP</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('rsvp.store') }}" method="POST" id="rsvp-form">
        @csrf
        <input type="hidden" name="event_id" value="1"><br>
        <input type="text" name="name" placeholder="Nama" required value="{{ old('name', session('new_data')['name'] ?? '') }}"><br>
        <input type="text" name="phone_number" placeholder="Nomor Telepon" required value="{{ old('phone_number', session('new_data')['phone_number'] ?? '') }}"><br>

        <select name="confirmation" id="confirmation" required>
            <option value="">Pilih Konfirmasi</option>
            <option value="yes" {{ (old('confirmation', session('new_data')['confirmation'] ?? '') == 'Hadir') ? 'selected' : '' }}>Hadir</option>
            <option value="no" {{ (old('confirmation', session('new_data')['confirmation'] ?? '') == 'Tidak Hadir') ? 'selected' : '' }}>Tidak Hadir</option>
        </select><br>

        <input type="number" name="total_guest" id="total_guest" placeholder="Jumlah Tamu" required value="{{ old('total_guest', session('new_data')['total_guest'] ?? '') }}" min="0"><br>

        @if (session('phone_exists'))
            <p style="color: red;">{{ session('message') }}</p>
            <h3>Data Lama:</h3>
            <ul>
                <li>Nama: {{ session('existing_rsvp')->name }}</li>
                <li>Nomor Telepon: {{ session('existing_rsvp')->phone_number }}</li>
                <li>Konfirmasi: {{ session('existing_rsvp')->confirmation }}</li>
                <li>Jumlah Tamu: {{ session('existing_rsvp')->total_guest }}</li>
            </ul>
            <button formaction="{{ route('rsvp.confirmUpdate') }}" formmethod="POST">Edit Data</button>
            <button formaction="{{ route('rsvp.cancelUpdate') }}" formmethod="POST">Batalkan</button>
        @else
            <button type="submit">Kirim</button>
        @endif
    </form>

    <h2>Daftar Kehadiran</h2>
    <ul>
        @foreach ($rsvps as $rsvp)
            <li>
                <strong>{{ $rsvp->name }}</strong><br>
                Nomor Telepon: {{ $rsvp->phone_number }}<br>
                Konfirmasi: {{ $rsvp->confirmation }}<br>
                Jumlah Tamu: {{ $rsvp->total_guest }}
            </li>
        @endforeach
    </ul>

    <h2>Komentar</h2>
    <form action="{{ route('comment.store') }}" method="POST">
        @csrf
        <input type="hidden" name="rsvp_id" value="{{ session('rsvp_id') }}"> <!-- Hidden rsvp_id field -->
        <textarea name="comment" placeholder="Tulis komentar Anda..." required></textarea><br>
        <button type="submit">Kirim Komentar</button>
    </form>

    <ul>
        @foreach ($comments as $comment)
            <li>
                <strong>{{ $comment->rsvp->name }}:</strong> <!-- Showing the name linked to the rsvp_id -->
                {{ $comment->comment }}
            </li>
        @endforeach
    </ul>
    

    @if (!$errors->has('event_error'))
        <script>
            var eventDate = new Date("{{ $event->event_date }}").getTime();

            var countdownFunction = setInterval(function() {
                var now = new Date().getTime();
                var distance = eventDate - now;

                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById("days").innerHTML = days + " Hari";
                document.getElementById("hours").innerHTML = hours + " Jam";
                document.getElementById("minutes").innerHTML = minutes + " Menit";
                document.getElementById("seconds").innerHTML = seconds + " Detik";

                if (distance < 0) {
                    clearInterval(countdownFunction);
                    document.getElementById("countdown").innerHTML = "Acara Telah Dimulai!";
                }
            }, 1000);
        </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const confirmationSelect = document.getElementById('confirmation');
            const totalGuestInput = document.getElementById('total_guest');

            function updateTotalGuestInput() {
                if (confirmationSelect.value === 'no') {
                    totalGuestInput.value = 0;
                    totalGuestInput.disabled = true;
                } else {
                    totalGuestInput.disabled = false;
                }
            }

            updateTotalGuestInput();
            confirmationSelect.addEventListener('change', updateTotalGuestInput);
        });
    </script>
</body>
</html>
