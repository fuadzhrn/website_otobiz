<section class="about-intro" id="tentang-kami" aria-labelledby="about-title">
    <div class="container">
        <div class="about-intro__grid">
            <div class="about-intro__content fade-up">
                <p class="about-intro__kicker">{{ $aboutContent->intro_kicker ?? 'Tentang OTOBIZ' }}</p>
                <h1 class="about-intro__title" id="about-title">{{ $aboutContent->intro_section_title ?? 'Membangun Aset Produktif Melalui Kemitraan Kendaraan' }}</h1>
                <p class="about-intro__description">
                    {{ $aboutContent->intro_description ?? 'OTOBIZ adalah program kemitraan kepemilikan kendaraan yang dirancang untuk membantu masyarakat memiliki aset mobil produktif melalui sistem operasional profesional. Kami percaya bahwa setiap individu berhak memiliki aset berkualitas dengan skema yang transparan, terstruktur, dan berkelanjutan.' }}
                </p>
                <p class="about-intro__subtext">
                    {{ $aboutContent->intro_subtext ?? 'Dengan pengalaman dalam industri otomotif dan manajemen aset, OTOBIZ hadir untuk membangun ekosistem kemitraan yang saling menguntungkan bagi semua pihak.' }}
                </p>
            </div>

            <div class="about-intro__image fade-up delay-1">
                <div class="about-intro__image-placeholder">
                    <img src="{{ asset('assets/images/VF-e34-Samping-Putih.png') }}" alt="VinFast VF e34 samping putih" />
                </div>
            </div>
        </div>
    </div>
</section>
