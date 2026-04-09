<section class="mekanisme-hero" id="mekanisme-top" aria-labelledby="mekanisme-hero-title">
    @php
        $waLink = 'https://wa.me/6285119995965';
        $defaultHeroBgImage = 'https://images.unsplash.com/photo-1553440569-bcc63803a83d?auto=format&fit=crop&w=1920&q=80';
        $heroBgImage = $defaultHeroBgImage;

        if (!empty($mekanismeContent?->hero_background_image)) {
            $heroBgImage = Illuminate\Support\Str::startsWith($mekanismeContent->hero_background_image, ['http://', 'https://', '/'])
                ? $mekanismeContent->hero_background_image
                : Illuminate\Support\Facades\Storage::url($mekanismeContent->hero_background_image);
        }
    @endphp
    <div class="mekanisme-hero__bg" style="background-image: url('{{ $heroBgImage }}');" aria-hidden="true"></div>
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
            <a href="{{ $waLink }}" class="btn btn--hero-ghost">{{ $mekanismeContent->hero_secondary_button_text ?? 'Konsultasi Sekarang' }}</a>
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
