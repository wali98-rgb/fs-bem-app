<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href={{ url('/') }} class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primer"> <img class="img-fluid me-2" src="{{ asset('plugins/frontend/img/bem.png') }}"
                alt="" style="max-width: 50px; height: auto;">BEM INDONESIA MANDIRI</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="/" class="nav-item nav-link active">Home</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Departemen</a>
                <div class="dropdown-menu fade-down m-0">
                    <a href="{{ route('pendidikan')}}" class="dropdown-item">Departemen Pendidikan</a>
                    <a href="{{ route('sosial') }}" class="dropdown-item">Departemen Sosial Masyarakat</a>
                    <a href="{{ route('komdigi') }}" class="dropdown-item">Departemen Komdigi</a>
                    <a href="{{ route('ekonomi') }}" class="dropdown-item">Departemen Ekonomi Kreatif</a>
                    <a href="{{ route('agama') }}" class="dropdown-item">Departemen Agama</a>
                    <a href="{{ route('pembinaan') }}" class="dropdown-item">Departemen Pemikat Regis</a>
                </div>
            </div>
            <a href="/about" class="nav-item nav-link">About</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Album Anggota</a>
                <div class="dropdown-menu fade-down m-0">
                    <a href="{{ route('Elder22') }}" class="dropdown-item">Angkatan 2022/2023</a>
                    <a href="#" class="dropdown-item">Angkatan 2023/2024</a>
                    <a href="#" class="dropdown-item">Angkatan 2024/2025</a>
                </div>
            </div>
            <a href="contact.html" class="nav-item nav-link">Contact</a>
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                    <i class="ti-layout-sidebar-left"></i> Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </div>
    </div>
</nav>
