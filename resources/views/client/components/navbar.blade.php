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
            <a href="index.html" class="nav-item nav-link active">Home</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Departemen</a>
                <div class="dropdown-menu fade-down m-0">
                    <a href="#" class="dropdown-item">Departemen Pendidikan</a>
                    <a href="#" class="dropdown-item">Departemen Sosial Masyarakat</a>
                    <a href="#" class="dropdown-item">Departemen Komdigi</a>
                    <a href="#" class="dropdown-item">Departemen Ekonomi Kreatif</a>
                    <a href="#" class="dropdown-item">Departemen Agama</a>
                    <a href="#" class="dropdown-item">Departemen Pemikat Regis</a>
                </div>
            </div>
            <a href="about.html" class="nav-item nav-link">About</a>
            <a href="contact.html" class="nav-item nav-link">Contact</a>
        </div>
    </div>
</nav>
