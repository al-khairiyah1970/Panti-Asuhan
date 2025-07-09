<nav class="navbar navbar-expand-lg bg-success">
    <nav class="navbar">
        <div class="container">
            <a href="{{ route('beranda') }}">
                <img src="{{ asset('assets/logo.jpg') }}" width="70" height="60" alt="Panti Asuhan Al - Khairiyah">
            </a>
        </div>
    </nav>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="{{ route('beranda') }}">BERANDA</a>
            </li> 
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              TENTANG KAMI
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('program') }}">Program</a></li>
              <!-- <li><a class="dropdown-item" href="{{ route('donasi') }}">Donasi</a></li> -->
              <li><a class="dropdown-item" href="{{ route('anak') }}">Anak Asuh</a></li>
              <li><a class="dropdown-item" href="{{ route('kepengurusan') }}">Struktur Kepengurusan</a></li>
            </ul>
          </li>
        </ul>
          <a href="{{ route('login') }}" class="btn btn-link" role="button">Masuk</a>
      </div>
    </div>
</nav>
