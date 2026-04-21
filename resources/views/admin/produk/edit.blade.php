<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk - OTOBIZ Admin</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('assets/images/logo_favicon.jpeg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/css/admin-produk.css') }}">
</head>
<body>
@php
    $imageUrl = function (?string $path): string {
        if (!$path) {
            return 'https://via.placeholder.com/480x270?text=Belum+Ada+Gambar';
        }

        if (Illuminate\Support\Str::startsWith($path, ['http://', 'https://', '/'])) {
            return $path;
        }

        return Storage::url($path);
    };
@endphp
<div class="admin-produk-wrap">
    <header class="page-head">
        <div>
            <div class="breadcrumb">Admin / Produk</div>
            <h1 class="page-title">Edit Produk</h1>
        </div>
        <div class="page-actions">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline">Kembali ke Dashboard</a>
            <a href="{{ route('produk') }}" class="btn btn-accent" target="_blank" rel="noopener">Lihat Halaman</a>
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
            <h2 class="section-title">1. Konten Utama Produk</h2>
            <p class="section-subtitle">Mengatur hero, gambar hero, judul section, dan CTA halaman Produk.</p>
        </div>
        <div class="section-body">
            <form method="POST" action="{{ route('admin.produk.update') }}" class="stack-form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="form_section" value="main_content">

                <div class="form-grid">
                    <div class="form-group">
                        <label>Hero Badge Text</label>
                        <input type="text" name="hero_badge_text" value="{{ old('hero_badge_text', $productContent->hero_badge_text) }}">
                    </div>
                    <div class="form-group full">
                        <label>Hero Title</label>
                        <input type="text" name="hero_title" required value="{{ old('hero_title', $productContent->hero_title) }}">
                    </div>
                    <div class="form-group full">
                        <label>Hero Description</label>
                        <textarea name="hero_description" required>{{ old('hero_description', $productContent->hero_description) }}</textarea>
                    </div>
                    <div class="form-group full">
                        <label>Hero Image (opsional)</label>
                        <input type="file" name="hero_image" accept="image/png,image/jpeg,image/webp">
                        @if (!empty($productContent->hero_image))
                            @php
                                $heroImagePreview = Illuminate\Support\Str::startsWith($productContent->hero_image, ['http://', 'https://', '/'])
                                    ? $productContent->hero_image
                                    : Storage::url($productContent->hero_image);
                            @endphp
                            <p style="margin-top:8px;margin-bottom:8px;font-size:0.88rem;color:#5a5f68;">Preview gambar hero saat ini:</p>
                            <img src="{{ $heroImagePreview }}" alt="Preview Hero Produk" class="image-preview">
                            <label class="checkbox-label" style="margin-top:10px;"><input type="checkbox" name="remove_hero_image" value="1"> Hapus gambar hero saat ini</label>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Hero Primary Button Text</label>
                        <input type="text" name="hero_primary_button_text" value="{{ old('hero_primary_button_text', $productContent->hero_primary_button_text) }}">
                    </div>
                    <div class="form-group">
                        <label>Hero Primary Button Link</label>
                        <input type="text" name="hero_primary_button_link" placeholder="#produk-simulation atau /produk" value="{{ old('hero_primary_button_link', $productContent->hero_primary_button_link) }}">
                    </div>
                    <div class="form-group">
                        <label>Hero Secondary Button Text</label>
                        <input type="text" name="hero_secondary_button_text" value="{{ old('hero_secondary_button_text', $productContent->hero_secondary_button_text) }}">
                    </div>
                    <div class="form-group">
                        <label>Hero Secondary Button Link</label>
                        <input type="text" name="hero_secondary_button_link" value="{{ old('hero_secondary_button_link', $productContent->hero_secondary_button_link) }}">
                    </div>

                    <div class="form-group">
                        <label>Packages Section Title</label>
                        <input type="text" name="packages_section_title" required value="{{ old('packages_section_title', $productContent->packages_section_title) }}">
                    </div>
                    <div class="form-group full">
                        <label>Packages Section Note</label>
                        <textarea name="packages_section_note">{{ old('packages_section_note', $productContent->packages_section_note) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Units Section Title</label>
                        <input type="text" name="units_section_title" required value="{{ old('units_section_title', $productContent->units_section_title) }}">
                    </div>
                    <div class="form-group">
                        <label>Specs Section Title</label>
                        <input type="text" name="specs_section_title" required value="{{ old('specs_section_title', $productContent->specs_section_title) }}">
                    </div>
                    <div class="form-group">
                        <label>Simulation Section Title</label>
                        <input type="text" name="simulation_section_title" required value="{{ old('simulation_section_title', $productContent->simulation_section_title) }}">
                    </div>
                    <div class="form-group full">
                        <label>Simulation Disclaimer</label>
                        <textarea name="simulation_disclaimer">{{ old('simulation_disclaimer', $productContent->simulation_disclaimer) }}</textarea>
                    </div>

                    <div class="form-group full">
                        <label>CTA Title</label>
                        <input type="text" name="cta_title" required value="{{ old('cta_title', $productContent->cta_title) }}">
                    </div>
                    <div class="form-group full">
                        <label>CTA Description</label>
                        <textarea name="cta_description" required>{{ old('cta_description', $productContent->cta_description) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>CTA Primary Button Text</label>
                        <input type="text" name="cta_primary_button_text" value="{{ old('cta_primary_button_text', $productContent->cta_primary_button_text) }}">
                    </div>
                    <div class="form-group">
                        <label>CTA Primary Button Link</label>
                        <input type="text" name="cta_primary_button_link" value="{{ old('cta_primary_button_link', $productContent->cta_primary_button_link) }}">
                    </div>
                    <div class="form-group">
                        <label>CTA Secondary Button Text</label>
                        <input type="text" name="cta_secondary_button_text" value="{{ old('cta_secondary_button_text', $productContent->cta_secondary_button_text) }}">
                    </div>
                    <div class="form-group">
                        <label>CTA Secondary Button Link</label>
                        <input type="text" name="cta_secondary_button_link" value="{{ old('cta_secondary_button_link', $productContent->cta_secondary_button_link) }}">
                    </div>
                    <div class="form-group">
                        <label>CTA Third Button Text</label>
                        <input type="text" name="cta_third_button_text" value="{{ old('cta_third_button_text', $productContent->cta_third_button_text) }}">
                    </div>
                    <div class="form-group">
                        <label>CTA Third Button Link</label>
                        <input type="text" name="cta_third_button_link" value="{{ old('cta_third_button_link', $productContent->cta_third_button_link) }}">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Konten Utama Produk</button>
            </form>
        </div>
    </section>

    <section class="section-card">
        <div class="section-head">
            <h2 class="section-title">2. Unit Kendaraan</h2>
            <p class="section-subtitle">Tambah, edit, hapus unit, upload gambar utama, aktif/nonaktif, dan urutan tampil.</p>
        </div>
        <div class="section-body">
            <details class="editor-block" open>
                <summary>Tambah Unit Kendaraan Baru</summary>
                <form method="POST" action="{{ route('admin.produk.units.store') }}" enctype="multipart/form-data" class="stack-form">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group"><label>Nama Unit</label><input type="text" name="name" required></div>
                        <div class="form-group"><label>Kategori</label><input type="text" name="category" placeholder="EV / Konvensional"></div>
                        <div class="form-group"><label>Jenis Unit</label><input type="text" name="unit_type"></div>
                        <div class="form-group"><label>Status</label><input type="text" name="status" placeholder="Tersedia"></div>
                        <div class="form-group full"><label>Deskripsi Singkat</label><textarea name="short_description"></textarea></div>
                        <div class="form-group"><label>Jenis Energi</label><input type="text" name="energy_type"></div>
                        <div class="form-group"><label>Kapasitas</label><input type="text" name="capacity"></div>
                        <div class="form-group"><label>Kegunaan Operasional</label><input type="text" name="operational_use"></div>
                        <div class="form-group full"><label>Keunggulan Utama</label><textarea name="main_advantages"></textarea></div>
                        <div class="form-group"><label>Badge Text</label><input type="text" name="badge_text"></div>
                        <div class="form-group"><label>Sort Order</label><input type="number" name="sort_order" min="0" value="1"></div>
                        <div class="form-group"><label>Main Image</label><input type="file" name="main_image" accept="image/*" class="js-image-input" data-preview-target="preview-new-unit" required></div>
                        <div class="form-group"><label class="checkbox-label"><input type="checkbox" name="is_active" value="1" checked> Aktif</label></div>
                        <div class="form-group full"><img id="preview-new-unit" class="image-preview" src="https://via.placeholder.com/480x270?text=Preview+Main+Image" alt="Preview main image"></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Unit</button>
                </form>
            </details>

            <div class="list-block">
                @forelse ($units as $unit)
                    <details class="editor-item">
                        <summary>
                            <span>{{ $unit->name }}</span>
                            <span class="meta">Kategori: {{ $unit->category ?: '-' }} | Sort: {{ $unit->sort_order }} | {{ $unit->is_active ? 'Aktif' : 'Nonaktif' }}</span>
                        </summary>
                        <div class="item-body">
                            <img class="image-preview" src="{{ $imageUrl($unit->main_image) }}" alt="{{ $unit->name }}">
                            <form method="POST" action="{{ route('admin.produk.units.update', $unit->id) }}" enctype="multipart/form-data" class="stack-form">
                                @csrf
                                @method('PUT')
                                <div class="form-grid">
                                    <div class="form-group"><label>Nama Unit</label><input type="text" name="name" required value="{{ $unit->name }}"></div>
                                    <div class="form-group"><label>Kategori</label><input type="text" name="category" value="{{ $unit->category }}"></div>
                                    <div class="form-group"><label>Jenis Unit</label><input type="text" name="unit_type" value="{{ $unit->unit_type }}"></div>
                                    <div class="form-group"><label>Status</label><input type="text" name="status" value="{{ $unit->status }}"></div>
                                    <div class="form-group full"><label>Deskripsi Singkat</label><textarea name="short_description">{{ $unit->short_description }}</textarea></div>
                                    <div class="form-group"><label>Jenis Energi</label><input type="text" name="energy_type" value="{{ $unit->energy_type }}"></div>
                                    <div class="form-group"><label>Kapasitas</label><input type="text" name="capacity" value="{{ $unit->capacity }}"></div>
                                    <div class="form-group"><label>Kegunaan Operasional</label><input type="text" name="operational_use" value="{{ $unit->operational_use }}"></div>
                                    <div class="form-group full"><label>Keunggulan Utama</label><textarea name="main_advantages">{{ $unit->main_advantages }}</textarea></div>
                                    <div class="form-group"><label>Badge Text</label><input type="text" name="badge_text" value="{{ $unit->badge_text }}"></div>
                                    <div class="form-group"><label>Sort Order</label><input type="number" name="sort_order" min="0" value="{{ $unit->sort_order }}"></div>
                                    <div class="form-group"><label>Ganti Main Image</label><input type="file" name="main_image" accept="image/*" class="js-image-input" data-preview-target="preview-unit-{{ $unit->id }}"></div>
                                    <div class="form-group"><label class="checkbox-label"><input type="checkbox" name="is_active" value="1" @checked($unit->is_active)> Aktif</label></div>
                                    <div class="form-group full"><img id="preview-unit-{{ $unit->id }}" class="image-preview" src="{{ $imageUrl($unit->main_image) }}" alt="Preview {{ $unit->name }}"></div>
                                </div>
                                <div class="row-actions">
                                    <button type="submit" class="btn btn-primary">Simpan Unit</button>
                                </div>
                            </form>
                            <form method="POST" action="{{ route('admin.produk.units.destroy', $unit->id) }}" class="inline-delete js-confirm-delete" data-confirm="Hapus unit ini? Paket dan galeri terkait akan ikut terhapus.">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus Unit</button>
                            </form>
                        </div>
                    </details>
                @empty
                    <p class="empty-text">Belum ada unit kendaraan.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section class="section-card">
        <div class="section-head">
            <h2 class="section-title">3. Galeri Unit</h2>
            <p class="section-subtitle">Upload gambar galeri per unit, ubah alt text, urutan, dan status aktif.</p>
        </div>
        <div class="section-body">
            @forelse ($units as $unit)
                <details class="editor-block">
                    <summary>Galeri Unit: {{ $unit->name }}</summary>
                    <form method="POST" action="{{ route('admin.produk.galleries.store', $unit->id) }}" enctype="multipart/form-data" class="stack-form">
                        @csrf
                        <div class="form-grid">
                            <div class="form-group"><label>Upload Gambar</label><input type="file" name="image_file" accept="image/*" class="js-image-input" data-preview-target="preview-gallery-new-{{ $unit->id }}" required></div>
                            <div class="form-group"><label>Alt Text</label><input type="text" name="alt_text"></div>
                            <div class="form-group"><label>Sort Order</label><input type="number" name="sort_order" min="0" value="1"></div>
                            <div class="form-group"><label class="checkbox-label"><input type="checkbox" name="is_active" value="1" checked> Aktif</label></div>
                            <div class="form-group full"><img id="preview-gallery-new-{{ $unit->id }}" class="image-preview" src="https://via.placeholder.com/480x270?text=Preview+Gallery" alt="Preview galeri"></div>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Galeri</button>
                    </form>

                    <div class="list-block">
                        @forelse ($unit->galleries as $gallery)
                            <div class="editor-item open no-summary">
                                <div class="item-body">
                                    <img class="image-preview" src="{{ $imageUrl($gallery->image_path) }}" alt="{{ $gallery->alt_text ?: $unit->name }}">
                                    <form method="POST" action="{{ route('admin.produk.galleries.update', $gallery->id) }}" enctype="multipart/form-data" class="stack-form">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-grid">
                                            <div class="form-group"><label>Ganti Gambar</label><input type="file" name="image_file" accept="image/*" class="js-image-input" data-preview-target="preview-gallery-{{ $gallery->id }}"></div>
                                            <div class="form-group"><label>Alt Text</label><input type="text" name="alt_text" value="{{ $gallery->alt_text }}"></div>
                                            <div class="form-group"><label>Sort Order</label><input type="number" name="sort_order" min="0" value="{{ $gallery->sort_order }}"></div>
                                            <div class="form-group"><label class="checkbox-label"><input type="checkbox" name="is_active" value="1" @checked($gallery->is_active)> Aktif</label></div>
                                            <div class="form-group full"><img id="preview-gallery-{{ $gallery->id }}" class="image-preview" src="{{ $imageUrl($gallery->image_path) }}" alt="Preview galeri"></div>
                                        </div>
                                        <div class="row-actions">
                                            <button type="submit" class="btn btn-primary">Simpan Galeri</button>
                                        </div>
                                    </form>
                                    <form method="POST" action="{{ route('admin.produk.galleries.destroy', $gallery->id) }}" class="inline-delete js-confirm-delete" data-confirm="Hapus item galeri ini?">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus Galeri</button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p class="empty-text">Belum ada item galeri untuk unit ini.</p>
                        @endforelse
                    </div>
                </details>
            @empty
                <p class="empty-text">Tambahkan unit terlebih dahulu sebelum mengelola galeri.</p>
            @endforelse
        </div>
    </section>

    <section class="section-card">
        <div class="section-head">
            <h2 class="section-title">4. Paket Kemitraan</h2>
            <p class="section-subtitle">Setiap paket wajib terhubung ke satu unit kendaraan aktif.</p>
        </div>
        <div class="section-body">
            <details class="editor-block" open>
                <summary>Tambah Paket Kemitraan</summary>
                <form method="POST" action="{{ route('admin.produk.packages.store') }}" class="stack-form">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Unit Kendaraan (Wajib)</label>
                            <select name="product_unit_id" required>
                                <option value="">Pilih Unit</option>
                                @foreach ($activeUnits as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group"><label>Nama Paket</label><input type="text" name="name" required></div>
                        <div class="form-group"><label>Kategori</label><input type="text" name="category"></div>
                        <div class="form-group"><label>Badge Text</label><input type="text" name="badge_text"></div>
                        <div class="form-group"><label>Harga Kemitraan</label><input type="text" name="partnership_price" placeholder="Rp 0"></div>
                        <div class="form-group"><label>Harga Awal</label><input type="text" name="starting_price" placeholder="Rp 0"></div>
                        <div class="form-group full"><label>Deskripsi</label><textarea name="description"></textarea></div>
                        <div class="form-group"><label>CTA Text</label><input type="text" name="cta_text"></div>
                        <div class="form-group"><label>CTA Link</label><input type="text" name="cta_link"></div>
                        <div class="form-group"><label>Sort Order</label><input type="number" name="sort_order" min="0" value="1"></div>
                        <div class="form-group"><label class="checkbox-label"><input type="checkbox" name="is_popular" value="1"> Paket Populer</label></div>
                        <div class="form-group"><label class="checkbox-label"><input type="checkbox" name="is_active" value="1" checked> Aktif</label></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Paket</button>
                </form>
            </details>

            <div class="list-block">
                @forelse ($packages as $package)
                    <details class="editor-item">
                        <summary>
                            <span>{{ $package->name }}</span>
                            <span class="meta">Unit: {{ $package->unit->name ?? '-' }} | Sort: {{ $package->sort_order }} | {{ $package->is_active ? 'Aktif' : 'Nonaktif' }}</span>
                        </summary>
                        <div class="item-body">
                            <form method="POST" action="{{ route('admin.produk.packages.update', $package->id) }}" class="stack-form">
                                @csrf
                                @method('PUT')
                                <div class="form-grid">
                                    <div class="form-group">
                                        <label>Unit Kendaraan (Wajib)</label>
                                        <select name="product_unit_id" required>
                                            @foreach ($activeUnits as $unit)
                                                <option value="{{ $unit->id }}" @selected($package->product_unit_id === $unit->id)>{{ $unit->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group"><label>Nama Paket</label><input type="text" name="name" required value="{{ $package->name }}"></div>
                                    <div class="form-group"><label>Kategori</label><input type="text" name="category" value="{{ $package->category }}"></div>
                                    <div class="form-group"><label>Badge Text</label><input type="text" name="badge_text" value="{{ $package->badge_text }}"></div>
                                    <div class="form-group"><label>Harga Kemitraan</label><input type="text" name="partnership_price" value="{{ $package->partnership_price }}"></div>
                                    <div class="form-group"><label>Harga Awal</label><input type="text" name="starting_price" value="{{ $package->starting_price }}"></div>
                                    <div class="form-group full"><label>Deskripsi</label><textarea name="description">{{ $package->description }}</textarea></div>
                                    <div class="form-group"><label>CTA Text</label><input type="text" name="cta_text" value="{{ $package->cta_text }}"></div>
                                    <div class="form-group"><label>CTA Link</label><input type="text" name="cta_link" value="{{ $package->cta_link }}"></div>
                                    <div class="form-group"><label>Sort Order</label><input type="number" name="sort_order" min="0" value="{{ $package->sort_order }}"></div>
                                    <div class="form-group"><label class="checkbox-label"><input type="checkbox" name="is_popular" value="1" @checked($package->is_popular)> Paket Populer</label></div>
                                    <div class="form-group"><label class="checkbox-label"><input type="checkbox" name="is_active" value="1" @checked($package->is_active)> Aktif</label></div>
                                </div>
                                <div class="row-actions">
                                    <button type="submit" class="btn btn-primary">Simpan Paket</button>
                                </div>
                            </form>
                            <form method="POST" action="{{ route('admin.produk.packages.destroy', $package->id) }}" class="inline-delete js-confirm-delete" data-confirm="Hapus paket ini? Benefit terkait akan ikut terhapus.">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus Paket</button>
                            </form>
                        </div>
                    </details>
                @empty
                    <p class="empty-text">Belum ada paket kemitraan.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section class="section-card">
        <div class="section-head">
            <h2 class="section-title">5. Benefit Paket</h2>
            <p class="section-subtitle">Kelola benefit per paket: teks, urutan, dan status aktif.</p>
        </div>
        <div class="section-body">
            @forelse ($packages as $package)
                <details class="editor-block">
                    <summary>Benefit Paket: {{ $package->name }}</summary>
                    <form method="POST" action="{{ route('admin.produk.benefits.store', $package->id) }}" class="stack-form">
                        @csrf
                        <div class="form-grid">
                            <div class="form-group full"><label>Benefit Text</label><input type="text" name="benefit_text" required></div>
                            <div class="form-group"><label>Sort Order</label><input type="number" name="sort_order" min="0" value="1"></div>
                            <div class="form-group"><label class="checkbox-label"><input type="checkbox" name="is_active" value="1" checked> Aktif</label></div>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Benefit</button>
                    </form>

                    <div class="list-block">
                        @forelse ($package->benefits as $benefit)
                            <div class="editor-item open no-summary">
                                <div class="item-body">
                                    <form method="POST" action="{{ route('admin.produk.benefits.update', $benefit->id) }}" class="stack-form">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-grid">
                                            <div class="form-group full"><label>Benefit Text</label><input type="text" name="benefit_text" required value="{{ $benefit->benefit_text }}"></div>
                                            <div class="form-group"><label>Sort Order</label><input type="number" name="sort_order" min="0" value="{{ $benefit->sort_order }}"></div>
                                            <div class="form-group"><label class="checkbox-label"><input type="checkbox" name="is_active" value="1" @checked($benefit->is_active)> Aktif</label></div>
                                        </div>
                                        <div class="row-actions">
                                            <button type="submit" class="btn btn-primary">Simpan Benefit</button>
                                        </div>
                                    </form>
                                    <form method="POST" action="{{ route('admin.produk.benefits.destroy', $benefit->id) }}" class="inline-delete js-confirm-delete" data-confirm="Hapus benefit ini?">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus Benefit</button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p class="empty-text">Belum ada benefit untuk paket ini.</p>
                        @endforelse
                    </div>
                </details>
            @empty
                <p class="empty-text">Tambahkan paket terlebih dahulu sebelum mengelola benefit.</p>
            @endforelse
        </div>
    </section>

    <section class="section-card">
        <div class="section-head">
            <h2 class="section-title">6. Simulasi Keuntungan</h2>
            <p class="section-subtitle">Edit label kalkulator dan komposisi persentase bagi hasil.</p>
        </div>
        <div class="section-body">
            <form method="POST" action="{{ route('admin.produk.update') }}" class="stack-form">
                @csrf
                @method('PUT')
                <input type="hidden" name="form_section" value="simulation_content">

                <div class="form-grid">
                    <div class="form-group full"><label>Intro Text</label><textarea name="intro_text">{{ old('intro_text', $simulationContent->intro_text) }}</textarea></div>
                    <div class="form-group"><label>Daily Deposit Label</label><input type="text" name="daily_deposit_label" required value="{{ old('daily_deposit_label', $simulationContent->daily_deposit_label) }}"></div>
                    <div class="form-group"><label>Operating Days Label</label><input type="text" name="operating_days_label" required value="{{ old('operating_days_label', $simulationContent->operating_days_label) }}"></div>
                    <div class="form-group"><label>Operating Cost Label</label><input type="text" name="operating_cost_label" required value="{{ old('operating_cost_label', $simulationContent->operating_cost_label) }}"></div>
                    <div class="form-group"><label>Installment Label</label><input type="text" name="installment_label" required value="{{ old('installment_label', $simulationContent->installment_label) }}"></div>
                    <div class="form-group"><label>Total Operational Label</label><input type="text" name="result_total_operational_label" required value="{{ old('result_total_operational_label', $simulationContent->result_total_operational_label) }}"></div>
                    <div class="form-group"><label>Nett Profit Label</label><input type="text" name="result_net_profit_label" required value="{{ old('result_net_profit_label', $simulationContent->result_net_profit_label) }}"></div>
                    <div class="form-group"><label>Partner Share Label</label><input type="text" name="result_partner_share_label" required value="{{ old('result_partner_share_label', $simulationContent->result_partner_share_label) }}"></div>
                    <div class="form-group"><label>OTOBIZ Share Label</label><input type="text" name="result_otobiz_share_label" required value="{{ old('result_otobiz_share_label', $simulationContent->result_otobiz_share_label) }}"></div>
                    <div class="form-group"><label>Partner Share Percentage</label><input type="number" name="partner_share_percentage" min="0" max="100" required value="{{ old('partner_share_percentage', $simulationContent->partner_share_percentage) }}"></div>
                    <div class="form-group"><label>OTOBIZ Share Percentage</label><input type="number" name="otobiz_share_percentage" min="0" max="100" required value="{{ old('otobiz_share_percentage', $simulationContent->otobiz_share_percentage) }}"></div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Konten Simulasi</button>
            </form>
        </div>
    </section>

    <section class="section-card">
        <div class="section-head">
            <h2 class="section-title">7. Highlights Simulasi</h2>
            <p class="section-subtitle">Tambah, edit, hapus highlights untuk section simulasi keuntungan.</p>
        </div>
        <div class="section-body">
            <details class="editor-block" open>
                <summary>Tambah Highlight Simulasi</summary>
                <form method="POST" action="{{ route('admin.produk.simulation-highlights.store') }}" class="stack-form">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group"><label>Title</label><input type="text" name="title" required></div>
                        <div class="form-group"><label>Icon</label><input type="text" name="icon" placeholder="fa-solid fa-star"></div>
                        <div class="form-group"><label>Sort Order</label><input type="number" name="sort_order" min="0" value="1"></div>
                        <div class="form-group"><label class="checkbox-label"><input type="checkbox" name="is_active" value="1" checked> Aktif</label></div>
                        <div class="form-group full"><label>Description</label><textarea name="description"></textarea></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Highlight</button>
                </form>
            </details>

            <div class="list-block">
                @forelse ($simulationHighlights as $highlight)
                    <div class="editor-item open no-summary">
                        <div class="item-body">
                            <form method="POST" action="{{ route('admin.produk.simulation-highlights.update', $highlight->id) }}" class="stack-form">
                                @csrf
                                @method('PUT')
                                <div class="form-grid">
                                    <div class="form-group"><label>Title</label><input type="text" name="title" required value="{{ $highlight->title }}"></div>
                                    <div class="form-group"><label>Icon</label><input type="text" name="icon" value="{{ $highlight->icon }}"></div>
                                    <div class="form-group"><label>Sort Order</label><input type="number" name="sort_order" min="0" value="{{ $highlight->sort_order }}"></div>
                                    <div class="form-group"><label class="checkbox-label"><input type="checkbox" name="is_active" value="1" @checked($highlight->is_active)> Aktif</label></div>
                                    <div class="form-group full"><label>Description</label><textarea name="description">{{ $highlight->description }}</textarea></div>
                                </div>
                                <div class="row-actions">
                                    <button type="submit" class="btn btn-primary">Simpan Highlight</button>
                                </div>
                            </form>
                            <form method="POST" action="{{ route('admin.produk.simulation-highlights.destroy', $highlight->id) }}" class="inline-delete js-confirm-delete" data-confirm="Hapus highlight ini?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus Highlight</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="empty-text">Belum ada highlight simulasi.</p>
                @endforelse
            </div>
        </div>
    </section>
</div>

<script src="{{ asset('asset/js/admin-produk.js') }}"></script>
</body>
</html>
