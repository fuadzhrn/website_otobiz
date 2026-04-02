<section class="kontak-hero" id="kontak-hero" aria-labelledby="kontak-hero-title">
    @php
        $resolvedQuickCards = ($quickCards ?? collect())->count()
            ? $quickCards
            : collect([
                (object) ['title' => 'Konsultasi Kemitraan', 'description' => 'Bantu pilih jalur kemitraan sesuai profil Anda.', 'icon' => 'bi bi-briefcase'],
                (object) ['title' => 'Customer Support', 'description' => 'Dukungan cepat untuk pertanyaan program dan layanan.', 'icon' => 'bi bi-headset'],
                (object) ['title' => 'Lokasi Kantor', 'description' => 'Informasi alamat HO dan pool operasional OTOBIZ.', 'icon' => 'bi bi-geo-alt'],
            ]);
    @endphp
    <div class="container kontak-hero__layout">
        <div class="kontak-hero__content fade-up is-visible">
            <p class="kontak-hero__kicker">OTOBIZ Contact Hub</p>
            <h1 class="kontak-hero__title" id="kontak-hero-title">{{ $contactContent->hero_title ?? 'Hubungi OTOBIZ dengan Cara yang Paling Nyaman untuk Anda' }}</h1>
            <p class="kontak-hero__desc">
                {{ $contactContent->hero_description ?? 'Dari pertanyaan awal, kebutuhan konsultasi, hingga informasi lokasi dan layanan support, tim OTOBIZ siap membantu Anda dengan lebih cepat dan terarah.' }}
            </p>
            <a href="{{ $contactContent->hero_small_button_link ?? '#contact-form' }}" class="btn kontak-btn kontak-btn--primary js-kontak-scroll">{{ $contactContent->hero_small_button_text ?? 'Kirim Pesan' }}</a>
        </div>

        <div class="kontak-hero__quick fade-up delay-1">
            @foreach ($resolvedQuickCards as $card)
                <article class="kontak-quick-card">
                    <i class="{{ $card->icon ?: 'bi bi-info-circle' }}"></i>
                    <h3>{{ $card->title }}</h3>
                    <p>{{ $card->description }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>
