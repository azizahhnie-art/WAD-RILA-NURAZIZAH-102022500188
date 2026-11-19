<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Daftar Instruktur — Modul Instruktur & Coach</title>
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
    <nav class="tabs" style="display: flex; align-items: center; gap: 16px;">
      <a href="{{ route('instruktur.index') }}" class="active">Daftar Instruktur</a>
      
      @if(auth()->user()->role === 'admin')
        <a href="{{ route('instruktur.create') }}">Tambah Instruktur</a>
      @endif

      <form method="POST" action="{{ route('logout') }}" style="display:inline; margin-left: auto;">
        @csrf
        <button type="submit" class="btn-danger-text" style="cursor:pointer;">Logout</button>
      </form>
    </nav>
  </div>
</div>

<main>
  <div class="page-head">
    <div>
      <h1 class="page-title">Daftar Instruktur & Pelatih Mitra</h1>
      <p class="page-desc">Data instruktur, nomor lisensi, dan keahlian cabang olahraga.</p>
    </div>

    @if(auth()->user()->role === 'admin')
      <a href="{{ route('instruktur.create') }}" class="btn btn-primary">+ Tambah Instruktur</a>
    @endif
  </div>

  @if (session('success'))
    <div class="alert-success">{{ session('success') }}</div>
  @endif

  <form class="toolbar" method="get" action="{{ route('instruktur.index') }}">
    <input type="text" name="q" placeholder="Cari nama, nomor lisensi, atau kontak..." value="{{ $q }}">
    <select name="cabang">
      <option value="">Semua Cabang</option>
      @foreach ($cabangOptions as $c)
        <option value="{{ $c }}" {{ $cabang === $c ? 'selected' : '' }}>{{ $c }}</option>
      @endforeach
    </select>
    <select name="status">
      <option value="">Semua Status</option>
      <option value="Aktif" {{ $status === 'Aktif' ? 'selected' : '' }}>Aktif</option>
      <option value="Nonaktif" {{ $status === 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
    </select>
    <button type="submit" class="btn btn-primary">Cari</button>
  </form>

  <div class="table-wrap">
    <table>
      <thead>
        <tr>
          <th>Nama Instruktur</th>
          <th>No. Lisensi</th>
          <th>Keahlian Cabang</th>
          <th>Level</th>
          <th>Tarif / Sesi</th>
          <th>Status</th>
          @if(auth()->user()->role === 'admin')
            <th>Aksi</th>
          @endif
        </tr>
      </thead>
      <tbody>
        @foreach ($instruktur as $d)
        <tr>
          <td class="name-cell">
            <strong>{{ $d->nama }}</strong>
            <span>{{ $d->telepon }}</span>
          </td>
          <td>{{ $d->nomor_lisensi }}</td>
          <td>
            @foreach (explode(', ', $d->cabang) as $c)
              <span class="pill">{{ $c }}</span>
            @endforeach
          </td>
          <td>{{ $d->level_sertifikasi }}</td>
          <td>Rp {{ number_format($d->tarif, 0, ',', '.') }}</td>
          <td><span class="badge badge-{{ strtolower($d->status) }}">{{ $d->status }}</span></td>
          
          @if(auth()->user()->role === 'admin')
          <td>
            <a class="btn-edit-text" href="{{ route('instruktur.edit', $d->id) }}">Edit</a>
            <form method="post" action="{{ route('instruktur.destroy', $d->id) }}" style="display:inline"
                  onsubmit="return confirm('Yakin hapus data ini?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn-danger-text">Hapus</button>
            </form>
          </td>
          @endif
        </tr>
        @endforeach
      </tbody>
    </table>

    @if ($instruktur->isEmpty())
    <div class="empty-state">
      <div class="big">Belum ada data instruktur</div>
      @if(auth()->user()->role === 'admin')
        <div>Klik "Tambah Instruktur" untuk mendaftarkan pelatih mitra pertama.</div>
      @endif
    </div>
    @endif
  </div>
</main>

</body>
</html>