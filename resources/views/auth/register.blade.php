<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register — Fakultas Teknik UNMUL</title>
  <meta name="description" content="Halaman registrasi akun Fakultas Teknik Universitas Mulawarman">
  <link rel="stylesheet" href="style.css">
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
    .password-hint { font-size: 0.78rem; color: #94a3b8; margin-top: 4px; }
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
      <h1 class="auth-title">Daftar Akun</h1>
      <p class="auth-subtitle">Buat akun baru untuk bergabung</p>

      <form id="registerForm">
        <div class="form-group">
          <label for="inputUsername" class="form-label">Username</label>
          <input type="text" id="inputUsername" class="input-textbox" placeholder="Buat username baru" required autocomplete="username">
        </div>
        <div class="form-group">
          <label for="inputEmail" class="form-label">Email</label>
          <input type="email" id="inputEmail" class="input-textbox" placeholder="email@example.com" required autocomplete="email">
        </div>
        <div class="form-group">
          <label for="inputPassword" class="form-label">Password</label>
          <input type="password" id="inputPassword" class="input-textbox" placeholder="Minimal 8 karakter" required autocomplete="new-password">
          <p class="password-hint">Minimal 8 karakter</p>
        </div>
        <div class="form-group">
          <label for="inputPasswordConfirm" class="form-label">Konfirmasi Password</label>
          <input type="password" id="inputPasswordConfirm" class="input-textbox" placeholder="Ulangi password" required autocomplete="new-password">
        </div>
        <button type="submit" class="btn-submit-login">Daftar Akun</button>
      </form>

      <p class="auth-footer-text">Sudah punya akun? <a href="login.html">Log in di sini</a></p>
    </div>
  </div>

  <div class="toast-container" id="toastContainer"></div>

  <script>
    document.getElementById('registerForm').addEventListener('submit', (e) => {
      e.preventDefault();
      const user = document.getElementById('inputUsername').value.trim();
      const email = document.getElementById('inputEmail').value.trim();
      const pass = document.getElementById('inputPassword').value;
      const passConfirm = document.getElementById('inputPasswordConfirm').value;

      if (!user || !email || !pass) { showToast('Semua kolom harus diisi', '⚠️'); return; }
      if (pass.length < 8) { showToast('Password minimal 8 karakter', '⚠️'); return; }
      if (pass !== passConfirm) { showToast('Password tidak cocok', '❌'); return; }

      showToast('Registrasi berhasil! Silakan login', '✅');
      setTimeout(() => window.location.href = 'login.html', 1500);
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
