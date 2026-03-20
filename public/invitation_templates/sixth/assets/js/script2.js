//inisiasi aos
AOS.init({ 
  duration: 1000, 
  once: true, 
  offset: 100, 
  easing: 'ease-out-cubic' 
}); 

// loading
window.addEventListener('load', function() { 
  setTimeout(function() { 
    const loadingOverlay = document.getElementById('loadingOverlay'); 
    if (loadingOverlay) { 
      loadingOverlay.style.opacity = '0'; 
      setTimeout(function() { 
        loadingOverlay.style.display = 'none'; 
      }, 500); 
    }
  }, 500); 
}); 

// eefek scroll navbar
let lastScrollTop = 0; 
window.addEventListener('scroll', function() { 
  const navbar = document.querySelector('.navbar'); 
  const scrollToTop = document.getElementById('scrollToTop'); 
  const scrollTop = window.pageYOffset || document.documentElement.scrollTop; 
  
  if (scrollTop > 100) { 
    navbar.classList.add('scrolled'); 
    scrollToTop.classList.add('show'); 
  } else { 
    navbar.classList.remove('scrolled'); 
    scrollToTop.classList.remove('show'); 
  } 
  
  // fungsi hanya saat di index
  if (window.location.pathname.endsWith('index.html') || window.location.pathname === '/') {
    updateActiveNavLink(); 
  }
}); 

// tanda halaman dengan class "active" di navbar bagian tertentu
function updateActiveNavLink() { 
  const sections = document.querySelectorAll('section[id]'); 
  const navLinks = document.querySelectorAll('.navbar-nav .nav-link'); 
  
  let current = ''; 
  sections.forEach(section => { 
    const sectionTop = section.offsetTop; 
    
    if (pageYOffset >= sectionTop - 200) { 
      current = section.getAttribute('id'); 
    } 
  }); 

  navLinks.forEach(link => { 
    link.classList.remove('active'); 
    // mengecek jika link beratribut href dengan awalan "#" dan cocok dengan "#" + current
    if (link.getAttribute('href') && link.getAttribute('href').startsWith('#') && link.getAttribute('href') === '#' + current) { 
      link.classList.add('active'); 
    } else if (link.getAttribute('href') === 'index.html' && current === 'home') {
        link.classList.add('active'); 
    }
  }); 
} 

// scroll smootgh
function scrollToSection(sectionId) { 
  const element = document.getElementById(sectionId); 
  if (element) { 
    const navbarHeight = document.querySelector('.navbar').offsetHeight; 
    const targetPosition = element.offsetTop - navbarHeight - 20; 
    
    window.scrollTo({ 
      top: targetPosition, 
      behavior: 'smooth' 
    }); 
  }
} 

// Scroll keatas
document.getElementById('scrollToTop').addEventListener('click', function() { 
  window.scrollTo({ 
    top: 0, 
    behavior: 'smooth' 
  }); 
}); 

// untuk agar saat link navbar di pencet scrol smooth ke tujuan
document.querySelectorAll('.navbar-nav .nav-link').forEach(anchor => { 
  anchor.addEventListener('click', function (e) { 
    const href = this.getAttribute('href');
   
    if (href.startsWith('#')) { 
      e.preventDefault(); 
      const target = document.querySelector(href); 
      if (target) { 
        const navbarHeight = document.querySelector('.navbar').offsetHeight; 
        const targetPosition = target.offsetTop - navbarHeight - 20; 
        
        window.scrollTo({ 
          top: targetPosition, 
          behavior: 'smooth' 
        }); 
        
        
        const navbarCollapse = document.querySelector('.navbar-collapse'); 
        if (navbarCollapse && navbarCollapse.classList.contains('show')) { 
          const bsCollapse = new bootstrap.Collapse(navbarCollapse); 
          bsCollapse.hide(); 
        } 
      } 
    }
  }); 
}); 

// untuk menampilkan tombol konfirmasi jika belum berlangsung dan donwolad sertifikat jika telagh berlangsung
function updateIndexPage() { 
  const eventDate = new Date('June 12, 2025 08:30:00').getTime(); 
  const now = new Date().getTime(); 
  const distance = eventDate - now; 
  console.log("Jarak waktu (milidetik):", distance);
  const tomboldaftar = document.getElementById('mendaftar'); 
  const status = document.querySelector('.info-value');
  if (distance <= 0) { 
    if(tomboldaftar){ 
      tomboldaftar.style.display = 'none'; 
      status.innerText = 'Tutup';
    }
  

    // buat donwolad sertifikat
    const ctaContent = document.querySelector('.cta-content');
    if (ctaContent && !document.getElementById('downloadsertif')) { 
      const downloadButton = document.createElement('a'); 
      downloadButton.href = 'https://drive.google.com/drive/folders/1rteJKk7VUeWEGxdVD_2tYOYirwPrjfTv'; // link sertifikat  
      downloadButton.className = 'btn btn-cta text-decoration-none my-4'; 
      downloadButton.id = 'downloadsertif'; 
      downloadButton.innerHTML = '<i class="bi bi-download me-2"></i> Download Sertifikat'; 

      ctaContent.appendChild(downloadButton); 
    }    
  } else {
    if(tomboldaftar){
        tomboldaftar.style.display = 'inline-block';
    }
    const downloadButton = document.getElementById('downloadsertif');
    if (downloadButton) {
        downloadButton.remove(); 
    }
  }
}


if (window.location.pathname.endsWith('index.html') || window.location.pathname === '/') {
    setInterval(updateIndexPage, 1000); 
    updateIndexPage(); // manggil fungsi
}


// Animasi statistik
function animateStats() { 
  
  const heroStatNumbers = document.querySelectorAll('.hero-stat-number'); 
  
  const animateNumber = (element, target) => { 
    const increment = Math.ceil(target / 50); 
    let current = 0; 
    const timer = setInterval(() => { 
      current += increment; 
      if (current >= target) { 
        current = target; 
        clearInterval(timer); 
      } 
      
      if (element.textContent.includes('+')) { 
        element.textContent = current + '+'; 
      } else { 
        element.textContent = current; 
      } 
    }, 30); 
  }; 
  
  
  
  
  heroStatNumbers.forEach(stat => { 
    const target = parseInt(stat.textContent.replace(/\D/g, '')); 
    setTimeout(() => { 
      animateNumber(stat, target); 
    }, 1000); 
  }); 
} 


if (window.location.pathname.endsWith('index.html') || window.location.pathname === '/') {
    animateStats(); 
}


 
document.querySelectorAll('.content-card, .sidebar-card, .speaker-card-lg').forEach(card => { 
  card.addEventListener('mouseenter', function() { 
    this.style.transform = 'translateY(-5px)'; 
  }); 
  
  card.addEventListener('mouseleave', function() { 
    this.style.transform = 'translateY(0)'; 
  }); 
}); 


if (window.location.pathname.endsWith('index.html') || window.location.pathname === '/') {
    const timelineObserver = new IntersectionObserver((entries) => { 
        entries.forEach(entry => { 
            if (entry.isIntersecting) { 
                entry.target.style.opacity = '1'; 
                entry.target.style.transform = 'translateX(0)'; 
            } 
        }); 
    }, { threshold: 0.3 }); 

    document.querySelectorAll('.timeline-item').forEach((item, index) => { 
        item.style.opacity = '0'; 
        item.style.transform = index % 2 === 0 ? 'translateX(-50px)' : 'translateX(50px)'; 
        item.style.transition = 'all 0.6s ease'; 
        timelineObserver.observe(item); 
    }); 
}

// animasi progres bar
if (window.location.pathname.endsWith('index.html') || window.location.pathname === '/') {
    const progressObserver = new IntersectionObserver((entries) => { 
        entries.forEach(entry => { 
            if (entry.isIntersecting) { 
                const progressBar = entry.target.querySelector('.progress-bar'); 
                if (progressBar) { 
                    progressBar.style.width = '93%'; 
                } 
            } 
        }); 
    }); 

    const progressContainer = document.querySelector('.progress'); 
    if (progressContainer) { 
        progressContainer.querySelector('.progress-bar').style.width = '0%'; 
        progressContainer.querySelector('.progress-bar').style.transition = 'width 2s ease-in-out'; 
        progressObserver.observe(progressContainer); 
    } 
}


window.addEventListener('scroll', function() { 
  const navbarCollapse = document.querySelector('.navbar-collapse'); 
  if (navbarCollapse && navbarCollapse.classList.contains('show')) { 
    const bsCollapse = new bootstrap.Collapse(navbarCollapse); 
    bsCollapse.hide(); 
  } 
}); 


document.addEventListener('keydown', function(e) { 
  if (e.key === 'Escape') { 
    // Close any open modals or menus 
    const navbarCollapse = document.querySelector('.navbar-collapse'); 
    if (navbarCollapse && navbarCollapse.classList.contains('show')) { 
      const bsCollapse = new bootstrap.Collapse(navbarCollapse); 
      bsCollapse.hide(); 
    } 
  } 
}); 
 
const observerOptions = { 
  threshold: 0.1, 
  rootMargin: '0px 0px -50px 0px' 
}; 

const fadeInObserver = new IntersectionObserver((entries) => { 
  entries.forEach(entry => { 
    if (entry.isIntersecting) { 
      entry.target.style.opacity = '1'; 
      entry.target.style.transform = 'translateY(0)'; 
    } 
  }); 
}, observerOptions); 

// fade-in
document.querySelectorAll('.content-card, .sidebar-card, .topic-item, .speaker-card-lg, .countdown-item-lg').forEach(el => { 
  el.style.opacity = '0'; 
  el.style.transform = 'translateY(30px)'; 
  el.style.transition = 'opacity 0.6s ease, transform 0.6s ease'; 
  fadeInObserver.observe(el); 
}); 

// kl gambar eror
document.querySelectorAll('img').forEach(img => { 
  img.onerror = function() { 
    this.style.display = 'none'; 
    console.log('Image failed to load:', this.src); 
  }; 
}); 

console.log('AI Seminar website loaded successfully! 🚀');