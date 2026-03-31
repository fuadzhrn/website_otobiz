# 🔐 OTOBIZ Admin Login System - Setup & Installation Guide

## 📋 Daftar Isi
1. [Prerequisites](#prerequisites)
2. [Installation Steps](#installation-steps)
3. [Database Setup](#database-setup)
4. [Create Admin Account](#create-admin-account)
5. [Testing Login System](#testing-login-system)
6. [Usage Guide](#usage-guide)
7. [Security Notes](#security-notes)
8. [Troubleshooting](#troubleshooting)

---

## Prerequisites

Pastikan Anda memiliki:
- PHP 8.2+
- Laravel 11.x
- SQLite (sudah dikonfigurasi)
- Composer
- Semua dependencies sudah ter-install

---

## Installation Steps

### 1. Database Migration

Jalankan perintah migrate untuk membuat semua tabel database yang diperlukan:

```bash
php artisan migrate
```

Output yang diharapkan:
```
  0001_01_01_000000_create_users_table ......................... 131.98ms DONE
  0001_01_01_000001_create_cache_table .......................... 20.30ms DONE
  0001_01_01_000002_create_jobs_table ........................... 85.19ms DONE
```

### 2. Database Setup (Fresh Install)

Jika Anda ingin fresh install dengan menghapus data lama:

```bash
php artisan migrate:fresh
```

---

## Database Setup

Database SQLite sudah dikonfigurasi di `.env`:

```env
DB_CONNECTION=sqlite
# Database file akan berada di: database/database.sqlite
```

File database akan otomatis dibuat saat Anda menjalankan `php artisan migrate`.

---

## Create Admin Account

### Opsi 1: Menggunakan Custom Artisan Command (Recommended)

Jalankan command berikut untuk membuat admin account dengan data default:

```bash
php artisan admin:create
```

Ini akan membuat admin dengan:
- Email: `admin@otobiz.com`
- Password: `admin12345`
- Name: `Admin OTOBIZ`

#### Membuat Admin Dengan Data Custom:

```bash
php artisan admin:create --email=youremail@otobiz.com --password=yourpassword --name="Your Name"
```

### Opsi 2: Menggunakan Seeder

Dalam project, seeder sudah disiapkan. Jalankan:

```bash
php artisan db:seed
```

Ini akan menjalankan `DatabaseSeeder` yang sudah dikonfigurasi untuk menjalankan `AdminSeeder`.

---

## Testing Login System

### 1. Start Development Server

```bash
php artisan serve
```

Server akan berjalan di: `http://localhost:8000`

### 2. Akses Halaman Login

Buka browser dan akses:

```
http://localhost:8000/login
```

Anda akan melihat halaman login dengan desain OTOBIZ yang elegan.

### 3. Test Login Dengan Admin Credentials

Gunakan kredensial berikut:
- **Email**: `admin@otobiz.com`
- **Password**: `admin12345`

Klik tombol "Masuk ke Dashboard" untuk login.

### 4. Verifikasi Dashboard Admin

Setelah login berhasil, Anda akan diarahkan ke:

```
http://localhost:8000/admin/dashboard
```

Dashboard akan menampilkan:
- Greeting dengan nama admin
- Daftar halaman yang dapat dikelola
- Menu sidebar untuk navigasi

### 5. Test Logout

Di halaman dashboard, klik tombol "Logout" di navbar.
Anda akan diarahkan kembali ke `/login`.

---

## Usage Guide

### Route yang Tersedia

#### Public Routes (Accessible Without Login)
- `GET /` - Halaman Home
- `GET /tentang` - Halaman Tentang Kami
- `GET /mekanisme` - Halaman Mekanisme Kemitraan
- `GET /produk` - Halaman Produk
- `GET /gabung` - Halaman Gabung Mitra
- `GET /kontak` - Halaman Kontak

#### Authentication Routes
- `GET /login` - Halaman Login (Guest Only)
- `POST /login` - Process Login (Guest Only)
- `POST /logout` - Process Logout (Auth Only)

#### Admin Routes (Protected - Requires Authentication)
- `GET /admin/dashboard` - Admin Dashboard (Auth Only)

### Middleware & Protection

1. **Guest Middleware** - Applied to `/login` routes
   - Hanya untuk user yang belum login
   - Jika sudah login, user akan diarahkan ke dashboard

2. **Auth Middleware** - Applied to `/admin/dashboard` dan `/logout`
   - Hanya untuk user yang sudah login
   - Jika belum login, user akan diarahkan ke login

3. **Rate Limiting** - Applied to `POST /login`
   - Maximum 5 attempts per 15 minutes
   - Mencegah brute force attacks
   - Throttle key berdasarkan email atau IP address

### Session Management

- Session driver: Database
- Session lifetime: 120 minutes
- Session akan di-regenerate setelah login berhasil
- Session akan di-invalidate saat logout
- CSRF token di-regenerate setelah logout

---

## Security Notes

### Password Security

✅ **What's Implemented:**
- [x] Password hashing menggunakan `Hash::make()`
- [x] Bcrypt dengan 12 rounds (`BCRYPT_ROUNDS=12`)
- [x] Password tidak pernah disimpan plain text
- [x] Password tidak ditampilkan dalam response API

### Session Security

✅ **What's Implemented:**
- [x] Session regeneration setelah login
- [x] Session invalidation saat logout
- [x] CSRF protection pada form login
- [x] CSRF token regeneration setelah logout
- [x] Session stored in database (secure)

### Login Security

✅ **What's Implemented:**
- [x] Rate limiting untuk mencegah brute force (5 attempts / 15 min)
- [x] Error message generik (`Email atau password tidak sesuai.`)
- [x] Email validation
- [x] Password validation
- [x] Login attempts tracked

### Frontend Security

✅ **What's Implemented:**
- [x] Password toggle visibility (toggle show/hide)
- [x] Form validation before submit
- [x] CSRF token in form (`@csrf`)
- [x] Input sanitization (Laravel's form input helpers)

### HTTPS Recommendation (Production)

Untuk production environment:
```bash
# Add to .env
APP_URL=https://yourdomain.com
# Force HTTPS in AppServiceProvider
```

---

## Troubleshooting

### Problem: "Route /login not found"

**Solution:**
Pastikan Anda sudah menjalankan `php artisan serve` dan file routes sudah tersimpan dengan benar.

```bash
php artisan route:list
```

### Problem: "SQLSTATE[HY000]: General error: 1 can't open file"

**Solution:**
Database file belum ada. Jalankan migration:

```bash
php artisan migrate
```

### Problem: "Login gagal meskipun password benar"

**Cek:**
1. Admin account sudah dibuat? Jalankan:
   ```bash
   php artisan admin:create
   ```

2. Password sudah di-hash? Cek di database SQLite:
   ```bash
   # Buka database/database.sqlite dan lihat users table
   # Column password harus berisi string panjang (hash), bukan plain text
   ```

### Problem: "Terlalu banyak percobaan login"

**Solution:**
Ini adalah rate limiting yang bekerja. Tunggu 15 menit atau clear cache:

```bash
php artisan cache:clear
```

### Problem: "CSRF Token Mismatch"

**Solution:**
Pastikan form login memiliki `@csrf` directive:

```blade
<form method="POST" action="{{ route('login') }}">
    @csrf
    <!-- form fields -->
</form>
```

### Problem: "Session tidak ter-save setelah login"

**Solution:**
Pastikan session driver sudah benar di `.env`:

```env
SESSION_DRIVER=database
```

Dan pastikan sudah run migration:

```bash
php artisan migrate
```

---

## File Structure

```
project/
├── app/
│   ├── Console/
│   │   └── Commands/
│   │       └── CreateAdminUser.php        # Artisan command untuk create admin
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/
│   │   │   │   └── LoginController.php    # Login/logout logic
│   │   │   └── Admin/
│   │   │       └── DashboardController.php # Dashboard logic
│   │   └── Middleware/
│   │       └── ThrottleLoginAttempts.php  # Rate limiting middleware
│   ├── Models/
│   │   └── User.php                       # User model
│   └── Providers/
│
├── database/
│   ├── migrations/
│   │   └── 0001_01_01_000000_create_users_table.php
│   ├── seeders/
│   │   ├── DatabaseSeeder.php
│   │   └── AdminSeeder.php                # Admin seeder
│   └── database.sqlite                    # SQLite database file
│
├── resources/
│   └── views/
│       ├── auth/
│       │   └── login.blade.php            # Login template
│       └── admin/
│           └── dashboard.blade.php        # Dashboard template
│
├── public/
│   └── assets/
│       ├── css/
│       │   ├── admin-auth.css             # Login CSS
│       │   └── admin-dashboard.css        # Dashboard CSS
│       └── js/
│           ├── admin-auth.js              # Login JS
│           └── admin-dashboard.js         # Dashboard JS
│
├── routes/
│   └── web.php                            # Web routes (updated)
│
├── bootstrap/
│   └── app.php                            # App configuration (updated for middleware)
│
└── .env                                   # Environment file (SQLite configured)
```

---

## Next Steps

Setelah login system berjalan, Anda dapat:

1. **Tambah Admin Lagi**
   ```bash
   php artisan admin:create --email=admin2@otobiz.com --password=password2 --name="Admin 2"
   ```

2. **Build Content Management Pages**
   - Create routes untuk edit setiap halaman
   - Create controllers dan views untuk CRUD konten
   - Integrasi dengan database untuk menyimpan konten

3. **Add Page-Specific Management**
   - Home Management
   - Tentang Management
   - Mekanisme Kemitraan Management
   - Produk Management
   - Gabung Mitra Management
   - Kontak Management

4. **Add Audit Logging**
   - Track admin actions
   - Log user login/logout
   - Log content changes

5. **Add Admin Roles & Permissions** (Future)
   - Create multiple admin accounts dengan permissions berbeda
   - Implement role-based access control (RBAC)

---

## Support & Documentation

- **Laravel Docs**: https://laravel.com/docs
- **Blade Templating**: https://laravel.com/docs/blade
- **Authentication**: https://laravel.com/docs/authentication
- **Rate Limiting**: https://laravel.com/docs/rate-limiting

---

**Last Updated**: {{ date('Y-m-d H:i:s') }}
**System Version**: 1.0.0
