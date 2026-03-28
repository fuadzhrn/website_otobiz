<header class="site-header" id="home">
    <div class="container navbar-wrap">
        <a href="{{ route('home') }}" class="brand-logo" aria-label="OTOBIZ Home">
            <img src="{{ asset('assets/images/logo-otobiz.png') }}" alt="Logo OTOBIZ" class="brand-logo__image" />
        </a>

        <nav class="main-nav" aria-label="Navigasi utama">
            <a href="{{ route('home') }}" class="main-nav__link {{ request()->routeIs('home') ? 'is-active' : '' }}">Home</a>
            <a href="{{ route('tentang') }}" class="main-nav__link {{ request()->routeIs('tentang') ? 'is-active' : '' }}">Tentang Kami</a>
            <a href="{{ route('mekanisme') }}" class="main-nav__link {{ request()->routeIs('mekanisme') ? 'is-active' : '' }}">Mekanisme Kemitraan</a>
            <a href="#produk" class="main-nav__link">Produk</a>
            <a href="#gabung" class="main-nav__link">Gabung Mitra</a>
            <a href="#kontak" class="main-nav__link">Kontak &amp; Support</a>
        </nav>

        <a href="#gabung" class="btn btn--sm btn--primary">Konsultasi</a>
    </div>
</header>
