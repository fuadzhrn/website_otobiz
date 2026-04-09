<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Gabung Mitra - OTOBIZ Admin</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('assets/images/logo_otobiz.jpeg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/css/admin-gabung.css') }}">
</head>
<body>
<div class="admin-gabung-wrap">
    <header class="page-head">
        <div>
            <div class="breadcrumb">Admin / Gabung Mitra</div>
            <h1 class="page-title">Edit Gabung Mitra</h1>
        </div>
        <div class="page-actions">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline">Kembali ke Dashboard</a>
            <a href="{{ route('gabung') }}" class="btn btn-accent" target="_blank" rel="noopener">Lihat Halaman</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline">Logout</button>
            </form>
        </div>
    </header>

    @if (session('success'))
        <div class="flash flash-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="flash flash-error">
            <strong>Periksa input berikut:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="section-card">
        <div class="section-head">
            <h2 class="section-title">1. Konten Utama Gabung Mitra</h2>
            <p class="section-subtitle">Konten ini langsung dipakai di halaman user Gabung Mitra, termasuk gambar hero.</p>
        </div>
        <div class="section-body">
            <form method="POST" action="{{ route('admin.gabung.update') }}" class="stack-form" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-grid">
                    <div class="form-group"><label>Hero Badge One</label><input type="text" name="hero_badge_one" value="{{ old('hero_badge_one', $joinContent->hero_badge_one) }}"></div>
                    <div class="form-group"><label>Hero Badge Two</label><input type="text" name="hero_badge_two" value="{{ old('hero_badge_two', $joinContent->hero_badge_two) }}"></div>
                    <div class="form-group"><label>Hero Badge Three</label><input type="text" name="hero_badge_three" value="{{ old('hero_badge_three', $joinContent->hero_badge_three) }}"></div>
                    <div class="form-group full"><label>Hero Title</label><input type="text" name="hero_title" required value="{{ old('hero_title', $joinContent->hero_title) }}"></div>
                    <div class="form-group full"><label>Hero Description</label><textarea name="hero_description" required>{{ old('hero_description', $joinContent->hero_description) }}</textarea></div>
                    <div class="form-group full">
                        <label>Hero Image (opsional)</label>
                        <input type="file" name="hero_image" accept="image/png,image/jpeg,image/webp">
                        @if (!empty($joinContent->hero_image))
                            @php
                                $heroImagePreview = Illuminate\Support\Str::startsWith($joinContent->hero_image, ['http://', 'https://', '/'])
                                    ? $joinContent->hero_image
                                    : Storage::url($joinContent->hero_image);
                            @endphp
                            <p style="margin-top:8px;margin-bottom:8px;font-size:0.88rem;color:#5a5f68;">Preview gambar hero saat ini:</p>
                            <img src="{{ $heroImagePreview }}" alt="Preview Hero Gabung" class="image-preview">
                            <label class="checkbox-label" style="margin-top:10px;"><input type="checkbox" name="remove_hero_image" value="1"> Hapus gambar hero saat ini</label>
                        @endif
                    </div>
                    <div class="form-group"><label>Hero Primary Button Text</label><input type="text" name="hero_primary_button_text" value="{{ old('hero_primary_button_text', $joinContent->hero_primary_button_text) }}"></div>
                    <div class="form-group"><label>Hero Primary Button Link</label><input type="text" name="hero_primary_button_link" value="{{ old('hero_primary_button_link', $joinContent->hero_primary_button_link) }}"></div>
                    <div class="form-group"><label>Hero Secondary Button Text</label><input type="text" name="hero_secondary_button_text" value="{{ old('hero_secondary_button_text', $joinContent->hero_secondary_button_text) }}"></div>
                    <div class="form-group"><label>Hero Secondary Button Link</label><input type="text" name="hero_secondary_button_link" value="{{ old('hero_secondary_button_link', $joinContent->hero_secondary_button_link) }}"></div>

                    <div class="form-group"><label>Registration Section Title</label><input type="text" name="registration_section_title" required value="{{ old('registration_section_title', $joinContent->registration_section_title) }}"></div>
                    <div class="form-group full"><label>Registration Section Description</label><textarea name="registration_section_description" required>{{ old('registration_section_description', $joinContent->registration_section_description) }}</textarea></div>
                    <div class="form-group full"><label>Registration Form Note</label><textarea name="registration_form_note">{{ old('registration_form_note', $joinContent->registration_form_note) }}</textarea></div>

                    <div class="form-group"><label>Selection Section Title</label><input type="text" name="selection_section_title" required value="{{ old('selection_section_title', $joinContent->selection_section_title) }}"></div>
                    <div class="form-group full"><label>Selection Section Description</label><textarea name="selection_section_description">{{ old('selection_section_description', $joinContent->selection_section_description) }}</textarea></div>

                    <div class="form-group"><label>Sales Section Title</label><input type="text" name="sales_section_title" required value="{{ old('sales_section_title', $joinContent->sales_section_title) }}"></div>
                    <div class="form-group full"><label>Sales Section Description</label><textarea name="sales_section_description" required>{{ old('sales_section_description', $joinContent->sales_section_description) }}</textarea></div>

                    <div class="form-group full"><label>CTA Title</label><input type="text" name="cta_title" required value="{{ old('cta_title', $joinContent->cta_title) }}"></div>
                    <div class="form-group full"><label>CTA Description</label><textarea name="cta_description" required>{{ old('cta_description', $joinContent->cta_description) }}</textarea></div>
                    <div class="form-group"><label>CTA Primary Button Text</label><input type="text" name="cta_primary_button_text" value="{{ old('cta_primary_button_text', $joinContent->cta_primary_button_text) }}"></div>
                    <div class="form-group"><label>CTA Primary Button Link</label><input type="text" name="cta_primary_button_link" value="{{ old('cta_primary_button_link', $joinContent->cta_primary_button_link) }}"></div>
                    <div class="form-group"><label>CTA Secondary Button Text</label><input type="text" name="cta_secondary_button_text" value="{{ old('cta_secondary_button_text', $joinContent->cta_secondary_button_text) }}"></div>
                    <div class="form-group"><label>CTA Secondary Button Link</label><input type="text" name="cta_secondary_button_link" value="{{ old('cta_secondary_button_link', $joinContent->cta_secondary_button_link) }}"></div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Konten Utama Gabung Mitra</button>
            </form>
        </div>
    </section>

    <section class="section-card">
        <div class="section-head">
            <h2 class="section-title">2. Field Form Pendaftaran</h2>
            <p class="section-subtitle">Kelola field form dinamis untuk frontend user.</p>
        </div>
        <div class="section-body">
            <details class="editor-block" open>
                <summary>Tambah Field Form</summary>
                <form method="POST" action="{{ route('admin.gabung.form-fields.store') }}" class="stack-form">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group"><label>Field Key</label><input type="text" name="field_key" placeholder="contoh: full_name" required></div>
                        <div class="form-group"><label>Label</label><input type="text" name="label" required></div>
                        <div class="form-group">
                            <label>Field Type</label>
                            <select name="field_type" class="js-field-type" required>
                                <option value="text">text</option>
                                <option value="email">email</option>
                                <option value="tel">tel</option>
                                <option value="select">select</option>
                                <option value="textarea">textarea</option>
                            </select>
                        </div>
                        <div class="form-group"><label>Placeholder</label><input type="text" name="placeholder"></div>
                        <div class="form-group full"><label>Options JSON (untuk select)</label><textarea name="options_json_text" class="js-options-json" placeholder='[{"value":"ev","label":"EV"}]'></textarea></div>
                        <div class="form-group"><label>Sort Order</label><input type="number" name="sort_order" min="0" value="1"></div>
                        <div class="form-group"><label class="checkbox-label"><input type="checkbox" name="is_required" value="1" checked> Required</label></div>
                        <div class="form-group"><label class="checkbox-label"><input type="checkbox" name="is_active" value="1" checked> Aktif</label></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Field</button>
                </form>
            </details>

            <div class="list-block">
                @forelse ($formFields as $field)
                    <details class="editor-item">
                        <summary>
                            <span>{{ $field->field_key }} - {{ $field->label }}</span>
                            <span class="meta">{{ $field->field_type }} | sort {{ $field->sort_order }} | {{ $field->is_active ? 'Aktif' : 'Nonaktif' }}</span>
                        </summary>
                        <div class="item-body">
                            <form method="POST" action="{{ route('admin.gabung.form-fields.update', $field->id) }}" class="stack-form">
                                @csrf
                                @method('PUT')
                                <div class="form-grid">
                                    <div class="form-group"><label>Field Key</label><input type="text" name="field_key" value="{{ $field->field_key }}" required></div>
                                    <div class="form-group"><label>Label</label><input type="text" name="label" value="{{ $field->label }}" required></div>
                                    <div class="form-group">
                                        <label>Field Type</label>
                                        <select name="field_type" class="js-field-type" required>
                                            @foreach (['text','email','tel','select','textarea'] as $type)
                                                <option value="{{ $type }}" @selected($field->field_type === $type)>{{ $type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group"><label>Placeholder</label><input type="text" name="placeholder" value="{{ $field->placeholder }}"></div>
                                    <div class="form-group full"><label>Options JSON (untuk select)</label><textarea name="options_json_text" class="js-options-json">{{ !empty($field->options_json) ? json_encode($field->options_json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) : '' }}</textarea></div>
                                    <div class="form-group"><label>Sort Order</label><input type="number" name="sort_order" min="0" value="{{ $field->sort_order }}"></div>
                                    <div class="form-group"><label class="checkbox-label"><input type="checkbox" name="is_required" value="1" @checked($field->is_required)> Required</label></div>
                                    <div class="form-group"><label class="checkbox-label"><input type="checkbox" name="is_active" value="1" @checked($field->is_active)> Aktif</label></div>
                                </div>
                                <div class="row-actions">
                                    <button type="submit" class="btn btn-primary">Simpan Field</button>
                                </div>
                            </form>
                            <form method="POST" action="{{ route('admin.gabung.form-fields.destroy', $field->id) }}" class="inline-delete js-confirm-delete" data-confirm="Hapus field form ini?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus Field</button>
                            </form>
                        </div>
                    </details>
                @empty
                    <p class="empty-text">Belum ada field form.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section class="section-card">
        <div class="section-head">
            <h2 class="section-title">3. Proses Seleksi</h2>
            <p class="section-subtitle">Kelola step proses seleksi dinamis.</p>
        </div>
        <div class="section-body">
            <details class="editor-block" open>
                <summary>Tambah Step Seleksi</summary>
                <form method="POST" action="{{ route('admin.gabung.selection-steps.store') }}" class="stack-form">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group"><label>Title</label><input type="text" name="title" required></div>
                        <div class="form-group"><label>Icon</label><input type="text" name="icon" placeholder="bi bi-gear"></div>
                        <div class="form-group full"><label>Description</label><textarea name="description"></textarea></div>
                        <div class="form-group"><label>Sort Order</label><input type="number" name="sort_order" min="0" value="1"></div>
                        <div class="form-group"><label class="checkbox-label"><input type="checkbox" name="is_active" value="1" checked> Aktif</label></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Step</button>
                </form>
            </details>

            <div class="list-block">
                @forelse ($selectionSteps as $step)
                    <details class="editor-item">
                        <summary>
                            <span>{{ $step->title }}</span>
                            <span class="meta">sort {{ $step->sort_order }} | {{ $step->is_active ? 'Aktif' : 'Nonaktif' }}</span>
                        </summary>
                        <div class="item-body">
                            <form method="POST" action="{{ route('admin.gabung.selection-steps.update', $step->id) }}" class="stack-form">
                                @csrf
                                @method('PUT')
                                <div class="form-grid">
                                    <div class="form-group"><label>Title</label><input type="text" name="title" required value="{{ $step->title }}"></div>
                                    <div class="form-group"><label>Icon</label><input type="text" name="icon" value="{{ $step->icon }}"></div>
                                    <div class="form-group full"><label>Description</label><textarea name="description">{{ $step->description }}</textarea></div>
                                    <div class="form-group"><label>Sort Order</label><input type="number" name="sort_order" min="0" value="{{ $step->sort_order }}"></div>
                                    <div class="form-group"><label class="checkbox-label"><input type="checkbox" name="is_active" value="1" @checked($step->is_active)> Aktif</label></div>
                                </div>
                                <div class="row-actions">
                                    <button type="submit" class="btn btn-primary">Simpan Step</button>
                                </div>
                            </form>
                            <form method="POST" action="{{ route('admin.gabung.selection-steps.destroy', $step->id) }}" class="inline-delete js-confirm-delete" data-confirm="Hapus step seleksi ini?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus Step</button>
                            </form>
                        </div>
                    </details>
                @empty
                    <p class="empty-text">Belum ada step seleksi.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section class="section-card">
        <div class="section-head">
            <h2 class="section-title">4. Points Proses Seleksi</h2>
            <p class="section-subtitle">Kelola point untuk masing-masing step agar admin tidak bingung.</p>
        </div>
        <div class="section-body">
            @forelse ($selectionSteps as $step)
                <details class="editor-block">
                    <summary>Points: {{ $step->title }}</summary>
                    <form method="POST" action="{{ route('admin.gabung.selection-step-points.store', $step->id) }}" class="stack-form">
                        @csrf
                        <div class="form-grid">
                            <div class="form-group full"><label>Point Text</label><input type="text" name="point_text" required></div>
                            <div class="form-group"><label>Sort Order</label><input type="number" name="sort_order" min="0" value="1"></div>
                            <div class="form-group"><label class="checkbox-label"><input type="checkbox" name="is_active" value="1" checked> Aktif</label></div>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Point</button>
                    </form>

                    <div class="list-block">
                        @forelse ($step->points as $point)
                            <div class="editor-item open no-summary">
                                <div class="item-body">
                                    <form method="POST" action="{{ route('admin.gabung.selection-step-points.update', $point->id) }}" class="stack-form">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-grid">
                                            <div class="form-group full"><label>Point Text</label><input type="text" name="point_text" required value="{{ $point->point_text }}"></div>
                                            <div class="form-group"><label>Sort Order</label><input type="number" name="sort_order" min="0" value="{{ $point->sort_order }}"></div>
                                            <div class="form-group"><label class="checkbox-label"><input type="checkbox" name="is_active" value="1" @checked($point->is_active)> Aktif</label></div>
                                        </div>
                                        <div class="row-actions">
                                            <button type="submit" class="btn btn-primary">Simpan Point</button>
                                        </div>
                                    </form>
                                    <form method="POST" action="{{ route('admin.gabung.selection-step-points.destroy', $point->id) }}" class="inline-delete js-confirm-delete" data-confirm="Hapus point ini?">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus Point</button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p class="empty-text">Belum ada point pada step ini.</p>
                        @endforelse
                    </div>
                </details>
            @empty
                <p class="empty-text">Tambahkan step seleksi dulu.</p>
            @endforelse
        </div>
    </section>

    <section class="section-card">
        <div class="section-head">
            <h2 class="section-title">5. Kontak Sales / Konsultasi</h2>
            <p class="section-subtitle">Kelola card kontak sales yang dipakai di frontend.</p>
        </div>
        <div class="section-body">
            <details class="editor-block" open>
                <summary>Tambah Card Kontak</summary>
                <form method="POST" action="{{ route('admin.gabung.sales-contacts.store') }}" class="stack-form">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group"><label>Title</label><input type="text" name="title" required></div>
                        <div class="form-group"><label>Icon</label><input type="text" name="icon" placeholder="bi bi-whatsapp"></div>
                        <div class="form-group full"><label>Description</label><textarea name="description"></textarea></div>
                        <div class="form-group"><label>Contact Label</label><input type="text" name="contact_label"></div>
                        <div class="form-group"><label>Contact Value</label><input type="text" name="contact_value"></div>
                        <div class="form-group"><label>Button Text</label><input type="text" name="button_text"></div>
                        <div class="form-group"><label>Button Link</label><input type="text" name="button_link"></div>
                        <div class="form-group"><label>Sort Order</label><input type="number" name="sort_order" min="0" value="1"></div>
                        <div class="form-group"><label class="checkbox-label"><input type="checkbox" name="is_active" value="1" checked> Aktif</label></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Kontak</button>
                </form>
            </details>

            <div class="list-block">
                @forelse ($salesContacts as $contact)
                    <details class="editor-item">
                        <summary>
                            <span>{{ $contact->title }}</span>
                            <span class="meta">sort {{ $contact->sort_order }} | {{ $contact->is_active ? 'Aktif' : 'Nonaktif' }}</span>
                        </summary>
                        <div class="item-body">
                            <form method="POST" action="{{ route('admin.gabung.sales-contacts.update', $contact->id) }}" class="stack-form">
                                @csrf
                                @method('PUT')
                                <div class="form-grid">
                                    <div class="form-group"><label>Title</label><input type="text" name="title" required value="{{ $contact->title }}"></div>
                                    <div class="form-group"><label>Icon</label><input type="text" name="icon" value="{{ $contact->icon }}"></div>
                                    <div class="form-group full"><label>Description</label><textarea name="description">{{ $contact->description }}</textarea></div>
                                    <div class="form-group"><label>Contact Label</label><input type="text" name="contact_label" value="{{ $contact->contact_label }}"></div>
                                    <div class="form-group"><label>Contact Value</label><input type="text" name="contact_value" value="{{ $contact->contact_value }}"></div>
                                    <div class="form-group"><label>Button Text</label><input type="text" name="button_text" value="{{ $contact->button_text }}"></div>
                                    <div class="form-group"><label>Button Link</label><input type="text" name="button_link" value="{{ $contact->button_link }}"></div>
                                    <div class="form-group"><label>Sort Order</label><input type="number" name="sort_order" min="0" value="{{ $contact->sort_order }}"></div>
                                    <div class="form-group"><label class="checkbox-label"><input type="checkbox" name="is_active" value="1" @checked($contact->is_active)> Aktif</label></div>
                                </div>
                                <div class="row-actions">
                                    <button type="submit" class="btn btn-primary">Simpan Kontak</button>
                                </div>
                            </form>
                            <form method="POST" action="{{ route('admin.gabung.sales-contacts.destroy', $contact->id) }}" class="inline-delete js-confirm-delete" data-confirm="Hapus card kontak ini?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus Kontak</button>
                            </form>
                        </div>
                    </details>
                @empty
                    <p class="empty-text">Belum ada card kontak sales.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section class="section-card">
        <div class="section-head">
            <h2 class="section-title">6. Highlights / Info Box Tambahan</h2>
            <p class="section-subtitle">Kelola list highlight untuk box info tambahan.</p>
        </div>
        <div class="section-body">
            <details class="editor-block" open>
                <summary>Tambah Highlight</summary>
                <form method="POST" action="{{ route('admin.gabung.sales-highlights.store') }}" class="stack-form">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group"><label>Title</label><input type="text" name="title" required></div>
                        <div class="form-group"><label>Icon</label><input type="text" name="icon" placeholder="bi bi-info-circle"></div>
                        <div class="form-group full"><label>Description</label><textarea name="description"></textarea></div>
                        <div class="form-group"><label>Sort Order</label><input type="number" name="sort_order" min="0" value="1"></div>
                        <div class="form-group"><label class="checkbox-label"><input type="checkbox" name="is_active" value="1" checked> Aktif</label></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Highlight</button>
                </form>
            </details>

            <div class="list-block">
                @forelse ($salesHighlights as $highlight)
                    <div class="editor-item open no-summary">
                        <div class="item-body">
                            <form method="POST" action="{{ route('admin.gabung.sales-highlights.update', $highlight->id) }}" class="stack-form">
                                @csrf
                                @method('PUT')
                                <div class="form-grid">
                                    <div class="form-group"><label>Title</label><input type="text" name="title" required value="{{ $highlight->title }}"></div>
                                    <div class="form-group"><label>Icon</label><input type="text" name="icon" value="{{ $highlight->icon }}"></div>
                                    <div class="form-group full"><label>Description</label><textarea name="description">{{ $highlight->description }}</textarea></div>
                                    <div class="form-group"><label>Sort Order</label><input type="number" name="sort_order" min="0" value="{{ $highlight->sort_order }}"></div>
                                    <div class="form-group"><label class="checkbox-label"><input type="checkbox" name="is_active" value="1" @checked($highlight->is_active)> Aktif</label></div>
                                </div>
                                <div class="row-actions">
                                    <button type="submit" class="btn btn-primary">Simpan Highlight</button>
                                </div>
                            </form>
                            <form method="POST" action="{{ route('admin.gabung.sales-highlights.destroy', $highlight->id) }}" class="inline-delete js-confirm-delete" data-confirm="Hapus highlight ini?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus Highlight</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="empty-text">Belum ada highlight tambahan.</p>
                @endforelse
            </div>
        </div>
    </section>
</div>

<script src="{{ asset('asset/js/admin-gabung.js') }}"></script>
</body>
</html>
