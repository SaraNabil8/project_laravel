<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - SN Watches</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans m-0 bg-[#faf9f6] text-[#2b2b2b] min-h-screen flex items-center justify-center">

    <div class="w-full max-w-[380px] p-5">

        <div class="bg-white border border-[#e7e3da] rounded-md p-[30px]">
            <h1 class="font-['Georgia',serif] font-normal text-[22px] text-[#a9762f] text-center mb-5">Create account</h1>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-xs uppercase text-[#6b6b6b] mb-1.5">Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                        class="w-full py-2.5 px-2.5 border border-[#d9d4c8] rounded text-sm">
                    @error('name')
                        <div class="text-[#c15b3f] text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-xs uppercase text-[#6b6b6b] mb-1.5">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
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

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-xs uppercase text-[#6b6b6b] mb-1.5">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        class="w-full py-2.5 px-2.5 border border-[#d9d4c8] rounded text-sm">
                    @error('password_confirmation')
                        <div class="text-[#c15b3f] text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex items-center justify-between mt-5">
                    <a class="text-[13px] text-[#6b6b6b]" href="{{ route('login') }}">Already registered?</a>
                    <button type="submit"
                        class="bg-[#a9762f] text-white border-none py-2.5 px-[22px] rounded text-[13px] uppercase cursor-pointer">Register</button>
                </div>
            </form>
        </div>

    </div>

</body>

</html>