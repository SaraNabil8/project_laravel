<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SN Watches</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #faf9f6;
            color: #2b2b2b;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-wrapper {
            width: 100%;
            max-width: 380px;
            padding: 20px;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            height: 60px;
        }

        .logo span {
            display: block;
            font-family: 'Georgia', serif;
            font-size: 20px;
            letter-spacing: 1px;
            color: #a9762f;
            margin-top: -5px;
        }

        .card {
            background: #ffffff;
            border: 1px solid #e7e3da;
            border-radius: 6px;
            padding: 30px;
        }

        .card h1 {
            font-family: 'Georgia', serif;
            font-weight: 400;
            font-size: 22px;
            color: #a9762f;
            text-align: center;
            margin: 0 0 20px;
        }

        .field {
            margin-bottom: 16px;
        }

        .field label {
            display: block;
            font-size: 12px;
            text-transform: uppercase;
            color: #6b6b6b;
            margin-bottom: 5px;
        }

        .field input {
            width: 100%;
            padding: 10px;
            border: 1px solid #d9d4c8;
            border-radius: 4px;
            font-size: 14px;
        }

        .field-error {
            color: #c15b3f;
            font-size: 12px;
            margin-top: 5px;
        }

        .remember-row {
            margin-bottom: 20px;
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
        }

        .btn-login {
            background: #a9762f;
            color: #ffffff;
            border: none;
            padding: 10px 22px;
            border-radius: 4px;
            font-size: 13px;
            text-transform: uppercase;
            cursor: pointer;
        }

        .register-note {
            text-align: center;
            font-size: 13px;
            color: #8a8676;
            margin-top: 18px;
        }

        .register-note a {
            color: #a9762f;
            font-weight: bold;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="login-wrapper">

        <div class="card">
            <h1>Welcome back</h1>

            @if (session('status'))
                <div class="field-error" style="color:#3a6b3a;">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="field">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required>
                    @error('password')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="remember-row">
                    <input type="checkbox" id="remember_me" name="remember">
                    <label for="remember_me">Remember me</label>
                </div>

                <div class="actions">
                    @if (Route::has('password.request'))
                        <a class="forgot-link" href="{{ route('password.request') }}">Forgot your password?</a>
                    @else
                        <span></span>
                    @endif

                    <button type="submit" class="btn-login">Log in</button>
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