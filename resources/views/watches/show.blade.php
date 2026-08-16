<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $watch->model }} - SN Watches</title>
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
                class="flex items-center gap-3 w-full text-left no-underline text-[13px] tracking-wide py-2.5 px-2.5 rounded text-[#6b6355] hover:bg-[#f5f0e6] hover:text-[#a9762f]
                       max-[900px]:justify-center max-[900px]:py-3 max-[900px]:px-0
                       max-[600px]:py-2.5 max-[600px]:px-2">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="w-[17px] h-[17px] shrink-0 stroke-current">
                    <path d="M3 10.5 12 3l9 7.5" />
                    <path d="M5 9.5V21h14V9.5" />
                </svg>
                <span class="label max-[900px]:hidden max-[600px]:inline">Home</span>
            </a>

            <a href="{{ route('categories') }}"
                class="flex items-center gap-3 w-full text-left no-underline text-[13px] tracking-wide py-2.5 px-2.5 rounded text-[#6b6355] hover:bg-[#f5f0e6] hover:text-[#a9762f]
                       max-[900px]:justify-center max-[900px]:py-3 max-[900px]:px-0
                       max-[600px]:py-2.5 max-[600px]:px-2">
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
                        class="flex items-center gap-3 w-full text-left no-underline text-[13px] tracking-wide py-2.5 px-2.5 rounded text-[#6b6355] hover:bg-[#f5f0e6] hover:text-[#a9762f]
                               max-[900px]:justify-center max-[900px]:py-3 max-[900px]:px-0
                               max-[600px]:py-2.5 max-[600px]:px-2">
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-[17px] h-[17px] shrink-0 stroke-current">
                            <rect x="3" y="3" width="18" height="18" rx="2" />
                            <path d="M3 9h18M9 21V9" />
                        </svg>
                        <span class="label max-[900px]:hidden max-[600px]:inline">Dashboard</span>
                    </a>
                    <a href="{{ route('profile.edit') }}"
                        class="flex items-center gap-3 w-full text-left no-underline text-[13px] tracking-wide py-2.5 px-2.5 rounded text-[#6b6355] hover:bg-[#f5f0e6] hover:text-[#a9762f]
                               max-[900px]:justify-center max-[900px]:py-3 max-[900px]:px-0
                               max-[600px]:py-2.5 max-[600px]:px-2">
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
        <div class="max-w-[900px] mx-auto pt-10 px-5 pb-20 max-[900px]:pt-[35px] max-[900px]:px-5 max-[900px]:pb-[60px] max-[600px]:pt-6 max-[600px]:px-[15px] max-[600px]:pb-[50px]">

            <a href="{{ route('watches.index') }}"
                class="inline-block mb-5 text-[#a9762f] no-underline text-[13px] uppercase tracking-wide hover:underline max-[600px]:mb-4 max-[600px]:text-xs">
                ← Back to list
            </a>

            <h2 class="font-['Georgia',serif] font-normal text-[30px] tracking-wide mb-[30px] text-[#a9762f] max-[600px]:text-[23px] max-[600px]:mb-6">
                Watch Details</h2>

            <div class="bg-white border border-[#e7e3da] rounded p-[30px] max-[600px]:p-5">

                @if ($watch->image)
                    <img src="{{ asset('storage/' . $watch->image) }}" alt="{{ $watch->model }}"
                        class="w-full max-w-[420px] h-80 object-cover block mx-auto mb-[30px] rounded border border-[#e7e3da] max-[600px]:h-[250px] max-[600px]:mb-6">
                @endif

                <div class="py-3.5 border-t border-b border-[#e7e3da] text-sm text-[#6b6355] leading-relaxed max-[600px]:text-[13px] max-[600px]:py-3">
                    <strong class="inline-block min-w-[115px] font-bold text-[#2b2b2b] max-[600px]:block max-[600px]:min-w-0 max-[600px]:mb-1">Model:</strong>
                    {{ $watch->model }}
                </div>

                <div class="py-3.5 border-b border-[#e7e3da] text-sm text-[#6b6355] leading-relaxed max-[600px]:text-[13px] max-[600px]:py-3">
                    <strong class="inline-block min-w-[115px] font-bold text-[#2b2b2b] max-[600px]:block max-[600px]:min-w-0 max-[600px]:mb-1">Brand:</strong>
                    {{ $watch->brand }}
                </div>

                <div class="py-3.5 border-b border-[#e7e3da] text-sm text-[#6b6355] leading-relaxed max-[600px]:text-[13px] max-[600px]:py-3">
                    <strong class="inline-block min-w-[115px] font-bold text-[#2b2b2b] max-[600px]:block max-[600px]:min-w-0 max-[600px]:mb-1">Price:</strong>
                    {{ $watch->price }} DH
                </div>

                <div class="py-3.5 border-b border-[#e7e3da] text-sm text-[#6b6355] leading-relaxed max-[600px]:text-[13px] max-[600px]:py-3">
                    <strong class="inline-block min-w-[115px] font-bold text-[#2b2b2b] max-[600px]:block max-[600px]:min-w-0 max-[600px]:mb-1">Stock:</strong>
                    {{ $watch->stock }}
                </div>

                <div class="py-3.5 border-b border-[#e7e3da] text-sm text-[#6b6355] leading-relaxed max-[600px]:text-[13px] max-[600px]:py-3">
                    <strong class="inline-block min-w-[115px] font-bold text-[#2b2b2b] max-[600px]:block max-[600px]:min-w-0 max-[600px]:mb-1">Description:</strong>
                    {{ $watch->description ?? '—' }}
                </div>

                <div class="flex items-center gap-2.5 mt-7 max-[600px]:flex-col max-[600px]:items-stretch">

                    <a href="{{ route('watches.edit', $watch->id) }}"
                        class="inline-block py-2.5 px-4 rounded text-[13px] no-underline cursor-pointer bg-[#a9762f] text-white hover:bg-[#8f6327] max-[600px]:w-full max-[600px]:text-center max-[600px]:py-2.5">
                        Edit
                    </a>

                    <form action="{{ route('watches.destroy', $watch->id) }}" method="POST"
                        onsubmit="return confirm('Delete this watch?')" class="m-0">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                            class="inline-block py-2.5 px-4 border border-[#e7e3da] rounded text-[13px] cursor-pointer bg-[#f5f0e6] text-[#6b6355] hover:bg-[#e7e3da] hover:text-[#2b2b2b] max-[600px]:w-full max-[600px]:text-center max-[600px]:py-2.5">
                            Delete
                        </button>
                    </form>

                </div>

            </div>

        </div>
    </div>

</body>

</html>