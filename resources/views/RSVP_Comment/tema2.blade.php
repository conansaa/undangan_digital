<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding Invitation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Playfair+Display:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style_halaman1.css') }}">
</head>
<body>
    <div class="section section1">
        <div class="content">
            <p class="wedding-ket">We invite you to the wedding of</p>
            <h1 class="wedding-title">Shinta & Irfan</h1>
            <p class="wedding-date">Akad - 27 Desember 2024 <br>
                Resepsi - 28 Desember 2024
                </p>
            <p class="wedding-to">Kepada Yth</p>
            <h2 class="wedding-from">Sinta Dewi</h2>
            <button class="button" onclick="window.location.href='{{ route('rsvp.index') }}';">Open the Invitation <i
                class="fas fa-envelope"></i></button>
        </div>


       
    </div>

    </body>