<section class="produk-packages" id="produk-packages" aria-labelledby="produk-packages-title">
    <div class="container">
        <div class="produk-head fade-up">
            <p class="produk-head__kicker">{{ $productContent->packages_section_kicker ?? 'Paket Program' }}</p>
            <h2 class="produk-head__title" id="produk-packages-title">{{ $productContent->packages_section_title ?? 'Paket Kemitraan' }}</h2>
            <p class="produk-head__desc">{{ $productContent->packages_section_description ?? 'Pilih paket sesuai preferensi kendaraan dan target pengembangan aset produktif Anda.' }}</p>
        </div>

        @php
            $waNumber = '6285119995965';
            $waBaseUrl = 'https://wa.me/' . $waNumber;
            $defaultPartnershipMessage = implode("\n", [
                'Halo OTOBIZ, saya ingin ajukan kemitraan.',
                '',
                'Mohon informasi lebih lanjut mengenai skema dan langkah selanjutnya.',
            ]);
        @endphp

        <div class="produk-package-grid">
            @php
                $packageItems = ($packages ?? collect())->count() ? $packages : collect([
                    (object) [
                        'name' => 'Founding Partner Wuling Confero',
                        'category' => 'Konvensional',
                        'badge_text' => 'Konvensional',
                        'is_popular' => false,
                        'partnership_price' => 'Rp 27.500.000',
                        'starting_price' => 'Rp 7.500.000',
                        'cta_text' => 'Pilih Paket',
                        'cta_link' => '#',
                        'benefits' => collect([
                            (object) ['benefit_text' => 'DP unit'],
                            (object) ['benefit_text' => 'Asuransi awal'],
                            (object) ['benefit_text' => 'Biaya legal, pajak & administrasi'],
                            (object) ['benefit_text' => 'GPS external'],
                        ]),
                    ],
                    (object) [
                        'name' => 'Founding Partner VinFast Limo Green',
                        'category' => 'EV',
                        'badge_text' => 'Electric Vehicle',
                        'is_popular' => true,
                        'partnership_price' => 'Rp 36.500.000',
                        'starting_price' => 'Rp 7.500.000',
                        'cta_text' => 'Pilih Paket',
                        'cta_link' => '#',
                        'benefits' => collect([
                            (object) ['benefit_text' => 'DP unit'],
                            (object) ['benefit_text' => 'Asuransi awal'],
                            (object) ['benefit_text' => 'Biaya legal, pajak & administrasi'],
                            (object) ['benefit_text' => 'GPS external'],
                        ]),
                    ],
                ]);
            @endphp

            @foreach ($packageItems as $index => $item)
                @php
                    $isEv = strtolower((string) ($item->category ?? '')) === 'ev';
                    $packageName = (string) ($item->name ?? 'Paket Kemitraan');
                    $selectedPackageMessage = implode("\n", [
                        'Halo OTOBIZ, saya tertarik dengan paket berikut:',
                        '',
                        'Nama Paket: ' . $packageName,
                        'Kategori: ' . ($item->category ?? '-'),
                        'Harga Kemitraan: ' . ($item->partnership_price ?? '-'),
                        '',
                        'Mohon kirimkan detail dan langkah selanjutnya.',
                    ]);
                    $selectedPackageLink = $waBaseUrl . '?text=' . urlencode($selectedPackageMessage);
                    $partnershipLink = $waBaseUrl . '?text=' . urlencode($defaultPartnershipMessage);
                @endphp
                <article class="produk-package-card {{ $isEv ? 'produk-package-card--ev' : 'produk-package-card--conv' }} fade-up {{ $index === 1 ? 'delay-1' : '' }}" data-unit-id="{{ $item->product_unit_id ?? '' }}" data-unit-name="{{ $item->unit->name ?? '' }}">
                    <div class="produk-package-card__top">
                        <span class="produk-package-card__badge {{ $isEv ? 'produk-package-card__badge--ev' : '' }}">{{ $item->badge_text ?? ($isEv ? 'Electric Vehicle' : 'Konvensional') }}</span>
                        @if (!empty($item->is_popular))
                            <span class="produk-package-card__popular">Populer</span>
                        @endif
                    </div>
                    <h3 class="produk-package-card__name">{{ $item->name }}</h3>
                    <p class="produk-package-card__meta">Kategori: {{ $item->category ?? '-' }}</p>

                    <div class="produk-package-card__price-wrap">
                        <p class="produk-package-card__label">Biaya Kemitraan</p>
                        <p class="produk-package-card__price">{{ $item->partnership_price }}</p>
                        <p class="produk-package-card__start">Bergabung mulai dari {{ $item->starting_price }}</p>
                    </div>

                    <ul class="produk-package-card__benefits">
                        @foreach (($item->benefits ?? collect()) as $benefit)
                            <li>{{ $benefit->benefit_text }}</li>
                        @endforeach
                    </ul>

                    <div class="produk-package-card__actions">
                        <a href="{{ $selectedPackageLink }}" class="btn produk-btn produk-btn--primary" target="_blank" rel="noopener">{{ $item->cta_text ?? 'Pilih Paket' }}</a>
                        <a href="{{ $partnershipLink }}" class="btn produk-btn produk-btn--ghost-dark" target="_blank" rel="noopener">Ajukan Kemitraan</a>
                    </div>
                </article>
            @endforeach
        </div>

        <p class="produk-packages__note">{{ $productContent->packages_section_note ?? 'Harga dapat berubah sewaktu-waktu berdasarkan kuota. Syarat & ketentuan berlaku.' }}</p>
    </div>
</section>
