<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Playfair+Display:wght@400;700&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ asset('RSVP_Comment/css/index.css') }}">
</head>
<style>
    body {
        margin: 0;
        font-family: 'Playfair Display', serif;
        background-color: #f0f0f0;

    }

    .section {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;

        position: relative;
    }

    .wedding-ket {
        color: white;
        font-weight: 300;
        font-size: 25px;
        margin-bottom: 10px;
    }

    .wedding-title {
        font-family: 'Great Vibes', cursive;
        color: white;
        font-size: 3.5em;
        font-weight: 550;
    }



    .wedding-date {
        color: white;
        font-size: 1.2em;
    }

    .text-overlay {
        position: absolute;
        top: 0;
        width: 100%;
        padding-top: 30px;
        text-align: center;
        z-index: 1;
    }


    .slideshow-container {
        position: relative;
        max-width: 100%;
        overflow: hidden;
        z-index: 0;
    }

    .mySlides {
        display: none;
    }

    .mySlides img {
        width: 100vw;
        height: 100vh;
        object-fit: cover;
    }

    .wedding-ar-rum {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;

        padding: 20px;
        background-color: rgba(230, 230, 230, 0.6);
        color: rgb(46, 46, 46);
        text-align: center;
        font-size: 18px;
        line-height: 1.5;
        margin-bottom: -20px;
    }

    /* Slideshow styles */
    .slideshow-container {
        position: relative;
        max-width: 100%;
        margin: 0 auto;
        overflow: hidden;
    }

    .mySlides {
        display: none;
        width: 100%;
    }

    .mySlides img {
        width: 100vw;
        /* Full width of the viewport */
        height: 105vh;
        /* Full height of the viewport */
        object-fit: cover;
    }

    .h2 {
            font-size: 90px;
            font-family: 'Playfair Display', serif;
            font-weight: 100;
            margin-bottom: 10px;
            margin-left: -50px;
            margin-top: 35px;
        }

    .wedding-date {
        font-size: 1.2em;
        margin-top: 10px;
        color: #fff;
    }

    .section h2 {
        font-size: 30px;
        font-family: "Judson", serif;
        font-weight: 400;
        margin-bottom: 20px;
    }

    .section h1 {
        font-size: 70px;
        font-family: 'Great Vibes', cursive;
        font-weight: 400;
        margin-bottom: 10px;
        line-height: 1.2;
    }

    .section .names {
        font-family: 'Great Vibes', cursive;
        font-size: 40px;
    }

    .section .date {
        font-size: 25px;
        font-style: italic;
        margin-top: 20px;
    }

    .gallery-text {
            font-family: 'Great Vibes', cursive;
            font-size: 40px;
            display: block;
            margin-left: 90px;
        }
    .section .button i {
        margin-left: 8px;
    }
    
    .section2 {
        background: url('{{ asset('images/3.png') }}') no-repeat center center/cover;
        color: #fff;
    }

    .section2 h2 {
        margin-top: 20px;
        font-size: 35px;
        font-family: "Judson", serif;

    }

    .section2 h1 {
        font-size: 70px;
        font-family: 'Julius Sans One', sans-serif;
        margin-top: 500px;
    }

    .section2 .names {
        font-size: 50px;
        font-family: 'Great Vibes', cursive;
    }

    .container {
        text-align: center;
        padding: 30px;
        background: url('{{ asset('images/bg1.png') }}') no-repeat center center / cover;
        height: 1400px;
        margin-top: 15px;
    }

    .container5 {
        text-align: center;
        padding: 30px;
        background: url('{{ asset('images/bg1.png') }}') no-repeat center center / cover;
        height: 1200px;
    }

    .title {
        font-size: 40px;
        font-family: 'Playfair Display', serif;
        color: #000000;
        margin-bottom: 60px;
    }

    .title1 {
        font-size: 40px;
        font-family: 'Playfair Display', serif;
        color: #bdbdbd;
        margin-bottom: 10px;
    }

    .profiles {
        display: flex;
        justify-content: space-around;
        align-items: center;
        gap: 100px;
        margin-bottom: 25px;
    }


    .profiles .social-icons {
        margin-bottom: 25px;
    }

    .profile-img {
        width: 100%;
        border-radius: 8px;
        margin-bottom: 15px;
    }

    .bride-img {
        animation: slideInLeft 3s ease forwards;

    }


    .groom-img {
        animation: slideInRight 3s ease forwards;

    }


    @keyframes slideInLeft {
        0% {
            transform: translateX(-100%);
            opacity: 0;
        }

        100% {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slideInRight {
        0% {
            transform: translateX(100%);
            opacity: 0;
        }

        100% {
            transform: translateX(0);
            opacity: 1;
        }
    }

    .name {
        font-family: 'Great Vibes', cursive;
        margin: 10px 0;
        font-size: 30px !important;
    }

    .profile h2 {
        font-size: 20px;
        margin-bottom: 10px;
        font-weight: bold;
        color: #333;
    }

    .profile p {
        font-size: 16px;
        color: #777;
    }

    .social-icons {
        margin-top: 20px;
    }

    .social-icons img {
        width: 30px;
        margin: 0 10px;
    }

    .container1 {
        text-align: center;
        padding: 10px;
        background: url('{{ asset('images/bg2.png') }}') no-repeat center center / cover;
        height: 1150px;
        margin-top: -30px;
        margin-left: -50px;
        margin-right: -50px;
    }

    .event-section {
        display: flex;
        justify-content: center;
        gap: 30px;
        margin-top: 30px;
        margin-bottom: 20px;
    }

    .event-card {
        background-color: #333;
        color: #fff;
        padding: 20px;
        border-radius: 10px;
        width: 500px;
        text-align: center;
    }

    .event-card h2 {
        font-size: 36px;
        font-family: 'Playfair Display', serif;
        margin-bottom: 10px;
    }

    .event-card p {
        font-size: 18px;
        margin: 5px 0;
    }

    .event-card strong {
        font-size: 24px;
    }

    .event-card .button {
        background-color: #fff;
        color: #333;
        padding: 3px 15px;
        border-radius: 8px;
        font-size: 13px;
        cursor: pointer;
        border: none;
        margin-top: 20px;
        animation: pulse 4s infinite;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
        }

        100% {
            transform: scale(1);
        }
    }

    .event-card .button:hover {
        background-color: #555;
        color: #fff;
    }

    .event-card .icon {
        width: 90px;
        margin-bottom: 20px;
    }

    .event-card .icons {
        width: 200px;
        margin-bottom: 20px;
    }

    .akad-nikah .icon {
        width: 90px;
        margin-bottom: 5px;
    }

    .akad-nikah h2 {
        font-size: 40px;
        font-family: 'Playfair Display', serif;
        font-weight: 100;
        margin-bottom: 10px;
    }

    .akad-nikah .akad-text {
        font-family: 'Great Vibes', cursive;
        font-size: 30px;
        display: block;
        margin-left: 70px;
    }

    .akad-nikah p {
        font-size: 18px;
        margin: 5px 0;
    }

    .akad-nikah p:nth-of-type(1) {
        margin-top: 40px;
    }

    .akad-nikah p:nth-of-type(3) {
        margin-top: 45px;
    }

    .akad-nikah p:nth-of-type(4) {
        margin-top: 10px;

    }

    .resepsi .icon {
        width: 170px;
        margin-bottom: 5px;

    }

    .resepsi h2 {
        font-size: 40px;
        font-family: 'Playfair Display', serif;
        font-weight: 100;
        margin-bottom: 10px;
    }

    .resepsi .akad-text {
        font-family: 'Great Vibes', cursive;
        font-size: 30px;
        display: block;
        margin-left: 70px;
    }

    .resepsi p {
        font-size: 18px;
        margin: 5px 0;
    }

    .resepsi p:nth-of-type(1) {
        margin-top: 40px;
    }

    .resepsi p:nth-of-type(3) {
        margin-top: 45px;
    }

    .resepsi p:nth-of-type(4) {
        margin-top: 10px;
    }

    .container2 {
        background: url('{{ asset('images/bg 3.png') }}') no-repeat center center/cover;
        background-size: 100%;
        color: #fff;
        padding: 40px;
        margin-top: -5px;
        margin-left: -30px;
        margin-right: -30px;
    }

    .countdown-content {
        text-align: center;
        font-family: 'Playfair Display', serif;
    }

    .countdown-content h2 {
        font-size: 22px;
        font-weight: 400;
        margin-bottom: 30px;
    }

    #countdown {
        display: flex;
        justify-content: center;
        gap: 10px;
        font-size: 30px;
        font-family: 'Playfair Display', serif;
    }

    .countdown-box {
        text-align: center;
        margin-right: 50px;
    }

    .countdown-box span {
        display: block;
    }

    .countdown-box .label {
        font-size: 18px;
        text-transform: uppercase;
    }

    .reminder-button {
        background-color: #fff;
        color: #333;
        padding: 7px 15px;
        border-radius: 5px;
        border: none;
        margin-top: 40px;
        display: inline-flex;
        align-items: center;
        cursor: pointer;
        font-size: 13px;
        animation: pulse 4s infinite;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
        }

        100% {
            transform: scale(1);
        }
    }

    .reminder-button:hover {
        background-color: #555;
        color: #fff;
    }

    .reminder-button i {
        margin-right: 10px;
    }

    .divider {
        width: 23%;
        margin: 10px auto;
        border: 1px solid #fff;
        opacity: 0.5;
    }

    .screen-prewed {
        margin-left: -30px;
        width: 100vw;
        height: 100vh;
        object-fit: cover;

    }

    .rsvp-section {

        padding: 40px 15px;
        text-align: center;
        margin-bottom: -1px;
        margin-left: -30px;
        margin-right: -30px;
        background: url('{{ asset('images/bg 4.png') }}') no-repeat center center / cover;
        height: 850px;

    }

    .rsvp-container {
        max-width: 900px;
        height: 670px;
        margin: 0 auto;
        background-color: #e0e0e0;
        border-radius: 10px;
        margin-top: 65px;
        padding: 0px 20px;
    }

    .rsvp-section h2 {
        font-family: 'YourFont', serif;
        font-size: 36px;
        margin-bottom: 10px;
    }

    .rsvp-container p {
        font-family: 'YourFont', serif;
        font-size: 18px;
        margin-bottom: 20px;
    }

    .rsvp-container input,
    .rsvp-container textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .attendance-options label {
        font-size: 16px;
    }

    .rsvp-submit {
        background-color: #333;
        color: #fff;
        padding: 10px 5px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-left: 700px;
        animation: pulse 4s infinite;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
        }

        100% {
            transform: scale(1);
        }
    }

    .rsvp-submit:hover {
        background-color: #555;
    }

    .custom-select {
        width: 45px;
        font-size: 17px;
    }

    .gift-section {
        background: url('{{ asset('images/bg 3.png') }}') no-repeat center center/cover;
        background-size: 100%;
        color: #fff;
        padding: 50px 0;
        text-align: center;
        margin-left: -30px;
        margin-right: -30px;
    }


    .gift-container h2 {
        font-family: 'YourFont', serif;
        font-size: 36px;
        margin-bottom: 20px;
    }

    .gift-container p {
        font-family: 'YourFont', serif;
        font-size: 23px;
        margin-bottom: 20px;
    }

    .reminder-button:hover {
        background-color: #555;
        color: #fff;
    }

    .gift-buttons {
        margin-top: 20px;
    }

    .gift-buttons .button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        margin-right: 20px;
        border-radius: 5px;
        background-color: #fff;
        color: #333;
        /* Warna teks tombol */
        transition: background-color 0.3s;
        /* Transisi untuk hover */
        animation: pulse 4s infinite;
        /* Tambahkan efek animasi */
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
            /* Ukuran normal */
        }

        50% {
            transform: scale(1.1);
            /* Membesar di tengah animasi */
        }

        100% {
            transform: scale(1);
            /* Kembali ke ukuran normal */
        }
    }

    .gift-buttons .button:hover {
        background-color: #555;
        /* Warna latar belakang saat hover */
        color: #fff;
        /* Warna teks saat hover */
    }

    .gift-buttons img.kado-icon {
        width: 15px;
        /* Ukuran ikon Kado */
        height: 15px;
        /* Tinggi ikon Kado */
        margin-right: 8px;
        /* Jarak antara ikon dan teks */
    }

    .gift-buttons img.bank-icon {
        width: 15px;
        /* Ukuran ikon Bank */
        height: 15px;
        /* Tinggi ikon Bank */
        margin-right: 8px;
        /* Jarak antara ikon dan teks */
    }

    .message-section {
        background-color: #f9f9f9;
        padding: 50px 0;
        text-align: center;
    }

    .message-container {
        max-width: 600px;
        margin: 0 auto;
        background-color: #e0e0e0;
        padding: 20px;
        border-radius: 10px;
    }

    .message-container h2 {
        font-family: 'YourFont', serif;
        font-size: 36px;
        margin-bottom: 10px;
    }

    .message-container textarea,
    .message-container input {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .message-submit {
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .message-submit:hover {
        background-color: #555;
    }

    .rsvp-container-rsvp h2 {
        font-size: 40px;
        font-family: 'Playfair Display', serif;
        font-weight: 100;
        margin-bottom: 10px;
    }

    .rsvp-title {
        font-size: 1px;
        font-family: 'Playfair Display', serif;
        font-weight: 100;
        margin-bottom: 10px;
    }

    .rsvp .icon {
        width: 250px;
        margin-bottom: -20px;
        margin-top: -70px;
    }

.audio-icon-wrapper{
width: 4rem;
height: 4rem;
font-size: 4rem;
position: fixed;
bottom: 2.5rem;
right: 2rem;
cursor: pointer;
color: white;
opacity: 0.5;
mix-blend-mode: difference;
animation: rotating 4s linear infinite;
transform-origin: center;
display: flex;
justify-content: center;
align-items: center;
line-height: 0;
}

.audio-icon-wrapper{
width: 4rem;
height: 4rem;
font-size: 4rem;
position: fixed;
bottom: 2.5rem;
right: 2rem;
cursor: pointer;
color: white;
opacity: 0.5;
mix-blend-mode: difference;
animation: rotating 4s linear infinite;
transform-origin: center;
display: flex;
justify-content: center;
align-items: center;
line-height: 0;
}

@keyframes rotating{
from {
    transform: 0;
} to{
    transform: rotate(360deg);
}
}
    .rsvp h2 {
        font-size: 40px;
        font-family: 'Playfair Display', serif;
        font-weight: 100;
        margin-bottom: 10px;
    }

    .rsvp .rsvp-text {
        font-family: 'Great Vibes', cursive;
        font-size: 30px;
        display: block;
        margin-left: 70px;
    }

    .rsvp p {
        font-size: 20px;
        margin: 1px 0;
        margin-top: 40px;
        margin-bottom: 1px;
    }

    .rsvp-container form label1 {
        display: block;
        text-align: left;
        margin-bottom: 10px;
        font-size: 18px;
        font-weight: bold;
        margin-top: 40px;

    }

    .rsvp-container p {
        text-align: left;
        font-size: 18px;
        margin-top: 15px;
    }

    .rsvp-container form label {
        display: block;
        text-align: left;
        margin-bottom: 10px;
        font-size: 18px;
    }

    .divider1 {
        width: 100%;
        border: 1px solid #1c1c1c;
        opacity: 0.5;
        margin-left: 2px;
        margin-top: 1px;
    }

    .rsvp-section .p {
        font-size: 20px;
    }

    .attendance-options {
        text-align: left;
        margin-top: -10px;
    }

    .attendance-items {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        margin-left: -35px;
        margin-top: -20px;
        flex-wrap: nowrap;
    }

    .attendance-item {
        display: flex;
        align-items: center;
        margin-right: 20px;
    }

    .attendance-item input[type="radio"] {
        margin-right: -20px;
    }

    .no-bold {
        font-weight: normal;
        margin-left: 8px;

    }

    .photo-gallery {
        display: flex;
        justify-content: space-between;
        margin: -1px 90px;
        padding: 0;
    }

    .photo-item {
        margin: 30px;
    }

    .photo-item img {
        width: 100%;
        height: auto;
    }

    .gift h2 {
        font-size: 40px;
        font-family: 'Playfair Display', serif;
        font-weight: 100;
        margin-bottom: 10px;
    }

    .gift .gift-text {
        font-family: 'Great Vibes', cursive;
        font-size: 30px;
        display: block;
        margin-left: 120px;
        margin-bottom: 40px;
    }

    .gift .icon {
        width: 80px;
        margin-bottom: -1px;
        margin-top: -30px;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .rsvp-section1 {
        background-color: #1c1c1c;
        color: white;
        text-align: center;
        font-family: 'Times New Roman', serif;
        margin-bottom: 60px;
        margin-top: -10px;
        margin-left: -30px;
        margin-right: -30px;
    }

    .quote {
        margin-bottom: 10px;
        color: #cfcfcf;
        font-size: 18px;
        padding: 30px 0px;
    }

    .container5 {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-bottom: 20px;
    }

    .grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-template-rows: auto auto;
        grid-gap: 10px;
        margin: 0 auto;
    }

    .photo1 img {
        width: 100%;
        height: 450px;
        object-fit: cover;
    }

    .photo2 img {
        width: 100%;
        height: 450px;
        object-fit: cover;
    }


    .photo3 img {
        width: 100%;
        height: 450px;
        object-fit: cover;
    }


    .photo4 img {
        width: 100%;
        height: 450px;
        object-fit: cover;
    }


    .photo1 img,
    .photo2 img,
    .photo3 img,
    .photo4 img {
        border-radius: 8px;
        filter: grayscale(100%);
    }

    .thank {
        margin-top: 10px;
        margin-bottom: 30px;
    }

    .thanks {
        font-family: 'Great Vibes', cursive;
        font-size: 20px;
        margin-bottom: 5px;
    }

    h2 {
        font-family: 'Times New Roman', serif;
        font-size: 20px;
        font-weight: lighter;

    }

    .comment-section {
        max-width: 900px;
        margin: 30px auto;
        background-color: #efefef;
        border-radius: 10px;
        margin-top: 65px;
        padding: 0px 20px;
        border-radius: 10px;
        text-align: center;
        justify-content: center;
        font-family: 'Times New Roman', Times, serif;
        
    }

    .icon1 {
        width: 130px;
        height: 130px;
        margin-bottom: 2px;
        margin-top: -85px;
    }

    .section-title {
        font-size: 16px;
        margin-bottom: 15px;
        font-weight: bold;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    textarea,
    input {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 14px;
    }

    button1 {
        background-color: black;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    button1:hover {
        background-color: #333;
    }

    .messages {
        margin-top: 20px;
        max-height: 150px;
        overflow-y: auto;
    }

    .message {
        background-color: white;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 10px;
        font-size: 12px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .container::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('{{ asset('images/lingkaran.png') }}');
        background-size: cover;
        background-position: center;
        opacity: 0.2;
        z-index: 1;
        animation: moveBackground 20s linear infinite;
    }


    @keyframes moveBackground {
        0% {
            background-position: 0 0;
        }

        100% {
            background-position: 100% 100%;
        }
    }

    .timeline {
        list-style: none;
        padding: 1.4rem 0;
        margin-top: 1rem;
        position: relative;
    }

    .timeline::before {
        content: '';
        top: 0;
        bottom: 0;
        position: absolute;
        width: 1px;
        background-color: #ffffff;
        left: 50%;
    }

    .timeline li {
        margin-bottom: 1.5rem;
        position: relative;
    }

    .timeline li::before,
    .timeline li::after {
        content: '';
        display: table;
    }

    .timeline li::after {
        clear: both;
    }

    .timeline li .timeline-image {
        width: 160px;
        height: 160px;
        background-color: #000000;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 50%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .timeline li .timeline-panel {
        width: 40%;
        float: left;
        border: 1px solid #000000;
        padding: 2rem;
        position: relative;
        border-radius: 8px;
        background-color: #000000;
    }

    .timeline li .timeline-panel::before {
        content: '';
        display: inline-block;
        position: absolute;
        border-top: 15px solid transparent;
        border-left: 15px solid #000000;
        border-right: 0 solid #000000;
        border-bottom: 15px solid transparent;
        top: 80px;
        right: -15px;
    }

    .timeline li .timeline-panel::after {
        content: '';
        display: inline-block;
        position: absolute;
        border-top: 14px solid transparent;
        border-left: 14px solid #000000;
        border-right: 0 solid #000000;
        border-bottom: 14px solid transparent;
        top: 81px;
        right: -13px;
    }

    .timeline li.timeline-inverted .timeline-panel {
        float: right;
    }

    .timeline li.timeline-inverted .timeline-panel::before {
        border-left-width: 0;
        border-right-width: 15px;
        left: -15px;
        right: auto;
    }

    .timeline li.timeline-inverted .timeline-panel::after {
        border-left-width: 0;
        border-right-width: 14px;
        left: -13px;
        right: auto;
    }

    .footer {
        background-color: #f0f0f0;
        /* Light gray background */
        text-align: center;
        padding: 20px 0;
        border-top: 2px solid #333;
        /* Dark line at the top */
        font-size: 14px;
        position: relative;
        bottom: 0;
        width: 100%;
    }

    .footer .small-text {
        font-size: 12px;
        /* Smaller text for 'Made With By' */
        color: #666;
        /* Lighter color for this part */
    }



    .footer-logo {
        margin-top: 10px;
        /* Space between text and logo */
        width: 80px;
        height: auto;
        margin-bottom: 20px;
    }

    .footer p {
        color: #666;
        font-size: 12px;
        margin-bottom: -10px;
    }

    .thank {
        text-align: center;
        padding: 20px 0;
        margin-top: -10px;
        margin-bottom: 5px;
        /* Sesuaikan warna latar */
    }

    .thank .thanks {
        font-size: 14px;
        /* Ukuran teks lebih kecil */
        margin-bottom: 5px;
        font-style: italic;
        color: #333;
        margin-bottom: -5px;
        /* Sesuaikan warna teks */
    }

    .thank h2 {
        font-size: 15px;
        /* Ukuran lebih kecil */
        font-weight: bold;
        color: #000;
        /* Sesuaikan warna teks */
        margin-top: 0;
    }

    /* Footer */
    .footer {
        background-color: #000;

        
        color: #fff;
        text-align: center;
        padding: 20px 0;
        margin-bottom: -150px;
    }

    .footer .small-text {
        font-size: 14px;
        color: #ccc;
        /* Warna teks yang lebih terang */
    }

    .footer .logo {
        margin-top: 6px;
        width: 100px;
        /* Ukuran logo lebih kecil */
        height: auto;
    }

    .footer p {
        font-size: -5px;
        margin-top: 10px;
        color: #cccccc;
    }




    .music-button {
        padding: 10px 20px;
        background-color: #333;
        color: white;
        border: none;
        border-radius: 50%;
        /* Make the button round */
        cursor: pointer;
        font-size: 20px;
        position: fixed;
        /* Use fixed positioning */
        bottom: 150px;
        /* Distance from the bottom (adjusted higher) */
        right: 20px;
        /* Distance from the right */
        z-index: 1000;
        /* Ensure the button stays on top of other elements */
        display: flex;
        justify-content: center;
        align-items: center;
        width: 50px;
        height: 50px;
    }

    .music-button:hover {
        background-color: #555;
    }


    .story {
        padding-top: 10rem;
        padding-bottom: 8rem;
        position: relative;
        text-align: center;
        margin-top: -160px;
        margin-left: -25px;
        margin-right: -30px;
    }

    .story h2 {
        font-size: 40px;
        font-family: 'Playfair Display', serif;
        color: #000000;
        margin-bottom: 30px;
        font-weight: bold;
        color: #333;
        position: relative;
        margin-bottom: 1rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        background: linear-gradient(to right, #000000, #6d6c6c);
        -webkit-background-clip: text;
        color: transparent;
    }

    .story h2::after {
        content: '';
        display: block;
        width: 80px;
        height: 4px;
        background-color: #000000;
        margin: 20px auto 0;
        border-radius: 2px;
        transition: width 0.4s ease;
    }

    .story h2:hover::after {
        width: 120px;
    }

    .story h2 {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 1s forwards;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .story p {
        font-family: 'Times New Roman', serif;
        font-size: 1.2rem;
        font-weight: 300;
        color: #666;
        margin-top: 20px;
        max-width: 800px;
        line-height: 1.8;
        margin-left: auto;
        margin-right: auto;
        padding: 0 20px;
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 1.2s forwards;
    }

    .timeline {
        list-style: none;
        padding: 1.4rem 0;
        margin-top: 1rem;
        position: relative;
    }

    .timeline::before {
        content: '';
        top: 0;
        bottom: 0;
        position: absolute;
        width: 1px;
        background-color: #ccc;
        left: 50%;
        transform: translateX(-50%);
    }

    .timeline li {
        margin-bottom: 2.5rem;
        position: relative;
    }

    .timeline li::before,
    .timeline li::after {
        content: '';
        display: table;
    }

    .timeline li::after {
        clear: both;
    }

    .timeline li .timeline-image {
        width: 160px;
        height: 160px;
        background-color: #ccc;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 50%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        /* Tambahkan bayangan */
        transition: transform 0.3s ease;
        /* Efek hover */
    }

    .timeline li:hover .timeline-image {
        transform: translateX(-50%) scale(1.05);
        /* Perbesar saat di-hover */
    }

    .timeline li .timeline-panel {
        width: 40%;
        float: left;
        border: 1px solid #ccc;
        padding: 2rem;
        position: relative;
        border-radius: 8px;
        background-color: #fff;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        /* Tambahkan bayangan */
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .timeline li:hover .timeline-panel {
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        /* Tambahkan shadow saat hover */
        transform: translateY(-5px);
        /* Mengangkat elemen saat di-hover */
    }

    .timeline li .timeline-panel::before {
        content: '';
        display: inline-block;
        position: absolute;
        border-top: 15px solid transparent;
        border-left: 15px solid #ccc;
        border-right: 0 solid #ccc;
        border-bottom: 15px solid transparent;
        top: 80px;
        right: -15px;
    }

    .timeline li .timeline-panel::after {
        content: '';
        display: inline-block;
        position: absolute;
        border-top: 14px solid transparent;
        border-left: 14px solid #fff;
        border-right: 0 solid #fff;
        border-bottom: 14px solid transparent;
        top: 81px;
        right: -13px;
    }

    .timeline li.timeline-inverted .timeline-panel {
        float: right;
    }

    .timeline li.timeline-inverted .timeline-panel::before {
        border-left-width: 0;
        border-right-width: 15px;
        left: -15px;
        right: auto;
    }

    .timeline li.timeline-inverted .timeline-panel::after {
        border-left-width: 0;
        border-right-width: 14px;
        left: -13px;
        right: auto;
    }

    .timeline li .timeline-panel h4 {
        font-size: 1.25rem;
        font-weight: bold;
        color: #333;
        /* Warna teks yang lebih gelap */
        margin-bottom: 1rem;
    }

    .timeline li .timeline-panel p {
        font-size: 1rem;
        color: #666;
        /* Warna teks lebih lembut */
        line-height: 1.6;
    }

    

    .icon5 {
        width: 130px;
        height: 130px;
        margin-bottom: 2px;
        margin-top: -85px;
    }

    .section-title {
        font-size: 20px;
        margin-bottom: 15px;
        font-weight: bold;
    }

    .form {
        display: flex;
        flex-direction: column;
        gap: 10px;
        max-width: 800px;
        margin: auto;
        align-items: flex-start;
    }

    .textarea {
        width: 600%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 14px;
        max-width: 800px;
        height: 150px;
    }

    .input {
        width: 600%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 14px;
        max-width: 800px;
        height: 40px;
    }

    .button5 {
        background-color: black;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        max-width: 100px;
        align-self: flex-end;
        margin-bottom: 20px;
    }

    .button5:hover {
        background-color: #333;
    }

    .messages {
        margin-top: 20px;
        max-height: 350px;
        overflow-y: auto;
        background-color: #f4f4f4;
        padding: 10px;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        max-width: 800px;
        margin: auto;
    }

    .message {
        background-color: rgb(255, 255, 255);
        padding: 15px 20px;
        border-radius: 10px;
        margin-bottom: 15px;
        font-size: 14px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        text-align: left;
        width: 100%;
        height: auto;
        word-wrap: break-word;
        /* Agar teks panjang tetap berada dalam kolom */
        width: 100%;
        /* Lebar penuh dalam container */
        position: relative;
    }







    @media (max-width: 768px) {
        .section1 {
            background: url('{{ asset('images/bg 2.png') }}') no-repeat center center/cover;
            background-size: 400%;
            color: #000;
        }
    }

    @media (max-width: 480px) {

        .title {
            font-size: 20px;
            font-family: 'Playfair Display', serif;
            color: #000000;
            margin-bottom: 45px;
            margin-top: 30px;
        }

        .title-and {
            font-size: 25px;
            font-family: 'Playfair Display', serif;
            color: #000000;
            margin-bottom: 40px;
            margin-top: -40px;
        }

        .profile-img {
            width: 60%;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .name {
            font-family: 'Great Vibes', cursive;
            margin: 5px 0;
            font-size: 25px !important;
        }

        .profile h2 {
            font-size: 10px;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
            margin-right: -50px;
        }

        .profile p {
            font-size: 10px;
            color: #777;
        }

        .container1 {
            text-align: center;
            padding: 10px;
            background: url('{{ asset('images/bg 7.png') }}') no-repeat center center / cover;
            height: 970px;
            margin-top: -30px;
            margin-left: -50px;
            margin-right: -50px;
        }

        .social-icons {
            margin-top: 10px;

        }

        .social-icons img {
            width: 15px;
            margin: 0 5px;
            margin-bottom: 50px;

        }

        .profile1 .h2 {
            font-size: 20px;
            margin-bottom: 10px;
            font-weight: bold;
            margin-right: 50px;
           
        }

        .profile1 p {
            font-size: 10px;
            color: #777;
        }

        .event-section {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 60px;
            margin-bottom: 10px;
        }

        .event-card {
            background-color: #333;
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            width: 240px;
            text-align: center;
            margin-bottom: -30px;

        }

        .event-card h2 {
            font-size: 25px;
            font-family: 'Playfair Display', serif;
            margin-bottom: 10px;
            margin-top: 5px;
        }

        .event-card p {
            font-size: 13px;
            margin: 5px 0;
        }

        .event-card strong {
            font-size: 18px;
        }

        .event-card .button {
            background-color: #fff;
            color: #333;
            padding: 10px 1px;
            border-radius: 5px;
            font-size: 9px;
            cursor: pointer;
            border: none;
            margin-top: 20px;
            animation: pulse 4s infinite;
            margin-bottom: 20px;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                /* Ukuran normal */
            }

            50% {
                transform: scale(1.1);
                /* Membesar di tengah animasi */
            }

            100% {
                transform: scale(1);
                /* Kembali ke ukuran normal */
            }
        }

        .event-card .button:hover {
            background-color: #555;
            color: #fff;
        }

        .event-card .icon {
            width: px;
            margin-bottom: 20px;
        }

        .event-card .icons {
            width: 200px;
            margin-bottom: 20px;
        }

        .akad-nikah .icon {
            width: 70px;
            margin-bottom: 5px;
        }

        .akad-nikah h2 {
            font-size: 30px;
            font-family: 'Playfair Display', serif;
            font-weight: 100;
            margin-bottom: 10px;
            margin-left: -50px;
            margin-top: -5px;
        }

        .akad-nikah .akad-text {
            font-family: 'Great Vibes', cursive;
            font-size: 25px;
            display: block;
            margin-left: 100px;
        }

        .akad-nikah p {
            font-size: 11px;
            margin: 1px 0;
        }

        .akad-nikah p:nth-of-type(1) {
            margin-top: 20px;
        }

        .akad-nikah p:nth-of-type(3) {
            margin-top: 25px;
        }

        .akad-nikah p:nth-of-type(4) {
            margin-top: 7px;

        }

        .resepsi .icon {
            width: 110px;
            margin-bottom: 5px;

        }

        .resepsi h2 {
            font-size: 30px;
            font-family: 'Playfair Display', serif;
            font-weight: 100;
            margin-bottom: 10px;
            margin-left: -50px;
        }

        .resepsi .akad-text {
            font-family: 'Great Vibes', cursive;
            font-size: 25px;
            display: block;
            margin-left: 100px;
        }

        .resepsi p {
            font-size: 11px;
            margin: 1px 0;
        }

        .resepsi p:nth-of-type(1) {
            margin-top: 20px;
        }

        .resepsi p:nth-of-type(3) {
            margin-top: 25px;
        }

        .resepsi p:nth-of-type(4) {
            margin-top: 7px;
        }

        .container2 {
            background: url('{{ asset('images/bg 9.png') }}') no-repeat center center/cover;
            background-size: 1800px;
            color: #fff;
            padding: 40px;
            margin-top: -5px;
            margin-left: -30px;
            margin-right: -30px;
        }

        .countdown-content h2 {
            font-size: 18px;
            font-weight: 400;
            margin-bottom: 15px;
            margin-top: -10px;
            margin-left: -5px;
        }

        #countdown {
            display: flex;
            justify-content: center;
            gap: 0px;
            font-size: 15px;
            font-family: 'Playfair Display', serif;
            margin-bottom: -20px;
            margin-left: 20px;

        }

        .countdown-box {
            text-align: center;
            margin-right: 20px;
        }

        .countdown-box span {
            display: block;
        }

        .countdown-box .label {
            font-size: 5px;
            text-transform: uppercase;
        }

        .reminder-button {
            background-color: #fff;
            color: #333;
            padding: 4px 10px;
            border-radius: 3px;
            border: none;
            margin-top: 50px;
            display: inline-flex;
            align-items: center;
            cursor: pointer;
            font-size: 7px;
            animation: pulse 4s infinite;

        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                /* Ukuran normal */
            }

            50% {
                transform: scale(1.1);
                /* Membesar di tengah animasi */
            }

            100% {
                transform: scale(1);
                /* Kembali ke ukuran normal */
            }
        }

        .reminder-button:hover {
            background-color: #555;
            color: #fff;
        }

        .reminder-button i {
            margin-right: 10px;
        }

        .rsvp-section {
            text-align: center;
            padding: 30px;
            background: url('{{ asset('images/bg 10.png') }}') no-repeat center center / cover;
            height: 670px;
            margin-bottom: 15px;

        }

        .rsvp-container {
            max-width: 300px;
            height: 550px;
            background-color: #e0e0e0;
            border-radius: 10px;
            margin-top: 30px;
            padding: 0px 20px;
            margin-left: 10px;

        }

        .rsvp-section p {
            font-size: 8px;
            margin-bottom: -10px;
            text-align: center;
            padding-left: 30px;
            padding-right: 30px;
            margin-top: -10px;
            margin-bottom: -20px;
        }

        .rsvp-section h2 {
            font-family: 'YourFont', serif;
            font-size: 36px;
            margin-bottom: 10px;
        }

        .rsvp-container p {
            font-family: 'YourFont', serif;
            font-size: 18px;
            margin-bottom: 20px;

        }

        .rsvp-container input,
        .rsvp-container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .attendance-options label {
            font-size: 16px;
        }

        .rsvp-submit {
            background-color: #333;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 180px;
            animation: pulse 4s infinite;
            font-size: 9px;
            margin-right: -10px;
            margin-left: 200.px;
            
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                /* Ukuran normal */
            }

            50% {
                transform: scale(1.1);
                /* Membesar di tengah animasi */
            }

            100% {
                transform: scale(1);
                /* Kembali ke ukuran normal */
            }
        }

        .rsvp-submit:hover {
            background-color: #555;
        }

        .rsvp-container-rsvp h2 {
            font-size: 40px;
            font-family: 'Playfair Display', serif;
            font-weight: 100;
            margin-bottom: 10px;
        }

        .rsvp-title {
            font-size: 1px;
            font-family: 'Playfair Display', serif;
            font-weight: 100;
            margin-bottom: 10px;
            margin-left: -45px;
            margin-top: 10px;
        }

        .rsvp .icon {
            width: 150px;
            margin-bottom: -3px;
            margin-top: 20px;
        }

        .rsvp h2 {
            font-size: 30px;
            font-family: 'Playfair Display', serif;
            font-weight: 100;
            margin-bottom: 10px;
        }

        .rsvp .rsvp-text {
            font-family: 'Great Vibes', cursive;
            font-size: 25px;
            display: block;
            margin-left: 90px;
        }

        .rsvp p {
            font-size: 10px;
            margin: 1px 0;
            margin-top: 40px;
            margin-bottom: 1px;
        }

        .rsvp-container p {
            text-align: left;
            font-size: 14px;
            margin-top: 15px;
            margin-left: -45px;
            margin-right: -50px;
            margin-bottom: -20px;
        }

        .rsvp-container form label1 {
            display: block;
            text-align: left;
            margin-bottom: 10px;
            font-size: 13px;
            font-weight: bold;
            margin-top: 40px;
            margin-left: -15px;
            margin-bottom: -3px;

        }

        .divider1 {
            width: 110%;
            border: 1px solid #1c1c1c;
            opacity: 0.5;
            margin-left: -15px;
            margin-top: 1px;
            margin-bottom: -30px;
        }

        .rsvp-section .p {
            font-size: 20px;
        }

        .rsvp-container p {
            text-align: left;
            font-size: 10px;
            margin-top: 15px;
            margin-left: -45px;
            margin-right: -50px;
            margin-bottom: -5px;
            margin-top: 5px;
            line-height: 2.5em;
        }

        .custom-select {
            width: 30px;
            font-size: 10px;
            margin-left: -15px;
            margin-bottom: -15px;
        }

        .attendance-options {
            text-align: left;
            margin-top: -10px;
            margin-bottom: -40px;
        }

        .attendance-items {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            margin-left: -17px;
            margin-top: -20px;
            flex-wrap: nowrap;
            margin-top: -10px;
        }

        .attendance-item {
            display: flex;
            align-items: center;
            margin-right: 30px;
            /* Adjust to control space between items */
        }

        .attendance-item label {
            margin-left: 25px;
            /* Space between radio button and label text */
            white-space: nowrap;
            /* Prevents the label text from wrapping */
        }


        .attendance-item input[type="radio"] {
            margin-right: -20px;
            transform: scale(0.8);
        }

        .no-bold {
            margin-left: 10px;
            font-size: 10px !important;
        }

        .gift-section {
            background: url('{{ asset('images/bg 12.png') }}') no-repeat center center/cover;
            background-size: 400%;
            color: #fff;
            padding: 50px;
            text-align: center;
            margin-left: -50px;
            margin-right: -30px;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .gift h2 {
            font-size: 40px;
            font-family: 'Playfair Display', serif;
            font-weight: 100;
            margin-bottom: 5px;
            margin-top: 5px;
        }

        .gift p {
            font-size: 10px;
            text-align: center;
            margin-bottom: -10px;
            text-align: center;
            padding-left: 30px;
            padding-right: 30px;
            margin-top: -1px;
            margin-bottom: 10px;

        }

        .gift .gift-text {
            font-family: 'Great Vibes', cursive;
            font-size: 25px;
            display: block;
            margin-left: 85px;
        }

        .reminder-button:hover {
            background-color: #555;
            color: #fff;
        }

       .button-kado{
        margin-left: 10px;
        display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 5px 8px;
            border: none;
            cursor: pointer;
            margin-right: -10px;
            /* Spasi antar tombol */
            border-radius: 5px;
            /* Menambahkan radius untuk sudut tombol */
            background-color: #fff;
            /* Warna latar belakang tombol */
            color: #333;
            /* Warna teks tombol */
            transition: background-color 0.3s;
            /* Transisi untuk hover */
            animation: pulse 4s infinite;
            font-size: 7px;
       }
.button-bank{
margin-left: 20px;
        display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 5px 8px;
            border: none;
            cursor: pointer;
            margin-right: -10px;
            /* Spasi antar tombol */
            border-radius: 5px;
            /* Menambahkan radius untuk sudut tombol */
            background-color: #fff;
            /* Warna latar belakang tombol */
            color: #333;
            /* Warna teks tombol */
            transition: background-color 0.3s;
            /* Transisi untuk hover */
            animation: pulse 4s infinite;
            font-size: 7px;
}
        .gift-buttons .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 5px 8px;
            border: none;
            cursor: pointer;
            margin-right: -10px;
            /* Spasi antar tombol */
            border-radius: 5px;
            /* Menambahkan radius untuk sudut tombol */
            background-color: #fff;
            /* Warna latar belakang tombol */
            color: #333;
            /* Warna teks tombol */
            transition: background-color 0.3s;
            /* Transisi untuk hover */
            animation: pulse 4s infinite;
            font-size: 7px;
            
            /* Tambahkan efek animasi */
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                /* Ukuran normal */
            }

            50% {
                transform: scale(1.1);
                /* Membesar di tengah animasi */
            }

            100% {
                transform: scale(1);
                /* Kembali ke ukuran normal */
            }
        }

        .gift-buttons .button:hover {
            background-color: #555;
            /* Warna latar belakang saat hover */
            color: #fff;
            /* Warna teks saat hover */
        }


        .gift-buttons img.kado-icon {
            width: 8px;
            /* Ukuran ikon Kado */
            height: 10px;
            /* Tinggi ikon Kado */
            margin-right: 5px;
            /* Jarak antara ikon dan teks */
        }
.gift .icon{
margin-top: -10px;
}
        .gift-buttons img.bank-icon {
            width: 8px;
            /* Ukuran ikon Bank */
            height: 10px;
            /* Tinggi ikon Bank */
            margin-right: px;
            /* Jarak antara ikon dan teks */
        }

        .photo-gallery {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            justify-items: center;
            margin: 1px 1px;
            margin-left: -30px;
            margin-right: -25px;
            margin-top: 30px;
        }

        .photo-item {
            margin: 2px;
            justify-items: center;
        }

        .photo-item img {
            width: 100%;

            height: 110px;

            max-width: 600px;
            /* Set a max width to ensure all photos are of similar size */
        }

        .story {
            padding-top: 10rem;
            padding-bottom: 8rem;
            position: relative;
            text-align: center;
            margin-top: -190px;
            margin-left: -25px;
            margin-right: -30px;
        }

        .container5 {
            text-align: center;
            padding: 30px;
            background: url('{{ asset('images/bg1.png') }}') no-repeat center center / cover;
            height: 1290px;
            margin-top: 10px;

        }

        .thank {
            text-align: center;
            padding: 20px 0;
            margin-top: -5px;
            margin-bottom: 5px;
            /* Sesuaikan warna latar */
        }

        .thank .thanks {
            font-size: 14px;
            /* Ukuran teks lebih kecil */
            margin-bottom: 5px;
            font-style: italic;
            color: #333;
            margin-bottom: -5px;
            /* Sesuaikan warna teks */
        }

        .thank h2 {
            font-size: 15px;
            /* Ukuran lebih kecil */
            font-weight: bold;
            color: #000;
            /* Sesuaikan warna teks */
            margin-top: 0;
            
        }

        /* Footer */
        .footer {
            background-color: #000;
            width: 400px;
            color: #fff;
            text-align: center;
            margin-left: -5px;
        
        }

        .footer .small-text {
            font-size: 8px;
            color: #ccc;
            margin-top: -60px;
            /* Warna teks yang lebih terang */
        }

        .footer .logo {
            margin-top: 10px;
            width: 50px;
            /* Ukuran logo lebih kecil */
            height: auto;
        }
        .footer p {
        font-size: 15px !important;
        margin-top: 10px;
        color: #cccccc;
    }

        .screen-prewed {
            margin-left: -30px;
            margin-right: -20px;
            width: 100vw;
            height: 37vh;
            object-fit: cover;

        }

        .story h2 {
            font-size: 40px;
            font-family: 'Playfair Display', serif;
            color: #000000;
            margin-bottom: 30px;
            font-weight: bold;
            color: #333;
            position: relative;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            background: linear-gradient(to right, #000000, #6d6c6c);
            -webkit-background-clip: text;
            color: transparent;
        }

        .story h2::after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background-color: #000000;
            margin: 20px auto 0;
            border-radius: 2px;
            transition: width 0.4s ease;
        }

        .story h2:hover::after {
            width: 120px;
        }

        .story h2 {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 1s forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .story p {
            font-family: 'Times New Roman', serif;
            font-size: 1.2rem;
            font-weight: 300;
            color: #666;
            margin-top: 20px;
            max-width: 800px;
            line-height: 1.8;
            margin-left: auto;
            margin-right: auto;
            padding: 0 20px;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 1.2s forwards;
        }

        .timeline {
            list-style: none;
            padding: 1.4rem 0;
            margin-top: 1rem;
            position: relative;
        }

        .timeline::before {
            content: '';
            top: 0;
            bottom: 0;
            position: absolute;
            width: 1px;
            background-color: #ccc;
            left: 50%;
            transform: translateX(-50%);
        }

        .timeline li {
            margin-bottom: 2.5rem;
            position: relative;
        }

        .timeline li::before,
        .timeline li::after {
            content: '';
            display: table;
        }

        .timeline li::after {
            clear: both;
        }

        .timeline li .timeline-image {
            width: 100px;
            height: 100px;
            background-color: #ccc;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 50%;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            /* Tambahkan bayangan */
            transition: transform 0.3s ease;
            /* Efek hover */
        }

        .timeline li:hover .timeline-image {
            transform: translateX(-50%) scale(1.05);
            /* Perbesar saat di-hover */
        }

        .timeline li .timeline-panel {
            width: 40%;
            float: left;
            border: 1px solid #ccc;
            padding: 2rem;
            position: relative;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            /* Tambahkan bayangan */
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }

        .timeline li:hover .timeline-panel {
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            /* Tambahkan shadow saat hover */
            transform: translateY(-5px);
            /* Mengangkat elemen saat di-hover */
        }

        .timeline li .timeline-panel::before {
            content: '';
            display: inline-block;
            position: absolute;
            border-top: 15px solid transparent;
            border-left: 15px solid #ccc;
            border-right: 0 solid #ccc;
            border-bottom: 15px solid transparent;
            top: 80px;
            right: -15px;
        }

        .timeline li .timeline-panel::after {
            content: '';
            display: inline-block;
            position: absolute;
            border-top: 14px solid transparent;
            border-left: 14px solid #fff;
            border-right: 0 solid #fff;
            border-bottom: 14px solid transparent;
            top: 81px;
            right: -13px;
        }

        .timeline li.timeline-inverted .timeline-panel {
            float: right;
        }

        .timeline li.timeline-inverted .timeline-panel::before {
            border-left-width: 0;
            border-right-width: 15px;
            left: -15px;
            right: auto;
        }

        .timeline li.timeline-inverted .timeline-panel::after {
            border-left-width: 0;
            border-right-width: 14px;
            left: -13px;
            right: auto;
        }

        .timeline li .timeline-panel h3 {
            font-size: 15px;
            font-weight: bold;
            color: #333;
            margin-bottom: 1rem;
            margin-left: -20px;
            margin-top: -10px;
        }

        .timeline li .timeline-panel span {
            font-size: 14px;
            color: #333;
            margin-bottom: 1rem;
            margin-left: -10px;
            margin-top: -10px;
            justify-content: left;
            text-align: center;
        }

        .timeline li .timeline-panel p {
            font-size: 10px;
            color: #666;
            /* Warna teks lebih lembut */
            margin-right: -40px;
            margin-left: -40px;
            justify-content: left;
            text-align: justify;
        }

        body {
            margin: 0;
            font-family: 'Playfair Display', serif;
            background-color: #f0f0f0;


        }

        .section {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
        }

        .wedding-ket {
            color: white;
            font-weight: 300;
            font-size: 20px;
            margin-bottom: 10px;
        }

        .wedding-title {
            font-family: 'Great Vibes', cursive;
            color: white;
            font-size: px;
            font-weight: 550;
        }

        .wedding-date {
            color: white;
            font-size: 1.2em;
        }

        .text-overlay {
            position: absolute;
            top: 0;
            width: 100%;
            padding-top: 30px;
            text-align: center;
            z-index: 1;
        }


        .slideshow-container {
            position: relative;
            max-width: 100%;
            overflow: hidden;
            z-index: 0;
        }

        .mySlides {
            display: none;
        }

        .mySlides img {
            width: 100vw;
            height: 100vh;
            object-fit: cover;
        }

        .wedding-ar-rum {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 30px;
            background-color: rgba(230, 230, 230, 0.6);
            color: rgb(46, 46, 46);
            text-align: center;
            font-size: 10px;
            line-height: 1.5;
            margin-bottom: -20px;
        }

        .slideshow-container {
            position: relative;
            max-width: 100%;
            margin: 0 auto;
            overflow: hidden;
        }

        .mySlides {
            display: none;
            width: 100%;
        }

        .mySlides img {
            width: 100vw;
            height: 105vh;
            object-fit: cover;
        }

        .wedding-date {
            font-size: 1.2em;
            margin-top: 10px;
            color: #fff;
        }

        .section h1 {
            font-size: 50px;
            font-family: 'Great Vibes', cursive;
            font-weight: 400;
            margin-bottom: 10px;
            margin-top: 25px;
            line-height: 1.2;
        }

        .divider {
            width: 30%;
            margin: 10px auto;
            border: 1px solid #fff;
            opacity: 0.5;
        }

        .gallery-title {
            font-size: 1px;
            font-family: 'Playfair Display', serif;
            font-weight: 100;
            margin-bottom: 10px;
            margin-left: -45px;
        }

        h2 {
            font-size: 30px;
            font-family: 'Playfair Display', serif;
            font-weight: 100;
            margin-bottom: 10px;
            margin-left: -50px;
            margin-top: 35px;
        }

        .gallery-text {
            font-family: 'Great Vibes', cursive;
            font-size: 25px;
            display: block;
            margin-left: 90px;
        }
        .text{
            font-size: 10px !important;
        }
       
.small-title {
font-size: 40px !important; 
font-weight: bold;
margin-right: -35px;
}

.app-container .form{
font-family: 'Playfair Display', serif;
}


    }
</style>
<body>
    <div class="section section1">
        <div class="content">
            <div class="text-overlay">
                <p class="wedding-ket">The wedding of</p>
                <h1 class="wedding-title">Putra & Putri</h1>
                <p class="wedding-date">Sabtu, 17 Agustus 2024</p>
            </div>

            <div class="slideshow-container">
                <div class="mySlides">
                    <img src="{{ asset('images/cover1.jpg') }}" alt="Photo 1">
                </div>
                <div class="mySlides">
                    <img src="{{ asset('images/cover2.jpg') }}" alt="Photo 2">
                </div>
                <div class="mySlides">
                    <img src="{{ asset('images/cover3.jpg') }}" alt="Photo 3">
                </div>
            </div>

            <p class="wedding-ar-rum">
                "Di antara tanda-tanda (kebesaran)-Nya ialah bahwa Dia menciptakan pasangan-pasangan untukmu dari
                (jenis)
                dirimu sendiri agar kamu merasa tenteram kepadanya. Dia menjadikan di antaramu rasa cinta dan kasih
                sayang.
                Sesungguhnya pada yang demikian itu benar-benar terdapat tanda-tanda (kebesaran Allah) bagi kaum yang
                berpikir." (QS Ar-Rum: 21)
            </p>
        </div>
    </div>

    <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let slides = document.getElementsByClassName("mySlides");

            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }

            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1;
            }

            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 3500);
        }
    </script>

    <div class="container">
        <h1 class="title">BRIDE & GROOM</h1>
        <div class="profiles">
            <div class="profile">
                <img src="{{ asset('images/wanita.png') }}" alt="Bride" class="profile-img bride-img">
                <p class="name">Riska</p>
                <h2>Angelina Mariska, S.Kom</h2>
                <p>Putri Kedua dari<br>Bapak Ahmad Syahputra<br>& Ibu Riyatna Kusumaningrum</p>
                <div class="social-icons">
                    <a href="#"><img src="{{ asset('images/ig.png') }}" alt="Instagram"></a>
                    <a href="#"><img src="{{ asset('images/fb.png') }}" alt="Facebook"></a>
                </div>
                <h1 class="title-and">&</h1>
                <div class="profile">
                    <img src="{{ asset('images/laki-laki.png') }}" alt="Groom" class="profile-img groom-img">
                    <p class="name">Fakih</p>
                    <h2>Fakih Prasetya Nugraha, S.T</h2>
                    <p>Putra Kedua dari<br>Bapak Ahmad Syahputra<br>& Ibu Riyatna Kusumaningrum</p>
                    <div class="social-icons">
                        <a href="#"><img src="{{ asset('images/ig.png') }}" alt="Instagram"></a>
                        <a href="#"><img src="{{ asset('images/fb.png') }}" alt="Facebook"></a>
                    </div>
                </div>
            </div>
        </div>
        <script>
            window.onload = () => {
                const bride = document.getElementById('bride');
                const groom = document.getElementById('groom');

                bride.style.animationPlayState = 'running';
                groom.style.animationPlayState = 'running';

                setTimeout(() => {
                    bride.style.animationPlayState = 'paused';
                    groom.style.animationPlayState = 'paused';
                }, 3000); 
            };
        </script>
        <div class="container1">
            <div class="event-section">
                <div class="event-card akad-nikah">
                    <img src="{{ asset('images/ring.png') }}" alt="Wedding Rings" class="icon">
                    <h2>AKAD <span class="akad-text">Nikah</span></h2>
                    <p>Minggu, 17 Oktober 2024</p>
                    <p><strong>07.00 - 08.00</strong></p>
                    <p>Puri Ardhya Garini, Halim Perdana Kusuma</p>
                    <p>Jl. Halim Perdana Kusuma, Halim Perdana Kusumah, Kec. Makasar, Kota Jakarta Timur, DKI Jakarta
                    </p>
                    <div style="text-align: center;">

                        <button class="button"
                            style="display: inline-flex; align-items: center; justify-content: center; padding: 5px 10px; border: none; cursor: pointer;">
                            <img src="{{ asset('images/location.png') }}" alt="Location Icon"
                                style="width: 10px; height: 10px; margin-right: 10px;">
                            Lihat Lokasi
                        </button>
                    </div>
                </div>
            </div>
            <div class="event-section">
                <div class="event-card resepsi">
                    <img src="{{ asset('images/birds.png') }}" alt="Bird Symbol" class="icon">
                    <h2>RESEPSI <span class="akad-text">Pernikahan</span></h2>
                    <p>Minggu, 17 Oktober 2024</p>
                    <p><strong>08.00 - 11.00</strong></p> <!-- Ubah waktu acara -->
                    <p>Puri Ardhya Garini, Halim Perdana Kusuma</p>
                    <p>Jl. Halim Perdana Kusuma, Halim Perdana Kusumah, Kec. Makasar, Kota Jakarta Timur, DKI Jakarta
                    </p>
                    <div style="text-align: center;">
                        <!-- Membungkus tombol untuk memastikan tengah secara horizontal -->
                        <button class="button"
                            style="display: inline-flex; align-items: center; justify-content: center; padding: 5px 10px; border: none; cursor: pointer;">
                            <img src="{{ asset('images/location.png') }}" alt="Location Icon"
                                style="width: 10px; height: 10px; margin-right: 10px;">
                            Lihat Lokasi
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('images/prewed0.jpg') }}" class="screen-prewed">
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
                <button class="reminder-button" onclick="downloadCalendarEvent()">
                    <i class="fas fa-bell"></i> Buat Pengingat
                </button>
            </div>
        </div>
        
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
        
                document.getElementById("days").innerHTML = days;
                document.getElementById("hours").innerHTML = hours;
                document.getElementById("minutes").innerHTML = minutes;
                document.getElementById("seconds").innerHTML = seconds;
        
                if (distance < 0) {
                    clearInterval(countdownFunction);
                    document.getElementById("countdown").innerHTML = "Acara Telah Dimulai!";
                }
            }, 1000);
        
            function downloadCalendarEvent() {
                var eventDateTime = "{{ $event->event_date }}".replace(/[-:]/g, "").replace(" ", "T") + "Z";
                var eventEndDateTime = new Date(new Date(eventDateTime).getTime() + (2 * 60 * 60 * 1000))
                    .toISOString().replace(/[-:]/g, "").replace(".000Z", "Z");
        
                var icsFileContent = `
                BEGIN:VCALENDAR
                VERSION:2.0
                BEGIN:VEVENT
                SUMMARY:Pernikahan Shinta
                DTSTART:${eventDateTime}
                DTEND:${eventEndDateTime}
                DTSTAMP:${new Date().toISOString().replace(/[-:]/g, "").replace(".000Z", "Z")}
                UID:${new Date().getTime()}-ShintasWedding
                DESCRIPTION:Acara Pernikahan yang Dinantikan
                LOCATION:Lokasi Pernikahan
                ORGANIZER:Shinta's Family
                STATUS:TENTATIVE
                PRIORITY:1
                END:VEVENT
                END:VCALENDAR`;
        
                var blob = new Blob([icsFileContent.trim()], { type: 'text/calendar' });
                var link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = 'reminder.ics';
                link.click();
            }
        </script>
        @endif
        
        <section id="rsvp" class="rsvp-section">
            <div class="rsvp-container">
                <div class="rsvp-container rsvp">
                    <img src="{{ asset('images/rsvp.png') }}" alt="Wedding Rings" class="icon">
                    <h2 class="rsvp-title">RSVP <span class="rsvp-text">Kehadiran</span></h2>
                    <p>
                        Kami tidak sabar menunggu hari pernikahan kami bersama Bapak/Ibu/Saudara/i. Mohon konfirmasi
                        kehadiran. Terima kasih.
                    </p>
        
                    @if (session('success'))
                        <p style="color: green;">{{ session('success') }}</p>
                    @endif
        
                    <form action="{{ route('rsvp.store') }}#rsvp" method="POST" id="rsvpForm">
                        @csrf
                        <input type="hidden" name="event_id" value="1">
                        
                        <label1 for="name">Nama Lengkap</label1>
                        <input type="text" name="name" required value="{{ old('name', session('new_data')['name'] ?? '') }}"><br>
        
                        <label1 for="phone_number">No Handphone</label1>
                        <input type="text" name="phone_number" required value="{{ old('phone_number', session('new_data')['phone_number'] ?? '') }}"><br>
        
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
                            <button formaction="{{ route('rsvp.confirmUpdate') }}" formmethod="POST" class="button5">Edit Data</button>
                            <button formaction="{{ route('rsvp.cancelUpdate') }}" formmethod="POST" class="button5">Batalkan</button>
                        @else
                            <button type="submit" class="rsvp-submit">Kirim</button>
                        @endif
                    </form>
                </div>
            </div>
        </section>
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
        
        <h2>MOMEN<span class="gallery-text">Galeri</span></h2>
        <section class="photo-gallery">
            <div class="photo-item">
                <img src="{{ asset('images/prewed1.png') }}" alt="Description of image 1">
            </div>
            <div class="photo-item">
                <img src="{{ asset('images/prewed2.png') }}" alt="Description of image 2">
            </div>
            <div class="photo-item">
                <img src="{{ asset('images/prewed3.png') }}" alt="Description of image 3">
            </div>
        </section>
        <section class="photo-gallery">
            <div class="photo-item">
                <img src="{{ asset('images/prewed1.png') }}" alt="Description of image 1">
            </div>
            <div class="photo-item">
                <img src="{{ asset('images/prewed2.png') }}" alt="Description of image 2">
            </div>
            <div class="photo-item">
                <img src="{{ asset('images/prewed3.png') }}" alt="Description of image 3">
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
                    <button class="button-kado">
                        <img src="{{ asset('images/kado.png') }}" alt="Kado Icon" class="kado-icon">
                        Kirim Hadiah
                    </button>
                    <button class="button-bank">
                        <img src="{{ asset('images/bank.png') }}" alt="Bank Icon" class="bank-icon">
                        Transfer Bank
                    </button>
                </div>
            </div>
        </section>
        <section id="story" class="story">
            <div class="container5">
                <div class="row justify-content-center">
                    <div class="text-center">
                        <h2 class="small-title">Cerita Kami</h2>
                        <p class="text">Kami memulai kisah ini dari pertemuan pertama hingga kemudian berpacaran dan akhirnya
                            memutuskan untuk menikah</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <ul class="timeline">
                            <li>
                                <div class="timeline-image " style="background-image: url({{ asset('images/prewed 1.jpg') }});"></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h3>Pertama Bertemu</h3>
                                        <span>31 Juni 2016</span>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Kami bertemu pertama kali di masa SMP yang saat itu kami berada di satu
                                            sekolah yang sama. Kemudian kami saling berkenalan dan mulai berkomunikasi
                                            secara intens</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-image " style="background-image: url({{ asset('images/prewed 2.jpg') }});"></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h3>Berpacaran</h3>
                                        <span>12 Agustus 2016</span>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Setelah merasa sudah dekat akhirnya kami memulai komitmen untuk berpacaran.
                                            Momen itu terjadi ketika kami memutuskan untuk pergi ke sebuah pantai di
                                            waktu senja</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline">
                                <div class="timeline-image " style="background-image: url({{ asset('images/prewed 3.jpg') }});"></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h3>Bertunangan</h3>
                                        <span>12 Agustus 2023</span>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Tepat 7 tahun kami berpacaran, Kami memutuskan untuk bertunangan dan memilih
                                            tanggal 21 Desember 2023 sebagai tanggal pernikahan Kami</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <img src="{{ asset('images/prewed4.png') }}" class="screen-prewed">
            <div class="comment-section">
                <div class="app-container">
                    <img src="{{ asset('images/amplop.png') }}" alt="Envelope Icon" class="icon5">
                    <div class="section-title">Tinggalkan pesan/doa untuk kami</div>
                    <form action="{{ route('comment.store') }}" method="POST" id="commentForm">
                        @csrf
                        <input type="hidden" name="rsvp_id" value="{{ session('rsvp_id') }}">
                        <textarea name="comment" placeholder="Ketikkan pesan/doa terindahmu.." required></textarea>
                        <button type="submit" class="button5">Kirim</button>
                    </form>
                    <div class="messages" id="messages">
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
                                $('#messages').append('<div class="message"><p><strong>' + response.rsvp_name + ':</strong><br>' + response.comment + '</p></div>');
                                
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
                <h4>PUTRA & PUTRI</h4>
            </div>

            <footer class="footer">
                <h4><span class="small-text">Made With By</span></h4>
                <img src="{{ asset('images/logo.jpg') }}" alt="diikatJanji Logo" class="logo">
                <p>all right reserved by diikatJanji</p>
            </footer>
            
</body>
</html>


{{-- <!DOCTYPE html>
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
</html> --}}