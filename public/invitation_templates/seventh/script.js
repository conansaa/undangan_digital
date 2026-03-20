// Countdown
const Hari = document.getElementById('hari');
const Jam = document.getElementById('jam');
const Menit = document.getElementById('menit');
const Detik = document.getElementById('detik');
const targetdate = new Date("October 22 2025 00:00:00").getTime();

function timer () {
    const currentdate = new Date().getTime();
    const jarak = targetdate - currentdate;

    const hari = Math.floor(jarak / 1000 / 60 / 60 / 24);
    const jam = Math.floor(jarak / 1000 / 60 / 60) % 24;
    const menit = Math.floor(jarak / 1000 / 60) % 60;
    const detik = Math.floor(jarak / 1000) % 60;

    Hari.innerHTML = hari;
    Jam.innerHTML = jam;
    Menit.innerHTML = menit;
    Detik.innerHTML = detik;
}
setInterval(timer, 1000);


document.querySelectorAll('.tab-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
        // Hapus active dari semua tab
        document.querySelectorAll('.tab-btn').forEach(function(b) {
            b.classList.remove('active');
        });
        // Hapus active dari semua timeline
        document.querySelectorAll('.timeline').forEach(function(tl) {
            tl.classList.remove('active');
        });
        // Tambah active ke tab yang diklik
        btn.classList.add('active');
        // Tambah active ke timeline yang sesuai
        var day = btn.getAttribute('data-day');
         var timeline = document.querySelector('.timeline.' + day);
        if (timeline) timeline.classList.add('active');
    });
});

document.querySelectorAll('.toggle-btn').forEach(function(button) {
    button.addEventListener('click', function () {
      const extraInfo = this.nextElementSibling;
      extraInfo.classList.toggle('show');
    });
  });