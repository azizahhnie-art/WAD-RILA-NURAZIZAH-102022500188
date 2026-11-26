<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login — Modul Instruktur & Coach</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="form-card">
  <h2 class="form-title">Masuk ke Sistem Venue</h2>

  <form method="POST" action="{{ route('login.post') }}">
    @csrf
    <div class="form-group">
      <label>Email:</label>
      <input type="email" name="email" placeholder="admin@venue.com" value="{{ old('email') }}" required autofocus>
      <small class="err-text">{{ $errors->first('email') }}</small>
    </div>

    <div class="form-group">
      <label>Kata Sandi:</label>
      <input type="password" name="password" placeholder="••••••••" required>
    </div>

    <div class="form-button">
      <button type="submit">Masuk</button>
    </div>

    <p class="form-switch">Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>

  </form>
</div>

</body>
</html>
