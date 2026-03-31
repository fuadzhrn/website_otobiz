<section class="faq-section" id="faq-kemitraan" aria-labelledby="faq-title">
    <div class="container faq-wrap">
        <div class="mekanisme-head fade-up">
            <p class="mekanisme-head__kicker">{{ $mekanismeContent->faq_section_kicker ?? 'Pertanyaan Umum' }}</p>
            <h2 class="mekanisme-head__title" id="faq-title">{{ $mekanismeContent->faq_section_title ?? 'FAQ Kemitraan' }}</h2>
            <p class="mekanisme-head__desc">{{ $mekanismeContent->faq_section_description ?? 'Jawaban singkat dan jelas untuk membantu Anda memahami program kemitraan OTOBIZ.' }}</p>
        </div>

        <div class="faq-accordion" id="faq-accordion">
            @forelse (($faqs ?? collect()) as $faq)
                <article class="faq-item {{ $loop->first ? 'is-open' : '' }}">
                    <button class="faq-question" type="button" aria-expanded="{{ $loop->first ? 'true' : 'false' }}">
                        <span>{{ $faq->question }}</span>
                        <i class="bi bi-plus-lg"></i>
                    </button>
                    <div class="faq-answer" {{ $loop->first ? 'style=max-height:220px;' : '' }}>
                        <p>{{ $faq->answer }}</p>
                    </div>
                </article>
            @empty
                <article class="faq-item is-open">
                    <button class="faq-question" type="button" aria-expanded="true">
                        <span>Apa itu program kemitraan OTOBIZ?</span>
                        <i class="bi bi-plus-lg"></i>
                    </button>
                    <div class="faq-answer" style="max-height: 220px;">
                        <p>Program kemitraan OTOBIZ adalah skema kepemilikan aset kendaraan produktif berbasis operasional nyata yang dikelola secara profesional.</p>
                    </div>
                </article>
            @endforelse
        </div>
    </div>
</section>
