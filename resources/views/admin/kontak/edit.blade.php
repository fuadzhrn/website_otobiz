<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kontak & Support - OTOBIZ Admin</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('assets/images/logo_favicon.jpeg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/css/admin-kontak.css') }}">
</head>
<body>
<div class="admin-kontak-wrap">
    <header class="page-head">
        <div>
            <div class="breadcrumb">Admin / Kontak & Support</div>
            <h1 class="page-title">Edit Kontak & Support</h1>
        </div>
        <div class="page-actions">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline">Kembali ke Dashboard</a>
            <a href="{{ route('kontak') }}" class="btn btn-accent" target="_blank" rel="noopener">Lihat Halaman</a>
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
            <h2 class="section-title">1. Konten Utama Kontak & Support</h2>
            <p class="section-subtitle">Konten single page yang dipakai di hero, form, support, dan closing strip.</p>
        </div>
        <div class="section-body">
            <form method="POST" action="{{ route('admin.kontak.update') }}" class="stack-form">
                @csrf
                @method('PUT')

                <div class="form-grid">
                    <div class="form-group full"><label>Hero Title</label><input type="text" name="hero_title" required value="{{ old('hero_title', $contactContent->hero_title) }}"></div>
                    <div class="form-group full"><label>Hero Description</label><textarea name="hero_description" required>{{ old('hero_description', $contactContent->hero_description) }}</textarea></div>
                    <div class="form-group"><label>Hero Button Text</label><input type="text" name="hero_small_button_text" value="{{ old('hero_small_button_text', $contactContent->hero_small_button_text) }}"></div>
                    <div class="form-group"><label>Hero Button Link</label><input type="text" name="hero_small_button_link" value="{{ old('hero_small_button_link', $contactContent->hero_small_button_link) }}"></div>

                    <div class="form-group"><label>Contact Form Title</label><input type="text" name="contact_form_title" required value="{{ old('contact_form_title', $contactContent->contact_form_title) }}"></div>
                    <div class="form-group full"><label>Contact Form Description</label><textarea name="contact_form_description" required>{{ old('contact_form_description', $contactContent->contact_form_description) }}</textarea></div>
                    <div class="form-group"><label>Contact Form Submit Text</label><input type="text" name="contact_form_submit_text" required value="{{ old('contact_form_submit_text', $contactContent->contact_form_submit_text) }}"></div>
                    <div class="form-group full"><label>Contact Form Checkbox Text</label><textarea name="contact_form_checkbox_text" required>{{ old('contact_form_checkbox_text', $contactContent->contact_form_checkbox_text) }}</textarea></div>

                    <div class="form-group"><label>Locations Section Title</label><input type="text" name="locations_section_title" required value="{{ old('locations_section_title', $contactContent->locations_section_title) }}"></div>

                    <div class="form-group"><label>Support Section Title</label><input type="text" name="support_section_title" required value="{{ old('support_section_title', $contactContent->support_section_title) }}"></div>
                    <div class="form-group full"><label>Support Section Description</label><textarea name="support_section_description" required>{{ old('support_section_description', $contactContent->support_section_description) }}</textarea></div>
                    <div class="form-group full"><label>Support Highlight Text (fallback)</label><textarea name="support_highlight_text">{{ old('support_highlight_text', $contactContent->support_highlight_text) }}</textarea></div>

                    <div class="form-group full"><label>Closing Strip Text</label><textarea name="closing_strip_text" required>{{ old('closing_strip_text', $contactContent->closing_strip_text) }}</textarea></div>
                    <div class="form-group"><label>Closing Strip Button Text</label><input type="text" name="closing_strip_button_text" required value="{{ old('closing_strip_button_text', $contactContent->closing_strip_button_text) }}"></div>
                    <div class="form-group"><label>Closing Strip Button Link</label><input type="text" name="closing_strip_button_link" value="{{ old('closing_strip_button_link', $contactContent->closing_strip_button_link) }}"></div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Konten Utama Kontak & Support</button>
            </form>
        </div>
    </section>

    <section class="section-card">
        <div class="section-head">
            <h2 class="section-title">2. Quick Support Cards</h2>
            <p class="section-subtitle">Kelola daftar card cepat pada area hero.</p>
        </div>
        <div class="section-body">
            <details class="editor-block" open>
                <summary>Tambah Quick Card</summary>
                <form method="POST" action="{{ route('admin.kontak.quick-cards.store') }}" class="stack-form">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group"><label>Title</label><input type="text" name="title" required></div>
                        <div class="form-group"><label>Icon</label><input type="text" name="icon" placeholder="bi bi-info-circle"></div>
                        <div class="form-group full"><label>Description</label><textarea name="description"></textarea></div>
                        <div class="form-group"><label>Button Text</label><input type="text" name="button_text"></div>
                        <div class="form-group"><label>Button Link</label><input type="text" name="button_link"></div>
                        <div class="form-group"><label>Sort Order</label><input type="number" name="sort_order" min="0" value="1"></div>
                        <div class="form-group"><label class="checkbox-label"><input type="checkbox" name="is_active" value="1" checked> Aktif</label></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Quick Card</button>
                </form>
            </details>

            <div class="list-block">
                @forelse ($quickCards as $card)
                    <details class="editor-item">
                        <summary>
                            <span>{{ $card->title }}</span>
                            <span class="meta">sort {{ $card->sort_order }} | {{ $card->is_active ? 'Aktif' : 'Nonaktif' }}</span>
                        </summary>
                        <div class="item-body">
                            <form method="POST" action="{{ route('admin.kontak.quick-cards.update', $card->id) }}" class="stack-form">
                                @csrf
                                @method('PUT')
                                <div class="form-grid">
                                    <div class="form-group"><label>Title</label><input type="text" name="title" required value="{{ $card->title }}"></div>
                                    <div class="form-group"><label>Icon</label><input type="text" name="icon" value="{{ $card->icon }}"></div>
                                    <div class="form-group full"><label>Description</label><textarea name="description">{{ $card->description }}</textarea></div>
                                    <div class="form-group"><label>Button Text</label><input type="text" name="button_text" value="{{ $card->button_text }}"></div>
                                    <div class="form-group"><label>Button Link</label><input type="text" name="button_link" value="{{ $card->button_link }}"></div>
                                    <div class="form-group"><label>Sort Order</label><input type="number" name="sort_order" min="0" value="{{ $card->sort_order }}"></div>
                                    <div class="form-group"><label class="checkbox-label"><input type="checkbox" name="is_active" value="1" @checked($card->is_active)> Aktif</label></div>
                                </div>
                                <div class="row-actions">
                                    <button type="submit" class="btn btn-primary">Simpan Quick Card</button>
                                </div>
                            </form>
                            <form method="POST" action="{{ route('admin.kontak.quick-cards.destroy', $card->id) }}" class="inline-delete js-confirm-delete" data-confirm="Hapus quick card ini?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus Quick Card</button>
                            </form>
                        </div>
                    </details>
                @empty
                    <p class="empty-text">Belum ada quick support card.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section class="section-card">
        <div class="section-head">
            <h2 class="section-title">3. Field Form Kontak</h2>
            <p class="section-subtitle">Kelola field form dinamis yang digunakan frontend user.</p>
        </div>
        <div class="section-body">
            <details class="editor-block" open>
                <summary>Tambah Field Form</summary>
                <form method="POST" action="{{ route('admin.kontak.form-fields.store') }}" class="stack-form">
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
                        <div class="form-group full"><label>Options JSON (untuk select)</label><textarea name="options_json_text" class="js-options-json" placeholder='[{"value":"informasi-umum","label":"Informasi Umum"}]'></textarea></div>
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
                            <form method="POST" action="{{ route('admin.kontak.form-fields.update', $field->id) }}" class="stack-form">
                                @csrf
                                @method('PUT')
                                <div class="form-grid">
                                    <div class="form-group"><label>Field Key</label><input type="text" name="field_key" value="{{ $field->field_key }}" required></div>
                                    <div class="form-group"><label>Label</label><input type="text" name="label" value="{{ $field->label }}" required></div>
                                    <div class="form-group">
                                        <label>Field Type</label>
                                        <select name="field_type" class="js-field-type" required>
                                            @foreach (['text', 'email', 'tel', 'select', 'textarea'] as $type)
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
                            <form method="POST" action="{{ route('admin.kontak.form-fields.destroy', $field->id) }}" class="inline-delete js-confirm-delete" data-confirm="Hapus field form ini?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus Field</button>
                            </form>
                        </div>
                    </details>
                @empty
                    <p class="empty-text">Belum ada field form kontak.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section class="section-card">
        <div class="section-head">
            <h2 class="section-title">4. Alamat HO & Pool</h2>
            <p class="section-subtitle">Kelola lokasi secara dinamis (tidak hardcoded dua item).</p>
        </div>
        <div class="section-body">
            <details class="editor-block" open>
                <summary>Tambah Lokasi</summary>
                <form method="POST" action="{{ route('admin.kontak.locations.store') }}" class="stack-form">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Location Type</label>
                            <select name="location_type" required>
                                <option value="ho">ho</option>
                                <option value="pool">pool</option>
                                <option value="other">other</option>
                            </select>
                        </div>
                        <div class="form-group"><label>Title</label><input type="text" name="title" required></div>
                        <div class="form-group full"><label>Address</label><textarea name="address"></textarea></div>
                        <div class="form-group full"><label>Description</label><textarea name="description"></textarea></div>
                        <div class="form-group"><label>Operation Hours</label><input type="text" name="operation_hours"></div>
                        <div class="form-group"><label>Icon</label><input type="text" name="icon" placeholder="bi bi-building"></div>
                        <div class="form-group"><label>Button Text</label><input type="text" name="button_text"></div>
                        <div class="form-group"><label>Button Link</label><input type="text" name="button_link"></div>
                        <div class="form-group"><label>Sort Order</label><input type="number" name="sort_order" min="0" value="1"></div>
                        <div class="form-group"><label class="checkbox-label"><input type="checkbox" name="is_active" value="1" checked> Aktif</label></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Lokasi</button>
                </form>
            </details>

            <div class="list-block">
                @forelse ($locations as $location)
                    <details class="editor-item">
                        <summary>
                            <span>{{ $location->title }} ({{ $location->location_type }})</span>
                            <span class="meta">sort {{ $location->sort_order }} | {{ $location->is_active ? 'Aktif' : 'Nonaktif' }}</span>
                        </summary>
                        <div class="item-body">
                            <form method="POST" action="{{ route('admin.kontak.locations.update', $location->id) }}" class="stack-form">
                                @csrf
                                @method('PUT')
                                <div class="form-grid">
                                    <div class="form-group">
                                        <label>Location Type</label>
                                        <select name="location_type" required>
                                            @foreach (['ho', 'pool', 'other'] as $type)
                                                <option value="{{ $type }}" @selected($location->location_type === $type)>{{ $type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group"><label>Title</label><input type="text" name="title" required value="{{ $location->title }}"></div>
                                    <div class="form-group full"><label>Address</label><textarea name="address">{{ $location->address }}</textarea></div>
                                    <div class="form-group full"><label>Description</label><textarea name="description">{{ $location->description }}</textarea></div>
                                    <div class="form-group"><label>Operation Hours</label><input type="text" name="operation_hours" value="{{ $location->operation_hours }}"></div>
                                    <div class="form-group"><label>Icon</label><input type="text" name="icon" value="{{ $location->icon }}"></div>
                                    <div class="form-group"><label>Button Text</label><input type="text" name="button_text" value="{{ $location->button_text }}"></div>
                                    <div class="form-group"><label>Button Link</label><input type="text" name="button_link" value="{{ $location->button_link }}"></div>
                                    <div class="form-group"><label>Sort Order</label><input type="number" name="sort_order" min="0" value="{{ $location->sort_order }}"></div>
                                    <div class="form-group"><label class="checkbox-label"><input type="checkbox" name="is_active" value="1" @checked($location->is_active)> Aktif</label></div>
                                </div>
                                <div class="row-actions">
                                    <button type="submit" class="btn btn-primary">Simpan Lokasi</button>
                                </div>
                            </form>
                            <form method="POST" action="{{ route('admin.kontak.locations.destroy', $location->id) }}" class="inline-delete js-confirm-delete" data-confirm="Hapus lokasi ini?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus Lokasi</button>
                            </form>
                        </div>
                    </details>
                @empty
                    <p class="empty-text">Belum ada data lokasi.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section class="section-card">
        <div class="section-head">
            <h2 class="section-title">5. Customer Support Cards</h2>
            <p class="section-subtitle">Kelola daftar kartu support yang tampil di halaman kontak.</p>
        </div>
        <div class="section-body">
            <details class="editor-block" open>
                <summary>Tambah Support Card</summary>
                <form method="POST" action="{{ route('admin.kontak.support-cards.store') }}" class="stack-form">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group"><label>Title</label><input type="text" name="title" required></div>
                        <div class="form-group"><label>Icon</label><input type="text" name="icon" placeholder="bi bi-headset"></div>
                        <div class="form-group full"><label>Description</label><textarea name="description"></textarea></div>
                        <div class="form-group"><label>Contact Label</label><input type="text" name="contact_label"></div>
                        <div class="form-group"><label>Contact Value</label><input type="text" name="contact_value"></div>
                        <div class="form-group"><label>Button Text</label><input type="text" name="button_text"></div>
                        <div class="form-group"><label>Button Link</label><input type="text" name="button_link"></div>
                        <div class="form-group"><label>Sort Order</label><input type="number" name="sort_order" min="0" value="1"></div>
                        <div class="form-group"><label class="checkbox-label"><input type="checkbox" name="is_active" value="1" checked> Aktif</label></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Support Card</button>
                </form>
            </details>

            <div class="list-block">
                @forelse ($supportCards as $card)
                    <details class="editor-item">
                        <summary>
                            <span>{{ $card->title }}</span>
                            <span class="meta">sort {{ $card->sort_order }} | {{ $card->is_active ? 'Aktif' : 'Nonaktif' }}</span>
                        </summary>
                        <div class="item-body">
                            <form method="POST" action="{{ route('admin.kontak.support-cards.update', $card->id) }}" class="stack-form">
                                @csrf
                                @method('PUT')
                                <div class="form-grid">
                                    <div class="form-group"><label>Title</label><input type="text" name="title" required value="{{ $card->title }}"></div>
                                    <div class="form-group"><label>Icon</label><input type="text" name="icon" value="{{ $card->icon }}"></div>
                                    <div class="form-group full"><label>Description</label><textarea name="description">{{ $card->description }}</textarea></div>
                                    <div class="form-group"><label>Contact Label</label><input type="text" name="contact_label" value="{{ $card->contact_label }}"></div>
                                    <div class="form-group"><label>Contact Value</label><input type="text" name="contact_value" value="{{ $card->contact_value }}"></div>
                                    <div class="form-group"><label>Button Text</label><input type="text" name="button_text" value="{{ $card->button_text }}"></div>
                                    <div class="form-group"><label>Button Link</label><input type="text" name="button_link" value="{{ $card->button_link }}"></div>
                                    <div class="form-group"><label>Sort Order</label><input type="number" name="sort_order" min="0" value="{{ $card->sort_order }}"></div>
                                    <div class="form-group"><label class="checkbox-label"><input type="checkbox" name="is_active" value="1" @checked($card->is_active)> Aktif</label></div>
                                </div>
                                <div class="row-actions">
                                    <button type="submit" class="btn btn-primary">Simpan Support Card</button>
                                </div>
                            </form>
                            <form method="POST" action="{{ route('admin.kontak.support-cards.destroy', $card->id) }}" class="inline-delete js-confirm-delete" data-confirm="Hapus support card ini?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus Support Card</button>
                            </form>
                        </div>
                    </details>
                @empty
                    <p class="empty-text">Belum ada customer support card.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section class="section-card">
        <div class="section-head">
            <h2 class="section-title">6. Support Highlights / Info Box</h2>
            <p class="section-subtitle">Kelola daftar highlight untuk kotak info tambahan support.</p>
        </div>
        <div class="section-body">
            <details class="editor-block" open>
                <summary>Tambah Highlight</summary>
                <form method="POST" action="{{ route('admin.kontak.support-highlights.store') }}" class="stack-form">
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
                @forelse ($supportHighlights as $highlight)
                    <div class="editor-item no-summary">
                        <div class="item-body">
                            <form method="POST" action="{{ route('admin.kontak.support-highlights.update', $highlight->id) }}" class="stack-form">
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
                            <form method="POST" action="{{ route('admin.kontak.support-highlights.destroy', $highlight->id) }}" class="inline-delete js-confirm-delete" data-confirm="Hapus highlight ini?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus Highlight</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="empty-text">Belum ada support highlight.</p>
                @endforelse
            </div>
        </div>
    </section>
</div>

<script src="{{ asset('asset/js/admin-kontak.js') }}"></script>
</body>
</html>
