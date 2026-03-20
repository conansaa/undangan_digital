document.addEventListener("DOMContentLoaded", () => {
    const navButtons = document.querySelectorAll("nav button, .btn[data-target]");
    const sections = document.querySelectorAll("section");
    const openBtn = document.querySelector('.btn[data-target="profil"]');
    const overlay = document.querySelector(".overlay");
    const musik = document.getElementById("musik");

    // Fungsi scroll ke section tertentu
    function showSection(id) {
        const el = document.getElementById(id);
        if (el) {
            el.scrollIntoView({
                behavior: "smooth"
            });
        }
    }

    // Tombol navigasi antar section
    navButtons.forEach(btn => {
        btn.addEventListener("click", e => {
            e.preventDefault();
            const target = btn.getAttribute("data-target");
            if (target) showSection(target);
        });
    });

    // Mulai musik & sembunyikan overlay saat "Buka Undangan"
    if (openBtn) {
        openBtn.addEventListener("click", () => {
            if (overlay) overlay.style.display = "none";
            if (musik) {
                musik.muted = false; 
                musik.play().catch(err => {
                    console.error("Gagal memutar musik:", err);
                });
            }
            showSection("profil");
        });
    }

    // Klik pada QR untuk info
    const qrisImg = document.querySelector("#qris img");
    if (qrisImg) {
        qrisImg.addEventListener("click", () => {
            alert("Silakan screenshot atau scan kode QR ini melalui aplikasi e-wallet Anda.");
        });
    }

    // Fungsi kirim RSVP lewat WhatsApp
    window.kirimRSVP = function(e) {
        e.preventDefault();
        const nama = document.querySelector('#rsvp input[type="text"]').value;
        const jumlah = document.querySelector('#rsvp input[type="number"]').value;
        const hadir = document.querySelector('#rsvp select').value;
        const ucapan = document.querySelector('#rsvp textarea').value;

        if (parseInt(jumlah) <= 0) {
            alert("Jumlah tamu harus lebih dari 0");
            return;
        }

        const pesan = `Halo! Saya *${nama}* ingin RSVP.\nJumlah Tamu: ${jumlah}\nKehadiran: ${hadir}\nUcapan: ${ucapan}`;
        window.open(`https://wa.me/6283897660223?text=${encodeURIComponent(pesan)}`);
    };

    if (document.querySelector('#doa')) {
        window.kirimDoa = function(e) {
            e.preventDefault();
            const nama = document.querySelector('#doa input[type="text"]').value;
            const pesan = document.querySelector('#doa textarea').value;

            if (nama.trim() === '' || pesan.trim() === '') {
                alert("Nama dan ucapan tidak boleh kosong");
                return;
            }

            const teks = `Halo! Saya *${nama}* ingin mengucapkan doa:\n\n"${pesan}"\n\nSemoga acaranya diberkahi dan lancar 😊`;
            window.open(`https://wa.me/6283897660223?text=${encodeURIComponent(teks)}`, "_blank");
        };
    }

    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("show");
            } else {
                entry.target.classList.remove("show");
            }
        });
    }, observerOptions);

    sections.forEach(section => {
        section.classList.add("hidden"); 
        observer.observe(section);
    });

});
