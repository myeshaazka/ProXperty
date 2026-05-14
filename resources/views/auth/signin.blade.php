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

        <form action="/do-signin" method="GET">
            <div class="auth-input">
                <i class="bi bi-envelope-fill"></i>
                <input type="email" placeholder="Email" required>
            </div>

            <div class="auth-input">
                <i class="bi bi-lock-fill"></i>
                <input type="password" placeholder="Password" required>
            </div>

            <button type="submit" class="auth-btn">Sign In</button>
        </form>

        <p class="auth-link-text">
            Don’t have an account?
            <a href="/signup">Sign Up</a>
        </p>
    </div>
</section>

</body>
</html>