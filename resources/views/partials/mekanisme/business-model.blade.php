<section class="business-model-section" id="model-bisnis" aria-labelledby="model-bisnis-title">
    <div class="container">
        <div class="mekanisme-head fade-up">
            <p class="mekanisme-head__kicker">{{ $mekanismeContent->business_section_kicker ?? 'Fondasi Mekanisme' }}</p>
            <h2 class="mekanisme-head__title" id="model-bisnis-title">{{ $mekanismeContent->business_section_title ?? 'Model Bisnis Kemitraan' }}</h2>
            <p class="mekanisme-head__desc">
                {{ $mekanismeContent->business_section_description ?? 'Mekanisme inti OTOBIZ dirancang agar mitra memahami alur kepemilikan aset, pembagian hasil, dan peran setiap pihak secara jelas.' }}
            </p>
        </div>

        <div class="model-card-grid">
            @php
                $modelClass = [
                    'ownership' => 'model-card--green',
                    'profit_sharing' => 'model-card--orange',
                    'roles' => 'model-card--dark',
                ];
            @endphp
            @forelse (($businessModels ?? collect()) as $model)
                <article class="model-card {{ $modelClass[$model->item_type] ?? 'model-card--green' }} fade-up {{ $loop->index > 0 ? 'delay-' . $loop->index : '' }}">
                    <div class="model-card__icon"><i class="{{ $model->icon ?? 'bi bi-circle' }}"></i></div>
                    <h3 class="model-card__title">{{ $model->title }}</h3>
                    <p class="model-card__text">{{ $model->description }}</p>

                    @if (($model->item_type ?? null) === 'roles')
                        @php
                            $otobizPoints = $model->points->filter(fn($point) => \Illuminate\Support\Str::startsWith($point->point_text, 'otobiz|'));
                            $mitraPoints = $model->points->filter(fn($point) => \Illuminate\Support\Str::startsWith($point->point_text, 'mitra|'));
                        @endphp
                        <div class="role-split">
                            <div class="role-split__col">
                                <h4 class="role-split__title">Peran OTOBIZ</h4>
                                <ul class="model-card__list">
                                    @foreach ($otobizPoints as $point)
                                        <li>{{ str_replace('otobiz|', '', $point->point_text) }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="role-split__col">
                                <h4 class="role-split__title">Peran Mitra</h4>
                                <ul class="model-card__list">
                                    @foreach ($mitraPoints as $point)
                                        <li>{{ str_replace('mitra|', '', $point->point_text) }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @else
                        <ul class="model-card__list">
                            @foreach ($model->points as $point)
                                <li>{{ $point->point_text }}</li>
                            @endforeach
                        </ul>
                        @if (($model->item_type ?? null) === 'profit_sharing')
                            <p class="model-card__note">Catatan: ilustrasi hasil bergantung pada performa aktual operasional.</p>
                        @endif
                    @endif
                </article>
            @empty
                <article class="model-card model-card--green fade-up">
                    <div class="model-card__icon"><i class="bi bi-diagram-3"></i></div>
                    <h3 class="model-card__title">Skema Kepemilikan</h3>
                    <p class="model-card__text">Skema bertahap untuk membangun kepemilikan kendaraan produktif melalui operasional nyata.</p>
                </article>
            @endforelse
        </div>
    </div>
</section>
