<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Watches Shop</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #faf9f6;
            color: #2b2b2b;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-wrapper {
            width: 100%;
            max-width: 400px;
            padding: 20px;
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo .icon {
            font-size: 42px;
        }

        .logo .name {
            font-family: 'Georgia', serif;
            font-size: 20px;
            letter-spacing: 1px;
            color: #1f1f1f;
            margin-top: 8px;
        }

        .card {
            background: #ffffff;
            border: 1px solid #e7e3da;
            border-radius: 8px;
            padding: 36px 32px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
        }

        .card h1 {
            font-family: 'Georgia', serif;
            font-weight: 400;
            font-size: 22px;
            color: #1f1f1f;
            margin: 0 0 6px;
            text-align: center;
        }

        .card .subtitle {
            text-align: center;
            font-size: 13px;
            color: #8a8676;
            margin-bottom: 26px;
        }

        .status-message {
            background: #eef7ee;
            border: 1px solid #cfe8cf;
            color: #3a6b3a;
            font-size: 13px;
            padding: 10px 14px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .field {
            margin-bottom: 20px;
        }

        .field label {
            display: block;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #6b6b6b;
            margin-bottom: 6px;
        }

        .field input[type="email"],
        .field input[type="password"] {
            width: 100%;
            padding: 11px 14px;
            border: 1px solid #d9d4c8;
            border-radius: 4px;
            font-size: 14px;
            font-family: Arial, sans-serif;
            background: #fdfcfa;
            color: #2b2b2b;
        }

        .field input:focus {
            outline: none;
            border-color: #a9762f;
            box-shadow: 0 0 0 3px rgba(169, 118, 47, 0.12);
        }

        .field-error {
            color: #c15b3f;
            font-size: 12px;
            margin-top: 6px;
        }

        .remember-row {
            display: flex;
            align-items: center;
            margin-bottom: 24px;
        }

        .remember-row input[type="checkbox"] {
            margin-right: 8px;
            accent-color: #a9762f;
        }

        .remember-row label {
            font-size: 13px;
            color: #6b6b6b;
        }

        .actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .forgot-link {
            font-size: 13px;
            color: #6b6b6b;
            text-decoration: underline;
        }

        .forgot-link:hover {
            color: #a9762f;
        }

        .btn-login {
            background: #a9762f;
            color: #ffffff;
            border: none;
            padding: 11px 26px;
            border-radius: 4px;
            font-size: 13px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        .btn-login:hover {
            background: #8a5f22;
        }

        .register-note {
            text-align: center;
            font-size: 13px;
            color: #8a8676;
            margin-top: 22px;
        }

        .register-note a {
            color: #a9762f;
            text-decoration: none;
            font-weight: bold;
        }

        .register-note a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="login-wrapper">

        <div class="logo">
            <div class="icon">⌚</div>
            <div class="name">Watches Shop</div>
        </div>

        <div class="card">
            <h1>Welcome back</h1>
            {{-- Session Status --}}
            @if (session('status'))
                <div class="status-message">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="field">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                    @error('email')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="field">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password">
                    @error('password')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Remember Me --}}
                <div class="remember-row">
                    <input id="remember_me" type="checkbox" name="remember">
                    <label for="remember_me">Remember me</label>
                </div>

                <div class="actions">
                    @if (Route::has('password.request'))
                        <a class="forgot-link" href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                    @else
                        <span></span>
                    @endif

                    <button type="submit" class="btn-login">
                        Log in
                    </button>
                </div>
            </form>
        </div>

        @if (Route::has('register'))
            <div class="register-note">
                Don't have an account? <a href="{{ route('register') }}">Register</a>
            </div>
        @endif

    </div>

</body>
</html>