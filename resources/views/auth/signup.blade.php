<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - ProXperty</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>

<section class="auth-page">
    <div class="auth-card signup-card">
        <h1>Sign up to continue</h1>

        <form action="/do-signup" method="GET">

            <div class="auth-input">
                <i class="bi bi-person-fill"></i>
                <input type="text" name="name" placeholder="Name" required>
            </div>

            <div class="auth-input">
                <i class="bi bi-telephone-fill"></i>
                <input type="text" name="phone" placeholder="Phone Number" required>
            </div>

            <div class="auth-input">
                <i class="bi bi-envelope-fill"></i>
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <!-- PASSWORD -->
            <div class="auth-input password-box">
                <i class="bi bi-lock-fill"></i>

                <input 
                    type="password" 
                    name="password"
                    id="password"
                    placeholder="Password"
                    required
                    minlength="6"
                    autocomplete="new-password"
                >

                <i class="bi bi-eye-fill toggle-password" id="togglePassword"></i>
            </div>

            <!-- NOTE -->
            <p id="password-note" class="password-note">
                Password minimal 6 karakter, ada huruf besar, huruf kecil, dan angka.
            </p>

            <!-- STRENGTH -->
            <div id="strength" class="password-strength"></div>

            <button type="submit" class="auth-btn">Sign Up</button>

        </form>
    </div>
</section>

<script>
    const passwordInput = document.getElementById('password');
    const note = document.getElementById('password-note');
    const strengthText = document.getElementById('strength');
    const togglePassword = document.getElementById('togglePassword');

    // tampilkan note & icon saat klik
    passwordInput.addEventListener('focus', () => {
        note.style.display = 'block';
        togglePassword.style.display = 'block';
    });

    // sembunyikan kalau kosong
    passwordInput.addEventListener('blur', () => {
        if (passwordInput.value === '') {
            note.style.display = 'none';
            strengthText.style.display = 'none';
            togglePassword.style.display = 'none';
        }
    });

    // toggle show/hide password
    togglePassword.addEventListener('click', () => {
        const isPassword = passwordInput.type === 'password';

        passwordInput.type = isPassword ? 'text' : 'password';
        togglePassword.className = isPassword
            ? 'bi bi-eye-slash-fill toggle-password'
            : 'bi bi-eye-fill toggle-password';
    });

    // strength password
    passwordInput.addEventListener('input', () => {
        const val = passwordInput.value;

        if (val.length === 0) {
            strengthText.style.display = 'none';
            return;
        }

        strengthText.style.display = 'block';

        if (val.length < 6) {
            strengthText.innerText = "Weak 😢";
            strengthText.style.color = "red";
        } else if (val.match(/[A-Z]/) && val.match(/[0-9]/)) {
            strengthText.innerText = "Strong 💪";
            strengthText.style.color = "green";
        } else {
            strengthText.innerText = "Medium 🙂";
            strengthText.style.color = "orange";
        }
    });
</script>

</body>
</html>