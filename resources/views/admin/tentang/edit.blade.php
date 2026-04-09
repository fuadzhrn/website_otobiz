<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tentang Kami - OTOBIZ Admin</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('assets/images/logo_otobiz.jpeg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/admin-tentang.css') }}">
</head>
<body>
<div class="page-wrap">
    <header class="page-head">
        <div>
            <div class="breadcrumb">Admin / Tentang Kami</div>
            <h1 class="page-title">Edit Tentang Kami</h1>
        </div>
        <div class="page-actions">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline">Kembali ke Dashboard</a>
            <a href="{{ route('tentang') }}" class="btn btn-accent" target="_blank" rel="noopener">Lihat Halaman</a>
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
            <h2 class="section-title">Intro / Apa Itu OTOBIZ</h2>
            <p class="section-subtitle">Mengatur judul, deskripsi, dan gambar intro di frontend.</p>
        </div>
        <div class="section-body">
            <form method="POST" action="{{ route('admin.tentang.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="form_section" value="intro">

                <div class="form-grid">
                    <div class="form-group full">
                        <label for="intro_section_title">Intro Section Title</label>
                        <input type="text" id="intro_section_title" name="intro_section_title" value="{{ old('intro_section_title', $aboutContent->intro_section_title) }}" required>
                    </div>

                    <div class="form-group full">
                        <label for="intro_description">Intro Description</label>
                        <textarea id="intro_description" name="intro_description" required>{{ old('intro_description', $aboutContent->intro_description) }}</textarea>
                    </div>

                    <div class="form-group full">
                        <label for="intro_image">Gambar Intro (opsional)</label>
                        <input type="file" id="intro_image" name="intro_image" accept="image/png,image/jpeg,image/webp">
                        @if (!empty($aboutContent->intro_image))
                            @php
                                $introImagePreview = Illuminate\Support\Str::startsWith($aboutContent->intro_image, ['http://', 'https://', '/'])
                                    ? $aboutContent->intro_image
                                    : Illuminate\Support\Facades\Storage::url($aboutContent->intro_image);
                            @endphp
                            <p style="margin-top:8px;margin-bottom:8px;font-size:0.88rem;color:#5a5f68;">Preview gambar saat ini:</p>
                            <img src="{{ $introImagePreview }}" alt="Preview Intro Tentang" style="max-width:280px;width:100%;height:auto;border-radius:12px;border:1px solid rgba(68, 68, 74, 0.12);">
                            <label class="inline-checkbox" style="margin-top:10px;"><input type="checkbox" name="remove_intro_image" value="1"> Hapus gambar intro saat ini</label>
                        @endif
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Simpan Intro</button>
                </div>
            </form>
        </div>
    </section>

    <section class="section-card">
        <div class="section-head">
            <h2 class="section-title">Visi</h2>
            <p class="section-subtitle">Mengatur judul section visi, judul visi, deskripsi visi, dan judul misi.</p>
        </div>
        <div class="section-body">
            <form method="POST" action="{{ route('admin.tentang.update') }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="form_section" value="vision">

                <div class="form-grid">
                    <div class="form-group">
                        <label for="vision_section_title">Vision Section Title</label>
                        <input type="text" id="vision_section_title" name="vision_section_title" value="{{ old('vision_section_title', $aboutContent->vision_section_title) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="vision_title">Vision Title</label>
                        <input type="text" id="vision_title" name="vision_title" value="{{ old('vision_title', $aboutContent->vision_title) }}" required>
                    </div>

                    <div class="form-group full">
                        <label for="vision_description">Vision Description</label>
                        <textarea id="vision_description" name="vision_description" required>{{ old('vision_description', $aboutContent->vision_description) }}</textarea>
                    </div>

                    <div class="form-group full">
                        <label for="mission_section_title">Mission Section Title</label>
                        <input type="text" id="mission_section_title" name="mission_section_title" value="{{ old('mission_section_title', $aboutContent->mission_section_title) }}" required>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Simpan Visi & Judul Section</button>
                </div>
            </form>
        </div>
    </section>

    <section class="section-card">
        <div class="section-head">
            <h2 class="section-title">Misi</h2>
            <p class="section-subtitle">Tambah, ubah, hapus, urutkan, dan aktif/nonaktif item misi.</p>
        </div>
        <div class="section-body">
            <form method="POST" action="{{ route('admin.tentang.missions.store') }}">
                @csrf
                <div class="form-grid">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" required>
                    </div>
                    <div class="form-group">
                        <label>Icon Class (opsional)</label>
                        <input type="text" name="icon" placeholder="bi bi-bullseye">
                    </div>
                    <div class="form-group full">
                        <label>Description</label>
                        <textarea name="description" required></textarea>
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
                    <button type="submit" class="btn btn-accent">Tambah Misi</button>
                </div>
            </form>

            <div class="item-list">
                @foreach ($missions as $item)
                    <article class="item-card">
                        <div class="item-card-head">
                            <h3 class="item-card-title">Misi #{{ $item->id }}</h3>
                            <form method="POST" action="{{ route('admin.tentang.missions.destroy', $item) }}" class="js-delete-form" data-confirm="Hapus item misi ini?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>

                        <form method="POST" action="{{ route('admin.tentang.missions.update', $item) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-grid">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" value="{{ $item->title }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Icon Class (opsional)</label>
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
                                    <input type="hidden" name="is_active" value="0">
                                    <label class="inline-checkbox"><input type="checkbox" name="is_active" value="1" {{ $item->is_active ? 'checked' : '' }}> Aktif</label>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Update Misi</button>
                            </div>
                        </form>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-card">
        <div class="section-head">
            <h2 class="section-title">Nilai & Prinsip Bisnis</h2>
            <p class="section-subtitle">Mengatur header section nilai bisnis dan daftar item nilai.</p>
        </div>
        <div class="section-body">
            <form method="POST" action="{{ route('admin.tentang.update') }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="form_section" value="values_header">

                <div class="form-grid">
                    <div class="form-group full">
                        <label for="values_section_title">Values Section Title</label>
                        <input type="text" id="values_section_title" name="values_section_title" value="{{ old('values_section_title', $aboutContent->values_section_title) }}" required>
                    </div>
                    <div class="form-group full">
                        <label for="values_section_description">Values Section Description</label>
                        <textarea id="values_section_description" name="values_section_description" required>{{ old('values_section_description', $aboutContent->values_section_description) }}</textarea>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Simpan Header Nilai Bisnis</button>
                </div>
            </form>

            <div class="item-list">
                <article class="item-card">
                    <div class="item-card-head">
                        <h3 class="item-card-title">Tambah Item Nilai Baru</h3>
                    </div>
                    <form method="POST" action="{{ route('admin.tentang.values.store') }}">
                        @csrf
                        <div class="form-grid">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" required>
                            </div>
                            <div class="form-group">
                                <label>Icon Class (opsional)</label>
                                <input type="text" name="icon" placeholder="bi bi-houses">
                            </div>
                            <div class="form-group full">
                                <label>Description</label>
                                <textarea name="description" required></textarea>
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
                            <button type="submit" class="btn btn-accent">Tambah Nilai</button>
                        </div>
                    </form>
                </article>

                @foreach ($values as $item)
                    <article class="item-card">
                        <div class="item-card-head">
                            <h3 class="item-card-title">Nilai #{{ $item->id }}</h3>
                            <form method="POST" action="{{ route('admin.tentang.values.destroy', $item) }}" class="js-delete-form" data-confirm="Hapus item nilai ini?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>

                        <form method="POST" action="{{ route('admin.tentang.values.update', $item) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-grid">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" value="{{ $item->title }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Icon Class (opsional)</label>
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
                                    <input type="hidden" name="is_active" value="0">
                                    <label class="inline-checkbox"><input type="checkbox" name="is_active" value="1" {{ $item->is_active ? 'checked' : '' }}> Aktif</label>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Update Nilai</button>
                            </div>
                        </form>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
</div>

<script src="{{ asset('assets/js/admin-tentang.js') }}"></script>
</body>
</html>
