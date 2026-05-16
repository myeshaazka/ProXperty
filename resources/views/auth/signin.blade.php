<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - ProXperty</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
<section class="auth-page">
    <div class="auth-card signin-card">
        <h1>Sign in to continue</h1>
        @if ($errors->any())
            <div class="auth-error">{{ $errors->first() }}</div>
        @endif
        @if (session('success'))
            <div class="auth-success">{{ session('success') }}</div>
        @endif
        <form action="{{ url('/signin') }}" method="POST">
            @csrf
            <div class="auth-input role-select-wrap">
                <i class="bi bi-person-badge-fill"></i>
                <select name="role" required>
                    <option value="">Pilih peran</option>
                    <option value="penyewa" @selected(old('role') === 'penyewa')>Penyewa</option>
                    <option value="pemilik" @selected(old('role') === 'pemilik')>Pemilik Properti</option>
                    <option value="admin" @selected(old('role') === 'admin')>Admin</option>
                </select>
            </div>
            <div class="auth-input">
                <i class="bi bi-envelope-fill"></i>
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            </div>
            <div class="auth-input">
                <i class="bi bi-lock-fill"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="auth-btn">Sign In</button>
        </form>
        <p class="auth-link-text">Don't have an account? <a href="{{ url('/signup') }}">Sign Up</a></p>
    </div>
</section>
</body>
</html>
