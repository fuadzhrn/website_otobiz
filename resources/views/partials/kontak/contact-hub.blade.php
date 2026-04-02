<section class="contact-hub-section" id="contact-hub" aria-labelledby="contact-hub-title">
    @php
        $fieldMap = [
            'full_name' => ['id' => 'kontak-nama', 'name' => 'full_name', 'validate' => null, 'full' => false],
            'email' => ['id' => 'kontak-email', 'name' => 'email', 'validate' => 'email', 'full' => false],
            'whatsapp' => ['id' => 'kontak-whatsapp', 'name' => 'whatsapp', 'validate' => 'whatsapp', 'full' => false],
            'subject' => ['id' => 'kontak-subjek', 'name' => 'subject', 'validate' => null, 'full' => false],
            'inquiry_type' => ['id' => 'kontak-jenis', 'name' => 'inquiry_type', 'validate' => null, 'full' => true],
            'message' => ['id' => 'kontak-pesan', 'name' => 'message', 'validate' => null, 'full' => true],
        ];

        $resolvedFormFields = ($formFields ?? collect())->count()
            ? $formFields
            : collect([
                (object) ['field_key' => 'full_name', 'label' => 'Nama Lengkap', 'field_type' => 'text', 'placeholder' => null, 'options_json' => null, 'is_required' => true],
                (object) ['field_key' => 'email', 'label' => 'Email', 'field_type' => 'email', 'placeholder' => null, 'options_json' => null, 'is_required' => true],
                (object) ['field_key' => 'whatsapp', 'label' => 'Nomor WhatsApp', 'field_type' => 'tel', 'placeholder' => null, 'options_json' => null, 'is_required' => true],
                (object) ['field_key' => 'subject', 'label' => 'Subjek / Keperluan', 'field_type' => 'text', 'placeholder' => null, 'options_json' => null, 'is_required' => true],
                (object) ['field_key' => 'inquiry_type', 'label' => 'Jenis Pertanyaan', 'field_type' => 'select', 'placeholder' => 'Pilih Jenis Pertanyaan', 'options_json' => [['value' => 'informasi-umum', 'label' => 'Informasi Umum'], ['value' => 'konsultasi-kemitraan', 'label' => 'Konsultasi Kemitraan'], ['value' => 'dukungan-pelanggan', 'label' => 'Dukungan Pelanggan'], ['value' => 'kerja-sama-lainnya', 'label' => 'Kerja Sama / Lainnya']], 'is_required' => true],
                (object) ['field_key' => 'message', 'label' => 'Pesan', 'field_type' => 'textarea', 'placeholder' => null, 'options_json' => null, 'is_required' => true],
            ]);

        $resolvedLocations = ($locations ?? collect())->count()
            ? $locations
            : collect([
                (object) ['location_type' => 'ho', 'title' => 'Head Office', 'address' => "Werkspace, Soho Capital, Lt.19 - D2\nJl. Let. S. Parman Kav 28, Tanjung Duren Selatan, Jakarta Barat, Indonesia 11470", 'icon' => 'bi bi-building', 'button_text' => 'Lihat Lokasi', 'button_link' => '#'],
                (object) ['location_type' => 'pool', 'title' => 'Pool Operasional', 'address' => 'Informasi lokasi pool akan disesuaikan berdasarkan kebutuhan operasional dan wilayah layanan.', 'icon' => 'bi bi-pin-map', 'button_text' => 'Hubungi Admin Lokasi', 'button_link' => '#'],
            ]);

        $resolvedSupportCards = ($supportCards ?? collect())->count()
            ? $supportCards
            : collect([
                (object) ['title' => 'WhatsApp Support', 'contact_value' => '+62 8xx-xxxx-xxxx', 'button_text' => 'Chat Sekarang', 'button_link' => '#', 'icon' => 'bi bi-whatsapp'],
                (object) ['title' => 'Email Assistance', 'contact_value' => 'hello@otobiz.co.id', 'button_text' => 'Kirim Email', 'button_link' => '#', 'icon' => 'bi bi-envelope'],
                (object) ['title' => 'Jam Layanan / Sales Consultation', 'contact_value' => 'Senin-Jumat, 09.00-17.00', 'button_text' => 'Jadwalkan Konsultasi', 'button_link' => '#', 'icon' => 'bi bi-clock'],
            ]);

        $resolvedHighlights = ($supportHighlights ?? collect())->count()
            ? $supportHighlights
            : collect([(object) ['description' => 'Konsultasi awal dan pertanyaan program ditangani secara profesional untuk membantu Anda memilih jalur komunikasi yang paling tepat.']]);

        $highlightText = $resolvedHighlights
            ->pluck('description')
            ->filter()
            ->implode(' ');

        $locationRows = $resolvedLocations->whereIn('location_type', ['ho', 'pool'])->values();
        $firstLocation = $locationRows->get(0);
        $secondLocation = $locationRows->get(1);
    @endphp
    <div class="container">
        <h2 class="sr-only" id="contact-hub-title">Pusat Kontak dan Support OTOBIZ</h2>

        <div class="contact-hub-grid">
            <div class="contact-hub-main fade-up">
                <article class="kontak-form-card" id="contact-form">
                    <div class="kontak-form-card__head">
                        <p class="kontak-form-card__kicker">Hubungi Kami</p>
                        <h3 class="kontak-form-card__title">{{ $contactContent->contact_form_title ?? 'Form Kontak' }}</h3>
                        <p class="kontak-form-card__desc">
                            {{ $contactContent->contact_form_description ?? 'Sampaikan kebutuhan, pertanyaan, atau tujuan konsultasi Anda. Tim OTOBIZ akan membantu mengarahkan ke layanan yang paling sesuai.' }}
                        </p>
                    </div>

                    <form id="kontak-form" novalidate>
                        <div class="kontak-form-grid">
                            @foreach ($resolvedFormFields as $field)
                                @php
                                    $map = $fieldMap[$field->field_key] ?? [
                                        'id' => 'contact-' . Illuminate\Support\Str::slug((string) $field->field_key),
                                        'name' => Illuminate\Support\Str::snake((string) $field->field_key),
                                        'validate' => null,
                                        'full' => false,
                                    ];
                                    $wrapperClass = 'kontak-field' . (!empty($map['full']) ? ' kontak-field--full' : '');
                                    $fieldType = strtolower((string) ($field->field_type ?? 'text'));
                                    $required = !empty($field->is_required);
                                @endphp

                                <label class="{{ $wrapperClass }}">
                                    <span>{{ $field->label }} @if ($required)<em>*</em>@endif</span>
                                    @if ($fieldType === 'select')
                                        <select id="{{ $map['id'] }}" data-field-key="{{ $field->field_key }}" @if ($map['validate']) data-validate="{{ $map['validate'] }}" @endif @if ($required) required @endif>
                                            <option value="">{{ $field->placeholder ?: 'Pilih Opsi' }}</option>
                                            @foreach ((array) ($field->options_json ?? []) as $option)
                                                <option value="{{ $option['value'] ?? '' }}">{{ $option['label'] ?? '' }}</option>
                                            @endforeach
                                        </select>
                                    @elseif ($fieldType === 'textarea')
                                        <textarea id="{{ $map['id'] }}" rows="5" data-field-key="{{ $field->field_key }}" @if ($map['validate']) data-validate="{{ $map['validate'] }}" @endif placeholder="{{ $field->placeholder ?? '' }}" @if ($required) required @endif></textarea>
                                    @else
                                        <input type="{{ in_array($fieldType, ['text', 'email', 'tel'], true) ? $fieldType : 'text' }}" id="{{ $map['id'] }}" data-field-key="{{ $field->field_key }}" @if ($map['validate']) data-validate="{{ $map['validate'] }}" @endif placeholder="{{ $field->placeholder ?? '' }}" @if ($required) required @endif>
                                    @endif
                                    <small class="kontak-error"></small>
                                </label>
                            @endforeach
                        </div>

                        <label class="kontak-checkbox">
                            <input type="checkbox" id="kontak-persetujuan" required>
                            <span>{{ $contactContent->contact_form_checkbox_text ?? 'Saya bersedia dihubungi oleh tim OTOBIZ terkait pesan yang saya kirimkan.' }}</span>
                        </label>
                        <small class="kontak-error kontak-error--checkbox"></small>

                        <button type="submit" class="btn kontak-btn kontak-btn--primary">{{ $contactContent->contact_form_submit_text ?? 'Kirim Pesan' }}</button>
                        <p class="kontak-success" id="kontak-success" role="status" aria-live="polite"></p>
                    </form>
                </article>
            </div>

            <aside class="contact-hub-side fade-up delay-1">
                <article class="lokasi-card">
                    <h3 class="lokasi-card__title">{{ $contactContent->locations_section_title ?? 'Alamat HO & Pool' }}</h3>

                    @foreach ($resolvedLocations->whereIn('location_type', ['ho', 'pool']) as $location)
                        <div class="lokasi-block">
                            <div class="lokasi-block__label"><i class="{{ $location->icon ?: 'bi bi-geo-alt' }}"></i><span>{{ $location->title }}</span></div>
                            @foreach (preg_split('/\r\n|\r|\n/', (string) ($location->address ?? '')) as $line)
                                @if (trim($line) !== '')
                                    <p>{{ $line }}</p>
                                @endif
                            @endforeach
                            @if (!empty($location->description))
                                <p>{{ $location->description }}</p>
                            @endif
                        </div>
                    @endforeach

                    <div class="lokasi-map-placeholder">
                        <i class="bi bi-map"></i>
                        <span>Preview Lokasi</span>
                    </div>

                    <div class="lokasi-card__actions">
                        <a href="{{ $firstLocation->button_link ?? '#' }}" class="btn kontak-btn kontak-btn--ghost">{{ $firstLocation->button_text ?? 'Lihat Lokasi' }}</a>
                        <a href="{{ $secondLocation->button_link ?? '#' }}" class="btn kontak-btn kontak-btn--ghost">{{ $secondLocation->button_text ?? 'Hubungi Admin Lokasi' }}</a>
                    </div>
                </article>

                <article class="support-card-wrap">
                    <h3 class="support-card-wrap__title">{{ $contactContent->support_section_title ?? 'Customer Support' }}</h3>
                    <p class="support-card-wrap__desc">
                        {{ $contactContent->support_section_description ?? 'Tim support OTOBIZ siap membantu kebutuhan informasi, tindak lanjut komunikasi, dan dukungan awal untuk calon mitra maupun pelanggan.' }}
                    </p>

                    <div class="support-card-list">
                        @foreach ($resolvedSupportCards as $card)
                            <article class="support-card">
                                <i class="{{ $card->icon ?: 'bi bi-headset' }}"></i>
                                <div>
                                    <h4>{{ $card->title }}</h4>
                                    <p>{{ $card->contact_value }}</p>
                                </div>
                                <a href="{{ $card->button_link ?: '#' }}" class="support-card__link">{{ $card->button_text ?: 'Hubungi' }}</a>
                            </article>
                        @endforeach
                    </div>

                    <div class="support-info-box">
                        <p>{{ $highlightText ?: ($contactContent->support_highlight_text ?? 'Konsultasi awal dan pertanyaan program ditangani secara profesional untuk membantu Anda memilih jalur komunikasi yang paling tepat.') }}</p>
                    </div>
                </article>
            </aside>
        </div>
    </div>
</section>
