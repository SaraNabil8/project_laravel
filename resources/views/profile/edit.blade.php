<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - SN Watches</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        nav {
            background: #ffffff;
            padding: 15px 30px;
            border-bottom: 1px solid #e7e3da;
        }

        nav .nav-inner {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
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
            font-family: Georgia, serif;
            font-size: 20px;
            letter-spacing: 1px;
            color: #a9762f;
            text-decoration: none; 
        }

        nav a {
            margin-left: 20px;
            text-decoration: none;
            color: #a9762f;
            font-size: 13px;
            text-transform: uppercase;
        }

        nav a:hover {
            text-decoration: underline;
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

            nav a {
                margin-left: 10px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100">

    <nav>
        <div class="nav-inner">
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('logo.png') }}" alt="SN Watches Logo">
                <span>SN WATCHES</span>
            </a>

            <div>
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </div>
        </div>
    </nav>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>

</body>
</html>