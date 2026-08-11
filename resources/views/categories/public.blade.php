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
            max-width: 1100px;
            margin: 0 auto;
            padding: 40px 20px 80px;
        }

        h1 {
            font-family: 'Georgia', serif;
            font-weight: 400;
            font-size: 30px;
            letter-spacing: 1px;
            margin: 0 0 36px;
            color: #a9762f;
        }

        /* ===== Categories grid ===== */
        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            align-items: stretch;
        }

        .cat-card {
            display: flex;
            flex-direction: column;
            height: 100%;
            text-decoration: none;
            color: inherit;
            background: #ffffff;
            border: 1px solid #e7e3da;
            border-radius: 4px;
            overflow: hidden;
        }

        .cat-image {
            width: 100%;
            height: 180px;
            overflow: hidden;
        }

        .cat-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .cat-body {
            padding: 15px;
            font-family: Arial, sans-serif;
            flex: 1;
        }

        .cat-body h3 {
            font-family: 'Georgia', serif;
            font-weight: 400;
            font-size: 18px;
            color: #1f1f1f;
            margin: 0 0 5px;
        }

        .cat-body .count {
            font-size: 13px;
            color: #8a8676;
        }

        .empty-msg {
            font-family: Arial, sans-serif;
            text-align: center;
            color: #9b968a;
            padding: 60px 0;
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

            @if (Route::has('login'))
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
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">
                            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="9" cy="7" r="4" />
                                <path d="M2 21c0-4 3-6 7-6s7 2 7 6" />
                                <path d="M19 8v6M22 11h-6" />
                            </svg>
                            <span class="label">Register</span>
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>

    <div class="main">
        <div class="container">
            <h1>Categories</h1>

            @if ($categories->count() > 0)
                <div class="grid">
                    @foreach ($categories as $category)
                                <a href="{{ route('categories.public_show', $category->id) }}" class="cat-card">
                                    <div class="cat-image">
                                        <img src="{{ match (strtolower($category->name)) {
                            'sport' => 'https://images.unsplash.com/photo-1683714152903-a17197c2347c?q=80&w=775&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            'luxury' => 'https://images.unsplash.com/photo-1600003014755-ba31aa59c4b6?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            'classic' => 'https://images.unsplash.com/photo-1628483211149-1aed2a58cf81?q=80&w=386&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            'casual' => 'https://images.unsplash.com/photo-1633869699811-cd4f63049b36?q=80&w=465&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            'smart watch' => 'https://images.unsplash.com/photo-1551816230-ef5deaed4a26?q=80&w=465&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            'women' => 'https://images.unsplash.com/photo-1647738233930-22e3639fed78?q=80&w=871&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            default => 'https://images.unsplash.com/photo-1524805444758-089113d48a6d?w=400',
                        } }}" alt="{{ $category->name }}" style="width:100%; height:100%; object-fit:cover;">
                                    </div>
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
    </div>

</body>

</html>