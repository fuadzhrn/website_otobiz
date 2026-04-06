<section class="gabung-cta" id="gabung-cta" aria-labelledby="gabung-cta-title">
    @php
        $waLink = 'https://wa.me/6285119995965';
    @endphp
    <div class="container">
        <div class="gabung-cta__inner fade-up">
            <h2 class="gabung-cta__title" id="gabung-cta-title">{{ $joinContent->cta_title ?? 'Siap Bergabung Bersama OTOBIZ?' }}</h2>
            <p class="gabung-cta__desc">{{ $joinContent->cta_description ?? 'Mulai dari konsultasi, pendaftaran, hingga proses seleksi, OTOBIZ membantu Anda memahami langkah kemitraan secara lebih terarah dan profesional.' }}</p>
            <div class="gabung-cta__actions">
                <a href="{{ $joinContent->cta_primary_button_link ?? '#gabung-form' }}" class="btn gabung-btn gabung-btn--primary js-scroll-to-form">{{ $joinContent->cta_primary_button_text ?? 'Isi Formulir Sekarang' }}</a>
                <a href="{{ $waLink }}" class="btn gabung-btn gabung-btn--light">{{ $joinContent->cta_secondary_button_text ?? 'Hubungi Tim Kami' }}</a>
            </div>
        </div>
    </div>
</section>
