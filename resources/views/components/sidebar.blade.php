<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Halaman Utama</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="{{ request()->is('!4dm1n') ? 'active' : '' }}">
                <a href="{{ url('!4dm1n') }}">
                    <span class="pcoded-micon"><i class="bi bi-columns-gap"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                </a>
            </li>
            <li class="{{ request()->is('!4dm1n/attendence') ? 'active' : '' }}">
                <a href="{{ url('!4dm1n/attendence') }}">
                    <span class="pcoded-micon"><i class="bi bi-qr-code"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Absensi</span>
                </a>
            </li>
            <li class="{{ request()->is('!4dm1n/major') ? 'active' : '' }}">
                <a href="{{ url('!4dm1n/major') }}">
                    <span class="pcoded-micon"><i class="bi bi-easel"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Program Studi &#10004;</span>
                </a>
            </li>
            <li class="{{ request()->is('!4dm1n/department') ? 'active' : '' }}">
                <a href="{{ url('!4dm1n/department') }}">
                    <span class="pcoded-micon"><i class="bi bi-journals"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Departemen Kabinet &#10004;</span>
                </a>
            </li>
            <li class="{{ request()->is('!4dm1n/archive') ? 'active' : '' }}">
                <a href="{{ url('!4dm1n/archive') }}">
                    <span class="pcoded-micon"><i class="bi bi-box-seam"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Arsip</span>
                </a>
            </li>
            <li class="{{ request()->is('!4dm1n/docum') ? 'active' : '' }}">
                <a href="{{ url('!4dm1n/docum') }}">
                    <span class="pcoded-micon"><i class="bi bi-images"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Dokumentasi &#10004;</span>
                </a>
            </li>

            <li class="{{ request()->is('!4dm1n/documentation') ? 'active' : '' }}">
                <a href="{{ url('!4dm1n/documentation') }}">
                    <span class="pcoded-micon"><i class="bi bi-images"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Berita Acara</span>
                </a>
            </li>
            <li class="{{ request()->is('!4dm1n/documentation') ? 'active' : '' }}">
                <a href="{{ url('!4dm1n/documentation') }}">
                    <span class="pcoded-micon"><i class="bi bi-images"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Artikel</span>
                </a>
            </li>
            <li class="{{ request()->is('!4dm1n/documentation') ? 'active' : '' }}">
                <a href="{{ url('!4dm1n/documentation') }}">
                    <span class="pcoded-micon"><i class="bi bi-images"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Kuisioner</span>
                </a>
            </li>
            <li class="{{ request()->is('!4dm1n/documentation') ? 'active' : '' }}">
                <a href="{{ url('!4dm1n/documentation') }}">
                    <span class="pcoded-micon"><i class="bi bi-images"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Berkas & Persuratan</span>
                </a>
            </li>
            <li class="{{ request()->is('!4dm1n/documentation') ? 'active' : '' }}">
                <a href="{{ url('!4dm1n/documentation') }}">
                    <span class="pcoded-micon"><i class="bi bi-images"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Ask Me Anything</span>
                </a>
            </li>
            <li class="{{ request()->is('!4dm1n/documentation') ? 'active' : '' }}">
                <a href="{{ url('!4dm1n/documentation') }}">
                    <span class="pcoded-micon"><i class="bi bi-images"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Pesan</span>
                </a>
            </li>
            <li class="{{ request()->is('!4dm1n/user') || request()->is('!4dm1n/user_access') ? 'active' : '' }}">
                <a href="{{ url('!4dm1n/user') }}">
                    <span class="pcoded-micon"><i class="bi bi-people"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Pengguna</span>
                </a>
            </li>
            <li class="{{ request()->is('!4dm1n/documentation') ? 'active' : '' }}">
                <a href="{{ url('!4dm1n/documentation') }}">
                    <span class="pcoded-micon"><i class="bi bi-images"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Konten</span>
                </a>
            </li>
            <li class="{{ request()->is('!4dm1n/proker') ? 'active' : '' }}">
                <a href="{{ url('!4dm1n/proker') }}">
                    <span class="pcoded-micon"><i class="bi bi-activity"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Program Kerja Departemen &#10004;</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
