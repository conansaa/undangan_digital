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
//   @if (session('name_exists'))
//     document.addEventListener('DOMContentLoaded', function() {
//         expandRSVP();
//     });
//   @endif
  
//   window.onload = function() {
//     @if (session('success'))
//         document.getElementById("confirmationModal").style.display = "block";
//         <?php session()->forget('success'); ?>
//     @endif
//   };
  
  function closeModal() {
    document.getElementById("confirmationModal").style.display = "none";
  }
  
  window.onclick = function(event) {
    const modal = document.getElementById("confirmationModal");
    if (event.target === modal) {
        modal.style.display = "none";
    }
  };
  
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
  
  
  // opening undangan
  document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('openInvitationBtn').addEventListener('click', function () {
      document.getElementById('opening').style.display = 'none';
      document.getElementById('undangan').style.display = 'block';
      const song = document.getElementById('song');
      song.volume = 0.4;
      song.play();
      isPlaying = true;
      updatePlayButtonIcon();
    });
  });
  
  
  // animasi gambar pengantin
  document.addEventListener('DOMContentLoaded', function () {
    const brideImg = document.querySelector('.bride-img');
    const groomImg = document.querySelector('.groom-img');
  
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          // Menambahkan kelas animate untuk memulai animasi
          entry.target.classList.add('animate');
        } else {
          // Menghapus kelas animate untuk mengulang animasi
          entry.target.classList.remove('animate');
        }
      });
    });
  
    // Mengamati gambar pengantin
    observer.observe(brideImg);
    observer.observe(groomImg);
  });
  
  // animasi akad nikah
  document.addEventListener('DOMContentLoaded', function () {
    const akadNikahElements = document.querySelectorAll('.akad-nikah h2, .akad-nikah .akad-text');
  
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          // Menambahkan kelas animate untuk memulai animasi
          entry.target.classList.add('animate');
        } else {
          // Menghapus kelas animate untuk mengulang animasi
          entry.target.classList.remove('animate');
        }
      });
    });
  
    akadNikahElements.forEach((element) => {
      observer.observe(element); // Mengamati setiap elemen
    });
  });
  
  //animasi gift
     document.addEventListener('DOMContentLoaded', function () {
      const giftTextElements = document.querySelectorAll('.gift h2  .gift .gift-text');
  
      const observer = new IntersectionObserver((entries) => {
          entries.forEach(entry => {
              if (entry.isIntersecting) {
  
                  entry.target.classList.add('animate');
              } else {
  
                  entry.target.classList.remove('animate');
              }
          });
      });
  
      giftTextElements.forEach(element => {
          observer.observe(element); // Mengamati setiap elemen
      });
  });
  
  // animasi resepsi
  document.addEventListener('DOMContentLoaded', function () {
    const resepsiElements = document.querySelectorAll('.resepsi h2, .resepsi .akad-text');
  
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          // Menambahkan kelas animate untuk memulai animasi
          entry.target.classList.add('animate');
        } else {
          // Menghapus kelas animate untuk mengulang animasi
          entry.target.classList.remove('animate');
        }
      });
    });
  
    resepsiElements.forEach((element) => {
      observer.observe(element); // Mengamati setiap elemen
    });
  });
  
  document.addEventListener('DOMContentLoaded', function () {
  
    const elementsToAnimate = document.querySelectorAll('.akad-nikah h2, .akad-nikah .akad-text, .gallery-title, .gallery-title .gallery-text, .gift-section h2, .gift-section .gift-text');
  
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
  
                entry.target.classList.add('animate');
            } else {
  
                entry.target.classList.remove('animate');
            }
        });
    });
  
    elementsToAnimate.forEach(element => {
        observer.observe(element); // Observe each element
    });
  });


  function eventDateCountdown(tanggal) {
    var eventDate = new Date(tanggal).getTime();
          
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
  // PENGINGAT
  function setGoogleReminder() {
    const title = encodeURIComponent("Acara Pernikahan");
    const details = encodeURIComponent("Pernikahan Shinta & Irfan");
    const location = encodeURIComponent("Lokasi Pernikahan");
    const startDate = "20241227T000000Z";  // Tanggal mulai event (UTC)
    const endDate = "20241227T235900Z";    // Tanggal selesai event (UTC)
  
    const url = `https://www.google.com/calendar/render?action=TEMPLATE&text=${title}&details=${details}&location=${location}&dates=${startDate}/${endDate}`;
  
    // Buka link Google Calendar di tab baru
    window.open(url, "_blank");
  }
  }
  // KEHADIRAN
  document.addEventListener('DOMContentLoaded', function () {
    const confirmationRadios = document.getElementsByName('confirmation');
    const totalGuestInput = document.getElementById('total_guest');
  
    function updateTotalGuestInput() {
        const isNotAttending = Array.from(confirmationRadios).some(radio => radio.checked && radio.value === 'no');
        
        if (isNotAttending) {
            totalGuestInput.value = 0;
            totalGuestInput.removeAttribute('required'); 
            totalGuestInput.style.display = 'none';
        } else {
            totalGuestInput.setAttribute('required', 'required'); 
            totalGuestInput.style.display = 'block';
        }
    }
  
    totalGuestInput.style.display = 'block';
  
    confirmationRadios.forEach(radio => {
        radio.addEventListener('change', updateTotalGuestInput);
    });
  });
  
  // MODAL KEHADIRAN
  function showConfirmation(event) {
    event.preventDefault(); // Mencegah submit form default
    document.getElementById('confirmationModal').style.display = 'block'; // Menampilkan modal
  }
  
  function closeModal() {
    document.getElementById('confirmationModal').style.display = 'none'; // Menyembunyikan modal
  }
  
  // Menutup modal jika pengguna mengklik di luar modal
  window.onclick = function (event) {
    const modal = document.getElementById('confirmationModal');
    if (event.target === modal) {
      modal.style.display = 'none';
    }
  };
  
  // GIFT MODAL
  function openModalGift(event) {
    var modal = document.getElementById('giftModal'); // Menampilkan modal
    modal.style.display = 'block';
  }
  
  function closeModalGift() {
    document.getElementById('giftModal').style.display = 'none'; // Menyembunyikan modal
  }
  
  // Menutup modal jika pengguna mengklik di luar modal
  window.onclick = function (event) {
    const modal = document.getElementById('giftModal');
    if (event.target === modal) {
      modal.style.display = 'none';
    }
  };
  
  // rekening modal
  function openModalRekening(event) {
    var modal = document.getElementById('rekeningModal'); // Menampilkan modal
    modal.style.display = 'block';
  }
  
  function closeModalRekening() {
    document.getElementById('rekeningModal').style.display = 'none'; // Menyembunyikan modal
  }
  
  // Menutup modal jika pengguna mengklik di luar modal
  window.onclick = function (event) {
    const modal = document.getElementById('rekeningModal');
    if (event.target === modal) {
      modal.style.display = 'none';
    }
  };
  
  // MUSIC PLAY
  const playButton = document.getElementById('playButton');
  const playIcon = document.getElementById('playIcon');
  const pauseIcon = document.getElementById('pauseIcon');
  const buttonText = document.getElementById('buttonText');
  let isPlaying = false;
  
  // Mulai memutar musik saat halaman dimuat
  // window.onload = function () {
  //   song.volume = 0.4;
  //   song.play();
  //   isPlaying = true;
  //   updatePlayButtonIcon();
  // };
  
  // Fungsi toggle untuk musik Play/Pause
  playButton.addEventListener('click', function () {
    if (isPlaying) {
      song.pause();
    } else {
      song.play();
    }
    isPlaying = !isPlaying;
    updatePlayButtonIcon();
  });
  
  // Fungsi untuk memperbarui ikon pada tombol Play/Pause
  function updatePlayButtonIcon() {
    if (isPlaying) {
      playIcon.style.display = 'none';
      pauseIcon.style.display = 'inline';
      buttonText.textContent = 'Pause Music';
    } else {
      playIcon.style.display = 'inline';
      pauseIcon.style.display = 'none';
      buttonText.textContent = 'Play Music';
    }
  }
  