<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shinta & Irfan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Playfair+Display:wght@400;700&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="section section1">
        <div class="content">
            <div class="text-overlay">
                <p class="wedding-ket">The wedding of</p>
                <h1 class="wedding-title">Shinta & Irfan</h1>
                <p class="wedding-date">{{$eventAkad->event_name}} - {{ \Carbon\Carbon::parse($eventAkad->event_date)->translatedFormat('j F Y') }}<br>
                    {{$eventResepsi->event_name}} - {{ \Carbon\Carbon::parse($eventResepsi->event_date)->translatedFormat('j F Y') }}
                </p>
            </div>

            <div class="slideshow-container">
                <div class="mySlides">
                    <img src="{{ asset('images/177A82761.JPG') }}" alt="Photo 1">
                </div>
            </div>
        </div>
    </div>

    <div class="card2">
        <div class="card1">
            <img src="{{ asset('images/48061241.png') }}" alt="Photo 1">
            <p class="wedding-ar-rum">
                "Di antara tanda-tanda (kebesaran)-Nya ialah bahwa Dia menciptakan pasangan-pasangan untukmu dari
                (jenis) dirimu sendiri agar kamu merasa tenteram kepadanya. Dia menjadikan di antaramu rasa cinta dan
                kasih
                sayang. Sesungguhnya pada yang demikian itu benar-benar terdapat tanda-tanda (kebesaran Allah) bagi kaum
                yang
                berpikir."
                <br><b>(QS Ar-Rum: 21)</b>
            </p>
        </div>
    </div>

    <div class="container">
        <h1 class="title">BRIDE & GROOM</h1>
        <div class="profiles">
            <div class="profile">
                <img src="{{ asset('images/177A8539.jpg') }}" alt="Bride" class="profile-img bride-img">
                <p class="name">Shinta</p>
                {!! $eventBride->owner_name !!}
                <p>Anak pertama dari 2 bersaudara{!! $eventBride->parents_name !!}</p>
                <div class="social-icons">
                    <a href="https://www.instagram.com/shintaamaliaw/?utm_source=ig_web_button_share_sheet"><img
                            src="{{ asset('images/ig.png') }}" alt="Instagram"></a>
                </div>
                <h1 class="title-and">&</h1>
                <div class="profile">
                    <img src="{{ asset('images/177A8676.jpg') }}" alt="Groom" class="profile-img groom-img">
                    <p class="name">Irfan</p>
                    {!! $eventGroom->owner_name !!}
                    <p>Anak pertama dari 5 bersaudara{!! $eventGroom->parents_name !!}</p>
                    <div class="social-icons">
                        <a href="https://www.instagram.com/irfan224h/?utm_source=ig_web_button_share_sheet"><img
                                src="{{ asset('images/ig.png') }}" alt="Instagram"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container1">
        <div class="event-section">
            <div class="event-card akad-nikah">
                <img src="{{ asset('images/ring.png') }}" alt="Wedding Rings" class="icon">
                <h2>AKAD <span class="akad-text">Nikah</span></h2>
                <p>{{ \Carbon\Carbon::parse($eventAkad->event_date)->translatedFormat('j F Y') }}</p>
                <p><strong>{{ \Carbon\Carbon::parse($eventAkad->event_time)->format('H:i') }} WIB</strong></p>
                {!! $eventAkad->location !!}
                <div style="text-align: center;">
                    <a href="https://maps.app.goo.gl/hbamQTbQYxax36jcA" target="_blank" style="text-decoration: none;">
                        <button class="button"
                            style="display: inline-flex; align-items: center; justify-content: center; padding: 5px 10px; border: none; cursor: pointer;">
                            <img src="{{ asset('images/location.png') }}" alt="Location Icon"
                                style="width: 10px; height: 10px; margin-right: 10px;">
                            Lihat Lokasi
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <div class="event-section">
            <div class="event-card resepsi">
                <img src="{{ asset('images/burung1.png') }}" alt="Bird Symbol" class="icon">
                <h2>RESEPSI <span class="akad-text">Pernikahan</span></h2>
                <p>{{ \Carbon\Carbon::parse($eventResepsi->event_date)->translatedFormat('j F Y') }}</p>
                <p><strong>{{ \Carbon\Carbon::parse($eventResepsi->event_time)->format('H:i') }} WIB</strong></p>
                {!! $eventResepsi->location !!}
                <div style="text-align: center;">
                    <a href="https://maps.app.goo.gl/hbamQTbQYxax36jcA" target="_blank" style="text-decoration: none;">
                        <button class="button"
                            style="display: inline-flex; align-items: center; justify-content: center; padding: 5px 10px; border: none; cursor: pointer;">
                            <img src="{{ asset('images/location.png') }}" alt="Location Icon"
                                style="width: 10px; height: 10px; margin-right: 10px;">
                            Lihat Lokasi
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <img src="{{ asset('images/177A8157.jpg') }}" class="screen-prewed">
    <div class="container2">
        <div class="countdown-content">
            <h2>Hari yang ditunggu</h2>
            <hr class="divider">
            <div id="countdown">
                <div class="countdown-box">
                    <span id="days" class="time">0</span>
                    <span class="label">Days</span>
                </div>
                <div class="countdown-box">
                    <span id="hours" class="time">0</span>
                    <span class="label">Hours</span>
                </div>
                <div class="countdown-box">
                    <span id="minutes" class="time">0</span>
                    <span class="label">Mins</span>
                </div>
                <div class="countdown-box">
                    <span id="seconds" class="time">0</span>
                    <span class="label">Secs</span>
                </div>
            </div>
            <button class="reminder-button" onclick="setGoogleReminder()">
                <i class="fas fa-bell"></i> Buat Pengingat
            </button>
        </div>
    </div>

    <section id="rsvp" class="rsvp-section">
    <div class="rsvp-container">
        <div class="rsvp-container rsvp">
            <img src="{{ asset('images/rsvp.png') }}" alt="Wedding Rings" class="icon">
            <h2 class="rsvp-title">RSVP <span class="rsvp-text">Kehadiran</span></h2>
            <p>
                Kami tidak sabar menunggu hari pernikahan kami bersama Bapak/Ibu/Saudara/i. Mohon konfirmasi
                kehadiran. Terima kasih.
            </p>

            <form action="{{ route('rsvp.store', ['name' => $name]) }}#rsvp" method="POST" id="rsvpForm">
                @csrf
                <input type="hidden" name="event_id" value="1">

                <label1 for="name">Nama Lengkap</label1>
                <input type="text" name="name" required value="{{ old('name', $name) }}" readonly>

                <label1 for="phone">No Handphone</label1>
                <input type="text" id="phone" name="phone_number" 
                    value="{{ old('phone_number', $phoneNumber ?? session('new_data')['phone_number'] ?? '') }}" required
                    @if($phoneNumber) readonly @endif minlength="12" oninput="validatePhoneNumber()">

                <!-- Phone number alert -->
                <div id="phone-alert" style="color: red; display: none; font-size: 12px; margin-top: 5px;">Minimal 12 digit.</div>

                <div class="attendance-options">
                    <label1 for="kehadiran">Kehadiran?</label1><br>
                    <div class="attendance-items">
                        <div class="attendance-item">
                            <input type="radio" id="yes" name="confirmation" value="yes"
                            {{ (old('confirmation', session('new_data')['confirmation'] ?? '') == 'Hadir') ? 'checked' : '' }} required>
                            <label for="yes" class="no-bold">Ya, saya akan hadir</label>
                        </div>
                        <div class="attendance-item">
                            <input type="radio" id="no" name="confirmation" value="no"
                            {{ (old('confirmation', session('new_data')['confirmation'] ?? '') == 'Tidak Hadir') ? 'checked' : '' }}>
                            <label for="no" class="no-bold">Maaf, tidak bisa</label>
                        </div>
                    </div>
                </div>

                <label1 for="total_guest">Jumlah Kehadiran</label1>
                <select id="total_guest" name="total_guest" class="custom-select" required>
                    <option value="1" {{ old('total_guest', session('new_data')['total_guest'] ?? '') == '1' ? 'selected' : '' }}>1</option>
                    <option value="2" {{ old('total_guest', session('new_data')['total_guest'] ?? '') == '2' ? 'selected' : '' }}>2</option>
                </select>

                @if (session('name_exists'))
                    @php
                        $existingRsvp = session('existing_rsvp');
                    @endphp
                    @if (($existingRsvp->confirmation && $existingRsvp->total_guest)||($existingRsvp->confirmation !== null && $existingRsvp->total_guest !== null)) 
                    <div class="alert-box">
                        <p onclick="showModal()">{{ session('message') }}
                            <span style="color: red; cursor: pointer;" onclick="showOldDataModal()"> ⓘ </span>
                        </p>                            
                    </div>
                @endif                    
                    <div class="rsvp-submit">
                        <button formaction="{{ route('rsvp.confirmUpdate', ['name' => $name]) }}" formmethod="POST" class="button5">Edit Data</button>
                        <button formaction="{{ route('rsvp.cancelUpdate',  ['name' => $name]) }}" formmethod="POST" class="button5">Batalkan</button>
                    </div>
                @else
                    <div class="rsvp-submit">
                        <button type="submit" class="rspv-btn">Kirim</button>
                    </div>
                @endif 
            </form>
            <div id="confirmationModal" class="modal" style="display:none;">
                <div class="modal-content">
                    <span class="close-btn" onclick="closeModal()">&times;</span>
                    <img src="{{ asset('images/9304657.png') }}" alt="Thank You Image" class="modal-image">
                    <h2>Terima Kasih!</h2>
                    <p>Terima kasih sudah melakukan konfirmasi kehadiran.</p>
                </div>
            </div>

            <div id="oldDataModal" class="modal" style="display:none;">
                <div class="modal-content">
                    <span class="close-btn" onclick="closeOldDataModal()">&times;</span>
                    <h3>Data Lama</h3>
                    <div class="old-data-container">
                        <ul>
                            @foreach ($oldData->reverse() as $entry) <!-- Reverse the collection to show most recent first -->
                                <li>Nama: {{ $entry->name }}</li>
                                <li>Nomor Telepon: {{ $entry->phone_number }}</li>
                                <li>Konfirmasi: {{ $entry->confirmation }}</li>
                                <li>Jumlah Tamu: {{ $entry->total_guest }}</li>
                                <li>Tanggal: {{ $entry->created_at->format('d M Y H:i') }}</li>
                                <hr>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

<script>
    function validatePhoneNumber() {
        var phoneInput = document.getElementById("phone");
        var alertBox = document.getElementById("phone-alert");
        
        if (phoneInput.value.length < 12) {
            alertBox.style.display = "block"; 
        } else {
            alertBox.style.display = "none"; 
        }
    }
</script>
    <style>
        .info-icon {
            display: inline-block;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: red;
            color: white;
            text-align: center;
            font-weight: bold;
            cursor: pointer;
            margin-left: 10px;
        }
    </style>
    
    <script>
        function showModal() {
            document.getElementById('oldDataModal').style.display = 'block';
        }
        
        function closeOldDataModal() {
            document.getElementById('oldDataModal').style.display = 'none';
        }
    </script>
    
    
    
    <script>
    
        @if (session('name_exists'))
            document.addEventListener('DOMContentLoaded', function() {
                expandRSVP();
            });
        @endif
    
        window.onload = function() {
            @if (session('success'))
                document.getElementById("confirmationModal").style.display = "block";
                <?php session()->forget('success'); ?>
            @endif
        };
    
        function closeModal() {
            document.getElementById("confirmationModal").style.display = "none";
        }
    
        window.onclick = function(event) {
            const modal = document.getElementById("confirmationModal");
            if (event.target === modal) {
                modal.style.display = "none";
            }
        };
    
        document.addEventListener('DOMContentLoaded', function () {
            const confirmationRadios = document.getElementsByName('confirmation');
            const totalGuestInput = document.getElementById('total_guest');
    
            function updateTotalGuestInput() {
                const isNotAttending = Array.from(confirmationRadios).some(radio => radio.checked && radio.value === 'no');
                
                if (isNotAttending) {
                    totalGuestInput.value = 0;
                    totalGuestInput.removeAttribute('required'); 
                    totalGuestInput.style.display = 'none';
                } else {
                    totalGuestInput.setAttribute('required', 'required'); 
                    totalGuestInput.style.display = 'block';
                }
            }
    
            totalGuestInput.style.display = 'block';
    
            confirmationRadios.forEach(radio => {
                radio.addEventListener('change', updateTotalGuestInput);
            });
        });
    </script>
    

    <h2 class="gallery-title">
        MOMEN<span class="gallery-text">Galeri</span>
    </h2>

    <section class="photo-gallery">
        <div class="photo-item">
            <img src="{{ asset('images/177A8263.JPG') }}" alt="Description of image 1">
        </div>
        <div class="photo-item">
            <img src="{{ asset('images/177A8104.JPG') }}" alt="Description of image 2">
        </div>
        <div class="photo-item">
            <img src="{{ asset('images/177A8502.JPG') }}" alt="Description of image 3">
        </div>
    </section>

    <section class="photo-gallery">
        <div class="photo-item">
            <img src="{{ asset('images/177A8483.JPG') }}" alt="Description of image 1">
        </div>
        <div class="photo-item">
            <img src="{{ asset('images/177A8194.JPG') }}" alt="Description of image 2">
        </div>
        <div class="photo-item">
            <img src="{{ asset('images/177A8517.JPG') }}" alt="Description of image 3">
        </div>
    </section>

    <section id="gift" class="gift-section">
        <div class="gift-container gift">
            <img src="{{ asset('images/gift.png') }}" alt="gift" class="icon">
            <h2>GIFT <span class="gift-text"> Amplop Digital</span></h2>
            <p>
                Bagi keluarga dan sahabat yang ingin mengirimkan hadiah, silakan mengirimkannya melalui tautan
                berikut.
            </p>
            <div class="gift-buttons">
                <button class="button-kado" onclick="openModalGift()">
                    <img src="{{ asset('images/kado.png') }}" alt="Kado Icon" class="kado-icon">
                    Kirim Hadiah
                </button>
                <button class="button-bank" onclick="openModalRekening()">
                    <img src="{{ asset('images/bank.png') }}" alt="Bank Icon" class="bank-icon">
                    Transfer Bank
                </button>
            </div>
        </div>
        <!-- Modal Pop-Up hadiah -->
        <div id="giftModal">
            <div class="modal-content">
                <span class="close-btn" onclick="closeModalGift()">&times;</span>
                {!! $giftBarang->name !!}
                {!! $giftBarang->notes !!}
            </div>
        </div>
        <!-- Modal Pop-Up Rekening -->
        <div id="rekeningModal">
            <div class="modal-content">
                <span class="close-btn" onclick="closeModalRekening()">&times;</span>
                {!! $giftTf->name !!}
                {!! $giftTf->notes !!}
            </div>
        </div>        
    </section>

    <section id="story" class="story">

        <div class="container5">
            <div class="row justify-content-center">
                <div class="text-center">
                    <h2 class="small-title">Cerita Kami</h2>
                    <p class="text">Kami memulai kisah ini dari pertemuan pertama hingga kemudian berpacaran dan
                        akhirnya
                        memutuskan untuk menikah</p>
                </div>
            </div>
            <div class="row">
                <div class="col">

                    <ul class="timeline">

                        <li> 
                            <div class="timeline-image" style="background-image: url({{ asset('images/177A8474.JPG') }});"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    @php
                                        $timeline = $timelines->firstWhere('id', 1);
                                    @endphp
                                    {!! $timeline->title !!}
                                </div>
                                <div class="timeline-body">
                                @php
                                    $timeline = $timelines->firstWhere('id', 1);
                                @endphp
                                {!! $timeline->description !!}
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image" style="background-image: url({{ asset('images/177A8402.JPG') }});"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    @php
                                        $timeline = $timelines->firstWhere('id', 2);
                                    @endphp
                                    {!! $timeline->title !!}
                                </div>
                                <div class="timeline-body">
                                @php
                                    $timeline = $timelines->firstWhere('id', 2);
                                @endphp
                                {!! $timeline->description !!}
                                </div>
                            </div>
                        </li>

                        <li> 
                            <div class="timeline-image" style="background-image: url({{ asset('images/177A8329.JPG') }});"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    @php
                                        $timeline = $timelines->firstWhere('id', 3);
                                    @endphp
                                    {!! $timeline->title !!}
                                </div>
                                <div class="timeline-body">
                                @php
                                    $timeline = $timelines->firstWhere('id', 3);
                                @endphp
                                {!! $timeline->description !!}
                                </div>
                            </div>
                        </li>

                    </ul>

                </div>
            </div>
        </div>
    </section>
    <section class="screen-prewed1">
        <img src="{{ asset('images/177A8506.JPG') }}" class="screen-prewed1-img">
    </section>

    <div class="comment-section">
        <div class="app-container">
            <img src="{{ asset('images/amplop.png') }}" alt="Envelope Icon" class="icon5">
            <div class="section-title">Tinggalkan pesan/doa untuk kami</div>
            <form action="{{ route('comment.store', ['name' => $name]) }}" method="POST" id="commentForm">
                @csrf
                <textarea name="comment" placeholder="Ketikkan pesan/doa terindahmu.." required></textarea>
                <button type="submit" class="button5">Kirim</button>
            </form>
            <div class="messages">
                @foreach ($comments as $comment)
                    <div class="message">
                        <p><strong>{{ $comment->rsvp->name }}:</strong><br>{{ $comment->comment }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#commentForm').on('submit', function(e) {
                e.preventDefault(); 
    
                var formData = $(this).serialize();
    
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    success: function(response) {
                        $('.messages').prepend('<div class="message"><p><strong>' + response.rsvp_name + ':</strong><br>' + response.comment + '</p></div>');
    
                        $('textarea[name="comment"]').val('');
                    },
                    error: function(xhr) {
                        var errors = xhr.responseJSON.errors;
                        for (var key in errors) {
                            alert(errors[key][0]); 
                        }
                    }
                });
            });
        });
    </script>
    
    <div class="thank">
        <p class="thanks">Terima Kasih</p>
        <h4>SHINTA & IRFAN</h4>
    </div>
    <footer class="footer">
        <h4><span class="small-text">Made With By</span></h4>
        <img src="{{ asset('images/logo.jpg') }}" alt="diikatJanji Logo" class="logo">
        <p>all right reserved by diikatJanji</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const brideImg = document.querySelector('.bride-img');
            const groomImg = document.querySelector('.groom-img');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        // Menambahkan kelas animate untuk memulai animasi
                        entry.target.classList.add('animate');
                    } else {
                        // Menghapus kelas animate untuk mengulang animasi
                        entry.target.classList.remove('animate');
                    }
                });
            });

            // Mengamati gambar pengantin
            observer.observe(brideImg);
            observer.observe(groomImg);
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const akadNikahElements = document.querySelectorAll('.akad-nikah h2, .akad-nikah .akad-text');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        // Menambahkan kelas animate untuk memulai animasi
                        entry.target.classList.add('animate');
                    } else {
                        // Menghapus kelas animate untuk mengulang animasi
                        entry.target.classList.remove('animate');
                    }
                });
            });

            akadNikahElements.forEach(element => {
                observer.observe(element); // Mengamati setiap elemen
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const resepsiElements = document.querySelectorAll('.resepsi h2, .resepsi .akad-text');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        // Menambahkan kelas animate untuk memulai animasi
                        entry.target.classList.add('animate');
                    } else {
                        // Menghapus kelas animate untuk mengulang animasi
                        entry.target.classList.remove('animate');
                    }
                });
            });

            resepsiElements.forEach(element => {
                observer.observe(element); // Mengamati setiap elemen
            });
        });
    </script>

    <script>
        var eventDate = new Date("{{ $eventResepsi->event_date }}").getTime();
        
        var countdownFunction = setInterval(function() {
            var now = new Date().getTime();
            var distance = eventDate - now;
    
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
            document.getElementById("days").innerHTML = days;
            document.getElementById("hours").innerHTML = hours;
            document.getElementById("minutes").innerHTML = minutes;
            document.getElementById("seconds").innerHTML = seconds;
    
            if (distance < 0) {
                clearInterval(countdownFunction);
                document.getElementById("countdown").innerHTML = "Acara Telah Dimulai!";
            }
        }, 1000);
    </script>
    <script>
        function setGoogleReminder() {
            const title = encodeURIComponent("Acara Pernikahan");
            const details = encodeURIComponent("Pernikahan Shinta & Irfan");
            const location = encodeURIComponent("Lokasi Pernikahan");
            const startDate = "20241227T000000Z";  // Tanggal mulai event (UTC)
            const endDate = "20241227T235900Z";    // Tanggal selesai event (UTC)

            const url = `https://www.google.com/calendar/render?action=TEMPLATE&text=${title}&details=${details}&location=${location}&dates=${startDate}/${endDate}`;

            // Buka link Google Calendar di tab baru
            window.open(url, "_blank");
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const elementsToAnimate = document.querySelectorAll(
                '.akad-nikah h2, .akad-nikah .akad-text, .rsvp h2, .rsvp .rsvp-text'
            );

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        // Menambahkan kelas animate untuk memulai animasi
                        entry.target.classList.add('animate');
                    } else {
                        // Menghapus kelas animate untuk mengulang animasi
                        entry.target.classList.remove('animate');
                    }
                });
            });

            elementsToAnimate.forEach(element => {
                observer.observe(element); // Mengamati setiap elemen
            });
        });
    </script>
    
    <!--js modal dift dan rekening-->
    <script>
        function openModalGift(event) {
            var modal = document.getElementById("giftModal") // Menampilkan modal
            modal.style.display = "block";
        }

        function closeModalGift() {
            document.getElementById("giftModal").style.display = "none"; // Menyembunyikan modal
        }

        // Menutup modal jika pengguna mengklik di luar modal
        window.onclick = function (event) {
            const modal = document.getElementById("giftModal");
            if (event.target === modal) {
                modal.style.display = "none";
            }
        }

        // rekening modal
        function openModalRekening(event) {
            var modal = document.getElementById("rekeningModal") // Menampilkan modal
            modal.style.display = "block";
        }

        function closeModalRekening() {
            document.getElementById("rekeningModal").style.display = "none"; // Menyembunyikan modal
        }

        // Menutup modal jika pengguna mengklik di luar modal
        window.onclick = function (event) {
            const modal = document.getElementById("rekeningModal");
            if (event.target === modal) {
                modal.style.display = "none";
            }
        }
    </script>    

</body>

</html>