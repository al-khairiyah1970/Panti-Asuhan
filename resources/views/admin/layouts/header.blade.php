<nav class="navbar navbar-expand-lg bg-primary">
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
            @if(\Auth::user()->role !== 'SA')
                <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="{{ route('dashboard') }}">BERANDA</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        TENTANG KAMI
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin_program') }}">Program</a></li>
                        {{-- <li><a class="dropdown-item" href="{{ route('admin_donasi') }}">Donasi</a></li> --}}
                        <li><a class="dropdown-item" href="{{ route('admin_anak') }}">Anak Asuh</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin_kepengurusan') }}">Struktur Kepengurusan</a></li>
                    </ul>
                </li>
            @endif
        </ul>
        @if(\Auth::user()->role == 'SA')
            <a href="{{ route('admin_superadmin') }}" class="btn text-light" role="button">Super Admin</a>
        @endif
        <a href="{{ route('logout_aksi') }}" class="btn text-light" role="button">Keluar</a>
    </div>
</div>
</nav>

@if(session('success'))
    <script>
        alert('{{ session('success') }}');
    </script>
@elseif(session('error'))
    <script>
        alert('{{ session('error') }}');
    </script>
@endif
