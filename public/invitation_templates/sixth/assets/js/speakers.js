document.addEventListener('DOMContentLoaded', function() {
    AOS.init({
        duration: 800, // Durasi  AOS
        once: true, // Animasi hanya berjalan sekali
    });

    const speakerNames = document.querySelectorAll('.speaker-name-lg');
    const closeButtons = document.querySelectorAll('.close-cv');
    let overlay = document.querySelector('.overlay'); // Cek overlay sudah ada
    if (!overlay) { // Jika belum ada, buat baru
        overlay = document.createElement('div');
        overlay.classList.add('overlay');
        document.body.appendChild(overlay);
    }

    speakerNames.forEach(name => {
        name.addEventListener('click', function() {
            const speakerCard = this.closest('.speaker-card-lg');
            if (speakerCard) { 
                const speakerCardId = speakerCard.id;
                const cvPreviewId = 'cv-' + speakerCardId;
                const cvPreview = document.getElementById(cvPreviewId);

                if (cvPreview) {
                    cvPreview.classList.add('visible');
                    overlay.classList.add('visible');
                    document.body.style.overflow = 'hidden'; // cegah scrolling latar belakang
                }
            }
        });
    });

    closeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const cvPreview = this.closest('.cv-preview');
            if (cvPreview) {
                cvPreview.classList.remove('visible');
                overlay.classList.remove('visible');
                document.body.style.overflow = ''; // Aktifkann scrolling latar belakang
            }
        });
    });

    overlay.addEventListener('click', function() {
        const visibleCv = document.querySelector('.cv-preview.visible');
        if (visibleCv) {
            visibleCv.classList.remove('visible');
            overlay.classList.remove('visible');
            document.body.style.overflow = '';
        }
    });

    //scrol keatas
    const scrollToTopBtn = document.getElementById("scrollToTop");

    window.addEventListener("scroll", () => {
        if (window.scrollY > 300) { // Tampilkan tombol setelah scroll 300px
            scrollToTopBtn.classList.add("show");
        } else {
            scrollToTopBtn.classList.remove("show");
        }
    });

    scrollToTopBtn.addEventListener("click", () => {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });
});