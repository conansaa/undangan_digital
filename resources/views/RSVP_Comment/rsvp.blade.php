<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shinta & Irfan</title>

  <!-- css -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Playfair+Display:wght@400;700&display=swap"
    rel="stylesheet">
  <!-- bootstrap css -->
  <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
  <!-- opening -->
  <section id="opening">
    <div class="section section-opening" style="position: relative; padding: 40px; border-radius: 8px; color: white; background-image: url({{ asset('images/177A8157.JPG') }}); background-size: cover; background-position: 50% 55%;">
      <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0, 0, 0, 0.1); border-radius: 8px; z-index: 1;"></div>
      <div style="position: relative; z-index: 2;">
        <div class="content">
            <p class="wedding-ket">We invite you to the wedding of</p>
            <h1 class="wedding-title">{{ $figures[0]->name }} & {{ $figures[1]->name }}</h1>
            <p class="wedding-date">Akad -
              {{ \Carbon\Carbon::parse($akad->event_date)->translatedFormat('j F Y') }}<br>
              Resepsi - {{ \Carbon\Carbon::parse($resepsi->event_date)->translatedFormat('j F Y') }}
            </p>
            <p class="wedding-to">Kepada Yth</p>
            <h2 class="wedding-from">{{ $name }}</h2>
            <button class="button" id="openInvitationBtn">Open the Invitation <i class="fas fa-envelope"></i></button>
        </div>
    </div>
</section>

  <!-- undangan -->
  <section id="undangan">
    <div class="section-undangan section1">
      <div class="content">
        <div class="text-overlay">
          <p class="wedding-ket">The wedding of</p>
          <h1 class="wedding-title">{{ $figures[0]->name }} & {{ $figures[1]->name }}</h1>
          <p class="wedding-date">Akad -
            {{ \Carbon\Carbon::parse($akad->event_date)->translatedFormat('j F Y') }}<br>
            Resepsi - {{ \Carbon\Carbon::parse($resepsi->event_date)->translatedFormat('j F Y') }}
          </p>
        </div>

        <div class="slideshow-container">
          <div class="mySlides">
            <img src="{{ asset('images/177A8171.JPG') }}" alt="Photo 1">
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

    <div class="container"
      style="background-image: url({{ asset('images/bg_5.png') }}); background-size: cover; background-position: center; padding: 40px; border-radius: 8px; color: white;">
      <h1 class="title">BRIDE & GROOM</h1>
      <div class="profiles">
        <div class="profile bride">
          <img class="profile-img bride-img" src="{{ asset('images/177A8539.jpg') }}" alt="Bride">
          <p class="name">{{ $figures[0]->name }}</p>
          <h2>{{ $figures[0]->owner_fullname }}</h2>
          <p>Anak pertama dari 2 bersaudara dari
            <br>{{ $figures[0]->fathers_name }}<br>&{{ $figures[0]->mothers_name }}
          </p>
          <div class="social-icons">
            <a href="https://www.instagram.com/shintaamaliaw/?utm_source=ig_web_button_share_sheet"><img
                src="{{ asset('images/ig.png') }}" alt="Instagram"></a>
          </div>
        </div>
        <h1 class="title-and">&</h1>
        <div class="profile groom">
          <img class="profile-img groom-img" src="{{ asset('images/177A8676.jpg') }}" alt="Groom">
          <p class="name">{{ $figures[1]->name }}</p>
          <h2>{{ $figures[1]->owner_fullname }}</h2>
          <p>Anak pertama dari 2 bersaudara dari
            <br>{{ $figures[1]->fathers_name }}<br>&{{ $figures[1]->mothers_name }}
          </p>
          <div class="social-icons">
            <a href="https://www.instagram.com/irfan224h/?utm_source=ig_web_button_share_sheet"><img
                src="{{ asset('images/ig.png') }}" alt="Instagram"></a>
          </div>
        </div>
      </div>
    </div>

    <div class="container1"
      style="background-image: url({{ asset('images/bg2.png') }}); background-size: cover; background-position: center; padding: 40px; border-radius: 8px; color: white;">
      <div class="event-section">
        <div class="event-card akad-nikah">
          <img class="icon" src="{{ asset('images/ring.png') }}" alt="Wedding Rings">
          <h2>AKAD <span class="akad-text">Nikah</span></h2>
          <p>{{ \Carbon\Carbon::parse($akad->event_date)->translatedFormat('j F Y') }}</p>
          <p><strong>{{ \Carbon\Carbon::parse($akad->event_time)->format('H:i') }} WIB</strong></p>
          <p>{{ $akad->location }}</p>
          <p>{{ $akad->full_location }}</p>
          <div style="text-align: center;">
            <a href="https://maps.app.goo.gl/hbamQTbQYxax36jcA" style="text-decoration: none;" target="_blank">
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
          <img class="icon" src="{{ asset('images/burung1.png') }}" alt="Bird Symbol">
          <h2>RESEPSI <span class="akad-text">Pernikahan</span></h2>
          <p>{{ \Carbon\Carbon::parse($resepsi->event_date)->translatedFormat('j F Y') }}</p>
          <p><strong>{{ \Carbon\Carbon::parse($resepsi->event_time)->format('H:i') }} WIB</strong></p>
          <p>{{ $resepsi->location }}</p>
          <p>{{ $resepsi->full_location }}</p>
          <div style="text-align: center;">
            <!-- Membungkus tombol untuk memastikan tengah secara horizontal -->
            <a href="https://maps.app.goo.gl/hbamQTbQYxax36jcA" style="text-decoration: none;" target="_blank">
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

    <img class="screen-prewed" src="{{ asset('images/177A8104.JPG') }}"
      style="object-position: 50% 42%; object-fit: cover;">
    <div class="container2"
      style="background-image: url({{ asset('images/bg 3.png') }}); background-size: cover; background-position: center; padding: 50px; border-radius: 8px; color: white;">
      <div class="countdown-content">
        <h2>Hari yang ditunggu</h2>
        <hr class="divider">
        <div id="countdown">
          <div class="countdown-box">
            <span class="time" id="days">0</span>
            <span class="label">Days</span>
          </div>
          <div class="countdown-box">
            <span class="time" id="hours">0</span>
            <span class="label">Hours</span>
          </div>
          <div class="countdown-box">
            <span class="time" id="minutes">0</span>
            <span class="label">Mins</span>
          </div>
          <div class="countdown-box">
            <span class="time" id="seconds">0</span>
            <span class="label">Secs</span>
          </div>
        </div>
        <button class="reminder-button" onclick="setGoogleReminder()">
          <i class="fas fa-bell"></i> Buat Pengingat
        </button>
      </div>
    </div>

    <section class="rsvp-section {{ session('name_exists') ? 'expanded' : '' }}" id="rsvp"
      style="background-image: url({{ asset('images/bg4.png') }}); background-size: cover; background-position: center; padding: 20px; border-radius: 8px; color: white;">
      <div class="rsvp-container {{ session('name_exists') ? 'expanded' : '' }}">
        <div class="rsvp-container rsvp">
          <img class="icon" src="{{ asset('images/rsvp.png') }}" alt="Wedding Rings">
          <h2 class="gallery-title">RSVP<span class="gallery-text">Kehadiran</span>
          </h2>
          <p>
            Kami tidak sabar menunggu hari pernikahan kami bersama Bapak/Ibu/Saudara/i. Mohon konfirmasi
            kehadiran. Terima kasih.
          </p>

          <form id="rsvpForm" action="{{ route('rsvp.store', ['name' => $name]) }}#rsvp" method="POST">
            @csrf
            <input name="event_id" type="hidden" value="1">

            <label1 for="name">Nama Lengkap</label1>
            <input name="name" type="text" value="{{ old('name', $name) }}" required readonly>

            <label1 for="phone">No Handphone</label1>
            <input id="phone" name="phone_number" type="text"
              value="{{ old('phone_number', $phoneNumber ?? (session('new_data')['phone_number'] ?? '')) }}" required
              @if ($phoneNumber) readonly @endif minlength="12" oninput="validatePhoneNumber()">

            <!-- Phone number alert -->
            <div id="phone-alert" style="color: red; display: none; font-size: 12px; margin-top: 5px;">Minimal 12
              digit.</div>

            <div class="attendance-options">
              <label1 for="kehadiran">Kehadiran?</label1><br>
              <div class="attendance-items">
                <div class="attendance-item">
                  <input id="yes" name="confirmation" type="radio" value="yes"
                    {{ old('confirmation', session('new_data')['confirmation'] ?? '') == 'Hadir' ? 'checked' : '' }}
                    required>
                  <label class="no-bold" for="yes">Ya, saya akan hadir</label>
                </div>
                <div class="attendance-item">
                  <input id="no" name="confirmation" type="radio" value="no"
                    {{ old('confirmation', session('new_data')['confirmation'] ?? '') == 'Tidak Hadir' ? 'checked' : '' }}>
                  <label class="no-bold" for="no">Maaf, tidak bisa</label>
                </div>
              </div>
            </div>

            <label1 for="total_guest">Jumlah Kehadiran</label1>
            <select class="custom-select" id="total_guest" name="total_guest" required>
              <option value="1"
                {{ old('total_guest', session('new_data')['total_guest'] ?? '') == '1' ? 'selected' : '' }}>1</option>
              <option value="2"
                {{ old('total_guest', session('new_data')['total_guest'] ?? '') == '2' ? 'selected' : '' }}>2</option>
            </select>

            @if (session('name_exists'))
              @php
                $existingRsvp = session('existing_rsvp');
              @endphp
              @if (
                  ($existingRsvp->confirmation && $existingRsvp->total_guest) ||
                      ($existingRsvp->confirmation !== null && $existingRsvp->total_guest !== null))
                <div class="alert-box">
                  <p onclick="showModal()">{{ session('message') }}
                    <span style="color: red; cursor: pointer;" onclick="showOldDataModal()"> ⓘ </span>
                  </p>
                </div>
              @endif
              <div class="rsvp-submit">
                <button class="button5" formaction="{{ route('rsvp.confirmUpdate', ['name' => $name]) }}"
                  formmethod="POST">Edit Data</button>
                <button class="button5" formaction="{{ route('rsvp.cancelUpdate', ['name' => $name]) }}"
                  formmethod="POST">Batalkan</button>
              </div>
            @else
            <div class="rsvp-submit">
              <button type="submit" class="rsvp-btn">Kirim</button>
            </div>
            @endif
          </form>
          <div class="modal" id="confirmationModal">
            <div class="modal-content">
              <span class="close-btn" onclick="closeModal()">&times;</span>
              <img class="modal-image" src="{{ asset('images/9304657.png') }}" alt="Thank You Image">
              <h2>Terima Kasih!</h2>
              <p>Terima kasih sudah melakukan konfirmasi kehadiran.</p>
            </div>
          </div>

          <div class="modal" id="oldDataModal" style="display:none;">
            <div class="modal-content">
              <span class="close-btn" onclick="closeOldDataModal()">&times;</span>
              <h3>Data Lama</h3>
              <div class="old-data-container">
                <ul>
                  @foreach ($oldData->reverse() as $entry)
                    <!-- Reverse the collection to show most recent first -->
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
    </script>
    <h2 class="gallery-title">
      MOMEN<span class="gallery-text">Galeri</span>
    </h2>

    <section class="photo-gallery">
      <div class="photo-gallery-desktop">
        <div class="photo-item">
          <img src="{{ asset('images/177A8263.jpg') }}" alt="Description of image 1">
        </div>
        <div class="photo-item">
          <img src="{{ asset('images/177A8104.jpg') }}" alt="Description of image 2">
        </div>
        <div class="photo-item">
          <img src="{{ asset('images/177A8502.jpg') }}" alt="Description of image 3">
        </div>
        <div class="photo-item">
          <img src="{{ asset('images/177A8483.jpg') }}" alt="Description of image 4">
        </div>
        <div class="photo-item">
          <img src="{{ asset('images/177A8194.jpg') }}" alt="Description of image 5">
        </div>
        <div class="photo-item">
          <img src="{{ asset('images/177A8517.jpg') }}" alt="Description of image 6">
        </div>
      </div>
    </section>

    <section id="gift" class="gift-section" style="background-image: url({{ asset('images/bg 3.png') }}); background-size: cover; background-position: center; padding: 40px; border-radius: 8px; color: white;">
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
      <!-- Modal Pop-Up Alamat -->
<!-- Modal Pop-Up Alamat -->
<div id="giftModal">
  <div class="modal-content">
    <span class="close-btn" onclick="closeModalGift()">&times;</span>
    <h1 class="address-title"><b>{{ $giftBarang->name }}</b></h1> <br>
    <p class="address-text">
      {{ $giftBarang->notes }}  
    </p>
    <button class="copy-btn" onclick="copyToClipboard('Jl. Merak Kencana II Blok J2 No. 5 RT 4/RW 14, Rawabuntu, Serpong, Kota Tangerang Selatan')">
      Salin Alamat
    </button>
  </div>
</div>

<!-- Modal Pop-Up Rekening -->
<div id="rekeningModal">
  <div class="modal-content">
    <span class="close-btn" onclick="closeModalRekening()">&times;</span>
    <h1 class="address-title"><b>{{ $giftTf->name }}</b></h1> <br>
    <p class="address-text">
      {{ $giftTf->notes }}
    </p>
    <button class="copy-btn" onclick="copyToClipboard('4972154591')">
      Salin Rekening
    </button>
  </div>
</div>
</section>

    <section id="story" class="story"
      style="background-image: url({{ asset('images/bg 4.png') }}); background-size: cover; background-position: center; padding: 40px; border-radius: 8px; color: white;">
      <div class="container5">
        <div class="row justify-content-center">
          <div class="text-center">
            <h2 class="small-title">Cerita Kami </h2>
            <p class="text">Kami memulai kisah ini dari pertemuan pertama hingga kemudian berpacaran dan
              akhirnya
              memutuskan untuk menikah</p>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <ul class="timeline">
              <li>
                <div class="timeline-image" style="background-image: url({{ asset('images/177A8474_1.jpg') }});"></div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    @php
                      $timeline = $timelines->firstWhere('id', 1);
                    @endphp
                    <h3>{{ $timeline->title }}</h3>
                  </div>
                  <div class="timeline-body">
                    @php
                      $timeline = $timelines->firstWhere('id', 1);
                    @endphp
                    <p>{{ $timeline->description }}</p>
                  </div>
                </div>
              </li>

              <li class="timeline-inverted">
                <div class="timeline-image" style="background-image: url({{ asset('images/IMG_8605.JPG') }});"></div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    @php
                      $timeline = $timelines->firstWhere('id', 2);
                    @endphp
                    <h3>{{ $timeline->title }}</h3>
                  </div>
                  <div class="timeline-body">
                    @php
                      $timeline = $timelines->firstWhere('id', 2);
                    @endphp
                    <p>{{ $timeline->description }}</p>
                  </div>
                </div>
              </li>

              <li>
                <div class="timeline-image" style="background-image: url({{ asset('images/177A8194.jpg') }});"></div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    @php
                      $timeline = $timelines->firstWhere('id', 3);
                    @endphp
                    <h3>{{ $timeline->title }}</h3>
                  </div>
                  <div class="timeline-body">
                    @php
                      $timeline = $timelines->firstWhere('id', 3);
                    @endphp
                    <p>{{ $timeline->description }}</p>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section class="screen-prewed1">
      <img class="screen-prewed1-img" src="{{ asset('images/177A8506.JPG') }}">
    </section>

    <div class="comment-section">
      <div class="app-container">
        <img class="icon5" src="{{ asset('images/amplop.png') }}" alt="Envelope Icon">
        <div class="section-title">Tinggalkan pesan/doa untuk kami</div>
        <form id="commentForm" action="{{ route('comment.store', ['name' => $name]) }}#comment" method="POST">
          @csrf
          <textarea name="comment" placeholder="Ketikkan pesan/doa terindahmu.." required></textarea>
          <button class="button5" type="submit">Kirim</button>
        </form>
        <div class="messages">
          @foreach ($comments as $comment)
            <div class="message" id="comment-{{ $comment->id }}">
              <div class="comment-header">
                <p>
                  <strong>{{ $comment->rsvp->name }}:</strong><br>
                  {{ $comment->comment }}
                </p>
                @if ($comment->rsvp->name === $name)
                  <a class="delete-icon" href="{{ route('comment.hapus', ['id' => $comment->id, 'name' => $name]) }}"
                    onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                    <i class="fa-solid fa-trash-can"></i>
                  </a>
                @endif
              </div>
            </div>
          @endforeach
        </div>

      </div>
    </div>

    <div class="thank">
      <p class="thanks">Terima Kasih</p>
      <h4>SHINTA & IRFAN</h4>
    </div>

    <footer class="footer">
      <h4><span class="small-text">Made With Love By</span></h4>
      <img class="logo" src="{{ asset('images/Logo.png') }}" alt="diikatJanji Logo">
      <p>all right reserved by diikatJanji</p>
    </footer>
    <button id="playButton">
      <span id="icon">
        <!-- Ikon Play -->
        <svg id="playIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
          fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <polygon points="5 3 19 12 5 21 5 3"></polygon>
        </svg>
        <!-- Ikon Pause -->
        <svg id="pauseIcon" style="display: none;" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round">
          <rect x="6" y="4" width="4" height="16"></rect>
          <rect x="14" y="4" width="4" height="16"></rect>
        </svg>
      </span>
    </button>
    <audio id="song" loop>
      <source src="{{ asset('music/MUSIC JANJI SUCI.mp3') }}" type="audio/mp3">
    </audio>
  </section>


  <!-- js -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  <script>
    eventDateCountdown('{{ $resepsi->event_date }}');
  </script>
  <!-- bootstrap js -->
  <!-- <script src="vendor/bootstrap/js/bootstrap.min.js"></script> -->
  <script>
  document.addEventListener('DOMContentLoaded', function () {
    // Mengecek apakah ada hash (#) di URL
    if (window.location.hash) {
      const targetId = window.location.hash.substring(1); // Mengambil 'undangan' dari '#undangan'
      const targetElement = document.getElementById(targetId);

      if (targetElement) {
        // Scroll ke element tujuan
        targetElement.scrollIntoView({ behavior: 'smooth' });
      }
    }
  });
</script>
</body>

</html>
