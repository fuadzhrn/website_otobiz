<section class="selection-section" id="gabung-selection" aria-labelledby="selection-title">
    @php
        $resolvedSteps = ($selectionSteps ?? collect())->count()
            ? $selectionSteps
            : collect([
                (object) ['title' => 'Pengajuan Masuk', 'description' => 'Data pendaftaran diterima oleh tim OTOBIZ dan ditinjau sebagai asesmen awal calon mitra.'],
                (object) ['title' => 'Konsultasi & Verifikasi', 'description' => 'Tim menghubungi calon mitra untuk menjelaskan program yang sesuai serta memverifikasi kebutuhan awal.'],
                (object) ['title' => 'Persetujuan Program', 'description' => 'Calon mitra memilih program yang tepat dan menyelaraskan skema dengan kesiapan administrasi.'],
                (object) ['title' => 'Masuk ke Tahap Onboarding', 'description' => 'Proses administrasi lanjutan dimulai untuk implementasi kemitraan secara terarah.'],
            ]);
    @endphp
    <div class="container">
        <div class="gabung-head fade-up">
            <p class="gabung-head__kicker">Tahapan Setelah Mendaftar</p>
            <h2 class="gabung-head__title" id="selection-title">{{ $joinContent->selection_section_title ?? 'Proses Seleksi' }}</h2>
        </div>

        <div class="selection-steps" id="selection-steps">
            @foreach ($resolvedSteps as $index => $step)
                @php
                    $pointsText = '';
                    if (!empty($step->points) && count($step->points)) {
                        $pointsText = collect($step->points)
                            ->pluck('point_text')
                            ->filter()
                            ->implode(' ');
                    }
                @endphp
                <article class="selection-step" data-step="{{ $index + 1 }}">
                    <span class="selection-step__number">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span>
                    <h3 class="selection-step__title">{{ $step->title }}</h3>
                    <p class="selection-step__text">{{ $step->description ?: $pointsText }}</p>
                </article>
            @endforeach
        </div>

        <p class="selection-note fade-up">
            {{ $joinContent->selection_section_note ?? 'Setiap tahapan dirancang agar calon mitra memahami program dengan jelas sebelum melanjutkan ke proses kemitraan secara penuh.' }}
        </p>
    </div>
</section>
