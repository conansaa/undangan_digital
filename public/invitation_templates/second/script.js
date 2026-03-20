function getQueryParam(param) {
  const urlParams = new URLSearchParams(window.location.search);
  return urlParams.get(param);
}

const namaTamu = getQueryParam("to");
if (namaTamu) {
  document.getElementById("namaTamuTarget").textContent = decodeURIComponent(namaTamu);
} else {
  document.getElementById("namaTamuTarget").textContent = "the Special Guest";
}

let currentSlide = 0;
const totalSlides = 5;

function showSlide(n) {
  if (n < 0) n = 0;
  if (n > totalSlides) n = totalSlides;
  currentSlide = n;
  document.querySelectorAll('.section').forEach(s => s.classList.remove('active'));
  document.getElementById('slide-' + n).classList.add('active');
}

function changeSlide(n) {
  showSlide(currentSlide + n);
}

function changeToSlide(n) {
  showSlide(n);
}

function copyText(text) {
  navigator.clipboard.writeText(text).then(() => {
    alert('Text copied successfully!');
  }).catch(err => {
    alert('Failed to copy text: ' + err);
  });
}

function confirmClose() {
  if (confirm("Are you sure you want to close this invitation?")) {
    window.close();
  }
}

document.getElementById('rsvp-form').addEventListener('submit', function(e) {
  e.preventDefault();
  alert('Thank you for your confirmation & wishes! 🎂');
  this.reset();
});

showSlide(currentSlide);

const countdownTargetDate = new Date("2025-10-12T15:00:00+07:00");

function updateCountdown() {
  const now = new Date();
  const diff = countdownTargetDate - now;

  if (diff <= 0) {
    document.getElementById("countdown-time").innerHTML = "<td colspan='4'>🎉 Acara sedang berlangsung!</td>";
    return;
  }

  const days = Math.floor(diff / (1000 * 60 * 60 * 24));
  const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
  const minutes = Math.floor((diff / (1000 * 60)) % 60);
  const seconds = Math.floor((diff / 1000) % 60);

  document.getElementById("days").textContent = days;
  document.getElementById("hours").textContent = hours;
  document.getElementById("minutes").textContent = minutes;
  document.getElementById("seconds").textContent = seconds;
}

updateCountdown();
setInterval(updateCountdown, 1000);