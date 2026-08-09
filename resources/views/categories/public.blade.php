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
            gap: 0px;
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

        nav .links a,
        nav .links button {
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

        nav .links form {
            display: inline;
        }

        /* Menu hamburger (mobile) - CSS only, checkbox hack */
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
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 50px 20px 80px;
        }

        h1 {
            font-family: 'Georgia', serif;
            font-weight: 400;
            font-size: 30px;
            letter-spacing: 1px;
            margin: 0 0 36px;
            color: #a9762f;
        }

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

        @media (max-width: 900px) {
            .grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            nav {
                padding: 12px 16px;
            }

            nav .logo img {
                height: 45px;
            }

            nav .logo span {
                font-size: 16px;
            }

            .menu-label {
                display: block;
            }

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

            #menu-toggle:checked~.links {
                display: flex;
            }

            nav .links a,
            nav .links button {
                margin: 8px 0 0;
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
        <h1>Categories</h1>

        @if ($categories->count() > 0)
            <div class="grid">
                @foreach ($categories as $category)
                    <a href="{{ route('categories.public_show', $category->id) }}" class="cat-card">
                        <div class="cat-image">
                            <img src="{{ match(strtolower($category->name)) {
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

</body>

</html>