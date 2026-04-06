<header class="site-header" id="home">
    @php
        $waLink = 'https://wa.me/6285119995965';
    @endphp
    <div class="container navbar-wrap">
        <a href="{{ route('home') }}" class="brand-logo" aria-label="OTOBIZ Home">
            <img src="{{ asset('assets/images/logo_otobiz-no_bg.png') }}" alt="Logo OTOBIZ" class="brand-logo__image" />
        </a>

        <button class="nav-toggle" type="button" aria-label="Buka menu navigasi" aria-controls="main-nav" aria-expanded="false">
            <span class="nav-toggle__bar"></span>
            <span class="nav-toggle__bar"></span>
            <span class="nav-toggle__bar"></span>
        </button>

        <nav class="main-nav" id="main-nav" aria-label="Navigasi utama">
            <a href="{{ route('home') }}" class="main-nav__link {{ request()->routeIs('home') ? 'is-active' : '' }}">Home</a>
            <a href="{{ route('tentang') }}" class="main-nav__link {{ request()->routeIs('tentang') ? 'is-active' : '' }}">Tentang Kami</a>
            <a href="{{ route('mekanisme') }}" class="main-nav__link {{ request()->routeIs('mekanisme') ? 'is-active' : '' }}">Mekanisme Kemitraan</a>
            <a href="{{ route('produk') }}" class="main-nav__link {{ request()->routeIs('produk') ? 'is-active' : '' }}">Produk</a>
            <a href="{{ route('gabung') }}" class="main-nav__link {{ request()->routeIs('gabung') ? 'is-active' : '' }}">Gabung Mitra</a>
            <a href="{{ route('kontak') }}" class="main-nav__link {{ request()->routeIs('kontak') ? 'is-active' : '' }}">Kontak &amp; Support</a>
            <a href="{{ $waLink }}" class="main-nav__cta">Konsultasi</a>
        </nav>

        <a href="{{ $waLink }}" class="btn btn--sm btn--primary">Konsultasi</a>
    </div>
</header>
