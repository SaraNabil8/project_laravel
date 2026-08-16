<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category - SN Watches</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans bg-[#faf9f6] text-[#2b2b2b] m-0 min-h-screen">

    <div class="max-w-[700px] mx-auto pt-[50px] px-5 pb-20 max-[600px]:pt-[30px] max-[600px]:px-[15px] max-[600px]:pb-[50px]">

        <a href="{{ route('categories.index') }}"
            class="inline-block mb-7 text-[#a9762f] no-underline text-[13px] uppercase tracking-wide hover:underline max-[600px]:mb-[22px] max-[600px]:text-xs">
            ← Back to list
        </a>

        <h2 class="font-['Georgia',serif] font-normal text-[30px] tracking-wide mb-5 text-[#a9762f] max-[600px]:text-[23px]">
            Add a Category</h2>

        @if ($errors->any())
            <div class="mb-5 py-3.5 px-4 bg-[#faf9f6] border border-[#e7e3da] border-l-[3px] border-l-[#a9762f] rounded text-[#6b6355] text-[13px]">
                <ul class="m-0 pl-[18px] list-disc">
                    @foreach ($errors->all() as $error)
                        <li class="mb-1 last:mb-0">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white border border-[#e7e3da] rounded p-[30px] max-[600px]:p-5">
            @csrf

            <div class="mb-[22px]">
                <label class="block mb-2 text-[13px] font-bold text-[#6b6355]">Name</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="w-full py-2.5 px-3 border border-[#e7e3da] rounded bg-white text-[#2b2b2b] text-[13px] outline-none transition-colors focus:border-[#a9762f]">
            </div>

            <button type="submit"
                class="w-full py-2.5 px-[15px] border-none rounded bg-[#a9762f] text-white text-[13px] cursor-pointer transition-colors hover:bg-[#8f6327]">
                Save
            </button>

        </form>

    </div>

</body>

</html>