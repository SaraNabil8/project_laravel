<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Watches Shop</title>
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

        .field input[type="text"],
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

        .actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 28px;
        }

        .login-link {
            font-size: 13px;
            color: #6b6b6b;
            text-decoration: underline;
        }

        .login-link:hover {
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
    </style>
</head>
<body>

    <div class="login-wrapper">

        <div class="logo">
            <div class="icon">⌚</div>
            <div class="name">Watches Shop</div>
        </div>

        <div class="card">
            <h1>Create account</h1>
           

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Name --}}
                <div class="field">
                    <label for="name">Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                    @error('name')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="field">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                    @error('email')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="field">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password">
                    @error('password')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div class="field">
                    <label for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                    @error('password_confirmation')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="actions">
                    <a class="login-link" href="{{ route('login') }}">
                        Already registered?
                    </a>

                    <button type="submit" class="btn-login">
                        Register
                    </button>
                </div>
            </form>
        </div>

    </div>

</body>
</html>