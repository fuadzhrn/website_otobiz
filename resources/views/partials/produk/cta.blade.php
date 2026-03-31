<section class="produk-cta" id="produk-cta" aria-labelledby="produk-cta-title">
    <div class="container">
        <div class="produk-cta__inner fade-up">
            <h2 class="produk-cta__title" id="produk-cta-title">{{ $productContent->cta_title ?? 'Temukan Paket Kemitraan yang Paling Sesuai untuk Anda' }}</h2>
            <p class="produk-cta__desc">{{ $productContent->cta_description ?? 'Tim OTOBIZ siap membantu Anda memilih paket berdasarkan target aset, profil operasional, dan rencana pertumbuhan bisnis Anda.' }}</p>
            <div class="produk-cta__actions">
                <a href="{{ $productContent->cta_primary_button_link ?? '#' }}" class="btn produk-btn produk-btn--primary">{{ $productContent->cta_primary_button_text ?? 'Konsultasi Sekarang' }}</a>
                <a href="{{ $productContent->cta_secondary_button_link ?? '#' }}" class="btn produk-btn produk-btn--light">{{ $productContent->cta_secondary_button_text ?? 'Ajukan Kemitraan' }}</a>
                <a href="{{ $productContent->cta_third_button_link ?? '#' }}" class="btn produk-btn produk-btn--ghost">{{ $productContent->cta_third_button_text ?? 'Hubungi Tim Kami' }}</a>
            </div>
        </div>
    </div>
</section>
