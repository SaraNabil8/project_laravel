<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SN Watches</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #faf9f6;
            color: #2b2b2b;
            margin: 0;
            display: flex;
            min-height: 100vh;
        }

        /* ===== Sidebar ===== */
        nav {
            background: #ffffff;
            width: 210px;
            flex-shrink: 0;
            min-height: 100vh;
            padding: 20px 14px;
            display: flex;
            flex-direction: column;
            border-right: 1px solid #e7e3da;
            position: sticky;
            top: 0;
            align-self: flex-start;
            z-index: 1000;
            transition: width 0.2s ease;
        }

        nav .logo {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
            text-decoration: none;
            margin-bottom: 26px;
            padding: 10px 6px;
            line-height: 1;
        }

        nav .logo img {
            height: 115px;
            width: 115px;
            object-fit: contain;
            flex-shrink: 0;
            display: block;
        }

        nav .logo span {
            font-family: 'Georgia', serif;
            font-size: 15px;
            letter-spacing: 0.6px;
            color: #a9762f;
            white-space: nowrap;
            line-height: 1;
        }

        nav .links {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        nav a,
        nav button {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            text-align: left;
            text-decoration: none;
            color: #6b6355;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 13px;
            letter-spacing: 0.3px;
            padding: 10px 10px;
            border-radius: 5px;
        }

        nav a svg,
        nav button svg {
            width: 17px;
            height: 17px;
            flex-shrink: 0;
            stroke: currentColor;
        }

        nav a:hover,
        nav button:hover {
            background: #f5f0e6;
            color: #a9762f;
        }

        nav a.active {
            background: #a9762f;
            color: #ffffff;
        }

        /* Menu toggle (mobile) - CSS only, checkbox hack */
        #menu-toggle {
            display: none;
        }

        .menu-label {
            display: none;
            font-size: 24px;
            color: #a9762f;
            cursor: pointer;
            user-select: none;
            line-height: 1;
            padding: 6px;
        }

        /* ===== Main content ===== */
        .main {
            flex: 1;
            min-width: 0;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        h1 {
            font-family: 'Georgia', serif;
            font-weight: 400;
            color: #a9762f;
            margin: 0 0 20px;
        }

        .filters {
            display: flex;
            gap: 10px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .filters select,
        .filters input {
            padding: 6px 10px;
            border: 1px solid #d9d4c8;
            border-radius: 4px;
            font-size: 13px;
        }

        .filters button {
            background: #a9762f;
            color: #fff;
            border: none;
            padding: 6px 14px;
            cursor: pointer;
            border-radius: 4px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .card {
            background: #ffffff;
            border: 1px solid #e7e3da;
            border-radius: 4px;
            overflow: hidden;
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 15px;
        }

        .brand {
            color: #a9762f;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .model {
            font-family: 'Georgia', serif;
            font-weight: 400;
            margin: 5px 0;
            color: #1f1f1f;
        }

        .desc {
            color: #7a766c;
            font-size: 13px;
        }

        .price {
            font-family: 'Georgia', serif;
            font-size: 18px;
            color: #1f1f1f;
            margin-top: 10px;
        }

        .stock {
            color: #8a8676;
            font-size: 12px;
        }

        .stock.low {
            color: #c15b3f;
        }

        /* ===== Responsive ===== */

        /* Tablet: shrink sidebar to icons only */
        @media (max-width: 900px) {
            .grid {
                grid-template-columns: repeat(2, 1fr);
            }

            nav {
                width: 64px;
                padding: 16px 8px;
                align-items: center;
            }

            nav .logo {
                padding: 6px 0;
                margin-bottom: 20px;
            }

            nav .logo span {
                display: none;
            }

            nav .logo img {
                height: 38px;
                width: 38px;
            }

            nav a,
            nav button {
                justify-content: center;
                padding: 12px 0;
            }

            nav a span.label,
            nav button span.label {
                display: none;
            }
        }

        /* Mobile: collapse to top bar + dropdown */
        @media (max-width: 600px) {
            body {
                display: block;
            }

            nav {
                width: auto;
                min-height: auto;
                position: sticky;
                top: 0;
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
                padding: 10px 14px;
                border-right: none;
                border-bottom: 1px solid #e7e3da;
            }

            nav .logo {
                flex-direction: row;
                margin-bottom: 0;
                padding: 0;
                gap: 8px;
            }

            nav .logo img {
                height: 40px;
                width: 40px;
            }

            nav .logo span {
                display: inline;
                font-size: 15px;
            }

            .menu-label {
                display: block;
            }

            nav .links {
                display: none;
                position: absolute;
                top: 100%;
                right: 0;
                left: 0;
                background: #ffffff;
                border-bottom: 1px solid #e7e3da;
                flex-direction: column;
                padding: 8px 12px 14px;
                gap: 2px;
            }

            #menu-toggle:checked~.links {
                display: flex;
            }

            nav a,
            nav button {
                padding: 10px 8px;
            }

            nav a span.label,
            nav button span.label {
                display: inline;
            }

            .container {
                padding: 24px 15px;
            }

            h1 {
                font-size: 22px;
            }

            .grid {
                grid-template-columns: 1fr;
            }

            .card img {
                height: 220px;
            }
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
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 10.5 12 3l9 7.5" />
                    <path d="M5 9.5V21h14V9.5" />
                </svg>
                <span class="label">Home</span>
            </a>
            <a href="{{ route('categories') }}" class="{{ request()->routeIs('categories') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="7" height="7" />
                    <rect x="14" y="3" width="7" height="7" />
                    <rect x="3" y="14" width="7" height="7" />
                    <rect x="14" y="14" width="7" height="7" />
                </svg>
                <span class="label">Categories</span>
            </a>

            @auth
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="18" height="18" rx="2" />
                        <path d="M3 9h18M9 21V9" />
                    </svg>
                    <span class="label">Dashboard</span>
                </a>
                <a href="{{ route('profile.edit') }}" class="{{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="4" />
                        <path d="M4 21c0-4 4-6 8-6s8 2 8 6" />
                    </svg>
                    <span class="label">Profile</span>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                            <path d="M16 17l5-5-5-5" />
                            <path d="M21 12H9" />
                        </svg>
                        <span class="label">Log Out</span>
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                        <path d="M10 17l5-5-5-5" />
                        <path d="M15 12H3" />
                    </svg>
                    <span class="label">Login</span>
                </a>
                <a href="{{ route('register') }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="9" cy="7" r="4" />
                        <path d="M2 21c0-4 3-6 7-6s7 2 7 6" />
                        <path d="M19 8v6M22 11h-6" />
                    </svg>
                    <span class="label">Register</span>
                </a>
            @endauth
        </div>
    </nav>

    <div class="main">
        <div class="container">
            <h1>All Watches</h1>

            <form method="GET" action="{{ route('home') }}" class="filters">
                <select name="category_id">
                    <option value="">All categories</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>

                <select name="brand">
                    <option value="">All brands</option>
                    @foreach ($brands as $b)
                        <option value="{{ $b }}" {{ request('brand') == $b ? 'selected' : '' }}>
                            {{ $b }}
                        </option>
                    @endforeach
                </select>

                <input type="number" name="price_min" placeholder="Min DH" value="{{ request('price_min') }}">
                <input type="number" name="price_max" placeholder="Max DH" value="{{ request('price_max') }}">

                <button type="submit">Filter</button>
            </form>

            @if ($watches->count() > 0)
                <div class="grid">
                    @foreach ($watches as $watch)
                        <div class="card">
                            <img
                                src="{{ $watch->image ? asset('storage/' . $watch->image) : 'https://via.placeholder.com/300x200' }}">

                            <div class="card-body">
                                <div class="brand">{{ $watch->brand }}</div>
                                <h3 class="model">{{ $watch->model }}</h3>
                                <p class="desc">{{ $watch->description }}</p>
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
                <p>No watches match these filters.</p>
            @endif
        </div>
    </div>

</body>

</html>