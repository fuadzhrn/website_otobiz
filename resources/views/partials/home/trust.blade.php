<section class="section" id="produk" aria-labelledby="trust-title">
    <div class="container">
        <div class="section-head fade-up">
            <p class="section-kicker">Statistik &amp; Trust Signal</p>
            <h2 class="section-title" id="trust-title">{{ $homeContent->stats_section_title ?? 'Kredibilitas yang Bisa Anda Lihat' }}</h2>
        </div>

        <div class="trust-grid">
            @forelse (($stats ?? collect()) as $stat)
                <article class="trust-card fade-up {{ $loop->index > 0 ? 'delay-' . $loop->index : '' }}">
                    <i class="{{ $stat->icon ?? 'bi bi-circle' }} trust-card__icon"></i>
                    <p class="trust-card__value">{{ $stat->number }}</p>
                    <p class="trust-card__label">{{ $stat->label }}</p>
                </article>
            @empty
                <article class="trust-card fade-up">
                    <i class="bi bi-buildings trust-card__icon"></i>
                    <p class="trust-card__value">150+</p>
                    <p class="trust-card__label">Mitra Terdaftar</p>
                </article>
            @endforelse
        </div>
    </div>
</section>
