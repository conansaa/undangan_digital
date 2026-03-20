 //hitung mundur
 function updateCountdownLg() {
    const eventDate = new Date('June 12, 2025 08:30:00').getTime();
    const now = new Date().getTime();
    const distance = eventDate - now;

    if (distance > 0) {
      const days = Math.floor(distance / (1000 * 60 * 60 * 24));
      const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((distance % (1000 * 60)) / 1000);

      document.getElementById('days-lg').textContent = days.toString().padStart(2, '0');
      document.getElementById('hours-lg').textContent = hours.toString().padStart(2, '0');
      document.getElementById('minutes-lg').textContent = minutes.toString().padStart(2, '0');
      document.getElementById('seconds-lg').textContent = seconds.toString().padStart(2, '0');
    } else {
      document.getElementById('days-lg').textContent = '00';
      document.getElementById('hours-lg').textContent = '00';
      document.getElementById('minutes-lg').textContent = '00';
      document.getElementById('seconds-lg').textContent = '00';
      // pesan saat sudah dimulai atau selesai
      document.querySelector('.countdown-full-page h2').textContent = 'Seminar Telah Dimulai!';
      document.querySelector('.countdown-full-page p').textContent = 'Terima kasih atas partisipasi Anda.';
    }
  }

  //fungsi update setiap detik
  setInterval(updateCountdownLg, 1000);
  updateCountdownLg(); // panggil dulu