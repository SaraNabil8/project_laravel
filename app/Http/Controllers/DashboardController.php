<?php

namespace App\Http\Controllers;

use App\Models\Watch;
use App\Models\Category;
use App\Models\User;
class DashboardController extends Controller
{
    public function index()
    {
        $totalWatches = Watch::count();
        $totalCategories = Category::count();
        $outOfStock = Watch::where('stock', 0)->count();
        $lowStock = Watch::where('stock', '>', 0)->where('stock', '<=', 5)->get();
  $users = User::orderBy('created_at', 'desc')->get();
        return view('dashboard', compact('totalWatches', 'totalCategories', 'outOfStock', 'lowStock', 'users'));
    }
}