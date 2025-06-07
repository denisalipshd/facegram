<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold text-primary" href="{{ route('facegram') }}">Facegram</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="{{ route('facegram') }}">Beranda</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Pesan</a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#"><strong>Jane Smith:</strong> Hai! Bisa bantu review desainku?</a></li>
            <li><a class="dropdown-item" href="#"><strong>Tommy:</strong> Yuk ngopi sore ini?</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Notifikasi</a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#"><strong>Mark Lee</strong> menyukai postinganmu</a></li>
            <li><a class="dropdown-item" href="#"><strong>Ana</strong> mulai mengikuti kamu</a></li>
          </ul>
        </li>
        <form action="{{ route('profile') }}">
          @csrf
          <li class="nav-item"><button type="submit" class="nav-link">Profil</button></li>
        </form>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <li class="nav-item"><button type="submit" class="nav-link text-danger">Logout</button></li>
        </form>
      </ul>
    </div>
  </div>
</nav>