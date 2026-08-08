<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories - Watches Shop</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Georgia', serif;
            margin: 0;
            padding: 0;
            color: #2b2b2b;
            background: #faf9f6;
            padding-top: 78px;
        }

        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 40px;
            background: #ffffff;
            border-bottom: 1px solid #e7e3da;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }

        nav .logo {
            font-size: 19px;
            letter-spacing: 1px;
            color: #1f1f1f;
        }

        nav .links {
            display: flex;
            align-items: center;
            font-family: Arial, sans-serif;
        }

        nav .links a {
            margin-left: 24px;
            text-decoration: none;
            color: #6b6b6b;
            font-size: 13px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        nav .links a:hover,
        nav .links a.active {
            color: #a9762f;
        }

        nav .links form {
            display: inline;
        }

        nav .links button {
            background: none;
            border: none;
            color: #6b6b6b;
            font-size: 13px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            cursor: pointer;
            padding: 0;
            margin-left: 24px;
            font-family: inherit;
        }

        nav .links button:hover {
            color: #a9762f;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 50px 20px 80px;
        }

        h1 {
            font-weight: 400;
            font-size: 30px;
            letter-spacing: 1px;
            margin: 0 0 36px;
            color: #1f1f1f;
        }

        h1::after {
            content: "";
            display: block;
            width: 48px;
            height: 2px;
            background: #a9762f;
            margin-top: 12px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .cat-card {
            display: block;
            text-decoration: none;
            background: #ffffff;
            border: 1px solid #e7e3da;
            border-radius: 4px;
            overflow: hidden;
            transition: box-shadow 0.25s ease, transform 0.25s ease, border-color 0.25s ease;
        }

        .cat-card:hover {
            border-color: #a9762f;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
            transform: translateY(-3px);
        }

        .cat-image {
            width: 100%;
            aspect-ratio: 4 / 3;
            background: #f2f0eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 42px;
        }

        .cat-body {
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        .cat-body h3 {
            font-family: 'Georgia', serif;
            font-size: 19px;
            color: #1f1f1f;
            margin: 0 0 6px;
        }

        .cat-body .count {
            font-size: 12px;
            color: #a9762f;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .empty-msg {
            font-family: Arial, sans-serif;
            text-align: center;
            color: #9b968a;
            padding: 60px 0;
        }

        @media (max-width: 900px) {
            .grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            nav {
                padding: 16px 18px;
            }

            .grid {
                grid-template-columns: 1fr;
            }

            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

    <nav>
        <div class="logo">⌚ Watches Shop</div>
        <div class="links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('categories') }}" class="active">Categories</a>
            @if (Route::has('login'))
                @auth
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                    <a href="{{ route('profile.edit') }}">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Log Out</button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>

    <div class="container">
        <h1>Categories</h1>

        @if ($categories->count() > 0)
            <div class="grid">
                @foreach ($categories as $category)
                    <a href="{{ route('categories.show', $category->id) }}" class="cat-card">
                        <div class="cat-image">⌚</div>
                        <div class="cat-body">
                            <h3>{{ $category->name }}</h3>
                            <span class="count">{{ $category->watches->count() }} watches</span>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="empty-msg">No categories available yet.</div>
        @endif
    </div>

</body>

</html>