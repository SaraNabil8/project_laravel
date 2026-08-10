<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SN Watches</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f4f2ec; color: #2b2b2b; margin: 0; display: flex; min-height: 100vh; }

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
        nav .logo { display: flex; flex-direction: column; align-items: center; gap: 4px; text-decoration: none; margin-bottom: 26px; padding: 10px 6px; line-height: 1; }
        nav .logo img { height: 115px; width: 115px; object-fit: contain; flex-shrink: 0; display: block; }
        nav .logo span { font-family: 'Georgia', serif; font-size: 15px; letter-spacing: 0.6px; color: #a9762f; white-space: nowrap; line-height: 1; }

        nav .links { display: flex; flex-direction: column; gap: 4px; }
        nav a, nav button {
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
        nav a svg, nav button svg { width: 17px; height: 17px; flex-shrink: 0; stroke: currentColor; }
        nav a:hover, nav button:hover { background: #f5f0e6; color: #a9762f; }
        nav a.active { background: #a9762f; color: #ffffff; }

        /* Menu toggle (mobile) - CSS only, checkbox hack */
        #menu-toggle { display: none; }
        .menu-label { display: none; font-size: 24px; color: #a9762f; cursor: pointer; user-select: none; line-height: 1; padding: 6px; }

        /* ===== Main content ===== */
        .main { flex: 1; min-width: 0; }
        .page { max-width: 1100px; margin: 0 auto; padding: 40px 20px 80px; }
        h1 { font-family: 'Georgia', serif; font-weight: 400; color: #a9762f; margin: 0 0 30px; }

        /* ===== Dashboard-specific content ===== */
        .section { margin-bottom: 40px; }
        .section-title { font-family: 'Georgia', serif; font-weight: 400; font-size: 18px; color: #1f1f1f; margin: 0 0 15px; }

        .manage-grid, .stats-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; }
        .stats-grid { grid-template-columns: repeat(3, 1fr); }

        .manage-card, .stat-card {
            background: #ffffff;
            border: 1px solid #e7e3da;
            border-radius: 6px;
            padding: 18px 20px;
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .stat-card { border-left: 4px solid #a9762f; }
        .stat-card.danger { border-left-color: #c15b3f; }

        .manage-title, .label { font-size: 13px; font-weight: bold; color: #1f1f1f; }
        .manage-desc { font-size: 12px; color: #8a8676; margin-top: 3px; }

        .label { font-size: 11px; text-transform: uppercase; color: #8a8676; font-weight: normal; }
        .value { font-size: 26px; font-weight: bold; color: #1f1f1f; margin-top: 8px; }
        .value.danger { color: #c15b3f; }

        table { width: 100%; border-collapse: collapse; background: #ffffff; border: 1px solid #e7e3da; border-radius: 6px; overflow: hidden; }
        th, td { text-align: left; padding: 10px 15px; border-bottom: 1px solid #efece5; font-size: 13px; }
        th { background: #f7f5f0; color: #8a8676; text-transform: uppercase; font-size: 11px; }

        .empty { color: #9b968a; font-style: italic; padding: 15px; }

        /* ===== Responsive ===== */

        @media (max-width: 700px) {
            .manage-grid, .stats-grid { grid-template-columns: 1fr; }
        }

        /* Tablet: shrink sidebar to icons only */
        @media (max-width: 900px) {
            nav { width: 64px; padding: 16px 8px; align-items: center; }
            nav .logo { padding: 6px 0; margin-bottom: 20px; }
            nav .logo span { display: none; }
            nav .logo img { height: 38px; width: 38px; }
            nav a, nav button { justify-content: center; padding: 12px 0; }
            nav a span.label, nav button span.label { display: none; }
        }

        /* Mobile: collapse to top bar + dropdown */
        @media (max-width: 600px) {
            body { display: block; }

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
            nav .logo { flex-direction: row; margin-bottom: 0; padding: 0; gap: 8px; }
            nav .logo img { height: 40px; width: 40px; }
            nav .logo span { display: inline; font-size: 15px; }

            .menu-label { display: block; }

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
            #menu-toggle:checked ~ .links { display: flex; }

            nav a, nav button { padding: 10px 8px; }
            nav a span.label, nav button span.label { display: inline; }

            .page { padding: 24px 15px; }
            h1 { font-size: 22px; }
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
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 10.5 12 3l9 7.5"/><path d="M5 9.5V21h14V9.5"/></svg>
                <span class="label">Home</span>
            </a>
            <a href="{{ route('categories') }}" class="{{ request()->routeIs('categories') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
                <span class="label">Categories</span>
            </a>
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
                <span class="label">Dashboard</span>
            </a>
            <a href="{{ route('profile.edit') }}" class="{{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 4-6 8-6s8 2 8 6"/></svg>
                <span class="label">Profile</span>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><path d="M16 17l5-5-5-5"/><path d="M21 12H9"/></svg>
                    <span class="label">Log Out</span>
                </button>
            </form>
        </div>
    </nav>

    <div class="main">
        <div class="page">
            <h1>Dashboard</h1>

            @if (auth()->user()->isAdmin() || auth()->user()->isEditor())
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
                            <div class="value danger">{{ $outOfStock }}</div>
                        </div>
                    </div>
                </div>

                <div class="section">
                    <div class="section-title">Low Stock (≤ 5 units)</div>

                    @if ($lowStock->count() > 0)
                        <table>
                            <tr>
                                <th>Model</th>
                                <th>Brand</th>
                                <th>Stock</th>
                            </tr>
                            @foreach ($lowStock as $watch)
                                <tr>
                                    <td>{{ $watch->model }}</td>
                                    <td>{{ $watch->brand }}</td>
                                    <td>{{ $watch->stock }}</td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <div class="empty">All watches are well stocked.</div>
                    @endif
                </div>

                @if (auth()->user()->isAdmin())
                    <div class="section">
                        <div class="section-title">Users</div>

                        @if ($users->count() > 0)
                            <table>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Joined</th>
                                </tr>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            {{ $user->isAdmin() ? 'Admin' : ($user->isEditor() ? 'Editor' : 'Client') }}
                                        </td>
                                        <td>{{ $user->created_at->format('d M Y') }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <div class="empty">No users found.</div>
                        @endif
                    </div>
                @endif
            @else
                <div class="section">
                    <div class="section-title">Welcome, {{ auth()->user()->name }}</div>
                    <p>Browse our watch collection from the <a href="{{ route('home') }}" style="color:#a9762f;">home page</a> or explore <a href="{{ route('categories') }}" style="color:#a9762f;">categories</a>.</p>
                </div>
            @endif
        </div>
    </div>

</body>
</html>