<section class="section section--soft" id="tentang" aria-labelledby="value-title">
    <div class="container">
        <div class="section-head fade-up">
            <p class="section-kicker">Value Proposition</p>
            <h2 class="section-title" id="value-title">{{ $homeContent->value_section_title ?? 'Keunggulan Kemitraan OTOBIZ' }}</h2>
        </div>

        <div class="value-grid">
            @forelse (($valueItems ?? collect()) as $item)
                <article class="value-card fade-up {{ $loop->index > 0 ? 'delay-' . $loop->index : '' }}">
                    <i class="{{ $item->icon ?? 'bi bi-circle' }} value-card__icon"></i>
                    <h3 class="value-card__title">{{ $item->title }}</h3>
                    <p class="value-card__text">{{ $item->description }}</p>
                </article>
            @empty
                <article class="value-card fade-up">
                    <i class="bi bi-graph-up-arrow value-card__icon"></i>
                    <h3 class="value-card__title">Aset Produktif</h3>
                    <p class="value-card__text">Unit kendaraan dioptimalkan untuk menghasilkan nilai melalui skema operasional yang terarah.</p>
                </article>
            @endforelse
        </div>
    </div>
</section>
