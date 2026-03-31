<section class="produk-specs" id="produk-specs-gallery" aria-labelledby="produk-specs-title">
    @php
        $specsSource = $productSpecsData ?? [
            'confero' => [
                'name' => 'Wuling Confero',
                'specs' => [
                    ['Kategori', 'Konvensional'],
                    ['Jenis Energi', 'Bensin'],
                    ['Kapasitas Penumpang', 'Family / operasional multi-penumpang'],
                    ['Kegunaan Operasional', 'Transportasi online dan B2B'],
                    ['Keunggulan Utama', 'Kabin lega, cocok untuk operasional, nilai kemitraan terjangkau'],
                ],
                'images' => [
                    ['https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?auto=format&fit=crop&w=1400&q=80', 'Wuling Confero tampak depan'],
                    ['https://images.unsplash.com/photo-1549924231-f129b911e442?auto=format&fit=crop&w=1400&q=80', 'Wuling Confero tampak samping'],
                    ['https://images.unsplash.com/photo-1593941707882-a5bac6861d75?auto=format&fit=crop&w=1400&q=80', 'EV untuk operasional OTOBIZ'],
                ],
            ],
        ];
        $specSwitchItems = $units ?? collect();
        $firstSpec = $specsSource[$defaultSpecKey ?? array_key_first($specsSource)] ?? reset($specsSource);
    @endphp
    <div class="container">
        <div class="produk-head fade-up">
            <p class="produk-head__kicker">{{ $productContent->specs_section_kicker ?? 'Detail Unit' }}</p>
            <h2 class="produk-head__title" id="produk-specs-title">{{ $productContent->specs_section_title ?? 'Spesifikasi &amp; Galeri' }}</h2>
            <p class="produk-head__desc">{{ $productContent->specs_section_description ?? 'Bandingkan detail unit berdasarkan kebutuhan operasional bisnis Anda.' }}</p>
        </div>

        <div class="produk-specs__switch" id="produk-spec-switch">
            @forelse ($specSwitchItems as $index => $unit)
                <button type="button" class="produk-switch {{ $index === 0 ? 'is-active' : '' }}" data-unit="{{ $unit->spec_key ?? '' }}">{{ $unit->name }}</button>
            @empty
                <button type="button" class="produk-switch is-active" data-unit="confero">Wuling Confero</button>
            @endforelse
        </div>

        <div class="produk-specs__layout">
            <article class="produk-specs-card fade-up">
                <h3 class="produk-specs-card__name" id="spec-name">{{ $firstSpec['name'] ?? 'Wuling Confero' }}</h3>
                <dl class="produk-specs-list" id="produk-spec-list">
                    @foreach (($firstSpec['specs'] ?? []) as $spec)
                        <div class="produk-specs-list__row"><dt>{{ $spec[0] ?? '' }}</dt><dd>{{ $spec[1] ?? '' }}</dd></div>
                    @endforeach
                </dl>
            </article>

            <article class="produk-gallery fade-up delay-1">
                @php
                    $firstImage = ($firstSpec['images'][0] ?? ['https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?auto=format&fit=crop&w=1400&q=80', 'Preview unit OTOBIZ']);
                @endphp
                <img src="{{ $firstImage[0] }}" alt="{{ $firstImage[1] }}" class="produk-gallery__main" id="produk-gallery-main" />
                <div class="produk-gallery__thumbs" id="produk-gallery-thumbs">
                    @foreach (($firstSpec['images'] ?? []) as $index => $image)
                        <button type="button" class="produk-gallery__thumb {{ $index === 0 ? 'is-active' : '' }}" data-src="{{ $image[0] ?? '' }}" data-alt="{{ $image[1] ?? 'Preview unit OTOBIZ' }}">
                            <img src="{{ $image[0] ?? '' }}" alt="{{ $image[1] ?? 'Preview unit OTOBIZ' }}">
                        </button>
                    @endforeach
                </div>
            </article>
        </div>
    </div>
</section>

<script type="application/json" id="produk-specs-data">@json($specsSource)</script>
<script type="application/json" id="produk-specs-default-key">@json($defaultSpecKey ?? array_key_first($specsSource))</script>
