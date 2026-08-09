<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile - SN Watches</title>
    <style>
        body { font-family: Arial, sans-serif; background: #faf9f6; color: #2b2b2b; margin: 0; }

        nav { background: #ffffff; padding: 15px 30px; border-bottom: 1px solid #e7e3da; position: sticky; top: 0; z-index: 1000; }
        nav .nav-inner { max-width: 700px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; }
        nav .logo { display: flex; align-items: center; gap: 0px; text-decoration: none; }
        nav .logo img { height: 60px; margin-right: -8px; }
        nav .logo span { font-family: 'Georgia', serif; font-size: 20px; letter-spacing: 1px; color: #a9762f; }
        nav a { margin-left: 20px; text-decoration: none; color: #a9762f; font-size: 13px; text-transform: uppercase; }

        .container { max-width: 700px; margin: 40px auto; padding: 0 20px; }
        h1 { font-family: 'Georgia', serif; font-weight: 400; font-size: 26px; margin-bottom: 24px; }

        .card { background: #ffffff; border: 1px solid #e7e3da; border-radius: 8px; padding: 30px; margin-bottom: 24px; box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05); }
        .card h2 { font-family: 'Georgia', serif; font-weight: 400; font-size: 18px; margin: 0 0 6px; color: #1f1f1f; }
        .card .subtitle { font-size: 13px; color: #8a8676; margin-bottom: 22px; }
    </style>
</head>
<body>

    <nav>
        <div class="nav-inner">
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('logo.png') }}" alt="SN Watches Logo">
                <span>SN WATCHES</span>
            </a>
            <div>
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1>Profile</h1>

        <div class="card">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="card">
            @include('profile.partials.update-password-form')
        </div>

        <div class="card">
            @include('profile.partials.delete-user-form')
        </div>
    </div>

</body>
</html>