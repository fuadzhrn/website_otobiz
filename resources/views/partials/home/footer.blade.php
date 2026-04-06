<footer class="site-footer" id="kontak">
    @php
        $waDisplay = '0851 1999 5965';
        $waLink = 'https://wa.me/6285119995965';
        $email = 'info@otobiz.co.id';
    @endphp
    <div class="container footer-wrap">
        <div class="footer-brand">
            <img src="{{ asset('assets/images/logo_otobiz-no_bg.png') }}" alt="Logo OTOBIZ" class="footer-brand__image" />
            <p class="footer-brand__text">Program kemitraan kepemilikan kendaraan yang profesional dan transparan.</p>
        </div>

        <nav class="footer-nav" aria-label="Navigasi footer">
            <a href="#home">Home</a>
            <a href="#tentang">Tentang Kami</a>
            <a href="#mekanisme">Mekanisme Kemitraan</a>
            <a href="#produk">Produk</a>
        </nav>

        <div class="footer-contact">
            <p>Email: <a href="mailto:{{ $email }}">{{ $email }}</a></p>
            <p>WhatsApp: <a href="{{ $waLink }}">{{ $waDisplay }}</a></p>
            <p>Senin - Jumat: 09.00 - 17.00</p>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; {{ date('Y') }} OTOBIZ. All rights reserved.</p>
    </div>
</footer>
