<section class="hero" aria-labelledby="hero-title">
    @php
        $waLink = 'https://wa.me/6285119995965';
        $defaultHeroImage = 'https://images.unsplash.com/photo-1541899481282-d53bffe3c35d?auto=format&fit=crop&w=1200&q=80';
        $heroImage = $defaultHeroImage;

        if (!empty($homeContent->hero_image)) {
            $heroImage = Illuminate\Support\Str::startsWith($homeContent->hero_image, ['http://', 'https://', '/'])
                ? $homeContent->hero_image
                : Illuminate\Support\Facades\Storage::url($homeContent->hero_image);
        }
    @endphp
    <div class="container hero__grid">
        <div class="hero__content fade-up">
            <span class="hero__badge">{{ $homeContent->hero_badge_text ?? 'Kemitraan Aset Produktif Berbasis Operasional Nyata' }}</span>
            <h1 class="hero__title" id="hero-title">{{ $homeContent->hero_title ?? 'Bangun Aset Kendaraan Anda Bersama Sistem Kemitraan yang Terukur' }}</h1>
            <p class="hero__desc">
                {{ $homeContent->hero_description ?? 'OTOBIZ menghadirkan model kemitraan kepemilikan kendaraan yang dikelola profesional, dengan alur operasional jelas, laporan berkala, dan pendampingan agar unit berkembang menjadi aset jangka panjang yang produktif.' }}
            </p>
            <div class="hero__actions">
                <a href="{{ $waLink }}" class="btn btn--primary">{{ $homeContent->hero_primary_button_text ?? 'Gabung Mitra' }}</a>
                <a href="{{ $homeContent->hero_secondary_button_link ?? '#mekanisme' }}" class="btn btn--ghost">{{ $homeContent->hero_secondary_button_text ?? 'Pelajari Kemitraan' }}</a>
            </div>
            <p class="hero__trust-note"><i class="bi bi-shield-check"></i> Monitoring unit dan laporan performa dilakukan secara berkala.</p>
        </div>

        <div class="hero__visual fade-up delay-1">
            <div class="hero-card">
                <img
                    src="{{ $heroImage }}"
                    alt="Otobiz kemitraan kepemilikan kendaraan produktif"
                    class="hero-card__image"
                />
                <div class="hero-card__overlay">
                    <span class="hero-card__chip">Model Operasional Terintegrasi</span>
                    <p>Dirancang untuk kemitraan yang aman, transparan, dan bertumbuh.</p>
                </div>
            </div>
        </div>
    </div>
</section>
