document.getElementById('rsvp-form')?.addEventListener('submit', function(e) {
  e.preventDefault();
  const name = document.getElementById('name').value;
  const attendance = document.getElementById('attendance').value;
  alert(`Terima kasih ${name}! Kehadiran Anda (${attendance}) telah dikonfirmasi.`);
  this.reset();
});

const targetDate = new Date("March 14, 2026 10:00:00").getTime();
const countdown = document.getElementById("countdown");

function updateCountdown() {
  if (!countdown) return;
  const now = new Date().getTime();
  const distance = targetDate - now;

  if (distance < 0) {
    countdown.innerHTML = "Acara telah dimulai!";
    return;
  }

  const days = Math.floor(distance / (1000 * 60 * 60 * 24));
  const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  const seconds = Math.floor((distance % (1000 * 60)) / 1000);

  document.getElementById("days").innerText = days;
  document.getElementById("hours").innerText = hours;
  document.getElementById("minutes").innerText = minutes;
  document.getElementById("seconds").innerText = seconds;
}

setInterval(updateCountdown, 1000);
updateCountdown();

document.querySelectorAll("section, .event-info, .timeline-item, .rsvp-form, .map-container, .container, .pemisah-full-atas, .pemisah-full-bawah, .host-content").forEach(el => {
  el.classList.add("scroll-reveal");
});

const revealElements = document.querySelectorAll('.scroll-reveal');
function revealOnScroll() {
  const triggerBottom = window.innerHeight * 0.85;

  revealElements.forEach(el => {
    const elementTop = el.getBoundingClientRect().top;
    if (elementTop < triggerBottom) {
      el.classList.add('visible');
    }
  });
}

window.addEventListener('scroll', revealOnScroll);
window.addEventListener('load', revealOnScroll);

const bgMusic = document.getElementById('bg-music');
const toggleBtn = document.getElementById('toggle-music');

if (toggleBtn && bgMusic) {
  toggleBtn.addEventListener('click', () => {
    if (bgMusic.paused) {
      bgMusic.play();
      toggleBtn.innerText = '🔈 Pause Musik';
    } else {
      bgMusic.pause();
      toggleBtn.innerText = '▶️ Putar Musik';
    }
  });
}

