<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Home - OTOBIZ Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/admin-home.css') }}">
</head>
<body>
<div class="admin-home-wrap">
    <header class="topbar">
        <div class="topbar-left">
            <div class="breadcrumb">Admin / Home</div>
            <h1 class="page-title">Edit Home</h1>
        </div>
        <div class="topbar-actions">
            <a href="{{ route('admin.dashboard') }}" class="btn-link"><span class="btn btn-outline">Kembali ke Dashboard</span></a>
            <a href="{{ route('home') }}" class="btn-link" target="_blank" rel="noopener"><span class="btn btn-accent">Lihat Home</span></a>
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
            <h2 class="section-title">Konten Utama Home</h2>
            <p class="section-subtitle">Ubah teks utama Home tanpa mengubah layout frontend.</p>
        </div>
        <div class="section-body">
            <form method="POST" action="{{ route('admin.home.update') }}">
                @csrf
                @method('PUT')

                <div class="form-grid">
                    <div class="form-group">
                        <label for="hero_badge_text">Hero Badge Text</label>
                        <input type="text" id="hero_badge_text" name="hero_badge_text" value="{{ old('hero_badge_text', $homeContent->hero_badge_text) }}">
                    </div>
                    <div class="form-group">
                        <label for="hero_title">Hero Title</label>
                        <input type="text" id="hero_title" name="hero_title" value="{{ old('hero_title', $homeContent->hero_title) }}" required>
                    </div>

                    <div class="form-group full">
                        <label for="hero_description">Hero Description</label>
                        <textarea id="hero_description" name="hero_description" required>{{ old('hero_description', $homeContent->hero_description) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="hero_primary_button_text">Hero Primary Button Text</label>
                        <input type="text" id="hero_primary_button_text" name="hero_primary_button_text" value="{{ old('hero_primary_button_text', $homeContent->hero_primary_button_text) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="hero_primary_button_link">Hero Primary Button Link</label>
                        <input type="text" id="hero_primary_button_link" name="hero_primary_button_link" value="{{ old('hero_primary_button_link', $homeContent->hero_primary_button_link) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="hero_secondary_button_text">Hero Secondary Button Text</label>
                        <input type="text" id="hero_secondary_button_text" name="hero_secondary_button_text" value="{{ old('hero_secondary_button_text', $homeContent->hero_secondary_button_text) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="hero_secondary_button_link">Hero Secondary Button Link</label>
                        <input type="text" id="hero_secondary_button_link" name="hero_secondary_button_link" value="{{ old('hero_secondary_button_link', $homeContent->hero_secondary_button_link) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="value_section_title">Value Section Title</label>
                        <input type="text" id="value_section_title" name="value_section_title" value="{{ old('value_section_title', $homeContent->value_section_title) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="summary_section_title">Summary Section Title</label>
                        <input type="text" id="summary_section_title" name="summary_section_title" value="{{ old('summary_section_title', $homeContent->summary_section_title) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="stats_section_title">Stats Section Title</label>
                        <input type="text" id="stats_section_title" name="stats_section_title" value="{{ old('stats_section_title', $homeContent->stats_section_title) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="cta_title">CTA Title</label>
                        <input type="text" id="cta_title" name="cta_title" value="{{ old('cta_title', $homeContent->cta_title) }}" required>
                    </div>

                    <div class="form-group full">
                        <label for="cta_description">CTA Description</label>
                        <textarea id="cta_description" name="cta_description" required>{{ old('cta_description', $homeContent->cta_description) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="cta_button_text">CTA Button Text</label>
                        <input type="text" id="cta_button_text" name="cta_button_text" value="{{ old('cta_button_text', $homeContent->cta_button_text) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="cta_button_link">CTA Button Link</label>
                        <input type="text" id="cta_button_link" name="cta_button_link" value="{{ old('cta_button_link', $homeContent->cta_button_link) }}" required>
                    </div>

                    <div class="form-group full">
                        <label for="value_section_description">Value Section Description (opsional)</label>
                        <textarea id="value_section_description" name="value_section_description">{{ old('value_section_description', $homeContent->value_section_description) }}</textarea>
                    </div>
                    <div class="form-group full">
                        <label for="summary_section_description">Summary Section Description (opsional)</label>
                        <textarea id="summary_section_description" name="summary_section_description">{{ old('summary_section_description', $homeContent->summary_section_description) }}</textarea>
                    </div>
                    <div class="form-group full">
                        <label for="stats_section_description">Stats Section Description (opsional)</label>
                        <textarea id="stats_section_description" name="stats_section_description">{{ old('stats_section_description', $homeContent->stats_section_description) }}</textarea>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Simpan Konten Utama</button>
                </div>
            </form>
        </div>
    </section>

    <section class="section-card">
        <div class="section-head">
            <h2 class="section-title">Value Proposition</h2>
            <p class="section-subtitle">Tambah, edit, hapus, urutkan, dan aktifkan/nonaktifkan item value proposition.</p>
        </div>
        <div class="section-body">
            <form method="POST" action="{{ route('admin.home.value-items.store') }}">
                @csrf
                <div class="form-grid">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" required>
                    </div>
                    <div class="form-group">
                        <label>Icon Class</label>
                        <input type="text" name="icon" placeholder="bi bi-graph-up-arrow">
                    </div>
                    <div class="form-group full">
                        <label>Description</label>
                        <textarea name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Sort Order</label>
                        <input type="number" name="sort_order" value="0" min="0" required>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <div>
                            <input type="hidden" name="is_active" value="0">
                            <label class="inline-checkbox"><input type="checkbox" name="is_active" value="1" checked> Aktif</label>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-accent">Tambah Item Value</button>
                </div>
            </form>

            <div class="item-list">
                @foreach ($valueItems as $item)
                    <article class="item-card">
                        <div class="item-card-head">
                            <h3 class="item-card-title">Item #{{ $item->id }}</h3>
                            <form method="POST" action="{{ route('admin.home.value-items.destroy', $item) }}" class="delete-form js-delete-form" data-confirm="Hapus item value proposition ini?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>

                        <form method="POST" action="{{ route('admin.home.value-items.update', $item) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-grid">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" value="{{ $item->title }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Icon Class</label>
                                    <input type="text" name="icon" value="{{ $item->icon }}">
                                </div>
                                <div class="form-group full">
                                    <label>Description</label>
                                    <textarea name="description" required>{{ $item->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Sort Order</label>
                                    <input type="number" name="sort_order" min="0" value="{{ $item->sort_order }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <div>
                                        <input type="hidden" name="is_active" value="0">
                                        <label class="inline-checkbox"><input type="checkbox" name="is_active" value="1" {{ $item->is_active ? 'checked' : '' }}> Aktif</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Update Item</button>
                            </div>
                        </form>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-card">
        <div class="section-head">
            <h2 class="section-title">Ringkasan Kemitraan</h2>
            <p class="section-subtitle">Kelola langkah ringkasan kemitraan.</p>
        </div>
        <div class="section-body">
            <form method="POST" action="{{ route('admin.home.summary-steps.store') }}">
                @csrf
                <div class="form-grid">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" required>
                    </div>
                    <div class="form-group">
                        <label>Sort Order</label>
                        <input type="number" name="sort_order" value="0" min="0" required>
                    </div>
                    <div class="form-group full">
                        <label>Description</label>
                        <textarea name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <div>
                            <input type="hidden" name="is_active" value="0">
                            <label class="inline-checkbox"><input type="checkbox" name="is_active" value="1" checked> Aktif</label>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-accent">Tambah Step</button>
                </div>
            </form>

            <div class="item-list">
                @foreach ($summarySteps as $item)
                    <article class="item-card">
                        <div class="item-card-head">
                            <h3 class="item-card-title">Step #{{ $item->id }}</h3>
                            <form method="POST" action="{{ route('admin.home.summary-steps.destroy', $item) }}" class="delete-form js-delete-form" data-confirm="Hapus step ringkasan ini?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>

                        <form method="POST" action="{{ route('admin.home.summary-steps.update', $item) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-grid">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" value="{{ $item->title }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Sort Order</label>
                                    <input type="number" name="sort_order" min="0" value="{{ $item->sort_order }}" required>
                                </div>
                                <div class="form-group full">
                                    <label>Description</label>
                                    <textarea name="description" required>{{ $item->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <div>
                                        <input type="hidden" name="is_active" value="0">
                                        <label class="inline-checkbox"><input type="checkbox" name="is_active" value="1" {{ $item->is_active ? 'checked' : '' }}> Aktif</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Update Step</button>
                            </div>
                        </form>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-card">
        <div class="section-head">
            <h2 class="section-title">Statistik & Trust Signal</h2>
            <p class="section-subtitle">Kelola item statistik yang tampil di Home.</p>
        </div>
        <div class="section-body">
            <form method="POST" action="{{ route('admin.home.stats.store') }}">
                @csrf
                <div class="form-grid">
                    <div class="form-group">
                        <label>Number</label>
                        <input type="text" name="number" placeholder="150+" required>
                    </div>
                    <div class="form-group">
                        <label>Label</label>
                        <input type="text" name="label" required>
                    </div>
                    <div class="form-group">
                        <label>Icon Class</label>
                        <input type="text" name="icon" placeholder="bi bi-buildings">
                    </div>
                    <div class="form-group">
                        <label>Sort Order</label>
                        <input type="number" name="sort_order" value="0" min="0" required>
                    </div>
                    <div class="form-group full">
                        <label>Description (opsional)</label>
                        <textarea name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <div>
                            <input type="hidden" name="is_active" value="0">
                            <label class="inline-checkbox"><input type="checkbox" name="is_active" value="1" checked> Aktif</label>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-accent">Tambah Statistik</button>
                </div>
            </form>

            <div class="item-list">
                @foreach ($stats as $item)
                    <article class="item-card">
                        <div class="item-card-head">
                            <h3 class="item-card-title">Stat #{{ $item->id }}</h3>
                            <form method="POST" action="{{ route('admin.home.stats.destroy', $item) }}" class="delete-form js-delete-form" data-confirm="Hapus item statistik ini?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>

                        <form method="POST" action="{{ route('admin.home.stats.update', $item) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-grid">
                                <div class="form-group">
                                    <label>Number</label>
                                    <input type="text" name="number" value="{{ $item->number }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Label</label>
                                    <input type="text" name="label" value="{{ $item->label }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Icon Class</label>
                                    <input type="text" name="icon" value="{{ $item->icon }}">
                                </div>
                                <div class="form-group">
                                    <label>Sort Order</label>
                                    <input type="number" name="sort_order" min="0" value="{{ $item->sort_order }}" required>
                                </div>
                                <div class="form-group full">
                                    <label>Description (opsional)</label>
                                    <textarea name="description">{{ $item->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <div>
                                        <input type="hidden" name="is_active" value="0">
                                        <label class="inline-checkbox"><input type="checkbox" name="is_active" value="1" {{ $item->is_active ? 'checked' : '' }}> Aktif</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Update Statistik</button>
                            </div>
                        </form>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
</div>

<script src="{{ asset('assets/js/admin-home.js') }}"></script>
</body>
</html>
