<section class="gabung-form-section" id="gabung-form" aria-labelledby="gabung-form-title">
    @php
        $fieldMap = [
            'full_name' => ['id' => 'nama-lengkap', 'name' => 'nama_lengkap', 'validate' => null, 'full' => false],
            'whatsapp' => ['id' => 'nomor-whatsapp', 'name' => 'nomor_whatsapp', 'validate' => 'whatsapp', 'full' => false],
            'email' => ['id' => 'email', 'name' => 'email', 'validate' => 'email', 'full' => false],
            'city' => ['id' => 'kota', 'name' => 'kota', 'validate' => null, 'full' => false],
            'job' => ['id' => 'pekerjaan', 'name' => 'pekerjaan', 'validate' => null, 'full' => false],
            'program_interest' => ['id' => 'minat-program', 'name' => 'minat_program', 'validate' => null, 'full' => false],
            'initial_budget' => ['id' => 'budget-awal', 'name' => 'budget_awal', 'validate' => null, 'full' => false],
            'message' => ['id' => 'pesan', 'name' => 'pesan', 'validate' => null, 'full' => true],
        ];

        $resolvedFormFields = ($formFields ?? collect())->count()
            ? $formFields
            : collect([
                (object) ['field_key' => 'full_name', 'label' => 'Nama Lengkap', 'field_type' => 'text', 'placeholder' => null, 'options_json' => null, 'is_required' => true],
                (object) ['field_key' => 'whatsapp', 'label' => 'Nomor WhatsApp', 'field_type' => 'tel', 'placeholder' => null, 'options_json' => null, 'is_required' => true],
                (object) ['field_key' => 'email', 'label' => 'Email', 'field_type' => 'email', 'placeholder' => null, 'options_json' => null, 'is_required' => true],
                (object) ['field_key' => 'city', 'label' => 'Kota / Domisili', 'field_type' => 'text', 'placeholder' => null, 'options_json' => null, 'is_required' => true],
                (object) ['field_key' => 'job', 'label' => 'Pekerjaan', 'field_type' => 'text', 'placeholder' => null, 'options_json' => null, 'is_required' => true],
                (object) ['field_key' => 'program_interest', 'label' => 'Minat Program', 'field_type' => 'select', 'placeholder' => 'Pilih Minat Program', 'options_json' => [['value' => 'konvensional', 'label' => 'Konvensional'], ['value' => 'ev', 'label' => 'EV'], ['value' => 'belum-menentukan', 'label' => 'Belum Menentukan']], 'is_required' => true],
                (object) ['field_key' => 'initial_budget', 'label' => 'Budget Awal / Rencana Bergabung', 'field_type' => 'text', 'placeholder' => null, 'options_json' => null, 'is_required' => true],
                (object) ['field_key' => 'message', 'label' => 'Pesan atau Pertanyaan Tambahan', 'field_type' => 'textarea', 'placeholder' => 'Tulis kebutuhan atau pertanyaan Anda...', 'options_json' => null, 'is_required' => false],
            ]);
    @endphp
    <div class="container">
        <div class="gabung-head fade-up">
            <p class="gabung-head__kicker">Pendaftaran Mitra</p>
            <h2 class="gabung-head__title" id="gabung-form-title">{{ $joinContent->registration_section_title ?? 'Form Pendaftaran' }}</h2>
            <p class="gabung-head__desc">{{ $joinContent->registration_section_description ?? 'Lengkapi data Anda untuk memulai proses konsultasi dan pendaftaran kemitraan bersama OTOBIZ.' }}</p>
        </div>

        <div class="gabung-form-card fade-up delay-1">
            <form id="gabung-registration-form" novalidate>
                <div class="gabung-form-grid">
                    @foreach ($resolvedFormFields as $field)
                        @php
                            $map = $fieldMap[$field->field_key] ?? [
                                'id' => 'field-' . Illuminate\Support\Str::slug((string) $field->field_key),
                                'name' => Illuminate\Support\Str::snake((string) $field->field_key),
                                'validate' => null,
                                'full' => false,
                            ];
                            $wrapperClass = 'gabung-field' . (!empty($map['full']) ? ' gabung-field--full' : '');
                            $isRequired = !empty($field->is_required);
                            $fieldType = strtolower((string) ($field->field_type ?? 'text'));
                        @endphp
                        <label class="{{ $wrapperClass }}">
                            <span>{{ $field->label }} @if ($isRequired)<em>*</em>@endif</span>

                            @if ($fieldType === 'select')
                                <select
                                    id="{{ $map['id'] }}"
                                    name="{{ $map['name'] }}"
                                    data-field-key="{{ $field->field_key }}"
                                    @if ($map['validate']) data-validate="{{ $map['validate'] }}" @endif
                                    @if ($isRequired) required @endif
                                >
                                    <option value="">{{ $field->placeholder ?: 'Pilih Opsi' }}</option>
                                    @foreach ((array) ($field->options_json ?? []) as $option)
                                        <option value="{{ $option['value'] ?? '' }}">{{ $option['label'] ?? '' }}</option>
                                    @endforeach
                                </select>
                            @elseif ($fieldType === 'textarea')
                                <textarea
                                    id="{{ $map['id'] }}"
                                    name="{{ $map['name'] }}"
                                    rows="4"
                                    data-field-key="{{ $field->field_key }}"
                                    @if ($map['validate']) data-validate="{{ $map['validate'] }}" @endif
                                    placeholder="{{ $field->placeholder ?? '' }}"
                                    @if ($isRequired) required @endif
                                ></textarea>
                            @else
                                <input
                                    type="{{ in_array($fieldType, ['text', 'email', 'tel'], true) ? $fieldType : 'text' }}"
                                    id="{{ $map['id'] }}"
                                    name="{{ $map['name'] }}"
                                    data-field-key="{{ $field->field_key }}"
                                    @if ($map['validate']) data-validate="{{ $map['validate'] }}" @endif
                                    placeholder="{{ $field->placeholder ?? '' }}"
                                    @if ($isRequired) required @endif
                                >
                            @endif

                            <small class="gabung-error"></small>
                        </label>
                    @endforeach
                </div>

                <label class="gabung-checkbox">
                    <input type="checkbox" id="persetujuan" name="persetujuan" required>
                    <span>{{ $joinContent->registration_checkbox_text ?? 'Saya setuju untuk dihubungi oleh tim OTOBIZ terkait konsultasi dan proses kemitraan.' }}</span>
                </label>
                <small class="gabung-error gabung-error--checkbox"></small>

                <div class="gabung-form-actions">
                    <button type="submit" class="btn gabung-btn gabung-btn--primary">Kirim Pendaftaran</button>
                </div>

                <p class="gabung-form-note">{{ $joinContent->registration_form_note ?? 'Data Anda akan diproses oleh tim OTOBIZ untuk tahap konsultasi awal.' }}</p>
                <p class="gabung-success" id="gabung-success-message" role="status" aria-live="polite"></p>
            </form>
        </div>
    </div>
</section>
