<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SN Watches</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans m-0 bg-[#faf9f6] text-[#2b2b2b] min-h-screen flex items-center justify-center">

    <div class="w-full max-w-[380px] p-5">

        <div class="bg-white border border-[#e7e3da] rounded-md p-[30px]">
            <h1 class="font-['Georgia',serif] font-normal text-[22px] text-[#a9762f] text-center mb-5">Welcome back</h1>

            @if (session('status'))
                <div class="text-[#3a6b3a] text-xs mt-1 mb-4 text-center">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-xs uppercase text-[#6b6b6b] mb-1.5">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full py-2.5 px-2.5 border border-[#d9d4c8] rounded text-sm">
                    @error('email')
                        <div class="text-[#c15b3f] text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-xs uppercase text-[#6b6b6b] mb-1.5">Password</label>
                    <input id="password" type="password" name="password" required
                        class="w-full py-2.5 px-2.5 border border-[#d9d4c8] rounded text-sm">
                    @error('password')
                        <div class="text-[#c15b3f] text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5 text-[13px] text-[#6b6b6b]">
                    <input type="checkbox" id="remember_me" name="remember">
                    <label for="remember_me">Remember me</label>
                </div>

                <div class="flex items-center justify-between">
                    @if (Route::has('password.request'))
                        <a class="text-[13px] text-[#6b6b6b]" href="{{ route('password.request') }}">Forgot your password?</a>
                    @else
                        <span></span>
                    @endif

                    <button type="submit"
                        class="bg-[#a9762f] text-white border-none py-2.5 px-[22px] rounded text-[13px] uppercase cursor-pointer">Log
                        in</button>
                </div>
            </form>
        </div>

        @if (Route::has('register'))
            <div class="text-center text-[13px] text-[#8a8676] mt-[18px]">
                Don't have an account? <a href="{{ route('register') }}" class="text-[#a9762f] font-bold no-underline">Register</a>
            </div>
        @endif

    </div>

</body>

</html>