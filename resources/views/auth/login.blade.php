<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login — Fakultas Teknik UNMUL</title>
  <meta name="description" content="Halaman login Fakultas Teknik Universitas Mulawarman">
  <link rel="stylesheet" href="style.css">
  <!-- Google Identity Services -->
  <script src="https://accounts.google.com/gsi/client" async defer></script>
  <style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      background: #0f172a;
      padding: 20px;
    }
    .auth-wrapper { width: 100%; max-width: 420px; }
    .auth-back-link {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      color: rgba(255,255,255,0.7);
      text-decoration: none;
      font-size: 0.85rem;
      font-weight: 700;
      margin-bottom: 24px;
      transition: color 0.15s ease;
    }
    .auth-back-link:hover { color: #FF7A00; }
    .auth-card {
      background: #ffffff;
      border-radius: 20px;
      padding: 36px 32px 32px;
      box-shadow: 0 25px 50px -12px rgba(0,0,0,0.5);
    }
    .auth-logo {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 28px;
    }
    .auth-logo img { height: 38px; width: auto; object-fit: contain; }
    .auth-logo-text { display: flex; flex-direction: column; line-height: 1.15; }
    .auth-logo-text .l1 { font-size: 0.8rem; font-weight: 800; color: #0f172a; letter-spacing: 0.03em; text-transform: uppercase; }
    .auth-logo-text .l2 { font-size: 0.7rem; font-weight: 800; color: #334155; letter-spacing: 0.02em; text-transform: uppercase; }
    .auth-title { font-size: 1.6rem; font-weight: 800; color: #0f172a; margin-bottom: 4px; }
    .auth-subtitle { font-size: 0.88rem; color: #475569; margin-bottom: 28px; }
    .auth-footer-text { text-align: center; margin-top: 20px; font-size: 0.84rem; color: #64748b; }
    .auth-footer-text a { color: #FF7A00; font-weight: 700; text-decoration: none; }
    .auth-footer-text a:hover { text-decoration: underline; }
  </style>
</head>

<body>
  <div class="video-bg-container">
    <video class="bg-video" autoplay loop muted playsinline
      poster="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=1920&q=80">
      <source src="fakultas-teknik-universitas-mulawarmanmp4_Al7wZnbtmn.mp4" type="video/mp4">
    </video>
    <div class="video-overlay"></div>
  </div>

  <div class="auth-wrapper">
    <a href="index.html" class="auth-back-link">← Kembali ke Beranda</a>
    <div class="auth-card">
      <div class="auth-logo">
        <img src="logo.png" alt="Logo FT UNMUL">
        <div class="auth-logo-text">
          <span class="l1">FAKULTAS TEKNIK</span>
          <span class="l2">UNIVERSITAS MULAWARMAN</span>
        </div>
      </div>
      <h1 class="auth-title">Log In</h1>
      <p class="auth-subtitle">Masukkan username dan password Anda</p>
      <form id="loginForm">
        <div class="form-group">
          <label for="inputUsername" class="form-label">Username</label>
          <input type="text" id="inputUsername" class="input-textbox" placeholder="Masukkan username" required autocomplete="username">
        </div>
        <div class="form-group">
          <label for="inputPassword" class="form-label">Password</label>
          <input type="password" id="inputPassword" class="input-textbox" placeholder="Masukkan password" required autocomplete="current-password">
        </div>
        <button type="submit" class="btn-submit-login">Log In</button>
        <div class="modal-divider"><span>atau masuk dengan</span></div>
        <button type="button" class="btn-google-login" id="btnGoogleLogin">
          <svg class="google-icon-svg" viewBox="0 0 24 24">
            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
          </svg>
          <span>Masuk dengan Google</span>
        </button>
      </form>
      <p class="auth-footer-text">Belum punya akun? <a href="register.html">Register di sini</a></p>
    </div>
  </div>

  <div class="toast-container" id="toastContainer"></div>

  <script>
    const GOOGLE_CLIENT_ID = '1072078119249-8ufnsubqhmssdtv90vq488s7i51p1s2r.apps.googleusercontent.com';

    function decodeJWT(token) {
      try {
        const b = token.split('.')[1].replace(/-/g, '+').replace(/_/g, '/');
        return JSON.parse(decodeURIComponent(atob(b).split('').map(c => '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2)).join('')));
      } catch(e) { return null; }
    }

    function handleGoogleCredential(response) {
      const p = decodeJWT(response.credential);
      if (!p) { showToast('Login Google gagal', '❌'); return; }
      sessionStorage.setItem('loggedInUser', JSON.stringify({ name: p.name || 'Pengguna Google', email: p.email || '', picture: p.picture || '' }));
      showToast('Login berhasil! Mengalihkan...', '✅');
      setTimeout(() => window.location.href = 'dashboard.html', 1000);
    }

    window.addEventListener('load', () => {
      if (typeof google !== 'undefined') {
        google.accounts.id.initialize({ client_id: GOOGLE_CLIENT_ID, callback: handleGoogleCredential });
      }
    });

    document.getElementById('loginForm').addEventListener('submit', (e) => {
      e.preventDefault();
      const user = document.getElementById('inputUsername').value.trim();
      const pass = document.getElementById('inputPassword').value;
      if (!user || !pass) { showToast('Isi username dan password', '⚠️'); return; }
      sessionStorage.setItem('loggedInUser', JSON.stringify({ name: user, email: '', picture: '' }));
      showToast('Login berhasil! Mengalihkan...', '✅');
      setTimeout(() => window.location.href = 'dashboard.html', 1000);
    });

    document.getElementById('btnGoogleLogin').addEventListener('click', () => {
      if (typeof google === 'undefined') { showToast('Library Google belum siap', '⚠️'); return; }
      google.accounts.id.prompt();
    });

    function showToast(msg, icon = '💡') {
      const c = document.getElementById('toastContainer');
      const t = document.createElement('div');
      t.className = 'toast';
      t.innerText = (icon + ' ' + msg).trim();
      c.appendChild(t);
      setTimeout(() => t.classList.add('show'), 10);
      setTimeout(() => { t.classList.remove('show'); setTimeout(() => t.remove(), 300); }, 3000);
    }
  </script>
</body>
</html>
