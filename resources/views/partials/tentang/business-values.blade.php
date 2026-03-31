<section class="business-values" id="nilai-prinsip" aria-labelledby="bv-title">
    <div class="container">
        <div class="section-head fade-up">
            <p class="section-kicker">{{ $aboutContent->values_section_kicker ?? 'Fondasi Bisnis Kami' }}</p>
            <h2 class="section-title" id="bv-title">{{ $aboutContent->values_section_title ?? 'Nilai & Prinsip Bisnis' }}</h2>
            <p class="section-subtitle">{{ $aboutContent->values_section_description ?? 'Komitmen yang kami pegang teguh dalam setiap operasional' }}</p>
        </div>

        <div class="values-grid">
            @forelse (($values ?? collect()) as $value)
                <article class="values-card fade-up {{ $loop->index > 0 ? 'delay-' . $loop->index : '' }}">
                    <div class="values-card__icon {{ $loop->index % 2 === 1 ? 'values-card__icon--accent' : '' }}">
                        <i class="{{ $value->icon ?? 'bi bi-circle' }}"></i>
                    </div>
                    <h3 class="values-card__title">{{ $value->title }}</h3>
                    <p class="values-card__text">
                        {{ $value->description }}
                    </p>
                </article>
            @empty
                <article class="values-card fade-up">
                    <div class="values-card__icon">
                        <i class="bi bi-houses"></i>
                    </div>
                    <h3 class="values-card__title">Fokus Kepemilikan Aset</h3>
                    <p class="values-card__text">
                        Memberikan kesempatan nyata kepada mitra untuk memiliki aset kendaraan berkualitas melalui skema yang terstruktur dan berkelanjutan.
                    </p>
                </article>
            @endforelse
        </div>
    </div>
</section>
