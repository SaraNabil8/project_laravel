<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SN Watches</title>
    <style>
        body { font-family: Arial, sans-serif; background: #faf9f6; color: #2b2b2b; margin: 0; }

        nav { background: #ffffff; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #e7e3da; position: sticky; top: 0; z-index: 1000; }
        nav .logo { display: flex; align-items: center; gap: 0px; text-decoration: none; }
        nav .logo img { height: 60px; margin-right: -8px; }
        nav .logo span { font-family: 'Georgia', serif; font-size: 20px; letter-spacing: 1px; color: #a9762f; }
        nav a, nav button { margin-left: 20px; text-decoration: none; color: #a9762f; background: none; border: none; cursor: pointer; font-size: 13px; text-transform: uppercase; }

        /* Menu trois points (mobile) - CSS only, checkbox hack */
        #menu-toggle { display: none; }
        .menu-label { display: none; font-size: 26px; color: #a9762f; cursor: pointer; user-select: none; line-height: 1; }

        .container { max-width: 1000px; margin: 0 auto; padding: 40px 20px; }
        h1 { font-family: 'Georgia', serif; font-weight: 400; color: #a9762f; margin: 0 0 20px; }

        .grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
        .card { background: #ffffff; border: 1px solid #e7e3da; border-radius: 4px; overflow: hidden; }
        .card img { width: 100%; height: 200px; object-fit: cover; }
        .card-body { padding: 15px; }

        .brand { color: #a9762f; font-size: 11px; text-transform: uppercase; letter-spacing: 1px; }
        .model { font-family: 'Georgia', serif; font-weight: 400; margin: 5px 0; color: #1f1f1f; }
        .desc { color: #7a766c; font-size: 13px; }
        .price { font-family: 'Georgia', serif; font-size: 18px; color: #1f1f1f; margin-top: 10px; }
        .stock { color: #8a8676; font-size: 12px; }
        .stock.low { color: #c15b3f; }

        /* Responsive */
        @media (max-width: 900px) {
            .grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 600px) {
            nav { padding: 12px 16px; }
            nav .logo img { height: 45px; }
            nav .logo span { font-size: 16px; }

            .menu-label { display: block; }

            nav > div {
                display: none;
                position: absolute;
                top: 100%;
                right: 0;
                left: 0;
                background: #ffffff;
                border-bottom: 1px solid #e7e3da;
                flex-direction: column;
                padding: 10px 16px 16px;
            }
            #menu-toggle:checked ~ div {
                display: flex;
            }
            nav a, nav button {
                margin: 8px 0 0;
                font-size: 13px;
            }
            .container { padding: 24px 15px; }
            h1 { font-size: 22px; }
            .grid { grid-template-columns: 1fr; }
            .card img { height: 220px; }
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

        <div>
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('categories') }}">Categories</a>

            @auth
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <a href="{{ route('profile.edit') }}">Profile</a>
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit">Log Out</button>
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    </nav>

    <div class="container">
        <h1>All Watches</h1>

        @if ($watches->count() > 0)
            <div class="grid">
                @foreach ($watches as $watch)
                    <div class="card">
                        <img src="{{ $watch->image ? asset('storage/'.$watch->image) : 'https://via.placeholder.com/300x200' }}">

                        <div class="card-body">
                            <div class="brand">{{ $watch->brand }}</div>
                            <h3 class="model">{{ $watch->model }}</h3>
                            <p class="desc">{{ Str::limit($watch->description, 60) }}</p>
                            <div class="price">{{ $watch->price }} DH</div>
                            <div class="stock {{ $watch->stock <= 2 ? 'low' : '' }}">
                                {{ $watch->stock }} in stock
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div style="margin-top: 30px;">
                {{ $watches->links() }}
            </div>
        @else
            <p>No watches available yet.</p>
        @endif
    </div>

</body>
</html>