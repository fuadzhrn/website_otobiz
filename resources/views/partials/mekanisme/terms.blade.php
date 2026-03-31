<section class="terms-section" id="syarat-ketentuan" aria-labelledby="terms-title">
    <div class="container">
        <div class="mekanisme-head fade-up">
            <p class="mekanisme-head__kicker">{{ $mekanismeContent->terms_section_kicker ?? 'Informasi Program' }}</p>
            <h2 class="mekanisme-head__title" id="terms-title">{{ $mekanismeContent->terms_section_title ?? 'Syarat & Ketentuan' }}</h2>
            <p class="mekanisme-head__desc">{{ $mekanismeContent->terms_section_description ?? 'Ketentuan disusun profesional untuk menjaga kejelasan peran, transparansi proses, dan kualitas operasional program OTOBIZ.' }}</p>
        </div>

        <div class="terms-grid">
            @php $termDelays = ['', 'delay-1', 'delay-2', 'delay-3', 'delay-4', 'delay-5', '', 'delay-1', 'delay-2']; @endphp
            @forelse (($terms ?? collect()) as $term)
                <article class="terms-card fade-up {{ $termDelays[$loop->index] ?? '' }}">
                    <i class="{{ $term->icon ?? 'bi bi-check2-circle' }} terms-card__icon"></i>
                    <p>{{ $term->description }}</p>
                </article>
            @empty
                <article class="terms-card fade-up">
                    <i class="bi bi-check2-circle terms-card__icon"></i>
                    <p>Program berlaku untuk mitra yang memahami konsep kemitraan operasional.</p>
                </article>
            @endforelse
        </div>
    </div>
</section>
