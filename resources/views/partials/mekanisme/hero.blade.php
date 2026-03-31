<section class="mekanisme-hero" id="mekanisme-top" aria-labelledby="mekanisme-hero-title">
    <div class="mekanisme-hero__overlay"></div>
    <div class="container mekanisme-hero__content fade-up is-visible">
        <p class="mekanisme-hero__kicker">{{ $mekanismeContent->hero_kicker ?? 'Mekanisme Kemitraan OTOBIZ' }}</p>
        <h1 class="mekanisme-hero__title" id="mekanisme-hero-title">
            {{ $mekanismeContent->hero_title ?? 'Mekanisme Kemitraan Kendaraan yang Jelas, Terstruktur, dan Berbasis Operasional Nyata' }}
        </h1>
        <p class="mekanisme-hero__desc">
            {{ $mekanismeContent->hero_description ?? 'OTOBIZ menghadirkan sistem kemitraan yang membantu mitra membangun kepemilikan aset kendaraan produktif melalui proses operasional profesional, transparan, dan berorientasi jangka panjang.' }}
        </p>

        <div class="mekanisme-hero__actions">
            <a href="{{ $mekanismeContent->hero_primary_button_link ?? '#alur-kemitraan' }}" class="btn btn--hero-primary">{{ $mekanismeContent->hero_primary_button_text ?? 'Pelajari Alur Kemitraan' }}</a>
            <a href="{{ $mekanismeContent->hero_secondary_button_link ?? '#mekanisme-cta' }}" class="btn btn--hero-ghost">{{ $mekanismeContent->hero_secondary_button_text ?? 'Konsultasi Sekarang' }}</a>
        </div>

        <div class="mekanisme-hero__trust">
            <span class="mekanisme-hero__trust-item">{{ $mekanismeContent->hero_badge_one ?? 'Transparan' }}</span>
            <span class="mekanisme-hero__trust-item">{{ $mekanismeContent->hero_badge_two ?? 'Terstruktur' }}</span>
            <span class="mekanisme-hero__trust-item">{{ $mekanismeContent->hero_badge_three ?? 'Profesional' }}</span>
        </div>
    </div>
</section>

<nav class="mekanisme-subnav" id="mekanisme-subnav" aria-label="Navigasi bagian mekanisme">
    <div class="container mekanisme-subnav__inner">
        <a href="#model-bisnis" class="mekanisme-subnav__link is-active">Model Bisnis</a>
        <a href="#alur-kemitraan" class="mekanisme-subnav__link">Alur Kemitraan</a>
        <a href="#syarat-ketentuan" class="mekanisme-subnav__link">Syarat &amp; Ketentuan</a>
        <a href="#faq-kemitraan" class="mekanisme-subnav__link">FAQ</a>
    </div>
</nav>
