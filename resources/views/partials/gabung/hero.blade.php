<section class="gabung-hero" id="gabung-hero" aria-labelledby="gabung-hero-title">
    @php
        $waLink = 'https://wa.me/6285119995965';
        $heroBadges = array_values(array_filter([
            $joinContent->hero_badge_one ?? null,
            $joinContent->hero_badge_two ?? null,
            $joinContent->hero_badge_three ?? null,
        ]));
    @endphp
    <div class="container gabung-hero__layout">
        <div class="gabung-hero__content fade-up is-visible">
            <p class="gabung-hero__kicker">Gabung Mitra OTOBIZ</p>
            <h1 class="gabung-hero__title" id="gabung-hero-title">{{ $joinContent->hero_title ?? 'Mulai Langkah Anda Menjadi Mitra OTOBIZ' }}</h1>
            <p class="gabung-hero__desc">
                {{ $joinContent->hero_description ?? 'Isi formulir pendaftaran, pahami proses seleksi, dan konsultasikan kebutuhan Anda bersama tim OTOBIZ untuk memulai kemitraan kendaraan produktif.' }}
            </p>
            <div class="gabung-hero__actions">
                <a href="{{ $joinContent->hero_primary_button_link ?? '#gabung-form' }}" class="btn gabung-btn gabung-btn--primary js-scroll-to-form">{{ $joinContent->hero_primary_button_text ?? 'Isi Formulir' }}</a>
                <a href="{{ $waLink }}" class="btn gabung-btn gabung-btn--ghost">{{ $joinContent->hero_secondary_button_text ?? 'Konsultasi Sekarang' }}</a>
            </div>
            <div class="gabung-hero__labels">
                @forelse ($heroBadges as $badge)
                    <span>{{ $badge }}</span>
                @empty
                    <span>Proses Terarah</span>
                    <span>Konsultasi Profesional</span>
                    <span>Sistem Transparan</span>
                @endforelse
            </div>
        </div>

        <div class="gabung-hero__visual fade-up delay-1">
            <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=1400&q=80" alt="Tim konsultasi kemitraan OTOBIZ" class="gabung-hero__image" />
        </div>
    </div>
</section>
