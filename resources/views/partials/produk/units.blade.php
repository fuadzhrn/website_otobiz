<section class="produk-units" id="produk-units" aria-labelledby="produk-units-title">
    <div class="container">
        <div class="produk-head fade-up">
            <p class="produk-head__kicker">{{ $productContent->units_section_kicker ?? 'Portfolio Kendaraan' }}</p>
            <h2 class="produk-head__title" id="produk-units-title">{{ $productContent->units_section_title ?? 'Daftar Unit' }}</h2>
            <p class="produk-head__desc">{{ $productContent->units_section_description ?? 'Pilih kategori unit untuk melihat opsi kendaraan yang tersedia dalam program kemitraan OTOBIZ.' }}</p>
        </div>

        <div class="produk-units__filters" id="produk-unit-filters">
            <button type="button" class="produk-filter is-active" data-filter="all">Semua</button>
            @foreach (($unitCategories ?? collect()) as $category)
                @php
                    $categorySlug = Illuminate\Support\Str::slug($category);
                @endphp
                <button type="button" class="produk-filter" data-filter="{{ $categorySlug }}">{{ $category }}</button>
            @endforeach
        </div>

        <div class="produk-unit-grid" id="produk-unit-grid">
            @php
                $unitItems = ($units ?? collect())->count() ? $units : collect([
                    (object) [
                        'name' => 'Wuling Confero',
                        'category' => 'Konvensional',
                        'unit_type' => 'MPV',
                        'status' => 'Tersedia',
                        'short_description' => 'Cocok untuk operasional harian dan kebutuhan transportasi online maupun B2B.',
                        'main_image' => 'https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?auto=format&fit=crop&w=1200&q=80',
                        'badge_text' => 'Konvensional',
                    ],
                    (object) [
                        'name' => 'VinFast Limo Green',
                        'category' => 'EV',
                        'unit_type' => 'Electric Mobility',
                        'status' => 'Tersedia',
                        'short_description' => 'Kendaraan listrik modern dengan efisiensi operasional untuk bisnis mobilitas masa kini.',
                        'main_image' => 'https://images.unsplash.com/photo-1593941707882-a5bac6861d75?auto=format&fit=crop&w=1200&q=80',
                        'badge_text' => 'EV',
                    ],
                ]);
            @endphp

            @foreach ($unitItems as $index => $item)
                @php
                    $category = (string) ($item->category ?? '');
                    $categorySlug = Illuminate\Support\Str::slug($category ?: 'lainnya');
                    $isEv = strtolower($category) === 'ev';
                @endphp
                <article class="produk-unit-card fade-up {{ $index === 1 ? 'delay-1' : '' }}" data-category="{{ $categorySlug }}">
                    <img src="{{ $item->main_image }}" alt="{{ $item->name }}" class="produk-unit-card__image" />
                    <div class="produk-unit-card__body">
                        <div class="produk-unit-card__badges">
                            <span class="produk-unit-card__badge {{ $isEv ? 'produk-unit-card__badge--ev' : '' }}">{{ $item->badge_text ?? ($isEv ? 'EV' : 'Konvensional') }}</span>
                            <span class="produk-unit-card__status">{{ $item->status ?? 'Tersedia' }}</span>
                        </div>
                        <h3 class="produk-unit-card__name">{{ $item->name }}</h3>
                        <p class="produk-unit-card__meta">Tipe: {{ $item->unit_type ?? '-' }}</p>
                        <p class="produk-unit-card__desc">{{ $item->short_description ?? '' }}</p>
                        <a href="#produk-specs-gallery" class="produk-unit-card__link">Lihat Detail</a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
