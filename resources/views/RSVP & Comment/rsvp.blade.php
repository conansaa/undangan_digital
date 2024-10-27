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
        <div id="reminder-button">
            <button onclick="downloadCalendarEvent()">Set Reminder in Calendar</button>
        </div>
    @endif

    <h1>Kehadiran</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('rsvp.store') }}" method="POST" id="rsvp-form">
        @csrf
        <input type="hidden" name="event_id" value="1"><br>
        <input type="text" name="name" placeholder="Nama" required value="{{ old('name', session('new_data')['name'] ?? '') }}"><br>
        <input type="text" name="phone_number" placeholder="Nomor Telepon" required value="{{ old('phone_number', session('new_data')['phone_number'] ?? '') }}"><br>
    
        <label>
            <input type="radio" name="confirmation" value="yes" {{ (old('confirmation', session('new_data')['confirmation'] ?? '') == 'Hadir') ? 'checked' : '' }} required> Hadir
        </label>
        <label>
            <input type="radio" name="confirmation" value="no" {{ (old('confirmation', session('new_data')['confirmation'] ?? '') == 'Tidak Hadir') ? 'checked' : '' }} required> Tidak Hadir
        </label><br>
    
        <select name="total_guest" id="total_guest" required>
            <option value="">Pilih Jumlah Tamu</option>
            <option value="1" {{ old('total_guest', session('new_data')['total_guest'] ?? '') == '1' ? 'selected' : '' }}>1</option>
            <option value="2" {{ old('total_guest', session('new_data')['total_guest'] ?? '') == '2' ? 'selected' : '' }}>2</option>
        </select><br>
    
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

            function downloadCalendarEvent() {
                var eventDateTime = "{{ $event->event_date }}";
                var eventTitle = "Pernikahan";
                var eventDescription = "Acara Pernikahan yang Dinantikan";
                var location = "Lokasi Pernikahan"; // Replace with actual location if available

                var icsFileContent = `
                    BEGIN:VCALENDAR
                    VERSION:2.0
                    BEGIN:VEVENT
                    SUMMARY:Shinta's Wedding
                    DTSTART:20241030T160800Z
                    DTEND:20241031T160800Z
                    DTSTAMP:20241026T160902Z
                    UID:1729958942139-ShintasWedding
                    DESCRIPTION:
                    LOCATION:Blater
                    ORGANIZER:Shinta's Family
                    STATUS:TENTATIVE
                    PRIORITY:1
                    END:VEVENT
                    END:VCALENDAR

                `;

                var blob = new Blob([icsFileContent.trim()], { type: 'text/calendar' });
                var link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = 'reminder.ics';
                link.click();
            }
        </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const confirmationRadios = document.getElementsByName('confirmation');
            const totalGuestInput = document.getElementById('total_guest');

            function updateTotalGuestInput() {
                const isAttending = Array.from(confirmationRadios).some(radio => radio.checked && radio.value === 'yes');
                
                if (!isAttending) {
                    totalGuestInput.value = 0;
                    totalGuestInput.removeAttribute('required'); 
                    totalGuestInput.style.display = 'none';
                } else {
                    totalGuestInput.setAttribute('required', 'required'); 
                    totalGuestInput.style.display = 'block';
                }
            }

            updateTotalGuestInput();

            confirmationRadios.forEach(radio => {
                radio.addEventListener('change', updateTotalGuestInput);
            });
        });
    </script>
</body>
</html>
