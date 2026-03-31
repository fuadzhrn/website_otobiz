<section class="section section--accent" id="mekanisme" aria-labelledby="flow-title">
    <div class="container">
        <div class="section-head fade-up">
            <p class="section-kicker">Ringkasan Kemitraan</p>
            <h2 class="section-title" id="flow-title">{{ $homeContent->summary_section_title ?? 'Alur Kemitraan yang Mudah Dipahami' }}</h2>
        </div>

        <div class="flow-grid">
            @forelse (($summarySteps ?? collect()) as $step)
                <article class="flow-step fade-up {{ $loop->index > 0 ? 'delay-' . $loop->index : '' }}">
                    <span class="flow-step__number">{{ str_pad((string) ($loop->iteration), 2, '0', STR_PAD_LEFT) }}</span>
                    <h3 class="flow-step__title">{{ $step->title }}</h3>
                    <p class="flow-step__text">{{ $step->description }}</p>
                </article>
            @empty
                <article class="flow-step fade-up">
                    <span class="flow-step__number">01</span>
                    <h3 class="flow-step__title">Gabung Kemitraan</h3>
                    <p class="flow-step__text">Mitra mendaftar, konsultasi kebutuhan, lalu menentukan skema unit kendaraan.</p>
                </article>
            @endforelse
        </div>
    </div>
</section>
