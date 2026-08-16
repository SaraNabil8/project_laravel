<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - SN Watches</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans antialiased bg-gray-100">

    <nav class="bg-white py-[15px] px-[30px] border-b border-[#e7e3da] max-[600px]:py-3 max-[600px]:px-4">
        <div class="max-w-[1200px] mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="flex items-center no-underline">
                <img src="{{ asset('logo.png') }}" alt="SN Watches Logo" class="h-[60px] -mr-2 max-[600px]:h-[45px]">
                <span class="font-['Georgia',serif] text-xl tracking-wide text-[#a9762f] no-underline max-[600px]:text-base">SN WATCHES</span>
            </a>

            <div>
                <a href="{{ route('home') }}"
                    class="ml-5 no-underline text-[#a9762f] text-[13px] uppercase hover:underline max-[600px]:ml-2.5 max-[600px]:text-xs">Home</a>
                <a href="{{ route('dashboard') }}"
                    class="ml-5 no-underline text-[#a9762f] text-[13px] uppercase hover:underline max-[600px]:ml-2.5 max-[600px]:text-xs">Dashboard</a>
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