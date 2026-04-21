<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - OTOBIZ</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('assets/images/logo_favicon.jpeg') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin-dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="admin-navbar">
        <div class="navbar-container">
            <div class="navbar-brand">
                <div class="brand-circle">O</div>
                <span class="brand-name">OTOBIZ Admin</span>
            </div>
            <div class="navbar-user">
                <span class="user-greeting">Halo, {{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="logout-form">
                    @csrf
                    <button type="submit" class="btn-logout">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="dashboard-container">
        <!-- Sidebar Navigation -->
        <aside class="dashboard-sidebar">
            <ul class="sidebar-menu">
                <li class="menu-item active">
                    <a href="#" class="menu-link">
                        <span class="menu-icon"><i class="fa-solid fa-house"></i></span>
                        <span class="menu-label">Dashboard</span>
                    </a>
                </li>
                <li class="menu-divider"></li>
                <li class="menu-section-title">Kelola Konten</li>
                <li class="menu-item">
                    <a href="{{ route('admin.home.edit') }}" class="menu-link" data-page="home">
                        <span class="menu-icon"><i class="fa-solid fa-globe"></i></span>
                        <span class="menu-label">Home</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.tentang.edit') }}" class="menu-link" data-page="tentang">
                        <span class="menu-icon"><i class="fa-solid fa-circle-info"></i></span>
                        <span class="menu-label">Tentang Kami</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.mekanisme.edit') }}" class="menu-link" data-page="mekanisme">
                        <span class="menu-icon"><i class="fa-solid fa-gears"></i></span>
                        <span class="menu-label">Mekanisme Kemitraan</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.produk.edit') }}" class="menu-link" data-page="produk">
                        <span class="menu-icon"><i class="fa-solid fa-box-open"></i></span>
                        <span class="menu-label">Produk</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.gabung.edit') }}" class="menu-link" data-page="gabung">
                        <span class="menu-icon"><i class="fa-solid fa-handshake"></i></span>
                        <span class="menu-label">Gabung Mitra</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.kontak.edit') }}" class="menu-link" data-page="kontak">
                        <span class="menu-icon"><i class="fa-solid fa-phone"></i></span>
                        <span class="menu-label">Kontak & Support</span>
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Dashboard Content -->
        <main class="dashboard-main">
            <!-- Header -->
            <div class="dashboard-header">
                <div class="header-content">
                    <h1 class="page-title">Dashboard Admin</h1>
                    <p class="page-subtitle">Kelola konten website OTOBIZ secara terpusat</p>
                </div>
                <div class="header-info">
                    <div class="info-badge">
                        <span class="badge-icon"><i class="fa-solid fa-circle-check"></i></span>
                        <span class="badge-text">System Online</span>
                    </div>
                </div>
            </div>

            <!-- Welcome Section -->
            <section class="welcome-section">
                <div class="welcome-card">
                    <div class="welcome-icon"><i class="fa-solid fa-hand-sparkles"></i></div>
                    <div class="welcome-content">
                        <h2 class="welcome-title">Selamat Datang, {{ Auth::user()->name }}!</h2>
                        <p class="welcome-text">
                            Anda telah login ke panel administrasi OTOBIZ. 
                            Gunakan menu di sebelah kiri untuk mengelola konten setiap halaman website.
                        </p>
                    </div>
                </div>
            </section>

            <!-- Content Management Grid -->
            <section class="content-management">
                <h2 class="section-title">Halaman yang Dapat Dikelola</h2>
                
                <div class="pages-grid">
                    <!-- Home Page -->
                    <div class="page-card">
                        <div class="card-header">
                            <span class="card-icon"><i class="fa-solid fa-globe"></i></span>
                            <span class="card-badge">Utama</span>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Home</h3>
                            <p class="card-description">Kelola hero, section utama, dan fitur unggulan halaman home website.</p>
                            <div class="card-meta">
                                <span class="meta-item">
                                    <span class="meta-icon"><i class="fa-regular fa-file-lines"></i></span>
                                    Section: 4 bagian
                                </span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admin.home.edit') }}" class="btn-card" data-page="home">Kelola Konten</a>
                        </div>
                    </div>

                    <!-- Tentang Kami Page -->
                    <div class="page-card">
                        <div class="card-header">
                            <span class="card-icon"><i class="fa-solid fa-circle-info"></i></span>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Tentang Kami</h3>
                            <p class="card-description">Kelola informasi perusahaan, visi misi, dan profil tim OTOBIZ.</p>
                            <div class="card-meta">
                                <span class="meta-item">
                                    <span class="meta-icon"><i class="fa-regular fa-file-lines"></i></span>
                                    Section: 3 bagian
                                </span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admin.tentang.edit') }}" class="btn-card" data-page="tentang">Kelola Konten</a>
                        </div>
                    </div>

                    <!-- Mekanisme Kemitraan Page -->
                    <div class="page-card">
                        <div class="card-header">
                            <span class="card-icon"><i class="fa-solid fa-gears"></i></span>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Mekanisme Kemitraan</h3>
                            <p class="card-description">Kelola mekanisme, syarat, FAQ, dan proses kemitraan bisnis.</p>
                            <div class="card-meta">
                                <span class="meta-item">
                                    <span class="meta-icon"><i class="fa-regular fa-file-lines"></i></span>
                                    Section: 5 bagian
                                </span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admin.mekanisme.edit') }}" class="btn-card" data-page="mekanisme">Kelola Konten</a>
                        </div>
                    </div>

                    <!-- Produk Page -->
                    <div class="page-card">
                        <div class="card-header">
                            <span class="card-icon"><i class="fa-solid fa-box-open"></i></span>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Produk</h3>
                            <p class="card-description">Kelola paket produk, unit, spesifikasi, dan kalkulator simulasi.</p>
                            <div class="card-meta">
                                <span class="meta-item">
                                    <span class="meta-icon"><i class="fa-regular fa-file-lines"></i></span>
                                    Section: 5 bagian
                                </span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admin.produk.edit') }}" class="btn-card" data-page="produk">Kelola Konten</a>
                        </div>
                    </div>

                    <!-- Gabung Mitra Page -->
                    <div class="page-card">
                        <div class="card-header">
                            <span class="card-icon"><i class="fa-solid fa-handshake"></i></span>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Gabung Mitra</h3>
                            <p class="card-description">Kelola proses registrasi mitra, syarat, dan formulir pendaftaran.</p>
                            <div class="card-meta">
                                <span class="meta-item">
                                    <span class="meta-icon"><i class="fa-regular fa-file-lines"></i></span>
                                    Section: 4 bagian
                                </span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admin.gabung.edit') }}" class="btn-card" data-page="gabung">Kelola Konten</a>
                        </div>
                    </div>

                    <!-- Kontak & Support Page -->
                    <div class="page-card">
                        <div class="card-header">
                            <span class="card-icon"><i class="fa-solid fa-phone"></i></span>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Kontak & Support</h3>
                            <p class="card-description">Kelola informasi kontak, alamat, dan layanan customer support.</p>
                            <div class="card-meta">
                                <span class="meta-item">
                                    <span class="meta-icon"><i class="fa-regular fa-file-lines"></i></span>
                                    Section: 3 bagian
                                </span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admin.kontak.edit') }}" class="btn-card" data-page="kontak">Kelola Konten</a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Quick Stats -->
            <section class="quick-stats">
                <h2 class="section-title">Status Sistem</h2>
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fa-solid fa-circle-check"></i></div>
                        <div class="stat-info">
                            <div class="stat-label">Halaman Aktif</div>
                            <div class="stat-value">6</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fa-solid fa-user-shield"></i></div>
                        <div class="stat-info">
                            <div class="stat-label">Admin Login</div>
                            <div class="stat-value">{{ Auth::user()->name }}</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fa-solid fa-bolt"></i></div>
                        <div class="stat-info">
                            <div class="stat-label">Status</div>
                            <div class="stat-value online">Online</div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script src="{{ asset('assets/js/admin-dashboard.js') }}"></script>
</body>
</html>
