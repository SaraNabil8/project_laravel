<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Watch - SN Watches</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans bg-[#faf9f6] text-[#2b2b2b] m-0 min-h-screen">

    <div class="max-w-[700px] mx-auto pt-[50px] px-5 pb-20 max-[600px]:pt-[30px] max-[600px]:px-[15px] max-[600px]:pb-[50px]">

        <a href="{{ route('watches.index') }}"
            class="inline-block mb-7 text-[#a9762f] no-underline text-[13px] uppercase tracking-wide hover:underline max-[600px]:mb-[22px] max-[600px]:text-xs">
            ← Back to list
        </a>

        <h2 class="font-['Georgia',serif] font-normal text-[30px] tracking-wide mb-5 text-[#a9762f] max-[600px]:text-[23px]">
            Edit Watch</h2>

        @if ($errors->any())
            <div class="mb-5 py-3.5 px-4 bg-[#faf9f6] border border-[#e7e3da] border-l-[3px] border-l-[#a9762f] rounded text-[#6b6355] text-[13px]">
                <ul class="m-0 pl-[18px] list-disc">
                    @foreach ($errors->all() as $error)
                        <li class="mb-1 last:mb-0">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('watches.update', $watch->id) }}" method="POST" enctype="multipart/form-data"
            class="bg-white border border-[#e7e3da] rounded p-[30px] max-[600px]:p-5">
            @csrf
            @method('PUT')

            <div class="mb-[22px]">
                <label class="block mb-2 text-[13px] font-bold text-[#6b6355]">Model</label>
                <input type="text" name="model" value="{{ old('model', $watch->model) }}"
                    class="w-full py-2.5 px-3 border border-[#e7e3da] rounded bg-white text-[#2b2b2b] text-[13px] outline-none transition-colors focus:border-[#a9762f]">
            </div>

            <div class="mb-[22px]">
                <label class="block mb-2 text-[13px] font-bold text-[#6b6355]">Brand</label>
                <input type="text" name="brand" value="{{ old('brand', $watch->brand) }}"
                    class="w-full py-2.5 px-3 border border-[#e7e3da] rounded bg-white text-[#2b2b2b] text-[13px] outline-none transition-colors focus:border-[#a9762f]">
            </div>

            <div class="mb-[22px]">
                <label class="block mb-2 text-[13px] font-bold text-[#6b6355]">Price</label>
                <input type="number" step="0.01" min="0" name="price" value="{{ old('price', $watch->price) }}"
                    class="w-full py-2.5 px-3 border border-[#e7e3da] rounded bg-white text-[#2b2b2b] text-[13px] outline-none transition-colors focus:border-[#a9762f]">
            </div>

            <div class="mb-[22px]">
                <label class="block mb-2 text-[13px] font-bold text-[#6b6355]">Stock</label>
                <input type="number" min="0" name="stock" value="{{ old('stock', $watch->stock) }}"
                    class="w-full py-2.5 px-3 border border-[#e7e3da] rounded bg-white text-[#2b2b2b] text-[13px] outline-none transition-colors focus:border-[#a9762f]">
            </div>

            <div class="mb-[22px]">
                <label class="block mb-2 text-[13px] font-bold text-[#6b6355]">Description</label>
                <textarea name="description" rows="4"
                    class="w-full py-2.5 px-3 border border-[#e7e3da] rounded bg-white text-[#2b2b2b] text-[13px] outline-none transition-colors focus:border-[#a9762f] resize-y min-h-[100px]">{{ old('description', $watch->description) }}</textarea>
            </div>

            <div class="mb-[22px]">
                <label class="block mb-2 text-[13px] font-bold text-[#6b6355]">Category</label>

                <select name="category_id" id="category_id"
                    class="w-full py-2.5 px-3 border border-[#e7e3da] rounded bg-white text-[#2b2b2b] text-[13px] outline-none transition-colors focus:border-[#a9762f] cursor-pointer">
                    <option value="">Please choose your category</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id', $watch->category_id) == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div class="mb-[22px]">

                @if ($watch->image)
                    <div class="mb-5">
                        <label class="block mb-2.5 text-[13px] font-bold text-[#6b6355]">Current Image</label>

                        <img src="{{ asset('storage/' . $watch->image) }}" alt="{{ $watch->model }}"
                            class="block w-[140px] h-[140px] object-cover rounded border border-[#e7e3da] max-[600px]:w-[120px] max-[600px]:h-[120px]">
                    </div>
                @endif

                <label class="block mb-2 text-[13px] font-bold text-[#6b6355]">Change Image (optional)</label>
                <input type="file" name="image"
                    class="w-full py-[9px] px-2.5 border border-[#e7e3da] rounded bg-white text-[#2b2b2b] text-[13px] outline-none cursor-pointer">

            </div>

            <button type="submit"
                class="w-full py-2.5 px-[15px] border-none rounded bg-[#a9762f] text-white text-[13px] cursor-pointer transition-colors hover:bg-[#8f6327]">
                Update
            </button>

        </form>

    </div>

</body>

</html>