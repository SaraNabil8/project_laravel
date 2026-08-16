<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories - Watches Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans bg-[#faf9f6] text-[#2b2b2b] m-0 flex min-h-screen max-[600px]:block">

    <!-- ===== Sidebar ===== -->
    <nav class="bg-white w-[210px] shrink-0 min-h-screen py-5 px-3.5 flex flex-col border-r border-[#e7e3da] sticky top-0 self-start z-[1000] transition-[width] duration-200
                max-[900px]:w-16 max-[900px]:px-2 max-[900px]:py-4 max-[900px]:items-center
                max-[600px]:w-auto max-[600px]:min-h-0 max-[600px]:flex-row max-[600px]:items-center max-[600px]:justify-between max-[600px]:py-2.5 max-[600px]:px-3.5 max-[600px]:border-r-0 max-[600px]:border-b max-[600px]:border-[#e7e3da]">

        <a href="{{ route('home') }}"
            class="flex flex-col items-center gap-1 no-underline mb-6 py-2.5 px-1.5 leading-none
                   max-[900px]:py-1.5 max-[900px]:px-0 max-[900px]:mb-5
                   max-[600px]:flex-row max-[600px]:mb-0 max-[600px]:p-0 max-[600px]:gap-2">
            <img src="{{ asset('logo.png') }}" alt="SN Watches Logo"
                class="h-[115px] w-[115px] object-contain shrink-0 block
                       max-[900px]:h-[38px] max-[900px]:w-[38px]
                       max-[600px]:h-10 max-[600px]:w-10">
            <span class="font-['Georgia',serif] text-[15px] tracking-wide text-[#a9762f] whitespace-nowrap leading-none
                         max-[900px]:hidden
                         max-[600px]:inline max-[600px]:text-[15px]">SN WATCHES</span>
        </a>

        <input type="checkbox" id="menu-toggle" class="hidden peer">
        <label for="menu-toggle"
            class="hidden text-2xl text-[#a9762f] cursor-pointer select-none leading-none p-1.5 max-[600px]:block">☰</label>

        <div class="flex flex-col gap-1
                    max-[600px]:hidden max-[600px]:peer-checked:flex max-[600px]:absolute max-[600px]:top-full max-[600px]:right-0 max-[600px]:left-0 max-[600px]:bg-white max-[600px]:border-b max-[600px]:border-[#e7e3da] max-[600px]:flex-col max-[600px]:py-2 max-[600px]:px-3 max-[600px]:pb-3.5 max-[600px]:gap-0.5">

            <a href="{{ route('home') }}"
                class="flex items-center gap-3 w-full text-left no-underline text-[13px] tracking-wide py-2.5 px-2.5 rounded
                       max-[900px]:justify-center max-[900px]:py-3 max-[900px]:px-0
                       max-[600px]:py-2.5 max-[600px]:px-2
                       {{ request()->routeIs('home') ? 'bg-[#a9762f] text-white' : 'text-[#6b6355] hover:bg-[#f5f0e6] hover:text-[#a9762f]' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="w-[17px] h-[17px] shrink-0 stroke-current">
                    <path d="M3 10.5 12 3l9 7.5" />
                    <path d="M5 9.5V21h14V9.5" />
                </svg>
                <span class="label max-[900px]:hidden max-[600px]:inline">Home</span>
            </a>

            <a href="{{ route('categories') }}"
                class="flex items-center gap-3 w-full text-left no-underline text-[13px] tracking-wide py-2.5 px-2.5 rounded
                       max-[900px]:justify-center max-[900px]:py-3 max-[900px]:px-0
                       max-[600px]:py-2.5 max-[600px]:px-2
                       {{ request()->routeIs('categories') ? 'bg-[#a9762f] text-white' : 'text-[#6b6355] hover:bg-[#f5f0e6] hover:text-[#a9762f]' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="w-[17px] h-[17px] shrink-0 stroke-current">
                    <rect x="3" y="3" width="7" height="7" />
                    <rect x="14" y="3" width="7" height="7" />
                    <rect x="3" y="14" width="7" height="7" />
                    <rect x="14" y="14" width="7" height="7" />
                </svg>
                <span class="label max-[900px]:hidden max-[600px]:inline">Categories</span>
            </a>

            @if (Route::has('login'))
                @auth
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center gap-3 w-full text-left no-underline text-[13px] tracking-wide py-2.5 px-2.5 rounded
                               max-[900px]:justify-center max-[900px]:py-3 max-[900px]:px-0
                               max-[600px]:py-2.5 max-[600px]:px-2
                               {{ request()->routeIs('dashboard') ? 'bg-[#a9762f] text-white' : 'text-[#6b6355] hover:bg-[#f5f0e6] hover:text-[#a9762f]' }}">
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-[17px] h-[17px] shrink-0 stroke-current">
                            <rect x="3" y="3" width="18" height="18" rx="2" />
                            <path d="M3 9h18M9 21V9" />
                        </svg>
                        <span class="label max-[900px]:hidden max-[600px]:inline">Dashboard</span>
                    </a>
                    <a href="{{ route('profile.edit') }}"
                        class="flex items-center gap-3 w-full text-left no-underline text-[13px] tracking-wide py-2.5 px-2.5 rounded
                               max-[900px]:justify-center max-[900px]:py-3 max-[900px]:px-0
                               max-[600px]:py-2.5 max-[600px]:px-2
                               {{ request()->routeIs('profile.edit') ? 'bg-[#a9762f] text-white' : 'text-[#6b6355] hover:bg-[#f5f0e6] hover:text-[#a9762f]' }}">
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-[17px] h-[17px] shrink-0 stroke-current">
                            <circle cx="12" cy="8" r="4" />
                            <path d="M4 21c0-4 4-6 8-6s8 2 8 6" />
                        </svg>
                        <span class="label max-[900px]:hidden max-[600px]:inline">Profile</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="flex items-center gap-3 w-full text-left text-[13px] tracking-wide py-2.5 px-2.5 rounded bg-none border-none cursor-pointer text-[#6b6355] hover:bg-[#f5f0e6] hover:text-[#a9762f]
                                   max-[900px]:justify-center max-[900px]:py-3 max-[900px]:px-0
                                   max-[600px]:py-2.5 max-[600px]:px-2">
                            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="w-[17px] h-[17px] shrink-0 stroke-current">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                <path d="M16 17l5-5-5-5" />
                                <path d="M21 12H9" />
                            </svg>
                            <span class="label max-[900px]:hidden max-[600px]:inline">Log Out</span>
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="flex items-center gap-3 w-full text-left no-underline text-[13px] tracking-wide py-2.5 px-2.5 rounded text-[#6b6355] hover:bg-[#f5f0e6] hover:text-[#a9762f]
                               max-[900px]:justify-center max-[900px]:py-3 max-[900px]:px-0
                               max-[600px]:py-2.5 max-[600px]:px-2">
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-[17px] h-[17px] shrink-0 stroke-current">
                            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                            <path d="M10 17l5-5-5-5" />
                            <path d="M15 12H3" />
                        </svg>
                        <span class="label max-[900px]:hidden max-[600px]:inline">Login</span>
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="flex items-center gap-3 w-full text-left no-underline text-[13px] tracking-wide py-2.5 px-2.5 rounded text-[#6b6355] hover:bg-[#f5f0e6] hover:text-[#a9762f]
                                   max-[900px]:justify-center max-[900px]:py-3 max-[900px]:px-0
                                   max-[600px]:py-2.5 max-[600px]:px-2">
                            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="w-[17px] h-[17px] shrink-0 stroke-current">
                                <circle cx="9" cy="7" r="4" />
                                <path d="M2 21c0-4 3-6 7-6s7 2 7 6" />
                                <path d="M19 8v6M22 11h-6" />
                            </svg>
                            <span class="label max-[900px]:hidden max-[600px]:inline">Register</span>
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>

    <!-- ===== Main content ===== -->
    <div class="flex-1 min-w-0">
        <div class="max-w-[1100px] mx-auto pt-10 px-5 pb-20 max-[600px]:pt-6 max-[600px]:px-[15px] max-[600px]:pb-6">

            <h1 class="font-['Georgia',serif] font-normal text-[30px] tracking-wide mb-9 text-[#a9762f] max-[600px]:text-[22px] max-[600px]:mb-6">
                Categories</h1>

            @if ($categories->count() > 0)
                <div class="grid grid-cols-3 gap-6 items-stretch max-[900px]:grid-cols-2 max-[600px]:grid-cols-1">
                    @foreach ($categories as $category)
                        <a href="{{ route('categories.public_show', $category->id) }}"
                            class="flex flex-col h-full no-underline text-inherit bg-white border border-[#e7e3da] rounded overflow-hidden">
                            <div class="w-full h-[180px] overflow-hidden">
                                <img src="{{ match (strtolower($category->name)) {
                                    'sport' => 'https://images.unsplash.com/photo-1683714152903-a17197c2347c?q=80&w=775&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                                    'luxury' => 'https://images.unsplash.com/photo-1600003014755-ba31aa59c4b6?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                                    'classic' => 'https://images.unsplash.com/photo-1628483211149-1aed2a58cf81?q=80&w=386&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                                    'casual' => 'https://images.unsplash.com/photo-1633869699811-cd4f63049b36?q=80&w=465&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                                    'smart watch' => 'https://images.unsplash.com/photo-1551816230-ef5deaed4a26?q=80&w=465&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                                    'women' => 'https://images.unsplash.com/photo-1647738233930-22e3639fed78?q=80&w=871&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                                    default => 'https://images.unsplash.com/photo-1524805444758-089113d48a6d?w=400',
                                } }}" alt="{{ $category->name }}" class="w-full h-full object-cover block">
                            </div>
                            <div class="p-[15px] font-sans flex-1">
                                <h3 class="font-['Georgia',serif] font-normal text-lg text-[#1f1f1f] mb-1.5">{{ $category->name }}</h3>
                                <span class="text-[13px] text-[#8a8676]">{{ $category->watches->count() }} watches</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="font-sans text-center text-[#9b968a] py-[60px]">No categories available yet.</div>
            @endif
        </div>
    </div>

</body>

</html>