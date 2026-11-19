<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login — Modul Instruktur & Coach</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="topbar">
  <div class="topbar-inner">
    <div class="brand">
      <div class="mark">Instruktur<span>&Coach</span></div>
    </div>
  </div>
</div>

<main style="max-width: 460px; margin-top: 48px;">
  <div class="page-head">
    <div>
      <h1 class="page-title">Masuk ke Sistem</h1>
      <p class="page-desc">Silakan login sesuai hak akses (Admin atau User).</p>
    </div>
  </div>

  <form method="POST" action="{{ route('login.post') }}">
    @csrf
    <div class="field-grid">
      <div class="field full {{ $errors->has('email') ? 'invalid' : '' }}">
        <label>Email <span class="req">*</span></label>
        <input type="email" name="email" placeholder="admin@venue.com" value="{{ old('email') }}" required autofocus>
        <small class="err">{{ $errors->first('email') }}</small>
      </div>

      <div class="field full">
        <label>Password <span class="req">*</span></label>
        <input type="password" name="password" placeholder="••••••••" required>
      </div>
    </div>

    <div class="form-actions">
      <button type="submit" class="btn btn-primary" style="width: 100%;">Login</button>
    </div>
    <p class="form-note">
      Demo Admin: <b>admin@venue.com</b> | Demo User: <b>user@venue.com</b> (Password: <b>password</b>)
    </p>
  </form>
</main>

</body>
</html>