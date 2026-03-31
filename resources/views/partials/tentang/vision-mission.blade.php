<section class="vision-mission" id="visi-misi" aria-labelledby="vm-title">
    <div class="container">
        <div class="section-head fade-up">
            <h2 class="section-title" id="vm-title">{{ $aboutContent->vision_section_title ?? 'Visi & Misi' }}</h2>
            <p class="section-subtitle">{{ $aboutContent->vision_section_subtitle ?? 'Arah dan komitmen OTOBIZ untuk masa depan' }}</p>
        </div>

        <div class="vision-mission__grid">
            <article class="vision-card fade-up">
                <div class="vision-card__header">
                    <i class="bi bi-binoculars vision-card__icon"></i>
                    <h3 class="vision-card__title">{{ $aboutContent->vision_title ?? 'Visi Kami' }}</h3>
                </div>
                <p class="vision-card__content">
                    {{ $aboutContent->vision_description ?? 'Menjadi perusahaan kemitraan kepemilikan kendaraan berbasis operasional nyata yang membangun sistem aset produktif di Indonesia, dan berorientasi jangka panjang.' }}
                </p>
            </article>

            <article class="mission-card fade-up delay-1">
                <div class="mission-card__header">
                    <i class="bi bi-bullseye mission-card__icon"></i>
                    <h3 class="mission-card__title">{{ $aboutContent->mission_section_title ?? 'Misi Kami' }}</h3>
                </div>
                <div class="mission-card__list">
                    @forelse (($missions ?? collect()) as $mission)
                        <div class="mission-item fade-up delay-{{ $loop->index + 2 }}">
                            <span class="mission-item__number">{{ str_pad((string) ($loop->iteration), 2, '0', STR_PAD_LEFT) }}</span>
                            <p class="mission-item__text">{{ $mission->description }}</p>
                        </div>
                    @empty
                        <div class="mission-item fade-up delay-2">
                            <span class="mission-item__number">01</span>
                            <p class="mission-item__text">Mengelola kendaraan mitra secara profesional dan terstruktur</p>
                        </div>
                    @endforelse
                </div>
            </article>
        </div>
    </div>
</section>
