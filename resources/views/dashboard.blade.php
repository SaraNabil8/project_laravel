<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SN Watches</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans bg-[#f4f2ec] text-[#2b2b2b] m-0 flex min-h-screen max-[600px]:block">

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
        </div>
    </nav>

    <!-- ===== Main content ===== -->
    <div class="flex-1 min-w-0">
        <div class="max-w-[1100px] mx-auto pt-10 px-5 pb-20 max-[600px]:pt-6 max-[600px]:px-[15px] max-[600px]:pb-6">

            <h1 class="font-['Georgia',serif] font-normal text-[#a9762f] mb-[30px] max-[600px]:text-[22px]">Dashboard</h1>

            @if (auth()->user()->isAdmin() || auth()->user()->isEditor())
                <div class="mb-10">
                    <div class="font-['Georgia',serif] font-normal text-lg text-[#1f1f1f] mb-4">Management</div>
                    <div class="grid grid-cols-2 gap-4 max-[700px]:grid-cols-1">
                        <a href="{{ route('watches.index') }}"
                            class="bg-white border border-[#e7e3da] rounded-md py-[18px] px-5 no-underline text-inherit block">
                            <div class="text-[13px] font-bold text-[#1f1f1f]">Manage Watches</div>
                            <div class="text-xs text-[#8a8676] mt-1">Add, edit or remove watches</div>
                        </a>
                        <a href="{{ route('categories.index') }}"
                            class="bg-white border border-[#e7e3da] rounded-md py-[18px] px-5 no-underline text-inherit block">
                            <div class="text-[13px] font-bold text-[#1f1f1f]">Manage Categories</div>
                            <div class="text-xs text-[#8a8676] mt-1">Organize your catalog categories</div>
                        </a>
                    </div>
                </div>

                <div class="mb-10">
                    <div class="grid grid-cols-3 gap-4 max-[700px]:grid-cols-1">
                        <div class="bg-white border border-[#e7e3da] border-l-4 border-l-[#a9762f] rounded-md py-[18px] px-5">
                            <div class="text-[11px] uppercase text-[#8a8676] font-normal">Total Watches</div>
                            <div class="text-[26px] font-bold text-[#1f1f1f] mt-2">{{ $totalWatches }}</div>
                        </div>
                        <div class="bg-white border border-[#e7e3da] border-l-4 border-l-[#a9762f] rounded-md py-[18px] px-5">
                            <div class="text-[11px] uppercase text-[#8a8676] font-normal">Categories</div>
                            <div class="text-[26px] font-bold text-[#1f1f1f] mt-2">{{ $totalCategories }}</div>
                        </div>
                        <div class="bg-white border border-[#e7e3da] border-l-4 border-l-[#c15b3f] rounded-md py-[18px] px-5">
                            <div class="text-[11px] uppercase text-[#8a8676] font-normal">Out of Stock</div>
                            <div class="text-[26px] font-bold text-[#c15b3f] mt-2">{{ $outOfStock }}</div>
                        </div>
                    </div>
                </div>

                <div class="mb-10">
                    <div class="font-['Georgia',serif] font-normal text-lg text-[#1f1f1f] mb-4">Low Stock (≤ 5 units)</div>

                    @if ($lowStock->count() > 0)
                        <table class="w-full border-collapse bg-white border border-[#e7e3da] rounded-md overflow-hidden">
                            <tr>
                                <th class="text-left py-2.5 px-[15px] border-b border-[#efece5] text-[13px] bg-[#f7f5f0] text-[#8a8676] uppercase !text-[11px]">Model</th>
                                <th class="text-left py-2.5 px-[15px] border-b border-[#efece5] text-[13px] bg-[#f7f5f0] text-[#8a8676] uppercase !text-[11px]">Brand</th>
                                <th class="text-left py-2.5 px-[15px] border-b border-[#efece5] text-[13px] bg-[#f7f5f0] text-[#8a8676] uppercase !text-[11px]">Stock</th>
                            </tr>
                            @foreach ($lowStock as $watch)
                                <tr>
                                    <td class="text-left py-2.5 px-[15px] border-b border-[#efece5] text-[13px]">{{ $watch->model }}</td>
                                    <td class="text-left py-2.5 px-[15px] border-b border-[#efece5] text-[13px]">{{ $watch->brand }}</td>
                                    <td class="text-left py-2.5 px-[15px] border-b border-[#efece5] text-[13px]">{{ $watch->stock }}</td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <div class="text-[#9b968a] italic p-[15px]">All watches are well stocked.</div>
                    @endif
                </div>

                @if (auth()->user()->isAdmin())
                    <div class="mb-10">
                        <div class="font-['Georgia',serif] font-normal text-lg text-[#1f1f1f] mb-4">Users</div>

                        @if ($users->count() > 0)
                            <table class="w-full border-collapse bg-white border border-[#e7e3da] rounded-md overflow-hidden">
                                <tr>
                                    <th class="text-left py-2.5 px-[15px] border-b border-[#efece5] text-[13px] bg-[#f7f5f0] text-[#8a8676] uppercase !text-[11px]">Name</th>
                                    <th class="text-left py-2.5 px-[15px] border-b border-[#efece5] text-[13px] bg-[#f7f5f0] text-[#8a8676] uppercase !text-[11px]">Email</th>
                                    <th class="text-left py-2.5 px-[15px] border-b border-[#efece5] text-[13px] bg-[#f7f5f0] text-[#8a8676] uppercase !text-[11px]">Role</th>
                                    <th class="text-left py-2.5 px-[15px] border-b border-[#efece5] text-[13px] bg-[#f7f5f0] text-[#8a8676] uppercase !text-[11px]">Joined</th>
                                </tr>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="text-left py-2.5 px-[15px] border-b border-[#efece5] text-[13px]">{{ $user->name }}</td>
                                        <td class="text-left py-2.5 px-[15px] border-b border-[#efece5] text-[13px]">{{ $user->email }}</td>
                                        <td class="text-left py-2.5 px-[15px] border-b border-[#efece5] text-[13px]">
                                            {{ $user->isAdmin() ? 'Admin' : ($user->isEditor() ? 'Editor' : 'Client') }}
                                        </td>
                                        <td class="text-left py-2.5 px-[15px] border-b border-[#efece5] text-[13px]">{{ $user->created_at->format('d M Y') }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <div class="text-[#9b968a] italic p-[15px]">No users found.</div>
                        @endif
                    </div>
                @endif
            @else
                <div class="mb-10">
                    <div class="font-['Georgia',serif] font-normal text-lg text-[#1f1f1f] mb-4">Welcome, {{ auth()->user()->name }}</div>
                    <p>Browse our watch collection from the <a href="{{ route('home') }}" class="text-[#a9762f]">home
                            page</a> or explore <a href="{{ route('categories') }}" class="text-[#a9762f]">categories</a>.
                    </p>
                </div>
            @endif
        </div>
    </div>

</body>

</html>