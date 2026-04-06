<section class="mekanisme-cta-section" id="mekanisme-cta" aria-labelledby="mekanisme-cta-title">
    @php
        $waLink = 'https://wa.me/6285119995965';
    @endphp
    <div class="container">
        <div class="mekanisme-cta fade-up">
            <p class="mekanisme-cta__kicker">{{ $mekanismeContent->cta_kicker ?? 'Langkah Selanjutnya' }}</p>
            <h2 class="mekanisme-cta__title" id="mekanisme-cta-title">{{ $mekanismeContent->cta_title ?? 'Siap Memulai Kemitraan Bersama OTOBIZ?' }}</h2>
            <p class="mekanisme-cta__desc">{{ $mekanismeContent->cta_description ?? 'Bangun aset kendaraan produktif Anda melalui mekanisme yang jelas, terstruktur, dan dikelola profesional bersama tim OTOBIZ.' }}</p>
            <div class="mekanisme-cta__actions">
                <a href="{{ $mekanismeContent->cta_primary_button_link ?? '#' }}" class="btn mekanisme-btn mekanisme-btn--primary">{{ $mekanismeContent->cta_primary_button_text ?? 'Gabung Mitra' }}</a>
                <a href="{{ $waLink }}" class="btn mekanisme-btn mekanisme-btn--light">{{ $mekanismeContent->cta_secondary_button_text ?? 'Konsultasi Sekarang' }}</a>
                <a href="{{ $waLink }}" class="btn mekanisme-btn mekanisme-btn--ghost">{{ $mekanismeContent->cta_third_button_text ?? 'Hubungi Tim Kami' }}</a>
            </div>
        </div>
    </div>
</section>
