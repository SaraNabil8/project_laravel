<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name }} - SN Watches</title>
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: 'Georgia', serif;
            margin: 0;
            padding: 0;
            color: #2b2b2b;
            background: #faf9f6;
        }
        nav {
            background: #ffffff;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e7e3da;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        nav .logo {
            display: flex;
            align-items: center;
            text-decoration: none;
        }
        nav .logo img {
            height: 60px;
            margin-right: -8px;
        }
        nav .logo span {
            font-family: 'Georgia', serif;
            font-size: 20px;
            letter-spacing: 1px;
            color: #a9762f;
        }
        nav .links {
            display: flex;
            align-items: center;
            font-family: Arial, sans-serif;
        }
        nav .links a, nav .links button {
            margin-left: 20px;
            text-decoration: none;
            color: #a9762f;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 13px;
            text-transform: uppercase;
            font-family: inherit;
        }
        nav .links form { display: inline; }

        /* Menu hamburger (mobile) - CSS only, checkbox hack */
        #menu-toggle { display: none; }
        .menu-label {
            display: none;
            font-size: 24px;
            color: #a9762f;
            cursor: pointer;
            user-select: none;
            line-height: 1;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 40px 20px 80px;
        }
        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #a9762f;
            text-decoration: none;
            font-family: Arial, sans-serif;
            font-size: 13px;
            text-transform: uppercase;
        }
        h1 {
            font-family: 'Georgia', serif;
            font-weight: 400;
            font-size: 28px;
            margin: 0 0 24px;
            color: #2b2b2b;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border: 1px solid #e7e3da;
        }
        thead { background: #f5efe4; }
        th {
            font-family: Arial, sans-serif;
            font-weight: bold;
            font-size: 13px;
            text-transform: uppercase;
            color: #a9762f;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e7e3da;
            font-family: Arial, sans-serif;
        }
        img { border-radius: 4px; object-fit: cover; }
        .empty-row { text-align: center; color: #9b968a; padding: 30px; }

        @media (max-width: 600px) {
            nav { padding: 12px 16px; }
            nav .logo img { height: 45px; }
            nav .logo span { font-size: 16px; }

            .menu-label { display: block; }

            nav .links {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: #ffffff;
                border-bottom: 1px solid #e7e3da;
                flex-direction: column;
                align-items: flex-start;
                padding: 10px 16px 16px;
            }
            #menu-toggle:checked ~ .links {
                display: flex;
            }
            nav .links a, nav .links button {
                margin: 8px 0 0;
            }

            th, td { padding: 8px; font-size: 13px; }
        }
    </style>
</head>
<body>

    <nav>
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('logo.png') }}" alt="SN Watches Logo">
            <span>SN WATCHES</span>
        </a>

        <input type="checkbox" id="menu-toggle">
        <label for="menu-toggle" class="menu-label">☰</label>

        <div class="links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('categories') }}">Categories</a>
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
        <a href="{{ route('categories') }}" class="back-link">← Back to categories</a>

        <h1>{{ $category->name }}</h1>

        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Model</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                @forelse($watches as $watch)
                    <tr>
                        <td>
                            @if($watch->image)
                                <img src="{{ asset('storage/' . $watch->image) }}" alt="{{ $watch->model }}" width="60" height="60">
                            @else
                                —
                            @endif
                        </td>
                        <td>{{ $watch->model }}</td>
                        <td>{{ $watch->brand }}</td>
                        <td>{{ $watch->price }} DH</td>
                        <td>{{ $watch->stock }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="empty-row">No watches in this category yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
</html>