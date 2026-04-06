<section class="closing-strip" id="closing-strip" aria-label="Penutup kontak">
    @php
        $waLink = 'https://wa.me/6285119995965';
    @endphp
    <div class="container closing-strip__inner fade-up">
        <p>{{ $contactContent->closing_strip_text ?? 'OTOBIZ siap membantu Anda mulai dari pertanyaan awal hingga proses konsultasi lanjutan, dengan komunikasi yang lebih terarah dan profesional.' }}</p>
        <a href="{{ $waLink }}" class="btn kontak-btn kontak-btn--primary closing-strip__cta">{{ $contactContent->closing_strip_button_text ?? 'Hubungi Tim Kami' }}</a>
    </div>
</section>
