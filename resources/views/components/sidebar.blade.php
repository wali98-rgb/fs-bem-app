<aside class="s1d3baR_">
    <div class="s1d3LO">
        <div class="s1d3LOim9">
            <img src="{{ asset('plugins/frontend/img/bem.png') }}" alt="Bem Logo">
        </div>
        <h2>App UI Admin</h2>
    </div>

    <div class="s1d3L1st">
        <li class="{{ request()->is('!4dm1n') ? 'active' : '' }}">
            <a href="{{ url('!4dm1n') }}">
                <i class="bi bi-columns-gap"></i>
                Dashboard
            </a>
        </li>
        <li class="{{ request()->is('!4dm1n/attendance') ? 'active' : '' }}">
            <a href="{{ url('!4dm1n') }}">
                <i class="bi bi-qr-code"></i>
                Absensi
            </a>
        </li>
        <li class="{{ request()->is('!4dm1n/major') ? 'active' : '' }}">
            <a href="{{ url('!4dm1n') }}">
                <i class="bi bi-easel"></i>
                Program Studi
            </a>
        </li>
        <li class="{{ request()->is('!4dm1n/department') ? 'active' : '' }}">
            <a href="{{ url('!4dm1n') }}">
                <i class="bi bi-journals"></i>
                Departemen
            </a>
        </li>
        <li class="{{ request()->is('!4dm1n/archive') ? 'active' : '' }}">
            <a href="{{ url('!4dm1n') }}">
                <i class="bi bi-box-seam"></i>
                Arsip
            </a>
        </li>
        <li class="{{ request()->is('!4dm1n/documentation') ? 'active' : '' }}">
            <a href="{{ url('!4dm1n') }}">
                <i class="bi bi-images"></i>
                Dokumentasi
            </a>
        </li>
    </div>

    <div class="s1d3ex_">
        <h3>NAVIGASI AKUN</h3>

        <div class="s1d3exL1">
            <li class="{{ request()->is('!4dm1n/profile') ? 'active' : '' }}">
                <a href="{{ url('!4dm1n') }}">
                    <i class="bi bi-person-circle"></i>
                    Profil
                </a>
            </li>

            <li>
                <a href="{{ url('!4dm1n') }}">
                    <i class="bi bi-door-open"></i>
                    Logout
                </a>
            </li>
        </div>
    </div>
</aside>
