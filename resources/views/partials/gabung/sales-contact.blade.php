<section class="sales-contact-section" id="gabung-sales" aria-labelledby="sales-contact-title">
    @php
        $resolvedContacts = ($salesContacts ?? collect())->count()
            ? $salesContacts
            : collect([
                (object) ['title' => 'Sales Consultation', 'description' => 'Diskusi langsung terkait pilihan paket, skema, dan target aset Anda.', 'icon' => 'bi bi-people', 'contact_label' => 'Jam layanan', 'contact_value' => 'Senin-Jumat, 09.00-17.00', 'button_text' => 'Jadwalkan Konsultasi', 'button_link' => '#'],
                (object) ['title' => 'WhatsApp Support', 'description' => 'Dapatkan respons cepat untuk pertanyaan awal seputar proses bergabung.', 'icon' => 'bi bi-whatsapp', 'contact_label' => 'WhatsApp', 'contact_value' => '+62 8xx-xxxx-xxxx', 'button_text' => 'Hubungi Sekarang', 'button_link' => '#'],
                (object) ['title' => 'Email Assistance', 'description' => 'Kirim kebutuhan Anda dan tim OTOBIZ akan membantu dengan rekomendasi program.', 'icon' => 'bi bi-envelope', 'contact_label' => 'Email', 'contact_value' => 'hello@otobiz.co.id', 'button_text' => 'Kirim Pesan', 'button_link' => '#'],
            ]);

        $resolvedHighlights = ($salesHighlights ?? collect())->count()
            ? $salesHighlights
            : collect([
                (object) ['title' => null, 'description' => 'Konsultasi awal terkait kebutuhan kemitraan'],
                (object) ['title' => null, 'description' => 'Penjelasan program secara bertahap dan transparan'],
                (object) ['title' => null, 'description' => 'Bantuan memilih paket sesuai profil calon mitra'],
                (object) ['title' => null, 'description' => 'Informasi lengkap tentang proses bergabung'],
            ]);
    @endphp
    <div class="container">
        <div class="gabung-head fade-up">
            <p class="gabung-head__kicker">Bicara Dengan Tim Kami</p>
            <h2 class="gabung-head__title" id="sales-contact-title">{{ $joinContent->sales_section_title ?? 'Kontak Sales / Konsultasi' }}</h2>
            <p class="gabung-head__desc">{{ $joinContent->sales_section_description ?? 'Butuh penjelasan lebih lanjut sebelum mendaftar? Tim OTOBIZ siap membantu Anda memahami program, pilihan unit, dan skema kemitraan yang sesuai.' }}</p>
        </div>

        <div class="sales-contact-grid">
            @foreach ($resolvedContacts as $index => $contact)
                <article class="sales-contact-card fade-up {{ $index === 1 ? 'delay-1' : ($index === 2 ? 'delay-2' : '') }}">
                    <i class="{{ $contact->icon ?: 'bi bi-telephone' }} sales-contact-card__icon"></i>
                    <h3 class="sales-contact-card__title">{{ $contact->title }}</h3>
                    <p class="sales-contact-card__text">{{ $contact->description }}</p>
                    <p class="sales-contact-card__meta">{{ $contact->contact_label }}: {{ $contact->contact_value }}</p>
                    <a href="{{ $contact->button_link ?: '#' }}" class="btn gabung-btn gabung-btn--ghost-dark">{{ $contact->button_text ?: 'Hubungi' }}</a>
                </article>
            @endforeach
        </div>

        <aside class="sales-contact-info fade-up">
            <h3>Dukungan Awal untuk Calon Mitra</h3>
            <ul>
                @foreach ($resolvedHighlights as $highlight)
                    <li>{{ $highlight->description ?: $highlight->title }}</li>
                @endforeach
            </ul>
        </aside>
    </div>
</section>
