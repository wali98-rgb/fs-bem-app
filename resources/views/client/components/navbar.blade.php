<nav>
    <div class="wrapper">
        <div class="logo">
            <img src="{{ asset('plugins/frontend/img/bem.png') }}" alt="">
            <a href="/">BEM IM</a>
        </div>
        <input type="radio" name="slider" id="menu-btn">
        <input type="radio" name="slider" id="close-btn">
        <ul class="nav-links">
            <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
            <li><a href="/">Home</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li>
                <a href="#" class="desktop-item">Departemen Menu</a>
                <input type="checkbox" id="showDrop">
                <label for="showDrop" class="mobile-item">Departemen Menu</label>
                <ul class="drop-menu">
                    <li><a href="#">Pendidikan</a></li>
                    <li><a href="#">Sosial</a></li>
                    <li><a href="#">Ekonomi</a></li>
                    <li><a href="#">Kominfo</a></li>
                    <li><a href="#">Agama</a></li>
                    <li><a href="#">Olahraga</a></li>
                </ul>
            </li>
            <li><a href="#">Feedback</a></li>
        </ul>
        <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
    </div>
</nav>
