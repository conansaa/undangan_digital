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

    <!-- Form RSVP -->
    <form action="{{ route('rsvp.store') }}" method="POST" id="rsvp-form">
        @csrf
        <input type="hidden" name="event_id" value="1"><br>
        <input type="text" name="name" placeholder="Nama" required><br>
        <input type="text" name="phone_number" placeholder="Nomor Telepon" required><br>
        
        <select name="confirmation" id="confirmation" required>
            <option value="">Pilih Konfirmasi</option>
            <option value="yes">Hadir</option>
            <option value="no">Tidak Hadir</option>
        </select><br>

        <input type="number" name="total_guest" id="total_guest" placeholder="Jumlah Tamu" required><br>
        
        <button type="submit">Kirim</button>
    </form>

    <script>
        const confirmationSelect = document.getElementById('confirmation');
        const totalGuestInput = document.getElementById('total_guest');

        // Event listener for changes in the confirmation select
        confirmationSelect.addEventListener('change', function () {
            if (this.value === 'no') {
                totalGuestInput.value = 0;  // Set value to 0
                totalGuestInput.disabled = true;  // Disable the input
            } else {
                totalGuestInput.disabled = false;  // Enable the input
                totalGuestInput.value = '';  // Clear the input
            }
        });

        // Clear form if the success message exists
        if (document.querySelector('p[style="color: green;"]')) {
            document.getElementById('rsvp-form').reset();
        }
    </script>

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
</body>
</html>
