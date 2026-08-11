<?php

namespace App\Http\Controllers;
use App\Models\Watch;


use Illuminate\Http\Request;
use App\Models\Category;
class WatchController extends Controller
{

public function home(Request $request)
{
    $query = Watch::with('category')->latest();

    if ($request->filled('brand')) {
        $query->where('brand', $request->brand);
    }

    if ($request->filled('category_id')) {
        $query->where('category_id', $request->category_id);
    }

    if ($request->boolean('in_stock')) {
        $query->where('stock', '>', 0);
    }
if ($request->filled('price_min')) {
    $query->where('price', '>=', $request->price_min);
}

if ($request->filled('price_max')) {
    $query->where('price', '<=', $request->price_max);
}
    $watches = $query->paginate(12)->withQueryString();

    $categories = Category::orderBy('name')->get();
    $brands = Watch::select('brand')->distinct()->orderBy('brand')->pluck('brand');

    return view('welcome', compact('watches', 'categories', 'brands'));

}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $watches = Watch::all();
        return view('watches.index', compact('watches'));
    }
    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    $categories = Category::all();
    return view('watches.create', compact('categories'));
}

public function store(Request $request)
{
    $validated = $request->validate([
        'model' => 'required|string|max:255',
        'brand' => 'required|string|max:255',
        'category_id' => 'nullable|exists:categories,id',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'description' => 'nullable|string',
        'image' => 'required|image|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('watches', 'public');
    }

    Watch::create($validated);

    return redirect()->route('watches.index')
        ->with('success', 'Watch added successfully!');
}

    /**
     * Display the specified resource.
     */
public function show(Watch $watch)
{
    return view('watches.show', compact('watch'));
}

public function edit(Watch $watch)
{
    $categories = Category::all();
    return view('watches.edit', compact('watch', 'categories'));
}


public function update(Request $request, Watch $watch)
{
    $validated = $request->validate([
        'model' => 'required|string|max:255',
        'brand' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'description' => 'nullable|string',
        'image' => 'nullable|image|max:2048',
        'category_id' => 'nullable|exists:categories,id',
    ]);

    if ($request->hasFile('image')) {
        if ($watch->image) {
            \Storage::disk('public')->delete($watch->image);
        }
        $validated['image'] = $request->file('image')->store('watches', 'public');
    }

    $watch->update($validated);

    return redirect()->route('watches.index')
        ->with('success', 'Watch updated successfully!');
}

public function destroy(Watch $watch)
{
    if ($watch->image) {
        \Storage::disk('public')->delete($watch->image);
    }

    $watch->delete();

    return redirect()->route('watches.index')
        ->with('success', 'Watch deleted successfully!');
}

public function categories()
{
    $categories = Category::all();
    return view('categories.public', compact('categories'));
}
public function categoryShow(\App\Models\Category $category)
{
    $watches = $category->watches;
    return view('categories.public_show', compact('category', 'watches'));
}
}