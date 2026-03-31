<section class="flow-section" id="alur-kemitraan" aria-labelledby="alur-title">
    <div class="container">
        <div class="mekanisme-head fade-up">
            <p class="mekanisme-head__kicker">{{ $mekanismeContent->flow_section_kicker ?? 'Proses Kemitraan' }}</p>
            <h2 class="mekanisme-head__title" id="alur-title">{{ $mekanismeContent->flow_section_title ?? 'Alur Kemitraan' }}</h2>
            <p class="mekanisme-head__desc">{{ $mekanismeContent->flow_section_description ?? 'Setiap tahap disusun agar mitra memahami perjalanan kemitraan dari awal hingga pembagian hasil.' }}</p>
        </div>

        <div class="flow-timeline" id="flow-timeline">
            @forelse (($flowSteps ?? collect()) as $step)
                <article class="flow-step" data-step="{{ $loop->iteration }}">
                    <span class="flow-step__number">{{ str_pad((string) ($loop->iteration), 2, '0', STR_PAD_LEFT) }}</span>
                    <h3 class="flow-step__title">{{ $step->title }}</h3>
                    <ul class="flow-step__list">
                        @foreach ($step->points as $point)
                            <li>{{ $point->point_text }}</li>
                        @endforeach
                    </ul>
                </article>
            @empty
                <article class="flow-step" data-step="1">
                    <span class="flow-step__number">01</span>
                    <h3 class="flow-step__title">Pendaftaran</h3>
                    <ul class="flow-step__list">
                        <li>Konsultasi dan penjelasan program</li>
                    </ul>
                </article>
            @endforelse
        </div>

        <aside class="flow-note fade-up">
            {{ $mekanismeContent->flow_note_text ?? 'Mekanisme ini dirancang agar mitra dapat memiliki aset kendaraan produktif melalui sistem yang terkelola, transparan, dan berorientasi jangka panjang.' }}
        </aside>
    </div>
</section>
