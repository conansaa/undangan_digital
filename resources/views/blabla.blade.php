<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undangan Pernikahan</title>
    <style>
        /* CSS sederhana untuk membagi section */
        section {
            padding: 20px;
            margin: 10px 0;
            border-bottom: 1px solid #ddd;
        }
        section.opening-container {
            text-align: center;
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin: 0;
            font-size: 2.5rem;
        }
        .couple-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }
        .social-media {
            margin-top: 10px;
            font-size: 1rem;
        }
        .social-media a {
            color: #007bff;
            text-decoration: none;
            margin: 0 10px;
        }
        .social-media a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    {{-- <!-- Section Opening -->
    <section class="opening-container">
        <h1>The Wedding of</h1>
        <h1>{{ $wedding->groom_name }} & {{ $wedding->bride_name }}</h1>
    </section> --}}

    {{-- <!-- Section Data Pengantin -->
    <section id="couple">
        <h2>Data Pengantin</h2>
        @foreach ($wedding as $couple)
            <div class="couple-info">
                <img class="couple-photo" src="{{ asset('storage/couples/' . $couple->photo) }}" alt="{{ $couple->name }}">
                <h3>{{ $couple->name }}</h3>
            </div>
        @endforeach
    </section> --}}
    
    {{-- <!-- Section Detail Acara -->
    <section id="event-details">
        <h2>Detail Acara</h2>
        @foreach ($eventDetails as $detail)
            <p>{{ $detail->event_name }} - {{ \Carbon\Carbon::parse($detail->event_date)->format('F j, Y') }}</p>
            <p>Location: {{ $detail->location }}</p>
        @endforeach
    </section>

    <!-- Section Ucapan -->
    <section id="comments">
        <h2>Ucapan</h2>
        @foreach ($comments as $comment)
            <p><strong>{{ $comment->name }}:</strong> {{ $comment->message }}</p>
        @endforeach
    </section>

    <!-- Section Galeri Foto -->
    <section id="gallery">
        <h2>Galeri Foto</h2>
        <div class="gallery-grid">
            @foreach ($gallery as $photo)
                <img src="{{ asset('storage/gallery/' . $photo->filename) }}" alt="Foto">
            @endforeach
        </div>
    </section>

    <h1>Selamat Datang di Undangan Pernikahan</h1> --}}

    

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
