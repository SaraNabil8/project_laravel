<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - SN Watches</title>
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

        .btn-login {
            width: 100%;
            background: #a9762f;
            color: #ffffff;
            border: none;
            padding: 10px 22px;
            border-radius: 4px;
            font-size: 13px;
            text-transform: uppercase;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="login-wrapper">
        <div class="card">
            <h1>Reset password</h1>

            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="field">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required
                        autofocus>
                    @error('email')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="password">New Password</label>
                    <input id="password" type="password" name="password" required>
                    @error('password')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required>
                    @error('password_confirmation')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn-login">Reset password</button>
            </form>
        </div>
    </div>

</body>

</html>