<section class="closing-strip" id="closing-strip" aria-label="Penutup kontak">
    <div class="container closing-strip__inner fade-up">
        <p>{{ $contactContent->closing_strip_text ?? 'OTOBIZ siap membantu Anda mulai dari pertanyaan awal hingga proses konsultasi lanjutan, dengan komunikasi yang lebih terarah dan profesional.' }}</p>
        <a href="{{ $contactContent->closing_strip_button_link ?? '#contact-form' }}" class="btn kontak-btn kontak-btn--primary closing-strip__cta js-kontak-scroll">{{ $contactContent->closing_strip_button_text ?? 'Hubungi Tim Kami' }}</a>
    </div>
</section>
