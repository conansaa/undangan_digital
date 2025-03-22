<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page Diikat Janji</title>
    <link rel="stylesheet" href="{{ asset('landingpage/style.css') }}">
</head>
<body>
    <nav>
        <img src="{{ asset('landingpage/media/logo.svg') }}" alt="logo">
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#fitur">Feature</a></li>
            <li><a href="#template">Template</a></li>
            <li><a href="#price">Price</a></li>
            <li><a href="#order">How to Order</a></li>
        </ul>
    </nav>

    <section class="home" id="home">
        <div class="caption">
            <h1>ALL IN ONE PLATFORM
                <br>FOR YOUR SPECIAL 
                <br> <b>MOMENTS</b>
            </h1>
            <button><a href="#template">Lihat Template</a></button>
        </div>
        <div class="gambar">
            <img src="{{ asset('landingpage/media/iMockup - iPhone 13.svg') }}" alt="Template">
        </div>
    </section>
    <div class="premis">
        <p>Siap Buat Undangan Digitalmu? Hubungi Kami Sekarang!</p>  
        <p class="chat-link">
            <a href="https://wa.me/6281215257835" target="_blank">Chat</a>
        </p>
    </div>       
        <section class="fitur" id="fitur">
            <div class="judul">
                <h1>Fitur Lengkap</h1>
                <h4>Buat Undangan Tak Terlupakan</h4>
            </div>
            <div class="fitur-grid">
                <div class="fitur-item">
                    <img src="{{ asset('landingpage/media/Gmaps.svg') }}" alt="gmaps">
                    <h5>Google Maps Interaktif</h5>
                    <p>Tamu tak perlu bertanya lagi, cukup klik lokasi dan langsung menuju tempat acara!</p>
                </div>
                <div class="fitur-item">
                    <img src="{{ asset('landingpage/media/galeri.svg') }}" alt="galeri">
                    <h5>Galeri Foto</h5>
                    <p>Biarkan tamu melihat perjalanan cintamu dalam satu halaman, penuh kenangan manis.</p>
                </div>
                <div class="fitur-item">
                    <img src="{{ asset('landingpage/media/musik.svg') }}" alt="musik">
                    <h5>Background Music</h5>
                    <p>Buat undanganmu lebih hidup dengan lagu favorit yang menciptakan suasana spesial.</p>
                </div>
                <div class="fitur-item">
                    <img src="{{ asset('landingpage/media/RSVP.svg') }}" alt="RSVP">
                    <h5>RSVP Online</h5>
                    <p>Pantau siapa saja yang akan hadir tanpa repot, semua dalam satu tempat.</p>
                </div>
                <div class="fitur-item">
                    <img src="{{ asset('landingpage/media/Countdown.svg') }}" alt="">
                    <h5>Countdown Timer</h5>
                    <p>Hitung mundur menuju hari bahagiamu, buat setiap detik terasa semakin istimewa!</p>
                </div>
                <div class="fitur-item">
                    <img src="{{ asset('landingpage/media/Pesan dan Doa.svg') }}" alt="">
                    <h5>Pesan dan Doa</h5>
                    <p>Tamu bisa meninggalkan pesan, doa, dan harapan terbaik untukmu.</p>
                </div>
                <div class="fitur-item">
                    <img src="{{ asset('landingpage/media/kado.svg') }}" alt="">
                    <h5>Kado</h5>
                    <p>Permudah tamu memberikan hadiah spesial dengan pengiriman kado ke rekening atau alamatmu.</p>
                </div>
                <div class="fitur-item">
                    <img src="{{ asset('landingpage/media/live.svg') }}" alt="">
                    <h5>Live Streaming</h5>
                    <p>Tak semua bisa hadir? Bagikan momen spesialmu secara langsung melalui streaming!</p>
                </div>
                <div class="fitur-item">
                    <img src="{{ asset('landingpage/media/cerita.svg') }}" alt="">
                    <h5>Cerita Kita</h5>
                    <p>Bagikan kisah spesialmu dari awal perjalanan hingga momen bahagia yang penuh makna!</p>
                </div>
            </div>
        </section>
        <section class="template" id="template">
            <div class="judul">
                <h1>Desain Eksklusif</h1>
                <h4>Pilih Berbagai Tema Cantik Sesuai Gayamu!</h4>
            </div>
            <div class="desain-grid">
                <div class="desain-item">
                    <img src="{{ asset('landingpage/media/monokrom.svg') }}" alt="">
                    <h5>Monokrom</h5>
                    <button>Lihat Template</button>
                </div>
                <div class="desain-item">
                    <img src="{{ asset('landingpage/media/hezron.svg') }}" alt="">
                    <h5>Floral</h5>
                    <button>Lihat Template</button>
                </div>
                <div class="desain-item">
                    <img src="{{ asset('landingpage/media/soft.svg') }}" alt="">
                    <h5>Soft</h5>
                    <button>Lihat Template</button>
                </div>
            </div>
        </section>
        <section class="price" id="price">
            <div class="judul">
                <h1>Harga Terjangkau</h1>
                <h4>Dapatan Harga Terbaik untuk Momen Spesialmu!</h4>
            </div>
            <div class="price-grid">
                <div class="price-item">
                    <h5>Basic</h5>
                    <h3>Rp150.000</h3>
                    <h4>Rp199.000</h4>
                    <ul>
                        <li>Lorem, ipsum.</li>
                        <li>Lorem, ipsum.</li>
                        <li>Lorem, ipsum.</li>
                        <li>Lorem, ipsum.</li>
                        <li>Lorem, ipsum.</li>
                        <li>Lorem, ipsum.</li>
                        <li>Lorem, ipsum.</li>
                        <li>Lorem, ipsum.</li>
                        <li>Lorem, ipsum.</li>
                        <li>Lorem, ipsum.</li>
                    </ul>
                </div>
                <div class="price-item">
                    <h5>Pro</h5>
                    <h3>Rp200.000</h3>
                    <h4>Rp280.000</h4>
                    <ul>
                        <li>Lorem, ipsum.</li>
                        <li>Lorem, ipsum.</li>
                        <li>Lorem, ipsum.</li>
                        <li>Lorem, ipsum.</li>
                        <li>Lorem, ipsum.</li>
                        <li>Lorem, ipsum.</li>
                        <li>Lorem, ipsum.</li>
                        <li>Lorem, ipsum.</li>
                        <li>Lorem, ipsum.</li>
                        <li>Lorem, ipsum.</li>
                    </ul>
                </div>
                <div class="price-item">
                    <h5>Premium</h5>
                    <h3>Rp250.000</h3>
                    <h4>Rp350.000</h4>
                    <ul>
                        <li>Lorem, ipsum.</li>
                        <li>Lorem, ipsum.</li>
                        <li>Lorem, ipsum.</li>
                        <li>Lorem, ipsum.</li>
                        <li>Lorem, ipsum.</li>
                        <li>Lorem, ipsum.</li>
                        <li>Lorem, ipsum.</li>
                        <li>Lorem, ipsum.</li>
                        <li>Lorem, ipsum.</li>
                        <li>Lorem, ipsum.</li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="order" id="order">
            <div class="judul">
                <h2>Proses Cepat</h2>
                <h4>Pesan dengan Mudah, Rayakan dengan Bahagia</h4>
            </div>
            <div class="image">
                 <img src="{{ asset('landingpage/media/RSVP - iPhone 13.svg') }} alt="">
                 <img src="{{ asset('landingpage/media/Home - iPhone 13.svg') }}" alt="">
                 <img src="{{ asset('landingpage/media/Countdown - iPhone 13.svg') }}" alt="">
            </div>
            <div class="list">
                <ol>
                    <li>Tentukan desain template yang kamu suka </li>
                    <li>Tentukan paket harga sesuai keinginan</li>
                    <li>Hubungi kami terkait detail acara, di sini</li>
                    <li>Konfirmasi pembayaran</li>
                    <li>Undangan kamu siap kami proses</li>
                    <li>Sebarkan undangan kamu untuk kerabat!</li>
                </ol>
            </div>
        </section>
        <section class="footer">
            <div class="footer-top">
                <div class="kiri">
                    <div class="image">
                        <img src="{{ asset('landingpage/media/logo footer.svg') }}" alt="">
                    </div>
                    <div class="caption">
                        <p>Diikatjanji adalah layanan undangan digital berbasis web 
                        yang menghadirkan desain elegan dan personal
                        untuk berbagai acara.</p>
                    </div>
                </div>
                <div class="tengah">
                    <div class="judul">
                        <h6>Navigation</h6>
                    </div>
                    <div class="list">
                        <ul>
                            <li>Home</li>
                            <li>Feature</li>
                            <li>Template</li>
                            <li>Price</li>
                            <li>How to Order</li>
                        </ul>
                    </div>
                </div>
                <div class="kanan">
                    <div class="judul">
                        <h6>Hubungi Kami</h6>
                    </div>
                    <div class="phone">
                        <h6>📞 Phone : +62 812-1525-7835</h6>
                    </div>
                    <div class="email">
                        <h6>📧 Email : admin@digiyok.com</h6>
                    </div>
                </div>
            </div>
            <div class="bawah">
                <div class="cr">
                    © Copyright Pt Lumintoo Sukses Incomso. All Rights Reserved
                </div>
                <div class="medsos">
                    <a href="https://wa.me/6281215257835"><img src="{{ asset('landingpage/media/wa.svg') }}" alt=""></a>
                    <a href="https://www.instagram.com/digiyok"><img src="{{ asset('landingpage/media/ig.svg') }}" alt=""></a>
                    <a href="https://www.tiktok.com/@digiyok"><img src="{{ asset('landingpage/media/tiktok.svg') }}" alt=""></a>
                </div>
            </div>
        </section>
</body>
</html>
