<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Daftar — Modul Instruktur & Coach</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="form-card">
  <h2 class="form-title">Daftar Akun Baru</h2>

  <form method="POST" action="{{ route('register.post') }}">
    @csrf
    <div class="form-group">
      <label>Nama Lengkap:</label>
      <input type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
      <small class="err-text">{{ $errors->first('name') }}</small>
    </div>

    <div class="form-group">
      <label>Email:</label>
      <input type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
      <small class="err-text">{{ $errors->first('email') }}</small>
    </div>

    <div class="form-group">
      <label>Kata Sandi (minimal 8 karakter):</label>
      <input type="password" name="password" required autocomplete="new-password">
      <small class="err-text">{{ $errors->first('password') }}</small>
    </div>

    <div class="form-group">
      <label>Ulangi Kata Sandi:</label>
      <input type="password" name="password_confirmation" required autocomplete="new-password">
    </div>

    <div class="form-button">
      <button type="submit">Daftar</button>
    </div>

    <p class="form-switch">Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
  </form>
</div>

</body>
</html>
