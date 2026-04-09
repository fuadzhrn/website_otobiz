<section class="produk-hero" id="produk-hero" aria-labelledby="produk-hero-title">
    @php
        $waLink = 'https://wa.me/6285119995965';
        $defaultHeroImage = 'https://images.unsplash.com/photo-1493238792000-8113da705763?auto=format&fit=crop&w=1200&q=80';
        $heroImage = $defaultHeroImage;

        if (!empty($productContent?->hero_image)) {
            $heroImage = Illuminate\Support\Str::startsWith($productContent->hero_image, ['http://', 'https://', '/'])
                ? $productContent->hero_image
                : Illuminate\Support\Facades\Storage::url($productContent->hero_image);
        }
    @endphp
    <div class="container produk-hero__wrap">
        <div class="produk-hero__content fade-up is-visible">
            <p class="produk-hero__badge">{{ $productContent->hero_badge_text ?? 'OTOBIZ Product Line' }}</p>
            <h1 class="produk-hero__title" id="produk-hero-title">{{ $productContent->hero_title ?? 'Pilih Paket Kemitraan Kendaraan Produktif Anda' }}</h1>
            <p class="produk-hero__desc">
                {{ $productContent->hero_description ?? 'Dari kendaraan konvensional hingga EV, OTOBIZ membantu Anda memiliki aset yang bekerja secara profesional.' }}
            </p>
            <div class="produk-hero__actions">
                <a href="{{ $waLink }}" class="btn produk-btn produk-btn--primary">{{ $productContent->hero_primary_button_text ?? 'Konsultasi Sekarang' }}</a>
                <a href="{{ $productContent->hero_secondary_button_link ?? '#produk-packages' }}" class="btn produk-btn produk-btn--ghost">{{ $productContent->hero_secondary_button_text ?? 'Pilih Paket' }}</a>
            </div>
            <p class="produk-hero__trust">{{ $productContent->hero_trust_text ?? 'Terstruktur. Transparan. Berorientasi aset jangka panjang.' }}</p>
        </div>

        <div class="produk-hero__visual fade-up delay-1">
            <img src="{{ $heroImage }}" alt="Kendaraan kemitraan OTOBIZ" class="produk-hero__image" />
        </div>
    </div>
</section>
