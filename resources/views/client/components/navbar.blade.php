<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primer">
            <img class="img-fluid me-2" src="{{ asset('plugins/frontend/img/bem.png') }}"
                 alt="Logo BEM" style="max-width: 50px; height: auto;">
            BEM INDONESIA MANDIRI
        </h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Departement</a>
                <div class="dropdown-menu fade-down m-0">
                    <a href="#" class="dropdown-item">Departemen Pendidikan</a>
                    <a href="#" class="dropdown-item">Departemen Sosial Masyarakat</a>
                    <a href="#" class="dropdown-item">Departemen Komdigi</a>
                    <a href="#" class="dropdown-item">Departemen Ekonomi Kreatif</a>
                    <a href="#" class="dropdown-item">Departemen Agama</a>
                    <a href="#" class="dropdown-item">Departemen Pemikat Regis</a>
                </div>
            </div>
            <a href="{{ url('/client/pages/ukm') }}" class="nav-item nav-link">UKM</a>
            <a href="#" class="nav-item nav-link">Feedback</a>
            @auth
            <div class="nav-item dropdown">
                <a href="#" class="nav-item nav-link dropdown-toggle d-flex align-items-center gap-2 py-3 px-0" data-bs-toggle="dropdown">
                    <img src="{{ Auth::user()->photo }}"
                    class="rounded-circle align-middle"
                    alt="Profile Picture"
                    style="width: 32px; height: 32px; object-fit: cover; border: 2px solid #f8f9fa;">
                    <span class="d-none d-lg-block">{{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu fade-down m-0">
                    <a href="{{ url('/profile') }}" class="dropdown-item">Profile</a>
                    <a href="#" class="dropdown-item">Settings</a>
                    <a href="#" class="dropdown-item">Chat</a>
                    <a href="#" class="dropdown-item">Content</a>
                    <a href="#" class="dropdown-item">Proker</a>
                    <a href="#" class="dropdown-item">Rapat Kegiatan</a>
                    <a href="{{ url('/!4dm1n') }}" class="dropdown-item">Go to Admin</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </div>
            </div>
            @endauth
        </div>
    </div>
</nav>
