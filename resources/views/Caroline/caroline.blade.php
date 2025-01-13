<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Caroline & Hezron Wedding</title>
    <link rel="stylesheet" href="{{ asset('css/tema2.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Opti&display=swap" rel="stylesheet">
    
    <!-- Simply Countdown -->
    <link rel="stylesheet" href="{{ asset('countdown/simplyCountdown.theme.default.css') }}"/>
    <script src="{{ asset('countdown/simplyCountdown.min.js') }}"></script>
    
    <!-- boostrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    @php
        $deskripsi = $gallery->firstWhere('description', 'cover');
        // @dump($deskripsi)
    @endphp
    @if ($deskripsi)
    <section id="opening" style="position: relative; background-image: url('{{ asset('galleries/'.$deskripsi->photo) }}'); background-size: cover; background-position: 20% 25%;">
    
        <div class="undangan">
            <div class="overlay">
            <h1>{{ $figures[0]->name }} & {{ $figures[1]->name }}</h1>
            <p>Hai</p>
            <h3>{{ $name }}</h3>
            <button class="button" id="openInvitationBtn">Open Invitation <i class="fas fa-envelope"></i></button>
            </div>
        </div>
        <div class="falling-leaves"></div>
        <div class="falling-leaves1"></div>
    
    </section>
    @endif
    <section id="invitation" style="display: none;">
    @php
        $deskripsi = $gallery->firstWhere('description', 'halaman awal');
        // @dump($deskripsi)
    @endphp
    @if ($deskripsi)
    <div class="left-section" style=" background-image: url('{{ asset('galleries/'.$deskripsi->photo) }}'); background-size: cover; background-position: 20% 25%;">
        <div class="invitation">
            <div class="overlay">
              <h1>{{ $figures[0]->name }} & {{ $figures[1]->name }}</h1>
              {{-- <p>Hai</p>
              <h3>{{ $name }}</h3> --}}
            </div>
        </div>
        <div class="falling-leaves3"></div>
        <div class="falling-leaves4"></div>          
    </div>
    @endif
    
    <div class="right-section">
        <div class="container1">
            <div class="animasi-awan">
                <img src="{{ asset('assets_tema_2/awan2.png') }}" alt="awan2" class="awan">
                <img src="{{ asset('assets_tema_2/awan1.png') }}" alt="awan1" class="awan">
            </div>
            <div class="invitation-content">
                <h2>Wedding Invitation</h2>
                <h1>{{ $figures[0]->name }} & {{ $figures[1]->name }}</h1>
                <p class="date">{{ \Carbon\Carbon::parse($pemberkatan->event_date)->translatedFormat('j F Y') }}</p>
                <button class="rsvp-button"><a href="#rsvp">RSVP</a></button>
                <div class="garis-overlay">
                    <img src="{{ asset('assets_tema_2/garis.svg') }}" alt="Foto Hezron dan Caroline" class="garis-photo">
                </div>
                <div class="image-arch">
                    @if ($deskripsi)
                        <img src="{{ asset('galleries/'.$deskripsi->photo) }}" alt="Foto Hezron dan Caroline" class="main-photo">
                    @endif
                </div>
                <div class="flower-overlay">
                    <img src="{{ asset('assets_tema_2/flower5.svg') }}" alt="Bunga Dekorasi" class="flower-images">
                </div>
                <div class="flower-overlay">
                    <img src="{{ asset('assets_tema_2/flower6.svg') }}" alt="Bunga Dekorasi" class="flower-image">
                </div>
            </div>
        </div>
        
        <div class="container">
            <h1>The Wedding Of</h1>
            <div class="section">
                <div class="image-wrapper">
                    <img src="{{ asset('figures/'.$figures[0]->photo) }}" class="photo">
                    <img src="{{ asset('assets_tema_2/framecpw.svg') }}" alt="Foto Perempuan" class="frame">
                </div>
                <p class="name">{{ $figures[0]->fullname }}</p>
                <p class="details">Anak pertama dari<br>{{ $figures[0]->fathers_name }}<br>& {{ $figures[0]->mothers_name }}</p>
                <div class="icon">
                    <a href="https://instagram.com/{{ $figures[0]->social_media }}" target="_blank" rel="noopener noreferrer">
                        <img src="{{ asset('assets_tema_2/instagram-icon.svg') }}" alt="Instagram Icon">
                    </a>
                </div>
            </div>
            <p class="and-symbol">&</p>
            <div class="section">
                <div class="image-wrapper">
                    <img src="{{ asset('figures/'.$figures[1]->photo) }}" class="photo">
                    <img src="{{ asset('assets_tema_2/framecpp.svg') }}" alt="Foto Laki-laki" class="frame">
                </div>
                <p class="name">{{ $figures[1]->fullname }}</p>
                <p class="details">Anak pertama dari<br>{{ $figures[1]->fathers_name }}<br>& {{ $figures[1]->mothers_name }}</p>
                <div class="icon">
                    <a href="https://instagram.com/{{ $figures[1]->social_media }}" target="_blank" rel="noopener noreferrer">
                        <img src="{{ asset('assets_tema_2/instagram-icon.svg') }}" alt="Instagram Icon">
                    </a>
                </div>
            </div>
            </div>
            <div class="portraits-section">
                <h1>Portraits of Us</h1>
                <div class="portraits-gallery">
                    {{-- @foreach ($gallery as $deskripsi)
                    <div class="portrait-row">
                        @if($deskripsi->description == 'foto 1')
                        <div class="portrait-item">
                            <img src="{{ asset('galleries/'.$deskripsi->photo) }}" alt="Portrait 1">
                        </div>
                        @elseif($deskripsi->description == 'foto 2')
                        <div class="portrait-item">
                            <img src="{{ asset('galleries/'.$deskripsi->photo) }}" alt="Portrait 2">
                        </div>
                    </div>
                    <div class="portrait-row alt">
                        @elseif($deskripsi->description == 'foto 3')
                        <div class="portrait-item">
                            <img src="{{ asset('galleries/'.$deskripsi->photo) }}" alt="Portrait 3">
                        </div>
                        @elseif($deskripsi->description == 'foto 4')
                        <div class="portrait-item">
                            <img src="{{ asset('galleries/'.$deskripsi->photo) }}" alt="Portrait 4">
                        </div>
                    </div>
                    <div class="portrait-row">
                        @elseif($deskripsi->description == 'foto 5')
                        <div class="portrait-item">
                            <img src="{{ asset('galleries/'.$deskripsi->photo) }}" alt="Portrait 5">
                        </div>
                        @elseif($deskripsi->description == 'foto 6')
                        <div class="portrait-item">
                            <img src="{{ asset('galleries/'.$deskripsi->photo) }}" alt="Portrait 6">
                        </div>
                    </div>
                    <div class="portrait-row alt">
                        @elseif($deskripsi->description == 'foto 7')
                        <div class="portrait-item">
                            <img src="{{ asset('galleries/'.$deskripsi->photo) }}" alt="Portrait 3">
                        </div>
                        @elseif($deskripsi->description == 'foto 8')
                        <div class="portrait-item">
                            <img src="{{ asset('galleries/'.$deskripsi->photo) }}" alt="Portrait 4">
                        </div>
                    </div>
                    <div class="portrait-row">
                        @elseif($deskripsi->description == 'foto 9')
                        <div class="portrait-item">
                            <img src="{{ asset('galleries/'.$deskripsi->photo) }}" alt="Portrait 5">
                        </div>
                        @elseif($deskripsi->description == 'foto 10')
                        <div class="portrait-item">
                            <img src="{{ asset('galleries/'.$deskripsi->photo) }}" alt="Portrait 6">
                        </div>
                    </div>
                    @endif
                    @endforeach --}}
                    @foreach ($gallery as $index => $deskripsi)
                        {{-- Buka row baru setiap 2 foto --}}
                        @if ($loop->first || $index % 2 == 0)
                            <div class="portrait-row {{ $index % 4 == 0 ? 'alt' : '' }}">
                        @endif

                        {{-- Tambahkan item gambar --}}
                        <div class="portrait-item">
                            <img src="{{ asset('galleries/' . $deskripsi->photo) }}" alt="Portrait {{ $loop->iteration }}">
                        </div>

                        {{-- Tutup row setiap 2 foto atau di akhir iterasi --}}
                        @if ($index % 2 == 1 || $loop->last)
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="custom-container">
                <!-- Gambar Latar Belakang -->
                <div class="background-image"></div>
              
                <!-- Elemen Jendela -->
                <div class="window-image">
                  <div class="flower-atas">
                    <img src="{{ asset('assets_tema_2/flower2.svg') }}" alt="Top Flower">
                  </div>
                  <div class="flower-side">
                    <img src="{{ asset('assets_tema_2/flower3.svg') }}" alt="Side Flower">
                  </div>
                  <div class="flower-left">
                    <img src="{{ asset('assets_tema_2/flower4.svg') }}" alt="Left Flower">
                  </div>
                  <div class="countdown-content">
                    <h2>Countdown</h2>
                    <div class="simply-countdown"></div>
                    <button class="add-to-calendar" onclick="setGoogleReminder()">Add to Calendar</button>
                  </div>
                </div>
            </div>
              <section class="info">
                <div class="info-container">
                    <div class="col-md-8.col-10 text-center">
                        <h1>Wedding Day</h1>
                        <h2>{{ \Carbon\Carbon::parse($pemberkatan->event_date)->translatedFormat('j F Y') }}</h2>
                    </div>
                    <div class="pemberkatan col-md-8.col-10 text-center">
                        <div class="isi">
                            <img src="{{ asset('assets_tema_2/ring.svg') }}" alt="Cincin" class="ring-image">
                            <h4>Pemberkatan</h4>
                            <p class="jam">{{ \Carbon\Carbon::parse($pemberkatan->event_time)->format('H:i') }} WIB</p>
                            <h5>{{ $pemberkatan->location }}</h5>
                            <p class="alamat small-text">{{ $pemberkatan->full_location }}
                            </p>
                            <img src="{{ asset('assets_tema_2/lokasi.png') }}" alt="pin">
                            <a href="https://maps.app.goo.gl/NZHAR1DorpSko13z5">View Maps</a>
                        </div>
                        <div class="merak2">
                            <img src="{{ asset('assets_tema_2/meraknew.svg') }}" alt="merak2">
                        </div>
                        <div class="bunga2">
                            <img src="{{ asset('assets_tema_2/bunga2.svg') }}" alt="bunga2">
                        </div>
                        <div class="daun2">
                            <img src="{{ asset('assets_tema_2/daun2.svg') }}" alt="daun2">
                        </div>
                    </div>
                    <div class="resepsi col-md-8.col-10 text-center">
                        <div class="isi">
                            <img src="{{ asset('assets_tema_2/gelas.svg') }}" alt="Cincin" class="gelas-image">
                            <h4>Resepsi</h4>
                            <p class="jam">{{ \Carbon\Carbon::parse($resepsi->event_time)->format('H:i') }} WIB</p>
                            <h5>{{ $resepsi->location }}</h5>
                                <p class="alamat small-text">{{ $resepsi->full_location }}
                                </p>
                            <img src="{{ asset('assets_tema_2/lokasi.png') }}" alt="pin">
                            <a href="https://maps.app.goo.gl/wEd9LNsJLxyDbqzm8">View Maps</a>
                        </div>
                        <div class="merak1">
                            <img src="{{ asset('assets_tema_2/merak1.svg') }}" alt="merak1">
                        </div>
                        <div class="bunga1">
                            <img src="{{ asset('assets_tema_2/bunga1.svg') }}" alt="bunga1">
                        </div>
                        <div class="daun1">
                            <img src="{{ asset('assets_tema_2/daun1.svg') }}" alt="daun1">
                        </div>
                    </div>
                    <div class="invitation-content">
                        <div class="flower-wedding">
                            <img src="{{ asset('assets_tema_2/flower5.svg') }}" alt="Bunga Dekorasi" class="flower-info">
                        </div>
                    </div>
                    <div class="invitation-content">
                        <div class="flower-wedding">
                            <img src="{{ asset('assets_tema_2/flower6.svg') }}" alt="Bunga Dekorasi" class="flower-info1">
                        </div>
                    </div>
                </div>
            </section>
            <section id="rsvp" class="rsvp {{ session('name_exists') ? 'expanded' : '' }}">
                <div class="rsvp-container {{ session('name_exists') ? 'expanded' : '' }}">
                    <div class="judul">
                        <h1>RSVP</h1>
                    </div>
                    <div class="form-rsvp animate-form">
                        <p>Please Confirm Your Attendance</p>
                        <form id="rsvpForm" action="{{ route('rsvpp.store', ['name' => $name]) }}#rsvp" method="POST">
                            @csrf
                            <div class="form">
                                <label for="name">Full Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $name) }} " class="form-input" required readonly>
                                <label for="no">No Handphone</label>
                                <input type="text" name="phone_number" type="text"
                                value="{{ old('phone_number', $phoneNumber ?? (session('new_data')['phone_number'] ?? '')) }}" required
                                @if ($phoneNumber) readonly @endif minlength="12" oninput="validatePhoneNumber()" class="form-input">
                                <div id="phone-alert" style="color: red; display: none; font-size: 12px; margin-top: 5px;">Minimal 12
                                    digit.</div>
                            </div>
                            <div class="attendance">
                                <label for="attendance" class="attendance-label">Attendance</label>
                                <div class="attendance-options">
                                    <input type="radio" id="yes" name="confirmation" type="radio" value="yes"
                                    {{ old('confirmation', session('new_data')['confirmation'] ?? '') == 'Hadir' ? 'checked' : '' }}
                                    required>
                                    <label for="will-attend" class="option-label">Will Attend</label>
                                    <input type="radio" id="no" name="confirmation" type="radio" value="no"
                                    {{ old('confirmation', session('new_data')['confirmation'] ?? '') == 'Tidak Hadir' ? 'checked' : '' }}>
                                    <label for="unable-to-attend" class="option-label">Unable to Attend</label>
                                </div>
                            </div>
                            <div class="total">
                                <label for="total">Total Attendance</label>
                                <select class="custom-select" id="total_guest" name="total_guest" required>
                                    <option value="1"
                                      {{ old('total_guest', session('new_data')['total_guest'] ?? '') == '1' ? 'selected' : '' }}>1</option>
                                    <option value="2"
                                      {{ old('total_guest', session('new_data')['total_guest'] ?? '') == '2' ? 'selected' : '' }}>2</option>
                                  </select>
                            </div>
                            @if (session('name_exists'))
                            @php
                                \Log::info('Redirect caused by session', session()->all());
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
                            <button type="submit" class="rsvp-btn">Confirm</button>
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
            </section>
            <section class="live">
                <div class="live-container">
                    <div class="judul">
                        <h1>Live Streaming</h1>
                    </div>
                    <div class="thumbnail">
                        <img src="{{ asset('assets_tema_2/thumbnail.svg') }}" alt="live">
                    </div>
                    <a href="https://www.youtube.com/@GKGUNUNGPUTRI" target="_blank" class="btn btn-light btn-sm my-4" style="margin-top: 30px;">Watch Here</a>
                </div>
                
            </section>
             
           
            <section class="gift">
                <div class="gift-container">
                    <img src="{{ asset('assets_tema_2/Vector.svg') }}" class="gift-flower" >
                    <div class="judul">
                        <h1>Wedding Gift</h1>
                    </div>
                    <div class="description">
                        <p>Bagi keluarga dan sahabat yang ingin <br>
                            mengirimkan hadiah, silakan mengirimkannya <br>
                            melalui tautan berikut
                        </p>
                    </div>
                    <div class="btn1">
                        <button onclick="openPopup('gift')">Kirim Hadiah</button>
                    </div>
                    <div class="btn2">
                        <button onclick="openPopup('bank')">Transfer Bank</button>
                    </div>
                </div>
            </section>
            <!-- pop up -->
            <div class="popup-overlay" id="popup">
                <div class="popup-content">
                    <div class="popup-box" id="gift-box" style="display: none;">
                        <div class="close1" onclick="closePopup()">X</div>
                        <h2>{{ $giftBarang->name }}</h2>
                        <p>{{ $giftBarang->notes }}</p>
                        <button onclick="copyText('{{ $giftBarang->notes }}')">Copy Address</button>
                    </div>
                    <div class="popup-box" id="bank-box" style="display: none;">
                        <div class="close2" onclick="closePopup()">X</div>
                        <h2>{{ $giftTf->name }}</h2>
                        <p>{{ $giftTf->notes }}</p>
                        <button onclick="copyText('{{ $giftTf->notes }}')">Copy Bank Account</button>
                    </div>
                </div>
            </div>
            
            <!-- <section class="health-protocol">
                <div class="protocol-container">
                    <div class="judul">
                        <h1>Health Protocol</h1>
                    </div>
                    <div class="protocol-list">
                        <div class="protocol-item">
                            <img src="image/mask.svg" alt="Wearing a Mask">
                            <p>Wearing a Mask</p>
                        </div>
                        <div class="protocol-item">
                            <img src="image/wash.svg" alt="Wash Your Hand">
                            <p>Wash Your Hand</p>
                        </div>
                        <div class="protocol-item">
                            <img src="image/social.svg" alt="Social Distancing">
                            <p>Social Distancing</p>
                        </div>
                        <div class="protocol-item">
                            <img src="image/temperature.svg" alt="Temperature Check">
                            <p>Temperature Check</p>
                        </div>
                    </div>
                </div>
            </section> -->
            <section class="wedding-wish">
                <div class="wish-container">
                    <h2>Wedding Wish</h2>
                    <form class="wish-form" id="commentForm" action="{{ route('comment.store', ['name' => $name]) }}#comment" method="POST">
                        @csrf
                        <textarea name="comment" placeholder="Give your wish..."></textarea>
                        <button type="submit">Send</button>
                    </form>
                    <div class="wish-list">
                        @foreach ($comments as $comment)
                        <div class="wish-item">
                            <strong>{{ $comment->rsvp->name }}</strong>
                            <p>{{ $comment->comment }}</p>
                            @if ($comment->rsvp->name === $name)
                            <a class="delete-icon" href="{{ route('comment.hapus', ['id' => $comment->id, 'name' => $name]) }}"
                                onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <section class="wedding-invitation">
                <div class="verse">
                    <p>“Demikianlah mereka bukan lagi dua, melainkan satu. Karena itu, apa yang telah dipersatukan Allah, tidak boleh diceraikan manusia.”</p>
                    <p class="source">Matius 19:6</p>
                </div>
                <div class="details">
                    <h2>Wedding Invitation</h2>
                    <h3>{{ $figures[0]->name }} & {{ $figures[1]->name }}</h3>
                    <p>{{ \Carbon\Carbon::parse($pemberkatan->event_date)->translatedFormat('j F Y') }}</p>
                </div>
            </section>
            <footer class="footer">
                <div class="footer-container">
                    <p><b>Made With Love By</b></p>
                    <div class="logo">
                        <img src="{{ asset('assets_tema_2/logo.svg') }}" alt="Logo">
                        <p>all right reserved by diikatJanji</p>
                    </div>
                </div>
            </footer>
        </div>
        
    </div>  
    <button id="playButton">
        <span id="icon">
          <!-- Ikon Play -->
          <svg id="playIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polygon points="5 3 19 12 5 21 5 3"></polygon>
          </svg>
          <!-- Ikon Pause -->
          <svg id="pauseIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;">
            <rect x="6" y="4" width="4" height="16"></rect>
            <rect x="14" y="4" width="4" height="16"></rect>
          </svg>
        </span>
      </button>
      <audio id="song" loop>
        <source src="{{ asset('music/Worth The Wait by Spencer Crandall.MP3') }}" type="audio/mp3">
      </audio>
    </section>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/tema2.js') }}"></script> 
    
</body>
</html>
