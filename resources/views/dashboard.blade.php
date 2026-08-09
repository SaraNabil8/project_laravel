<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - SN Watches</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f2ec; color: #2b2b2b; margin: 0; }

        nav { background: #ffffff; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #e7e3da; position: sticky; top: 0; z-index: 1000; }
        nav .logo { display: flex; align-items: center; gap: 0px; text-decoration: none; }
        nav .logo img { height: 60px; margin-right: -8px; }
        nav .logo span { font-family: 'Georgia', serif; font-size: 20px; letter-spacing: 1px; color: #a9762f; }
        nav a, nav button { margin-left: 20px; text-decoration: none; color: #a9762f; background: none; border: none; cursor: pointer; font-size: 13px; text-transform: uppercase; font-family: Arial, sans-serif; }

        .page { max-width: 1100px; margin: 0 auto; padding: 40px 20px 80px; }
        h1 { font-family: 'Georgia', serif; font-weight: 400; color: #a9762f; margin: 0 0 30px; }

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

        @media (max-width: 700px) {
            .manage-grid, .stats-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <nav>
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('logo.png') }}" alt="SN Watches Logo">
            <span>SN WATCHES</span>
        </a>

        <div>
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('categories') }}">Categories</a>
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('profile.edit') }}">Profile</a>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit">Log Out</button>
            </form>
        </div>
    </nav>

    <div class="page">
        <h1>Dashboard</h1>

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
            @else<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - SN Watches</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f2ec; color: #2b2b2b; margin: 0; }

        nav { background: #ffffff; padding: 15px 30px; border-bottom: 1px solid #e7e3da; position: sticky; top: 0; z-index: 1000; }
        nav .nav-inner { max-width: 700px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; }
        nav .logo { display: flex; align-items: center; gap: 0px; text-decoration: none; }
        nav .logo img { height: 60px; margin-right: -8px; }
        nav .logo span { font-family: 'Georgia', serif; font-size: 20px; letter-spacing: 1px; color: #a9762f; }
        nav a, nav button { margin-left: 20px; text-decoration: none; color: #a9762f; background: none; border: none; cursor: pointer; font-size: 13px; text-transform: uppercase; font-family: Arial, sans-serif; }

        .page { max-width: 1100px; margin: 0 auto; padding: 40px 20px 80px; }
        h1 { font-family: 'Georgia', serif; font-weight: 400; color: #a9762f; margin: 0 0 30px; }

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

        @media (max-width: 700px) {
            .manage-grid, .stats-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <nav>
        <div class="nav-inner">
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('logo.png') }}" alt="SN Watches Logo">
                <span>SN WATCHES</span>
            </a>

            <div>
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('categories') }}">Categories</a>
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <a href="{{ route('profile.edit') }}">Profile</a>
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit">Log Out</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="page">
        <h1>Dashboard</h1>

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
    </div>

</body>
</html>
                <div class="empty">All watches are well stocked.</div>
            @endif
        </div>
    </div>

</body>
</html>