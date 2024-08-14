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
            <li class="{{ request()->is('!4dm1n/attendance') ? 'active' : '' }}">
                <a href="{{ url('!4dm1n/attendance') }}">
                    <span class="pcoded-micon"><i class="bi bi-qr-code"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Absensi</span>
                </a>
            </li>
            <li class="{{ request()->is('!4dm1n/major') ? 'active' : '' }}">
                <a href="{{ url('!4dm1n/major') }}">
                    <span class="pcoded-micon"><i class="bi bi-easel"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Program Studi</span>
                </a>
            </li>
            <li class="{{ request()->is('!4dm1n/department') ? 'active' : '' }}">
                <a href="{{ url('!4dm1n/department') }}">
                    <span class="pcoded-micon"><i class="bi bi-journals"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Departemen Kabinet</span>
                </a>
            </li>
            <li class="{{ request()->is('!4dm1n/archive') ? 'active' : '' }}">
                <a href="{{ url('!4dm1n/archive') }}">
                    <span class="pcoded-micon"><i class="bi bi-box-seam"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Arsip</span>
                </a>
            </li>
            <li class="{{ request()->is('!4dm1n/documentation') ? 'active' : '' }}">
                <a href="{{ url('!4dm1n/documentation') }}">
                    <span class="pcoded-micon"><i class="bi bi-images"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Dokumentasi</span>
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
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Laporan Kegiatan (LPJ)</span>
                </a>
            </li>
            <li class="{{ request()->is('!4dm1n/documentation') ? 'active' : '' }}">
                <a href="{{ url('!4dm1n/documentation') }}">
                    <span class="pcoded-micon"><i class="bi bi-images"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Ulasan & Like</span>
                </a>
            </li>
            <li class="{{ request()->is('!4dm1n/documentation') ? 'active' : '' }}">
                <a href="{{ url('!4dm1n/documentation') }}">
                    <span class="pcoded-micon"><i class="bi bi-images"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Pesan</span>
                </a>
            </li>
            <li class="{{ request()->is('!4dm1n/documentation') ? 'active' : '' }}">
                <a href="{{ url('!4dm1n/documentation') }}">
                    <span class="pcoded-micon"><i class="bi bi-images"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Pengguna</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
