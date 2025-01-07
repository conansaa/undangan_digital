//RSVP
function validatePhoneNumber() {
    var phoneInput = document.getElementById("phone");
    var alertBox = document.getElementById("phone-alert");
    
    if (phoneInput.value.length < 12) {
        alertBox.style.display = "block"; 
    } else {
        alertBox.style.display = "none"; 
    }
  }
  function showModal() {
    document.getElementById('oldDataModal').style.display = 'block';
  }
  
  function closeOldDataModal() {
    document.getElementById('oldDataModal').style.display = 'none';
  }
  function expandRSVP() {
    const rsvpSection = document.querySelector('.rsvp-section');
    const rsvpContainer = document.querySelector('.rsvp-container');
    
    if (rsvpSection && rsvpContainer) {
        rsvpSection.classList.add('expanded');
        rsvpContainer.classList.add('expanded');
    }
  }

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('openInvitationBtn').addEventListener('click', function () {
        document.getElementById('opening').style.display = 'none';
        const invitationSection = document.getElementById('invitation');
        invitationSection.style.display = 'flex';
        const song = document.getElementById('song');
        if (song) {
            song.volume = 0.4;
            song.play();
        }
    });
});

//COMMENT
$(document).ready(function() {
    $('#commentForm').on('submit', function(e) {
        e.preventDefault(); 
  
        var formData = $(this).serialize(); 
  
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            success: function(response) {
                // Create a new comment HTML structure
                var newComment = `
                    <div class="message" id="comment-${response.id}">
                        <div class="comment-header">
                            <div>
                                <p>
                                    <strong>${response.rsvp_name}:</strong><br>
                                    ${response.comment}
                                </p>
                            </div>
                            <a href="/comment/delete/${response.id}/${response.rsvp_name}" 
                               onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" 
                               class="text-danger ms-2">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </div>
                    </div>
                `;
                // Prepend the new comment to the messages section
                $('.messages').prepend(newComment);
                $('.text-danger').css({
                    color: 'black',
                    textDecoration: 'none'
                });
                // Clear the textarea
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
  

//pop up

function openPopup(type) {
    const popup = document.getElementById('popup');
    const giftBox = document.getElementById('gift-box');
    const bankBox = document.getElementById('bank-box');

    // Reset visibility of pop-up boxes
    giftBox.style.display = 'none';
    bankBox.style.display = 'none';

    // Display the selected pop-up
    if (type === 'gift') {
        giftBox.style.display = 'block';
    } else if (type === 'bank') {
        bankBox.style.display = 'block';
    }

    // Show the pop-up
    popup.classList.add('active');
    
    // Add click listener for closing on outside click
    document.addEventListener('click', closePopupOnOutsideClick);
}

function closePopup() {
    const popup = document.getElementById('popup');
    popup.classList.remove('active');
    
    // Remove click listener after popup is closed
    document.removeEventListener('click', closePopupOnOutsideClick);
}

function closePopupOnOutsideClick(event) {
    const popupContainer = document.querySelector('.popup-container'); // Pastikan ini adalah container utama
    if (!popupContainer.contains(event.target)) {
        closePopup();
    }
}

function copyText(text) {
    navigator.clipboard.writeText(text).then(() => {
        alert("Copied: " + text);
    });
}

const playButton = document.getElementById('playButton');
const playIcon = document.getElementById('playIcon');
const pauseIcon = document.getElementById('pauseIcon');
const song = document.getElementById('song');
const openInvitationBtn = document.getElementById('openInvitationBtn'); // Tombol Open Invitation
let isPlaying = false; // Default: musik berhenti

// Fungsi untuk memperbarui ikon pada tombol Play/Pause
function updatePlayButtonIcon() {
  if (isPlaying) {
    playIcon.style.display = 'none';
    pauseIcon.style.display = 'inline'; // Tampilkan ikon Pause
  } else {
    playIcon.style.display = 'inline'; // Tampilkan ikon Play
    pauseIcon.style.display = 'none';
  }
}

// Fungsi toggle untuk musik Play/Pause
playButton.addEventListener('click', function () {
  if (isPlaying) {
    song.pause();
    isPlaying = false;
  } else {
    song.play();
    isPlaying = true;
  }
  updatePlayButtonIcon();
});

// Fungsi untuk memulai musik ketika tombol Open Invitation diklik
openInvitationBtn.addEventListener('click', function () {
  if (!isPlaying) {
    song.volume = 0.4; // Atur volume awal
    song.play();
    isPlaying = true;
    updatePlayButtonIcon();
  }
});


simplyCountdown('.simply-countdown' , {
    year: 2025, // required
    month: 1, // required
    day: 25, // required
    hours: 9, // Default is 0 [0-23] integer
    words: { //words displayed into the countdown
        days: { singular: 'hari', plural: 'hari' },
        hours: { singular: 'jam', plural: 'jam' },
        minutes: { singular: 'menit', plural: 'menit' },
        seconds: { singular: 'detik', plural: 'detik' }
    },
   });

// Tanggal acara
const targetDate = new Date('December 27, 2025 00:00:00').getTime();

// Fungsi hitung mundur
const countdownFunction = setInterval(() => {
  const now = new Date().getTime();
  const distance = targetDate - now;

  // Hitung hari, jam, menit, dan detik
  const days = Math.floor(distance / (1000 * 60 * 60 * 24));
  const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  const minutes = Math.floor((distance % (1000 * 60)) / (1000 * 60));
  const seconds = Math.floor((distance % (1000)) / 1000);

  // Update elemen HTML
  document.getElementById('days').innerText = days;
  document.getElementById('hours').innerText = hours.toString().padStart(2, '0');
  document.getElementById('minutes').innerText = minutes.toString().padStart(2, '0');
  document.getElementById('seconds').innerText = seconds.toString().padStart(2, '0');

  // Jika waktu habis
  if (distance < 0) {
    clearInterval(countdownFunction);
    document.getElementById('countdown').innerHTML = '<h3>Waktu telah tiba!</h3>';
  }
}, 1000);

// Fungsi untuk menambahkan pengingat ke Google Calendar
function setGoogleReminder() {
  const title = encodeURIComponent('Acara Pernikahan');
  const details = encodeURIComponent('Pernikahan Shinta & Irfan');
  const location = encodeURIComponent('Lokasi Pernikahan');
  const startDate = '20251227T000000Z'; // UTC waktu mulai
  const endDate = '20251227T235900Z'; // UTC waktu selesai

  const url = `https://www.google.com/calendar/render?action=TEMPLATE&text=${title}&details=${details}&location=${location}&dates=${startDate}/${endDate}`;

  // Buka link Google Calendar di tab baru
  window.open(url, '_blank');
}

// PENGINGAT
function setGoogleReminder() {
    const title = encodeURIComponent('Wedding Ceremony');
    const details = encodeURIComponent('Hezron & Caroline Wedding');
    const location = encodeURIComponent('Lokasi Pernikahan');
    const startDate = '20241227T000000Z'; // Tanggal mulai event (UTC)
    const endDate = '20241227T235900Z'; // Tanggal selesai event (UTC)
  
    const url = `https://www.google.com/calendar/render?action=TEMPLATE&text=${title}&details=${details}&location=${location}&dates=${startDate}/${endDate}`;
  
    // Buka link Google Calendar di tab baru
    window.open(url, '_blank');
  }

//BUNGA GUGUR
  const fallingLeavesContainer = document.querySelector('.falling-leaves');

  function createLeaf() {
      const leaf = document.createElement('div');
      leaf.classList.add('leaf');

      // Posisi horizontal acak (opsional)
      const randomX = Math.random() * 100; // Dari 0% hingga 100%
      leaf.style.left = `${randomX}vw`;

      // Durasi animasi tetap untuk konsistensi
      const duration = 5; // Durasi animasi 10 detik
      leaf.style.animationDuration = `${duration}s`;

      // Tambahkan daun ke kontainer
      fallingLeavesContainer.appendChild(leaf);

      // Hapus daun setelah animasi selesai
      setTimeout(() => {
          fallingLeavesContainer.removeChild(leaf);
      }, duration * 1000);
  }

  // Tambahkan daun baru setiap 2 detik
  setInterval(() => {
      createLeaf();
  }, 2000);

//DAUN GUGUR
    const fallingLeavesContainer1 = document.querySelector('.falling-leaves1');

    function createLeaf1() {
        const leaf1 = document.createElement('div');
        leaf1.classList.add('leaf1');

        // Posisi horizontal acak
        const randomX = Math.random() * 100; // Dari 0% hingga 100%
        leaf1.style.left = `${randomX}vw`;

        // Durasi animasi tetap
        const duration = 6; // Durasi animasi 6 detik
        leaf1.style.animationDuration = `${duration}s`;

        // Tambahkan daun ke kontainer
        fallingLeavesContainer1.appendChild(leaf1);

        // Hapus daun setelah animasi selesai
        setTimeout(() => {
            fallingLeavesContainer1.removeChild(leaf1);
        }, duration * 1000);
    }

    // Tambahkan daun baru setiap 2 detik
    setInterval(() => {
        createLeaf1();
    }, 4000);

// BUNGA GUGUR
const fallingLeavesContainer3 = document.querySelector('.falling-leaves3');

function createLeaf3() {
    const leaf3 = document.createElement('div');
    leaf3.classList.add('leaf3'); // Pastikan kelasnya benar

    // Posisi horizontal acak
    const randomX = Math.random() * 100; // Dari 0% hingga 100%
    leaf3.style.left = `${randomX}vw`;

    // Durasi animasi tetap untuk konsistensi
    const duration = 5; // Durasi animasi 5 detik
    leaf3.style.animationDuration = `${duration}s`;

    // Tambahkan daun ke kontainer
    fallingLeavesContainer3.appendChild(leaf3);

    // Hapus daun setelah animasi selesai
    setTimeout(() => {
        fallingLeavesContainer3.removeChild(leaf3);
    }, duration * 1000);
}

// Tambahkan bunga baru setiap 2 detik
setInterval(() => {
    createLeaf3();
}, 2000);

// DAUN GUGUR
const fallingLeavesContainer4 = document.querySelector('.falling-leaves4');

function createLeaf4() {
    const leaf4 = document.createElement('div');
    leaf4.classList.add('leaf4'); // Pastikan kelasnya benar

    // Posisi horizontal acak
    const randomX = Math.random() * 100; // Dari 0% hingga 100%
    leaf4.style.left = `${randomX}vw`;

    // Durasi animasi tetap
    const duration = 6; // Durasi animasi 6 detik
    leaf4.style.animationDuration = `${duration}s`;

    // Tambahkan daun ke kontainer
    fallingLeavesContainer4.appendChild(leaf4);

    // Hapus daun setelah animasi selesai
    setTimeout(() => {
        fallingLeavesContainer4.removeChild(leaf4);
    }, duration * 1000);
}

// Tambahkan daun baru setiap 4 detik
setInterval(() => {
    createLeaf4();
}, 4000);

document.addEventListener('DOMContentLoaded', function () {
  const invitationElements = document.querySelectorAll(
    '.invitation-content h2, .invitation-content h1, .invitation-content .date'
  );

  // Observer untuk memulai animasi saat elemen terlihat di layar
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        // Tambahkan kelas animasi untuk memulai animasi
        entry.target.classList.add('animate');
      } else {
        // Hapus kelas animasi agar dapat diulang jika diperlukan
        entry.target.classList.remove('animate');
      }
    });
  });

  // Terapkan observer ke setiap elemen undangan
  invitationElements.forEach((element) => {
    observer.observe(element);
  });
});

document.addEventListener('DOMContentLoaded', function () {
  const invitationElements = document.querySelectorAll(
    '#invitation .left-section .invitation h1, #invitation .left-section .invitation p, #invitation .left-section .invitation button'
  );

  // Observer untuk memulai animasi saat elemen terlihat di layar
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        // Tambahkan kelas animasi untuk memulai animasi
        entry.target.classList.add('animate');
      } else {
        // Hapus kelas animasi agar dapat diulang jika diperlukan
        entry.target.classList.remove('animate');
      }
    });
  });

  // Terapkan observer ke setiap elemen dalam bagian invitation
  invitationElements.forEach((element) => {
    observer.observe(element);
  });
});

document.addEventListener('DOMContentLoaded', function () {
  const containerElements = document.querySelectorAll('.container h1');

  // Observer untuk memulai animasi saat elemen terlihat di layar
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        // Tambahkan kelas animasi untuk memulai animasi
        entry.target.classList.add('animate');
      } else {
        // Hapus kelas animasi agar dapat diulang jika diperlukan
        entry.target.classList.remove('animate');
      }
    });
  });

  // Terapkan observer ke elemen dalam container
  containerElements.forEach((element) => {
    observer.observe(element);
  });
});

document.addEventListener('DOMContentLoaded', function () {
  const nameElements = document.querySelectorAll('.name');

  // Observer untuk memulai animasi saat elemen terlihat di layar
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        // Tambahkan kelas animasi untuk memulai animasi
        entry.target.classList.add('animate');
      } else {
        // Hapus kelas animasi agar dapat diulang jika diperlukan
        entry.target.classList.remove('animate');
      }
    });
  });

  // Terapkan observer ke elemen dengan kelas .name
  nameElements.forEach((element) => {
    observer.observe(element);
  });
});

document.addEventListener('DOMContentLoaded', function () {
  const detailsElements = document.querySelectorAll('.details');

  // Observer untuk memulai animasi saat elemen terlihat di layar
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        // Tambahkan kelas animasi untuk memulai animasi
        entry.target.classList.add('animate');
      } else {
        // Hapus kelas animasi agar dapat diulang jika diperlukan
        entry.target.classList.remove('animate');
      }
    });
  });

  // Terapkan observer ke elemen dengan kelas .name
  detailsElements.forEach((element) => {
    observer.observe(element);
  });
});

document.addEventListener('DOMContentLoaded', function () {
  const iconElements = document.querySelectorAll('.icon img');

  // Observer untuk memulai animasi saat elemen terlihat di layar
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        // Tambahkan kelas animasi untuk memulai animasi
        entry.target.classList.add('animate');
      } else {
        // Hapus kelas animasi agar dapat diulang jika diperlukan
        entry.target.classList.remove('animate');
      }
    });
  });

  // Terapkan observer ke elemen dengan kelas .icon img
  iconElements.forEach((element) => {
    observer.observe(element);
  });
});

document.addEventListener('DOMContentLoaded', function () {
  const portraitsElements = document.querySelectorAll('.portraits-section h1');

  // Observer untuk memulai animasi saat elemen terlihat di layar
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        // Tambahkan kelas animasi untuk memulai animasi
        entry.target.classList.add('animate');
      } else {
        // Hapus kelas animasi agar dapat diulang jika diperlukan
        entry.target.classList.remove('animate');
      }
    });
  });

  // Terapkan observer ke elemen dengan kelas .portraits-section h1
  portraitsElements.forEach((element) => {
    observer.observe(element);
  });
});

document.addEventListener('DOMContentLoaded', function () {
  const portraitItems = document.querySelectorAll('.portrait-item img');

  // Observer untuk memulai animasi saat elemen terlihat di layar
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        // Menambahkan animasi dengan delay berurutan
        const item = entry.target;
        const index = Array.from(portraitItems).indexOf(item);
        setTimeout(() => {
          item.classList.add('animate');
        }, index * 350); // Tambahkan delay 400ms per item
      } else {
        // Menghapus kelas animasi untuk mengulang animasi
        entry.target.classList.remove('animate');
      }
    });
  });

  // Terapkan observer ke elemen dengan kelas .portrait-item img
  portraitItems.forEach((element) => {
    observer.observe(element);
  });
});

document.addEventListener('DOMContentLoaded', function () {
  const countdownElements = document.querySelectorAll('.countdown-content h2');
  const simplyCountdown = document.querySelector('.simply-countdown');

  // Observer untuk memulai animasi saat elemen terlihat di layar
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        // Animasi untuk h2
        if (entry.target.tagName === 'H2') {
          entry.target.classList.add('animate');
        }

        // Animasi untuk simply-countdown
        if (entry.target.classList.contains('simply-countdown')) {
          entry.target.classList.add('animate');
        }
      } else {
        // Menghapus kelas animasi agar animasi dapat diulang
        entry.target.classList.remove('animate');
      }
    });
  });

  // Terapkan observer ke elemen h2
  countdownElements.forEach((element) => {
    observer.observe(element);
  });

  // Terapkan observer ke simply-countdown
  if (simplyCountdown) {
    observer.observe(simplyCountdown);
  }
});



document.addEventListener('DOMContentLoaded', function () {
  const infoElements = document.querySelectorAll('.info h1');

  // Observer untuk memulai animasi saat elemen terlihat di layar
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        // Menambahkan kelas animasi untuk memulai animasi
        entry.target.classList.add('animate');
      } else {
        // Menghapus kelas animasi untuk memungkinkan animasi diulang
        entry.target.classList.remove('animate');
      }
    });
  });

  // Terapkan observer ke elemen dengan kelas .countdown-content h2
  infoElements.forEach((element) => {
    observer.observe(element);
  });
});

document.addEventListener('DOMContentLoaded', function () {
  const info2Elements = document.querySelectorAll('.info h2');

  // Observer untuk memulai animasi saat elemen terlihat di layar
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        // Menambahkan kelas animasi untuk memulai animasi
        entry.target.classList.add('animate');
      } else {
        // Menghapus kelas animasi untuk memungkinkan animasi diulang
        entry.target.classList.remove('animate');
      }
    });
  });

  // Terapkan observer ke elemen dengan kelas .countdown-content h2
  info2Elements.forEach((element) => {
    observer.observe(element);
  });
});

document.addEventListener('DOMContentLoaded', function () {
  const rsvpElements = document.querySelectorAll('.rsvp .judul h1');
  const formElement = document.querySelector('.form-rsvp');

  // Observer untuk memulai animasi saat elemen terlihat di layar
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        // Animasi untuk judul H1
        entry.target.classList.add('animate');

        // Animasi untuk form RSVP
        if (entry.target.tagName === 'H1') {
          formElement.classList.add('animate-form');
        }
      } else {
        // Menghapus kelas animasi untuk memungkinkan animasi diulang
        entry.target.classList.remove('animate');
        formElement.classList.remove('animate-form');
      }
    });
  });

  // Terapkan observer ke elemen judul H1
  rsvpElements.forEach((element) => {
    observer.observe(element);
  });
});

document.addEventListener('DOMContentLoaded', function () {
  const liveElements = document.querySelectorAll('.live .judul h1');

  // Observer untuk memulai animasi saat elemen terlihat di layar
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        // Menambahkan kelas animasi untuk memulai animasi
        entry.target.classList.add('animate');
      } else {
        // Menghapus kelas animasi untuk memungkinkan animasi diulang
        entry.target.classList.remove('animate');
      }
    });
  });

  // Terapkan observer ke elemen dengan kelas .countdown-content h2
  liveElements.forEach((element) => {
    observer.observe(element);
  });
});


document.addEventListener('DOMContentLoaded', function () {
  const giftElements = document.querySelectorAll('.gift .judul h1');

  // Observer untuk memulai animasi saat elemen terlihat di layar
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        // Menambahkan kelas animasi untuk memulai animasi
        entry.target.classList.add('animate');
      } else {
        // Menghapus kelas animasi untuk memungkinkan animasi diulang
        entry.target.classList.remove('animate');
      }
    });
  });

  // Terapkan observer ke elemen dengan kelas .countdown-content h2
  giftElements.forEach((element) => {
    observer.observe(element);
  });
});

document.addEventListener('DOMContentLoaded', function () {
  const weddingwishElements = document.querySelectorAll('.wedding-wish h2');

  // Observer untuk memulai animasi saat elemen terlihat di layar
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        // Menambahkan kelas animasi untuk memulai animasi
        entry.target.classList.add('animate');
      } else {
        // Menghapus kelas animasi untuk memungkinkan animasi diulang
        entry.target.classList.remove('animate');
      }
    });
  });

  // Terapkan observer ke elemen dengan kelas .countdown-content h2
  weddingwishElements.forEach((element) => {
    observer.observe(element);
  });
});

document.addEventListener('DOMContentLoaded', function () {
  const giftdescElements = document.querySelectorAll('.gift .description p');

  // Observer untuk memulai animasi saat elemen terlihat di layar
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        // Menambahkan kelas animasi untuk memulai animasi
        entry.target.classList.add('animate');
      } else {
        // Menghapus kelas animasi untuk memungkinkan animasi diulang
        entry.target.classList.remove('animate');
      }
    });
  });

  // Terapkan observer ke elemen dengan kelas .countdown-content h2
  giftdescElements.forEach((element) => {
    observer.observe(element);
  });
});

document.addEventListener('DOMContentLoaded', () => {
  const wishElements = document.querySelectorAll('.wish-item');

  // IntersectionObserver untuk memulai animasi saat elemen terlihat di layar
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        // Tambahkan kelas animasi untuk memulai animasi
        entry.target.classList.add('animate');
      } else {
        // Hapus kelas animasi agar dapat diulang jika diperlukan
        entry.target.classList.remove('animate');
      }
    });
  });

  // Terapkan observer ke setiap elemen
  wishElements.forEach((element) => {
    observer.observe(element);
  });
});

document.addEventListener('DOMContentLoaded', () => {
  const overlayElements = document.querySelectorAll('.invitation .overlay h3');

  // IntersectionObserver untuk memulai animasi saat elemen terlihat di layar
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        // Tambahkan kelas animasi untuk memulai animasi
        entry.target.classList.add('animate');
      } else {
        // Hapus kelas animasi agar dapat diulang jika diperlukan
        entry.target.classList.remove('animate');
      }
    });
  });

  // Terapkan observer ke setiap elemen
  overlayElements.forEach((element) => {
    observer.observe(element);
  });
});
