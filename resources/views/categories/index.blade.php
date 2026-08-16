<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-['Georgia',serif] max-w-[1000px] my-10 mx-auto px-[15px] text-[#2b2b2b] bg-[#faf9f6] max-[600px]:my-5">

    <a href="{{ route('dashboard') }}"
        class="inline-block mb-5 text-[#a9762f] no-underline font-sans text-[13px] uppercase">← Back to Dashboard</a>
    <br>
    <h2 class="font-normal text-[#a9762f] mb-2.5 max-[600px]:text-xl">Categories List</h2>

    <a href="{{ route('categories.create') }}"
        class="inline-block font-sans bg-[#a9762f] text-white py-2 px-4 rounded text-[13px] uppercase no-underline mb-5 max-[600px]:block max-[600px]:text-center">+
        Add a Category</a>

    @if (session('success'))
        <div class="font-sans bg-[#eaf3ea] text-[#3a6b3a] py-2.5 px-[15px] rounded mb-5 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="w-full overflow-x-auto">
        <table class="w-full min-w-[600px] border-collapse bg-white border border-[#e7e3da]">
            <thead class="bg-[#f5efe4]">
                <tr>
                    <th class="font-sans font-bold text-[13px] uppercase text-[#a9762f] p-3 text-left border-b border-[#e7e3da] max-[600px]:p-2 max-[600px]:text-sm">ID</th>
                    <th class="font-sans font-bold text-[13px] uppercase text-[#a9762f] p-3 text-left border-b border-[#e7e3da] max-[600px]:p-2 max-[600px]:text-sm">Name</th>
                    <th class="font-sans font-bold text-[13px] uppercase text-[#a9762f] p-3 text-left border-b border-[#e7e3da] max-[600px]:p-2 max-[600px]:text-sm">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr class="hover:bg-[#faf6ee]">
                        <td class="font-sans p-3 border-b border-[#e7e3da] max-[600px]:p-2 max-[600px]:text-sm">{{ $category->id }}</td>
                        <td class="font-sans p-3 border-b border-[#e7e3da] max-[600px]:p-2 max-[600px]:text-sm">{{ $category->name }}</td>
                        <td class="font-sans p-3 border-b border-[#e7e3da] max-[600px]:p-2 max-[600px]:text-sm">
                            <a href="{{ route('categories.show', $category->id) }}" class="mr-2.5 no-underline text-[#a9762f]">Show</a>
                            <a href="{{ route('categories.edit', $category) }}" class="mr-2.5 no-underline text-[#a9762f]">Edit</a>
                            @if (auth()->user()->isAdmin())
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                    onsubmit="return confirm('Delete this category?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="border-none bg-none text-[#c15b3f] cursor-pointer p-0 text-sm">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-[#9b968a] p-5">No categories found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>

</html>