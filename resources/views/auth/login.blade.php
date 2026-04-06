<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - OTOBIZ</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('assets/images/logo_otobiz.jpeg') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin-auth.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <!-- Left Section: Branding -->
        <div class="login-branding">
            <div class="branding-content">
                <div class="logo-section">
                    <div class="logo-circle">
                        <span class="logo-text">O</span>
                    </div>
                </div>
                <h1 class="branding-title">OTOBIZ</h1>
                <p class="branding-subtitle">Platform Kemitraan Otomotif</p>
                <div class="branding-features">
                    <div class="feature-item">
                        <div class="feature-icon">✓</div>
                        <span>Kelola Konten Website</span>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">✓</div>
                        <span>Atur Informasi Produk</span>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">✓</div>
                        <span>Kelola Data Mitra</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Section: Form -->
        <div class="login-form-section">
            <div class="form-wrapper">
                <div class="form-header">
                    <h2 class="form-title">Login Admin OTOBIZ</h2>
                    <p class="form-subtitle">Masuk untuk mengelola konten website secara aman.</p>
                </div>

                <!-- Logout Success Message -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="alert alert-error">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="login-form">
                    @csrf

                    <!-- Email Field -->
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-wrapper">
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                class="form-input @error('email') is-error @enderror"
                                value="{{ old('email') }}"
                                placeholder="admin@otobiz.com"
                                required
                                autocomplete="email"
                            >
                            <span class="input-icon">✉</span>
                        </div>
                        @error('email')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-wrapper">
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                class="form-input @error('password') is-error @enderror"
                                placeholder="••••••••"
                                required
                                autocomplete="current-password"
                            >
                            <button type="button" class="toggle-password" data-target="password">
                                <span class="icon-eye">👁</span>
                            </button>
                        </div>
                        @error('password')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="form-group checkbox-group">
                        <label class="checkbox-label">
                            <input type="checkbox" name="remember" class="checkbox-input" {{ old('remember') ? 'checked' : '' }}>
                            <span class="checkbox-text">Ingat saya di perangkat ini</span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn-login">
                        <span class="btn-text">Masuk ke Dashboard</span>
                        <span class="btn-icon">→</span>
                    </button>
                </form>

                <!-- Footer Info -->
                <div class="form-footer">
                    <p class="footer-text">
                        Hubungi tim support jika mengalami masalah login.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/admin-auth.js') }}"></script>
</body>
</html>
