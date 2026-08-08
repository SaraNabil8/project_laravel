<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Watches Shop</title>
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #faf9f6;
            color: #2b2b2b;
        }
        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 40px;
            background: #fff;
            border-bottom: 1px solid #e7e3da;
        }
        nav .logo {
            font-family: 'Georgia', serif;
            font-weight: bold;
            font-size: 18px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        nav a {
            text-decoration: none;
            color: #6b6b6b;
            font-size: 14px;
            margin-left: 20px;
        }
        nav a:hover { color: #a9762f; }
        .container {
            max-width: 700px;
            margin: 40px auto;
            padding: 0 20px;
        }
        h1 {
            font-family: 'Georgia', serif;
            font-weight: 400;
            font-size: 26px;
            margin-bottom: 24px;
        }
        .card {
            background: #ffffff;
            border: 1px solid #e7e3da;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
            margin-bottom: 24px;
        }
        .card h2 {
            font-family: 'Georgia', serif;
            font-weight: 400;
            font-size: 18px;
            margin: 0 0 6px;
            color: #1f1f1f;
        }
        .card .subtitle {
            font-size: 13px;
            color: #8a8676;
            margin-bottom: 22px;
        }
        @media (max-width: 600px) {
            nav { padding: 14px 16px; }
            .container { padding: 0 15px; }
        }
    </style>
</head>
<body>

    <nav>
        <div class="logo">⌚ Watches Shop</div>
        <div>
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('dashboard') }}">Dashboard</a>
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