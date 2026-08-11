<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name }} - Watches Shop</title>

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

        nav form {
            margin: 0;
            padding: 0;
        }

        /* ===== Menu hamburger ===== */

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

        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #a9762f;
            text-decoration: none;
            font-family: Arial, sans-serif;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        h1 {
            font-family: 'Georgia', serif;
            font-weight: 400;
            font-size: 30px;
            letter-spacing: 1px;
            margin: 0 0 30px;
            color: #a9762f;
        }

        /* ===== Table ===== */

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            background: #ffffff;
            border: 1px solid #e7e3da;
            border-radius: 4px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #ffffff;
            min-width: 650px;
        }

        thead {
            background: #f5f0e6;
        }

        th {
            font-family: Arial, sans-serif;
            font-weight: bold;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            color: #a9762f;
        }

        th,
        td {
            padding: 13px 15px;
            text-align: left;
            border-bottom: 1px solid #e7e3da;
            font-family: Arial, sans-serif;
        }

        th {
            white-space: nowrap;
        }

        td {
            font-size: 13px;
            color: #6b6355;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover {
            background: #faf9f6;
        }

        td.model {
            font-family: 'Georgia', serif;
            font-size: 15px;
            color: #2b2b2b;
        }

        td.price {
            color: #a9762f;
            font-weight: bold;
        }

        td.stock {
            font-weight: 500;
        }

        .watch-image {
            width: 60px;
            height: 60px;
            border-radius: 4px;
            object-fit: cover;
            display: block;
            border: 1px solid #e7e3da;
        }

        .no-image {
            color: #9b968a;
            font-size: 13px;
        }

        .empty-row {
            text-align: center;
            color: #9b968a;
            padding: 50px 30px;
            font-size: 13px;
        }

        /* ===== Tablet ===== */

        @media (max-width: 900px) {
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

            .container {
                padding: 35px 20px 60px;
            }
        }

        /* ===== Mobile ===== */

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
                justify-content: flex-start;
                padding: 10px 8px;
            }

            nav a span.label,
            nav button span.label {
                display: inline;
            }

            .container {
                padding: 24px 15px 50px;
            }

            .back-link {
                margin-bottom: 16px;
                font-size: 12px;
            }

            h1 {
                font-size: 23px;
                margin-bottom: 24px;
            }

            .table-wrapper {
                border-radius: 4px;
            }

            th,
            td {
                padding: 10px;
                font-size: 12px;
            }

            .watch-image {
                width: 50px;
                height: 50px;
            }

            td.model {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>

    <!-- ===== Sidebar ===== -->

    <nav>
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('logo.png') }}" alt="SN Watches Logo">
            <span>SN WATCHES</span>
        </a>

        <input type="checkbox" id="menu-toggle">
        <label for="menu-toggle" class="menu-label">☰</label>

        <div class="links">

            <a href="{{ route('home') }}">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 10.5 12 3l9 7.5" />
                    <path d="M5 9.5V21h14V9.5" />
                </svg>
                <span class="label">Home</span>
            </a>

            <a href="{{ route('categories') }}" class="active">
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

                    <a href="{{ route('dashboard') }}">
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" />
                            <path d="M3 9h18M9 21V9" />
                        </svg>
                        <span class="label">Dashboard</span>
                    </a>

                    <a href="{{ route('profile.edit') }}">
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

    <!-- ===== Main content ===== -->

    <div class="main">

        <div class="container">

            <a href="{{ route('categories') }}" class="back-link">
                ← Back to categories
            </a>

            <h1>{{ $category->name }}</h1>

            <div class="table-wrapper">

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

                                        <img src="{{ asset('storage/' . $watch->image) }}" alt="{{ $watch->model }}"
                                            class="watch-image">

                                    @else

                                        <span class="no-image">—</span>

                                    @endif
                                </td>

                                <td class="model">
                                    {{ $watch->model }}
                                </td>

                                <td>
                                    {{ $watch->brand }}
                                </td>

                                <td class="price">
                                    {{ $watch->price }} DH
                                </td>

                                <td class="stock">
                                    {{ $watch->stock }}
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="empty-row">
                                    No watches in this category yet.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</body>

</html>