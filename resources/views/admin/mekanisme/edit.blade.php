<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mekanisme Kemitraan - OTOBIZ Admin</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('assets/images/logo_otobiz.jpeg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/admin-mekanisme.css') }}">
</head>
<body>
<div class="page-wrap">
    <header class="page-head">
        <div>
            <div class="breadcrumb">Admin / Mekanisme Kemitraan</div>
            <h1 class="page-title">Edit Mekanisme Kemitraan</h1>
        </div>
        <div class="page-actions">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline">Kembali ke Dashboard</a>
            <a href="{{ route('mekanisme') }}" class="btn btn-accent" target="_blank" rel="noopener">Lihat Halaman</a>
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
            <h2 class="section-title">1. Hero & CTA Utama</h2>
            <p class="section-subtitle">Mengatur konten utama hero, gambar background hero, heading section, dan CTA penutup Mekanisme.</p>
        </div>
        <div class="section-body">
            <form method="POST" action="{{ route('admin.mekanisme.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-grid">
                    <div class="form-group">
                        <label for="hero_badge_one">Hero Badge 1</label>
                        <input type="text" id="hero_badge_one" name="hero_badge_one" value="{{ old('hero_badge_one', $content->hero_badge_one) }}">
                    </div>
                    <div class="form-group">
                        <label for="hero_badge_two">Hero Badge 2</label>
                        <input type="text" id="hero_badge_two" name="hero_badge_two" value="{{ old('hero_badge_two', $content->hero_badge_two) }}">
                    </div>
                    <div class="form-group">
                        <label for="hero_badge_three">Hero Badge 3</label>
                        <input type="text" id="hero_badge_three" name="hero_badge_three" value="{{ old('hero_badge_three', $content->hero_badge_three) }}">
                    </div>

                    <div class="form-group full">
                        <label for="hero_title">Hero Title</label>
                        <input type="text" id="hero_title" name="hero_title" value="{{ old('hero_title', $content->hero_title) }}" required>
                    </div>

                    <div class="form-group full">
                        <label for="hero_description">Hero Description</label>
                        <textarea id="hero_description" name="hero_description" required>{{ old('hero_description', $content->hero_description) }}</textarea>
                    </div>

                    <div class="form-group full">
                        <label for="hero_background_image">Hero Background Image (opsional)</label>
                        <input type="file" id="hero_background_image" name="hero_background_image" accept="image/png,image/jpeg,image/webp">
                        @if (!empty($content->hero_background_image))
                            @php
                                $heroBgPreview = Illuminate\Support\Str::startsWith($content->hero_background_image, ['http://', 'https://', '/'])
                                    ? $content->hero_background_image
                                    : Illuminate\Support\Facades\Storage::url($content->hero_background_image);
                            @endphp
                            <p style="margin-top:8px;margin-bottom:8px;font-size:0.88rem;color:#5a5f68;">Preview background hero saat ini:</p>
                            <img src="{{ $heroBgPreview }}" alt="Preview Background Hero Mekanisme" style="max-width:320px;width:100%;height:auto;border-radius:12px;border:1px solid rgba(68, 68, 74, 0.12);">
                            <label class="inline-checkbox" style="margin-top:10px;"><input type="checkbox" name="remove_hero_background_image" value="1"> Hapus background hero saat ini</label>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="hero_primary_button_text">Hero Primary Button Text</label>
                        <input type="text" id="hero_primary_button_text" name="hero_primary_button_text" value="{{ old('hero_primary_button_text', $content->hero_primary_button_text) }}">
                    </div>
                    <div class="form-group">
                        <label for="hero_primary_button_link">Hero Primary Button Link</label>
                        <input type="text" id="hero_primary_button_link" name="hero_primary_button_link" value="{{ old('hero_primary_button_link', $content->hero_primary_button_link) }}" placeholder="/gabung atau #faq">
                    </div>

                    <div class="form-group">
                        <label for="hero_secondary_button_text">Hero Secondary Button Text</label>
                        <input type="text" id="hero_secondary_button_text" name="hero_secondary_button_text" value="{{ old('hero_secondary_button_text', $content->hero_secondary_button_text) }}">
                    </div>
                    <div class="form-group">
                        <label for="hero_secondary_button_link">Hero Secondary Button Link</label>
                        <input type="text" id="hero_secondary_button_link" name="hero_secondary_button_link" value="{{ old('hero_secondary_button_link', $content->hero_secondary_button_link) }}" placeholder="/kontak atau #syarat">
                    </div>

                    <div class="form-group">
                        <label for="business_section_title">Business Section Title</label>
                        <input type="text" id="business_section_title" name="business_section_title" value="{{ old('business_section_title', $content->business_section_title) }}">
                    </div>
                    <div class="form-group">
                        <label for="flow_section_title">Flow Section Title</label>
                        <input type="text" id="flow_section_title" name="flow_section_title" value="{{ old('flow_section_title', $content->flow_section_title) }}">
                    </div>

                    <div class="form-group full">
                        <label for="flow_note_text">Flow Note Text</label>
                        <textarea id="flow_note_text" name="flow_note_text">{{ old('flow_note_text', $content->flow_note_text) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="terms_section_title">Terms Section Title</label>
                        <input type="text" id="terms_section_title" name="terms_section_title" value="{{ old('terms_section_title', $content->terms_section_title) }}">
                    </div>
                    <div class="form-group">
                        <label for="faq_section_title">FAQ Section Title</label>
                        <input type="text" id="faq_section_title" name="faq_section_title" value="{{ old('faq_section_title', $content->faq_section_title) }}">
                    </div>

                    <div class="form-group full">
                        <label for="cta_title">CTA Title</label>
                        <input type="text" id="cta_title" name="cta_title" value="{{ old('cta_title', $content->cta_title) }}">
                    </div>

                    <div class="form-group full">
                        <label for="cta_description">CTA Description</label>
                        <textarea id="cta_description" name="cta_description">{{ old('cta_description', $content->cta_description) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="cta_primary_button_text">CTA Primary Button Text</label>
                        <input type="text" id="cta_primary_button_text" name="cta_primary_button_text" value="{{ old('cta_primary_button_text', $content->cta_primary_button_text) }}">
                    </div>
                    <div class="form-group">
                        <label for="cta_primary_button_link">CTA Primary Button Link</label>
                        <input type="text" id="cta_primary_button_link" name="cta_primary_button_link" value="{{ old('cta_primary_button_link', $content->cta_primary_button_link) }}" placeholder="/gabung atau https://...">
                    </div>

                    <div class="form-group">
                        <label for="cta_secondary_button_text">CTA Secondary Button Text</label>
                        <input type="text" id="cta_secondary_button_text" name="cta_secondary_button_text" value="{{ old('cta_secondary_button_text', $content->cta_secondary_button_text) }}">
                    </div>
                    <div class="form-group">
                        <label for="cta_secondary_button_link">CTA Secondary Button Link</label>
                        <input type="text" id="cta_secondary_button_link" name="cta_secondary_button_link" value="{{ old('cta_secondary_button_link', $content->cta_secondary_button_link) }}">
                    </div>

                    <div class="form-group">
                        <label for="cta_third_button_text">CTA Third Button Text</label>
                        <input type="text" id="cta_third_button_text" name="cta_third_button_text" value="{{ old('cta_third_button_text', $content->cta_third_button_text) }}">
                    </div>
                    <div class="form-group">
                        <label for="cta_third_button_link">CTA Third Button Link</label>
                        <input type="text" id="cta_third_button_link" name="cta_third_button_link" value="{{ old('cta_third_button_link', $content->cta_third_button_link) }}">
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Simpan Konten Utama Mekanisme</button>
                </div>
            </form>
        </div>
    </section>

    <section class="section-card">
        <div class="section-head">
            <h2 class="section-title">2. Model Bisnis Kemitraan</h2>
            <p class="section-subtitle">Kelola card model bisnis: title, description, icon, type, urutan, dan status aktif.</p>
        </div>
        <div class="section-body">
            <article class="item-card new-item">
                <div class="item-card-head">
                    <h3 class="item-card-title">Tambah Card Model Bisnis</h3>
                </div>
                <form method="POST" action="{{ route('admin.mekanisme.business-models.store') }}">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" required>
                        </div>
                        <div class="form-group">
                            <label>Icon (opsional)</label>
                            <input type="text" name="icon" placeholder="fa-solid fa-chart-pie">
                        </div>
                        <div class="form-group">
                            <label>Item Type</label>
                            <input type="text" name="item_type" placeholder="ownership / profit_sharing / roles">
                        </div>
                        <div class="form-group">
                            <label>Sort Order</label>
                            <input type="number" name="sort_order" min="0" value="0" required>
                        </div>
                        <div class="form-group full">
                            <label>Description</label>
                            <textarea name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <input type="hidden" name="is_active" value="0">
                            <label class="inline-checkbox"><input type="checkbox" name="is_active" value="1" checked> Aktif</label>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-accent">Tambah Card Model Bisnis</button>
                    </div>
                </form>
            </article>

            <div class="item-list">
                @foreach ($businessModels as $item)
                    <article class="item-card">
                        <div class="item-card-head">
                            <h3 class="item-card-title">Card Model Bisnis #{{ $item->id }}</h3>
                            <form method="POST" action="{{ route('admin.mekanisme.business-models.destroy', $item->id) }}" class="js-delete-form" data-confirm="Hapus card model bisnis ini?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>

                        <form method="POST" action="{{ route('admin.mekanisme.business-models.update', $item->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-grid">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" value="{{ $item->title }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Icon (opsional)</label>
                                    <input type="text" name="icon" value="{{ $item->icon }}">
                                </div>
                                <div class="form-group">
                                    <label>Item Type</label>
                                    <input type="text" name="item_type" value="{{ $item->item_type }}">
                                </div>
                                <div class="form-group">
                                    <label>Sort Order</label>
                                    <input type="number" name="sort_order" min="0" value="{{ $item->sort_order }}" required>
                                </div>
                                <div class="form-group full">
                                    <label>Description</label>
                                    <textarea name="description">{{ $item->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="hidden" name="is_active" value="0">
                                    <label class="inline-checkbox"><input type="checkbox" name="is_active" value="1" {{ $item->is_active ? 'checked' : '' }}> Aktif</label>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Update Card Model Bisnis</button>
                            </div>
                        </form>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-card">
        <div class="section-head">
            <h2 class="section-title">3. Points Model Bisnis</h2>
            <p class="section-subtitle">Kelola point untuk setiap card model bisnis. Ditampilkan berkelompok per card.</p>
        </div>
        <div class="section-body">
            <div class="group-list">
                @foreach ($businessModels as $model)
                    @php($points = $businessModelPoints->get($model->id, collect()))
                    <article class="group-card">
                        <div class="group-head">
                            <div>
                                <h3 class="group-title">{{ $model->title }} <span class="group-meta">({{ $model->item_type ?: 'tanpa tipe' }})</span></h3>
                                <p class="group-subtitle">Kelola point untuk card ini.</p>
                            </div>
                            <button type="button" class="btn btn-outline btn-small js-collapse-toggle" data-collapse-target="business-points-{{ $model->id }}">Tampil/Sembunyi</button>
                        </div>

                        <div id="business-points-{{ $model->id }}" class="group-body">
                            <article class="item-card new-item inner-card">
                                <div class="item-card-head">
                                    <h4 class="item-card-title">Tambah Point Baru</h4>
                                </div>
                                <form method="POST" action="{{ route('admin.mekanisme.business-model-points.store', $model->id) }}">
                                    @csrf
                                    <div class="form-grid">
                                        <div class="form-group full">
                                            <label>Point Text</label>
                                            <textarea name="point_text" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Sort Order</label>
                                            <input type="number" name="sort_order" min="0" value="0" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <input type="hidden" name="is_active" value="0">
                                            <label class="inline-checkbox"><input type="checkbox" name="is_active" value="1" checked> Aktif</label>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-accent">Tambah Point</button>
                                    </div>
                                </form>
                            </article>

                            @foreach ($points as $point)
                                <article class="item-card inner-card">
                                    <div class="item-card-head">
                                        <h4 class="item-card-title">Point #{{ $point->id }}</h4>
                                        <form method="POST" action="{{ route('admin.mekanisme.business-model-points.destroy', $point->id) }}" class="js-delete-form" data-confirm="Hapus point model bisnis ini?">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                    <form method="POST" action="{{ route('admin.mekanisme.business-model-points.update', $point->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-grid">
                                            <div class="form-group full">
                                                <label>Point Text</label>
                                                <textarea name="point_text" required>{{ $point->point_text }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Sort Order</label>
                                                <input type="number" name="sort_order" min="0" value="{{ $point->sort_order }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <input type="hidden" name="is_active" value="0">
                                                <label class="inline-checkbox"><input type="checkbox" name="is_active" value="1" {{ $point->is_active ? 'checked' : '' }}> Aktif</label>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-primary">Update Point</button>
                                        </div>
                                    </form>
                                </article>
                            @endforeach
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-card">
        <div class="section-head">
            <h2 class="section-title">4. Alur Kemitraan</h2>
            <p class="section-subtitle">Kelola langkah alur: title, description, icon, urutan, dan status aktif.</p>
        </div>
        <div class="section-body">
            <article class="item-card new-item">
                <div class="item-card-head">
                    <h3 class="item-card-title">Tambah Langkah Alur</h3>
                </div>
                <form method="POST" action="{{ route('admin.mekanisme.flow-steps.store') }}">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" required>
                        </div>
                        <div class="form-group">
                            <label>Icon (opsional)</label>
                            <input type="text" name="icon" placeholder="fa-solid fa-list-check">
                        </div>
                        <div class="form-group">
                            <label>Sort Order</label>
                            <input type="number" name="sort_order" min="0" value="0" required>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <input type="hidden" name="is_active" value="0">
                            <label class="inline-checkbox"><input type="checkbox" name="is_active" value="1" checked> Aktif</label>
                        </div>
                        <div class="form-group full">
                            <label>Description</label>
                            <textarea name="description"></textarea>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-accent">Tambah Langkah Alur</button>
                    </div>
                </form>
            </article>

            <div class="item-list">
                @foreach ($flowSteps as $item)
                    <article class="item-card">
                        <div class="item-card-head">
                            <h3 class="item-card-title">Langkah Alur #{{ $item->id }}</h3>
                            <form method="POST" action="{{ route('admin.mekanisme.flow-steps.destroy', $item->id) }}" class="js-delete-form" data-confirm="Hapus langkah alur ini?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                        <form method="POST" action="{{ route('admin.mekanisme.flow-steps.update', $item->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-grid">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" value="{{ $item->title }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Icon (opsional)</label>
                                    <input type="text" name="icon" value="{{ $item->icon }}">
                                </div>
                                <div class="form-group">
                                    <label>Sort Order</label>
                                    <input type="number" name="sort_order" min="0" value="{{ $item->sort_order }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="hidden" name="is_active" value="0">
                                    <label class="inline-checkbox"><input type="checkbox" name="is_active" value="1" {{ $item->is_active ? 'checked' : '' }}> Aktif</label>
                                </div>
                                <div class="form-group full">
                                    <label>Description</label>
                                    <textarea name="description">{{ $item->description }}</textarea>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Update Langkah Alur</button>
                            </div>
                        </form>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-card">
        <div class="section-head">
            <h2 class="section-title">5. Points Alur Kemitraan</h2>
            <p class="section-subtitle">Kelola point untuk tiap langkah alur. Ditampilkan berkelompok per langkah.</p>
        </div>
        <div class="section-body">
            <div class="group-list">
                @foreach ($flowSteps as $step)
                    @php($points = $flowStepPoints->get($step->id, collect()))
                    <article class="group-card">
                        <div class="group-head">
                            <div>
                                <h3 class="group-title">{{ $step->title }}</h3>
                                <p class="group-subtitle">Kelola point untuk langkah ini.</p>
                            </div>
                            <button type="button" class="btn btn-outline btn-small js-collapse-toggle" data-collapse-target="flow-points-{{ $step->id }}">Tampil/Sembunyi</button>
                        </div>

                        <div id="flow-points-{{ $step->id }}" class="group-body">
                            <article class="item-card new-item inner-card">
                                <div class="item-card-head">
                                    <h4 class="item-card-title">Tambah Point Baru</h4>
                                </div>
                                <form method="POST" action="{{ route('admin.mekanisme.flow-step-points.store', $step->id) }}">
                                    @csrf
                                    <div class="form-grid">
                                        <div class="form-group full">
                                            <label>Point Text</label>
                                            <textarea name="point_text" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Sort Order</label>
                                            <input type="number" name="sort_order" min="0" value="0" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <input type="hidden" name="is_active" value="0">
                                            <label class="inline-checkbox"><input type="checkbox" name="is_active" value="1" checked> Aktif</label>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-accent">Tambah Point</button>
                                    </div>
                                </form>
                            </article>

                            @foreach ($points as $point)
                                <article class="item-card inner-card">
                                    <div class="item-card-head">
                                        <h4 class="item-card-title">Point #{{ $point->id }}</h4>
                                        <form method="POST" action="{{ route('admin.mekanisme.flow-step-points.destroy', $point->id) }}" class="js-delete-form" data-confirm="Hapus point langkah alur ini?">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                    <form method="POST" action="{{ route('admin.mekanisme.flow-step-points.update', $point->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-grid">
                                            <div class="form-group full">
                                                <label>Point Text</label>
                                                <textarea name="point_text" required>{{ $point->point_text }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Sort Order</label>
                                                <input type="number" name="sort_order" min="0" value="{{ $point->sort_order }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <input type="hidden" name="is_active" value="0">
                                                <label class="inline-checkbox"><input type="checkbox" name="is_active" value="1" {{ $point->is_active ? 'checked' : '' }}> Aktif</label>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-primary">Update Point</button>
                                        </div>
                                    </form>
                                </article>
                            @endforeach
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-card">
        <div class="section-head">
            <h2 class="section-title">6. Syarat & Ketentuan</h2>
            <p class="section-subtitle">Kelola item syarat dan ketentuan: title, description, icon, urutan, dan status aktif.</p>
        </div>
        <div class="section-body">
            <article class="item-card new-item">
                <div class="item-card-head">
                    <h3 class="item-card-title">Tambah Syarat Baru</h3>
                </div>
                <form method="POST" action="{{ route('admin.mekanisme.terms.store') }}">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Title (opsional)</label>
                            <input type="text" name="title">
                        </div>
                        <div class="form-group">
                            <label>Icon (opsional)</label>
                            <input type="text" name="icon" placeholder="fa-solid fa-file-contract">
                        </div>
                        <div class="form-group">
                            <label>Sort Order</label>
                            <input type="number" name="sort_order" min="0" value="0" required>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <input type="hidden" name="is_active" value="0">
                            <label class="inline-checkbox"><input type="checkbox" name="is_active" value="1" checked> Aktif</label>
                        </div>
                        <div class="form-group full">
                            <label>Description</label>
                            <textarea name="description" required></textarea>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-accent">Tambah Syarat</button>
                    </div>
                </form>
            </article>

            <div class="item-list">
                @foreach ($terms as $item)
                    <article class="item-card">
                        <div class="item-card-head">
                            <h3 class="item-card-title">Syarat #{{ $item->id }}</h3>
                            <form method="POST" action="{{ route('admin.mekanisme.terms.destroy', $item->id) }}" class="js-delete-form" data-confirm="Hapus syarat ini?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                        <form method="POST" action="{{ route('admin.mekanisme.terms.update', $item->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-grid">
                                <div class="form-group">
                                    <label>Title (opsional)</label>
                                    <input type="text" name="title" value="{{ $item->title }}">
                                </div>
                                <div class="form-group">
                                    <label>Icon (opsional)</label>
                                    <input type="text" name="icon" value="{{ $item->icon }}">
                                </div>
                                <div class="form-group">
                                    <label>Sort Order</label>
                                    <input type="number" name="sort_order" min="0" value="{{ $item->sort_order }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="hidden" name="is_active" value="0">
                                    <label class="inline-checkbox"><input type="checkbox" name="is_active" value="1" {{ $item->is_active ? 'checked' : '' }}> Aktif</label>
                                </div>
                                <div class="form-group full">
                                    <label>Description</label>
                                    <textarea name="description" required>{{ $item->description }}</textarea>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Update Syarat</button>
                            </div>
                        </form>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-card">
        <div class="section-head">
            <h2 class="section-title">7. FAQ</h2>
            <p class="section-subtitle">Kelola pertanyaan umum (FAQ), urutan tampil, dan status aktif.</p>
        </div>
        <div class="section-body">
            <article class="item-card new-item">
                <div class="item-card-head">
                    <h3 class="item-card-title">Tambah FAQ Baru</h3>
                </div>
                <form method="POST" action="{{ route('admin.mekanisme.faqs.store') }}">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group full">
                            <label>Question</label>
                            <input type="text" name="question" required>
                        </div>
                        <div class="form-group full">
                            <label>Answer</label>
                            <textarea name="answer" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Sort Order</label>
                            <input type="number" name="sort_order" min="0" value="0" required>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <input type="hidden" name="is_active" value="0">
                            <label class="inline-checkbox"><input type="checkbox" name="is_active" value="1" checked> Aktif</label>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-accent">Tambah FAQ</button>
                    </div>
                </form>
            </article>

            <div class="item-list">
                @foreach ($faqs as $item)
                    <article class="item-card">
                        <div class="item-card-head">
                            <h3 class="item-card-title">FAQ #{{ $item->id }}</h3>
                            <form method="POST" action="{{ route('admin.mekanisme.faqs.destroy', $item->id) }}" class="js-delete-form" data-confirm="Hapus FAQ ini?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                        <form method="POST" action="{{ route('admin.mekanisme.faqs.update', $item->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-grid">
                                <div class="form-group full">
                                    <label>Question</label>
                                    <input type="text" name="question" value="{{ $item->question }}" required>
                                </div>
                                <div class="form-group full">
                                    <label>Answer</label>
                                    <textarea name="answer" required>{{ $item->answer }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Sort Order</label>
                                    <input type="number" name="sort_order" min="0" value="{{ $item->sort_order }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="hidden" name="is_active" value="0">
                                    <label class="inline-checkbox"><input type="checkbox" name="is_active" value="1" {{ $item->is_active ? 'checked' : '' }}> Aktif</label>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Update FAQ</button>
                            </div>
                        </form>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
</div>

<script src="{{ asset('assets/js/admin-mekanisme.js') }}"></script>
</body>
</html>
