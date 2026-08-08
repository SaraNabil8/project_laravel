<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watches Shop</title>
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
            /* évite que le contenu passe sous la nav fixe */
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
            transition: transform 0.3s ease;
        }

        nav.nav-hidden {
            transform: translateY(-100%);
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

        /* --- Burger menu --- */
        .burger {
            display: none;
            flex-direction: column;
            justify-content: space-between;
            width: 26px;
            height: 18px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
            z-index: 1100;
        }

        .burger span {
            display: block;
            height: 2px;
            width: 100%;
            background: #1f1f1f;
            transition: all 0.3s ease;
        }

        .burger.open span:nth-child(1) {
            transform: translateY(8px) rotate(45deg);
        }

        .burger.open span:nth-child(2) {
            opacity: 0;
        }

        .burger.open span:nth-child(3) {
            transform: translateY(-8px) rotate(-45deg);
        }

        .overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.4);
            z-index: 999;
        }

        .overlay.open {
            display: block;
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

        .card {
            background: #ffffff;
            border: 1px solid #e7e3da;
            border-radius: 4px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: box-shadow 0.25s ease, transform 0.25s ease, border-color 0.25s ease;
        }

        .card:hover {
            border-color: #a9762f;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
            transform: translateY(-3px);
        }

        .card-image {
            position: relative;
            width: 100%;
            aspect-ratio: 4 / 3;
            background: #f2f0eb;
            overflow: hidden;
        }

        .card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .category-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            font-family: Arial, sans-serif;
            background: rgba(255, 255, 255, 0.92);
            border: 1px solid #a9762f;
            color: #8a5f22;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 11px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .category-badge.none {
            border-color: #d3cfc4;
            color: #9b968a;
        }

        .card-body {
            padding: 18px;
            display: flex;
            flex-direction: column;
            gap: 6px;
            flex: 1;
        }

        .brand {
            font-family: Arial, sans-serif;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-size: 11px;
            color: #a9762f;
        }

        .model {
            font-size: 18px;
            color: #1f1f1f;
            margin: 0 0 4px;
            line-height: 1.3;
        }

        .desc {
            font-family: Arial, sans-serif;
            font-size: 13px;
            color: #7a766c;
            line-height: 1.5;
            margin: 0;
        }

        .meta-row {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-top: auto;
            padding-top: 14px;
            border-top: 1px solid #efece5;
        }

        .price {
            font-size: 18px;
            color: #1f1f1f;
        }

        .stock {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #8a8676;
        }

        .stock.low {
            color: #c15b3f;
        }

        .see-all {
            text-align: center;
            margin-top: 50px;
        }

        .see-all a {
            font-family: Arial, sans-serif;
            display: inline-block;
            background: transparent;
            color: #a9762f;
            border: 1px solid #a9762f;
            padding: 12px 28px;
            border-radius: 2px;
            text-decoration: none;
            font-size: 13px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: all 0.2s ease;
        }

        .see-all a:hover {
            background: #a9762f;
            color: #ffffff;
        }

        .empty-msg {
            font-family: Arial, sans-serif;
            text-align: center;
            color: #9b968a;
            padding: 60px 0;
        }

        .pagination-wrapper {
            margin-top: 50px;
            display: flex;
            justify-content: center;
            font-family: Arial, sans-serif;
        }

        @media (max-width: 900px) {
            .grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .burger {
                display: flex;
            }

            nav .links {
                position: fixed;
                top: 0;
                right: -100%;
                height: 100vh;
                width: 250px;
                background: #ffffff;
                flex-direction: column;
                align-items: flex-start;
                padding: 90px 24px 24px;
                transition: right 0.3s ease;
                box-shadow: -4px 0 12px rgba(0, 0, 0, 0.08);
            }

            nav .links.open {
                right: 0;
            }

            nav .links a,
            nav .links button {
                margin-left: 0;
                margin-bottom: 20px;
                width: 100%;
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

    <nav id="mainNav">
        <div class="logo">⌚ Watches Shop</div>

        <button class="burger" id="burgerBtn" aria-label="Menu">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <div class="links" id="navLinks">
            <a href="{{ route('home') }}" class="active">Home</a>
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

    <div class="overlay" id="overlay"></div>

    <div class="container">

        <h1>All Watches</h1>

        @if ($watches->count() > 0)
            <div class="grid">
                @foreach ($watches as $watch)
                    <div class="card">
                        <div class="card-image">
                            @if ($watch->image)
                                <img src="{{ asset('storage/' . $watch->image) }}" alt="{{ $watch->model }}">
                            @else
                                <img src="https://via.placeholder.com/400x300?text=No+Image" alt="No image">
                            @endif

                            @if ($watch->category)
                                <span class="category-badge">{{ $watch->category->name }}</span>
                            @else
                                <span class="category-badge none">Uncategorized</span>
                            @endif
                        </div>

                        <div class="card-body">
                            <span class="brand">{{ $watch->brand }}</span>
                            <h3 class="model">{{ $watch->model }}</h3>
                            <p class="desc">{{ Str::limit($watch->description, 60) }}</p>

                            <div class="meta-row">
                                <span class="price">{{ $watch->price }} DH</span>
                                <span class="stock {{ $watch->stock <= 2 ? 'low' : '' }}">
                                    {{ $watch->stock }} in stock
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="pagination-wrapper">
                {{ $watches->links() }}
            </div>

        @else
            <div class="empty-msg">No watches available yet.</div>
        @endif
    </div>

    <script>
        // --- Menu responsive (burger) ---
        const burger = document.getElementById('burgerBtn');
        const navLinks = document.getElementById('navLinks');
        const overlay = document.getElementById('overlay');

        burger.addEventListener('click', () => {
            burger.classList.toggle('open');
            navLinks.classList.toggle('open');
            overlay.classList.toggle('open');
        });

        overlay.addEventListener('click', () => {
            burger.classList.remove('open');
            navLinks.classList.remove('open');
            overlay.classList.remove('open');
        });

        // --- Nav qui se cache au scroll down / réapparaît au scroll up ---
        const nav = document.getElementById('mainNav');
        let lastScroll = 0;

        window.addEventListener('scroll', () => {
            const currentScroll = window.scrollY;

            if (currentScroll <= 0) {
                nav.classList.remove('nav-hidden');
                return;
            }

            if (currentScroll > lastScroll && currentScroll > 80) {
                nav.classList.add('nav-hidden');
            } else {
                nav.classList.remove('nav-hidden');
            }

            lastScroll = currentScroll;
        });
    </script>

</body>

</html>