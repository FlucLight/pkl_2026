<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>prototype pertama gw jir</title>
  <meta name="description"
    content="Template website HTML5 polos dengan background video looping, header putih kecil, hidebar drawer bold list, dan pop-up login modal.">


  <!-- Google Identity Services -->
  <script src="https://accounts.google.com/gsi/client" async defer></script>
  @vite(['resources/css/loginpage.css', 'resources/js/loginpage.js'])
</head>

<body>

  <!-- ==========================================================================
       BACKGROUND VIDEO LOOPING (Ganti 'bg-video.mp4' dengan file video Anda)
       ========================================================================== -->
  <div class="video-bg-container">
    <video class="bg-video" autoplay loop muted playsinline
      poster="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=1920&q=80">
      <!-- Pengguna bisa menambahkan/mengubah file video di bawah ini -->
      <source src="{{ asset('fakultas-teknik-universitas-mulawarmanmp4_Al7wZnbtmn.mp4') }}" type="video/mp4">
    </video>
    <div class="video-overlay"></div>
  </div>

  <!-- ==========================================================================
       HEADER KECIL BERWARNA PUTIH DI ATAS
       ========================================================================== -->
  <header class="header-bar" id="headerBar">
    <!-- Logo di sebelah kiri header -->
    <a href="#" class="header-logo-container">
      <img src="{{ asset('logo.png') }}" alt="Logo" class="header-logo-img">
      <div class="header-brand-text">
        <span class="brand-line-1">FAKULTAS TEKNIK</span>
        <span class="brand-line-2">UNIVERSITAS MULAWARMAN</span>
      </div>
    </a>

    <!-- Di sebelah kanan header: Hidebar & Tombol Login -->
    <div class="header-actions">
      <!-- Tombol Hidebar -->
      <button type="button" class="btn-hidebar" id="btnHidebarToggle" aria-label="Buka Menu Hidebar">
        <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <span>Hidebar</span>
      </button>

      <!-- Tombol Login di sebelah kanan hidebar -->
      <a href="#" class="btn-login-header" id="btnLoginHeader" onclick="return false;">
        <span>Log In</span>
      </a>

      <!-- Profile Avatar jika sudah Logged In -->
      <a href="#" class="user-logged-in-badge" id="userLoggedBadge" title="Dashboard" onclick="return false;">
        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80"
          alt="User Avatar">
        <span id="userNameDisplay">Pengguna</span>
      </a>
    </div>
  </header>

  <!-- ==========================================================================
       HIDEBAR (SIDEBAR DRAWER DENGAN DAFTAR TEXT BOLD YANG BISA DIPENCET)
       ========================================================================== -->
  <div class="hidebar-overlay" id="hidebarOverlay"></div>
  <aside class="hidebar-panel" id="hidebarPanel" aria-label="Menu Hidebar">
    <div class="hidebar-header">
      <span class="hidebar-title">Jurusan</span>
      <button type="button" class="btn-close-hidebar" id="btnCloseHidebar" aria-label="Tutup Hidebar">✕</button>
    </div>

    <div class="hidebar-body">
      <!-- LIST SEMACAM TEXT BOLD YANG BISA DIPENCET -->
      <ul class="hidebar-menu-list">
        <li>
          <a href="https://ts.ft.unmul.ac.id/" class="hidebar-link">
            <span class="hidebar-link-text">TEKNIK SIPIL</span>
            <span class="hidebar-arrow">&rsaquo;</span>
          </a>
        </li>
        <li>
          <a href="https://s1tambang.ft.unmul.ac.id/" class="hidebar-link">
            <span class="hidebar-link-text">TEKNIK PERTAMBANGAN</span>
            <span class="hidebar-arrow">&rsaquo;</span>
          </a>
        </li>
        <li>
          <a href="https://informatika.ft.unmul.ac.id/" class="hidebar-link">
            <span class="hidebar-link-text">INFORMATIKA</span>
            <span class="hidebar-arrow">&rsaquo;</span>
          </a>
        </li>
        <li>
          <a href="https://tekling.ft.unmul.ac.id/" class="hidebar-link">
            <span class="hidebar-link-text">TEKNIK LINGKUNGAN</span>
            <span class="hidebar-arrow">&rsaquo;</span>
          </a>
        </li>
        <li>
          <a href="https://ie.ft.unmul.ac.id/" class="hidebar-link">
            <span class="hidebar-link-text">TEKNIK INDUSTRI</span>
            <span class="hidebar-arrow">&rsaquo;</span>
          </a>
        </li>
        <li>
          <a href="https://che.ft.unmul.ac.id/" class="hidebar-link">
            <span class="hidebar-link-text">TEKNIK KIMIA</span>
            <span class="hidebar-arrow">&rsaquo;</span>
          </a>
        </li>
        <li>
          <a href="https://geologi.ft.unmul.ac.id/" class="hidebar-link">
            <span class="hidebar-link-text">TEKNIK GEOLOGI</span>
            <span class="hidebar-arrow">&rsaquo;</span>
          </a>
        </li>
        <li>
          <a href="https://si.ft.unmul.ac.id/" class="hidebar-link">
            <span class="hidebar-link-text">SISTEM INFORMASI</span>
            <span class="hidebar-arrow">&rsaquo;</span>
          </a>
        </li>
        <li>
          <a href="https://ft.unmul.ac.id/academic/prodi-s1-arsitektur-mi" class="hidebar-link">
            <span class="hidebar-link-text">ARSITEKTUR</span>
            <span class="hidebar-arrow">&rsaquo;</span>
          </a>
        </li>
        <li>
          <a href="https://ft.unmul.ac.id/academic/prodi-s1-perencanaan-wilayah-dan-kota" class="hidebar-link">
            <span class="hidebar-link-text">TEKNIK PERENCANAAN WILAYAH & KOTA</span>
            <span class="hidebar-arrow">&rsaquo;</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>

  <!-- ==========================================================================
       POP-UP LOGIN MODAL (HANYA MUNCUL JIKA MEMENCET LOGIN DI HEADER)
       ========================================================================== -->
  <div class="modal-overlay" id="loginModalOverlay">
    <div class="modal-card">
      <button type="button" class="btn-close-modal" id="btnCloseModal" aria-label="Tutup Popup Modal">✕</button>

      <!-- FORM LOGIN -->
      <div class="modal-view" id="loginView">
        <div class="modal-header">
          <h2 class="modal-title">Log In</h2>
          <p class="modal-subtitle">Masukkan username dan password Anda</p>
        </div>

        <form id="loginForm">
          <!-- Textbox 1: Username -->
          <div class="form-group">
            <label for="inputUsernameLogin" class="form-label">Username</label>
            <input type="text" id="inputUsernameLogin" class="input-textbox" placeholder="Masukkan username" required
              autocomplete="username">
          </div>

          <!-- Textbox 2: Password -->
          <div class="form-group">
            <label for="inputPasswordLogin" class="form-label">Password</label>
            <input type="password" id="inputPasswordLogin" class="input-textbox" placeholder="Masukkan password"
              required autocomplete="current-password">
          </div>

          <!-- Tombol Log-In -->
          <button type="submit" class="btn-submit-login">Log-In</button>

          <!-- Di samping kanan bawah tombol log-in: 'not have account? register' -->
          <div class="login-bottom-right-container">
            <button type="button" class="link-register-toggle" id="linkToRegister">
              not have account? register
            </button>
          </div>

          <!-- Alternatif Login di bawah tombol login -->
          <div class="modal-divider">
            <span>atau masuk dengan</span>
          </div>

          <button type="button" class="btn-google-login" id="btnGoogleLogin">
            <svg class="google-icon-svg" viewBox="0 0 24 24">
              <path fill="#4285F4"
                d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
              <path fill="#34A853"
                d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
              <path fill="#FBBC05"
                d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z" />
              <path fill="#EA4335"
                d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z" />
            </svg>
            <span>Google</span>
          </button>
        </form>
      </div>

      <!-- FORM REGISTER (TAMPIL SAAT TEKS REGISTER DIKLIK) -->
      <div class="modal-view hidden" id="registerView">
        <div class="modal-header">
          <h2 class="modal-title">Register Akun</h2>
          <p class="modal-subtitle">Buat akun baru untuk bergabung</p>
        </div>

        <form id="registerForm">
          <div class="form-group">
            <label for="inputUsernameReg" class="form-label">Username</label>
            <input type="text" id="inputUsernameReg" class="input-textbox" placeholder="Username baru" required>
          </div>
          <div class="form-group">
            <label for="inputPasswordReg" class="form-label">Password</label>
            <input type="password" id="inputPasswordReg" class="input-textbox" placeholder="Password baru" required>
          </div>

          <button type="submit" class="btn-submit-login">Daftar Akun</button>

          <div class="login-bottom-right-container">
            <button type="button" class="link-register-toggle" id="linkToLogin">
              sudah punya akun? log in
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- ==========================================================================
       TAMPILAN BODY POLOS HANYA BACKGROUND VIDEO
       ========================================================================== -->
  <main class="main-polos">
    <div class="scroll-indicator" id="scrollIndicator">
      <span>Scroll Ke Bawah</span>
      <span>&darr;</span>
    </div>
  </main>

  <!-- ==========================================================================
       ISI FOOTER PADA UMUMNYA
       ========================================================================== -->
  <footer class="footer-standard">
    <div class="footer-container">
      <div class="footer-brand">
        <div class="footer-logo">FAKULTAS TEKNIK</div>
        <p class="footer-desc">
          Kampus Gunung Kalua, Jalan Sambaliung No.9 Samarinda, Kalimantan Timur 75119 | Telp. (0514) 736834 | Fax.
          (0541) 749315
        </p>
      </div>

      <div class="footer-links-group">
        <div>
          <div class="footer-col-title">Navigasi</div>
          <ul class="footer-nav">
            <li><a href="#">Beranda</a></li>
            <li><a href="#">Layanan</a></li>
            <li><a href="#">Portofolio</a></li>
          </ul>
        </div>
        <div>
          <div class="footer-col-title">Informasi</div>
          <ul class="footer-nav">
            <li><a href="#">Kebijakan Privasi</a></li>
            <li><a href="#">Syarat & Ketentuan</a></li>
            <li><a href="#">Bantuan & FAQ</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <span>&copy; 2026 Web Interaktif. Hak Cipta Dilindungi.</span>
      <span>Didesain Dan Dikembangan Oleh Siswa Smk Negeri 1 Tenggarong.</span>
    </div>
  </footer>

  <!-- Container Toast Notification -->
  <div class="toast-container" id="toastContainer"></div>

  <!-- JavaScript -->
  <script src="{{ asset('js/loginpage.js') }}"></script>

  <!-- Google One Tap Callback (dipanggil dari GIS library) -->
  <script>
    function handleGoogleCredential(response) {
      // Kirim token ke script.js handler
      if (window.onGoogleSignIn) window.onGoogleSignIn(response.credential);
    }
  </script>
</body>

</html>