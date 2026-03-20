//Countdown
var countDownDate = new Date("Jun 24, 2025 08:00:00").getTime();
var x = setInterval(function() {
var now = new Date().getTime();
var distance = countDownDate - now;
var days = Math.floor(distance / (1000 * 60 * 60 * 24));
var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((distance % (1000 * 60)) / 1000);
document.getElementById("days").innerHTML = days + "<br>Hari";
document.getElementById("hours").innerHTML = hours + "<br>Jam";
document.getElementById("minutes").innerHTML = minutes + "<br>Menit";
document.getElementById("seconds").innerHTML = seconds + "<br>Detik";
}, 1000);


// Audio
let myAudio = new Audio();
myAudio.src = '/static/audio/Blue.mp3';
window.onload = myAudio.play();

document.addEventListener("DOMContentLoaded", function() {
    function toggleMute() {
        myAudio.muted = !myAudio.muted;
        muteButton.innerHTML = myAudio.muted ? "🔇" : "🔊";
    }

    muteButton.onclick = toggleMute;
});


//Geser section saat tombol dipejet
function geser(angka) {
    const sectionIds = ['section1', 'section2', 'section3', 'section4', 'section5', 'section6', 'section7', 'section8', 'section9', 10];
    const nextId = sectionIds[angka + 1];
    document.getElementById(nextId).scrollIntoView({ behavior: 'smooth' });
}
