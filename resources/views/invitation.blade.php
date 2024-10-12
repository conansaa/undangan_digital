<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undangan Pernikahan</title>
</head>
<body>

    <h1>Selamat Datang di Undangan Pernikahan</h1>

    <h2>Lokasi Acara</h2>
    <p>Tempat: {{ $address->venue_name }}</p>
    <p>Alamat: {{ $address->address }}</p>

    <p>
        Lokasi di Google Maps:
        <a href="https://www.google.com/maps?q={{ $address->latitude }},{{ $address->longitude }}" target="_blank">
            Lihat di Google Maps
        </a>
    </p>

    <!-- Menampilkan peta Google Maps langsung di halaman -->
    <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.4721936303993!2d106.82860931528752!3d-6.175110395527297!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3eaf3e393d7%3A0x888f99ecae61e5f5!2sMonas!5e0!3m2!1sen!2sid!4v1631648432831!5m2!1sen!2sid" 
        width="600" 
        height="450" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy">
    </iframe>


</body>
</html>
