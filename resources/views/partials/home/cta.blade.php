<section class="cta" id="gabung" aria-labelledby="cta-title">
    <div class="container cta__content fade-up">
        <p class="section-kicker section-kicker--light">Saatnya Bergabung</p>
        <h2 class="cta__title" id="cta-title">{{ $homeContent->cta_title ?? 'Mulai Perjalanan Kemitraan Kendaraan Anda Bersama OTOBIZ' }}</h2>
        <p class="cta__text">
            {{ $homeContent->cta_description ?? 'Diskusikan kebutuhan Anda bersama tim kami dan temukan skema kemitraan yang paling sesuai untuk target aset jangka panjang.' }}
        </p>
        <a href="{{ $homeContent->cta_button_link ?? '#kontak' }}" class="btn btn--accent">{{ $homeContent->cta_button_text ?? 'Gabung Mitra Sekarang' }}</a>
    </div>
</section>
