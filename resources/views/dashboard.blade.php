<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Watches Shop</title>
    <style>
        * { box-sizing: border-box; }

        body {
            font-family: Arial, sans-serif;
            background: #f4f2ec;
            margin: 0;
            padding: 0;
            color: #2b2b2b;
            padding-top: 78px; /* évite que le contenu passe sous la nav fixe */
        }

        /* ============ NAV ============ */
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
            font-family: 'Georgia', serif;
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
            background: rgba(0,0,0,0.4);
            z-index: 999;
        }

        .overlay.open {
            display: block;
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
                box-shadow: -4px 0 12px rgba(0,0,0,0.08);
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
        }

        /* ============ DASHBOARD ============ */
        .page {
            max-width: 1100px;
            margin: 0 auto;
            padding: 50px 24px 80px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 36px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e7e3da;
        }

        .page-header h1 {
            font-family: 'Georgia', serif;
            font-weight: 400;
            font-size: 28px;
            color: #1f1f1f;
            margin: 0;
        }

        .page-header .subtitle {
            font-size: 13px;
            color: #8a8676;
            margin-top: 4px;
        }

        .section {
            margin-bottom: 44px;
        }

        .section-title {
            font-family: 'Georgia', serif;
            font-weight: 400;
            font-size: 19px;
            color: #1f1f1f;
            margin: 0 0 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .section-title .count-pill {
            font-family: Arial, sans-serif;
            font-size: 12px;
            background: #f0ece2;
            color: #8a5f22;
            padding: 3px 10px;
            border-radius: 20px;
        }

        /* --- Management cards --- */
      .manage-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 18px;
}

.manage-card {
    display: block;
    background: #ffffff;
    border: 1px solid #e7e3da;
    border-radius: 8px;
    padding: 18px 22px;
    text-decoration: none;
    color: inherit;
    transition: box-shadow 0.2s ease, border-color 0.2s ease;
}

.manage-card:hover {
    box-shadow: 0 6px 16px rgba(0,0,0,0.05);
    border-color: #a9762f;
}

.manage-title {
    font-size: 14px;
    font-weight: bold;
    color: #1f1f1f;
    margin-bottom: 4px;
}

.manage-desc {
    font-size: 12px;
    color: #8a8676;
}

@media (max-width: 700px) {
    .manage-grid {
        grid-template-columns: 1fr;
    }
}

        /* --- Stat cards --- */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .stat-card {
            background: #ffffff;
            border: 1px solid #e7e3da;
            border-radius: 8px;
            padding: 20px 22px;
            border-left: 4px solid #a9762f;
            transition: box-shadow 0.2s ease;
        }

        .stat-card:hover {
            box-shadow: 0 6px 16px rgba(0,0,0,0.05);
        }

        .stat-card.danger {
            border-left-color: #c15b3f;
        }

        .stat-card .label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            color: #8a8676;
            margin-bottom: 10px;
        }

        .stat-card .value {
            font-size: 30px;
            font-weight: bold;
            color: #1f1f1f;
        }

        .stat-card.danger .value {
            color: #c15b3f;
        }

        /* --- Table panel --- */
        .panel {
            background: #ffffff;
            border: 1px solid #e7e3da;
            border-radius: 8px;
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        th {
            text-align: left;
            padding: 12px 18px;
            background: #f7f5f0;
            color: #8a8676;
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: 0.5px;
            border-bottom: 1px solid #e7e3da;
        }

        td {
            padding: 12px 18px;
            border-bottom: 1px solid #efece5;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #9b968a;
            font-style: italic;
        }

        @media (max-width: 800px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .manage-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <!-- ============ NAV ============ -->
    <nav id="mainNav">
        <div class="logo">⌚ Watches Shop</div>

        <button class="burger" id="burgerBtn" aria-label="Menu">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <div class="links" id="navLinks">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('categories.index') }}">Categories</a>
            @if (Route::has('login'))
                @auth
                    <a href="{{ route('dashboard') }}" class="active">Dashboard</a>
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

    <!-- ============ DASHBOARD CONTENT ============ -->
    <div class="page">

        <div class="page-header">
            <div>
                <h1>Dashboard</h1>
            </div>
        </div>

        <!-- === Management section === -->
      <div class="section">
    <div class="section-title">Management</div>
    <div class="manage-grid">
        <a href="{{ route('watches.index') }}" class="manage-card">
            <div class="manage-title">Manage Watches</div>
            <div class="manage-desc">Add, edit or remove watches</div>
        </a>

        <a href="{{ route('categories.index') }}" class="manage-card">
            <div class="manage-title">Manage Categories</div>
            <div class="manage-desc">Organize your catalog categories</div>
        </a>
    </div>
</div>

            
        <!-- === Stats section === -->
        <div class="section">
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="label">Total Watches</div>
                    <div class="value">{{ $totalWatches }}</div>
                </div>
                <div class="stat-card">
                    <div class="label">Categories</div>
                    <div class="value">{{ $totalCategories }}</div>
                </div>
                <div class="stat-card danger">
                    <div class="label">Out of Stock</div>
                    <div class="value">{{ $outOfStock }}</div>
                </div>
            </div>
        </div>

        <!-- === Low stock section === -->
        <div class="section">
            <div class="section-title">
                Low Stock (≤ 5 units)
                <span class="count-pill">{{ $lowStock->count() }} item(s)</span>
            </div>

            <div class="panel">
                @if ($lowStock->count() > 0)
                    <table>
                        <thead>
                            <tr>
                                <th>Model</th>
                                <th>Brand</th>
                                <th>Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lowStock as $watch)
                                <tr>
                                    <td>{{ $watch->model }}</td>
                                    <td>{{ $watch->brand }}</td>
                                    <td>{{ $watch->stock }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="empty-state">All watches are well stocked.</div>
                @endif
            </div>
        </div>

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