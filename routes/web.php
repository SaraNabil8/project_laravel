<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WatchController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// ============================
// Pages publiques
// ============================
Route::get('/', [WatchController::class, 'home'])->name('home');

Route::get('/all-categories', [WatchController::class, 'categories'])->name('categories');

Route::get('/categories/{category}', [CategoryController::class, 'show'])
    ->whereNumber('category')
    ->name('categories.show');

Route::get('/watches/{watch}', [WatchController::class, 'show'])
    ->whereNumber('watch')
    ->name('watches.show');

Route::get('/all-categories/{category}', [WatchController::class, 'categoryShow'])
    ->whereNumber('category')
    ->name('categories.public_show');

// ============================
// Dashboard Breeze standard
// ============================
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// ============================
// Profil (tout utilisateur connecté)
// ============================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ============================
// Gestion watches/categories
// Admin + Editor
// ============================
Route::middleware(['auth', 'staff'])->group(function () {
    Route::resource('watches', WatchController::class)->except(['show', 'destroy']);
    Route::resource('categories', CategoryController::class)->except(['show', 'destroy']);
});

// ============================
// Suppression admin uniquement
// ============================
Route::middleware(['auth', 'admin'])->group(function () {
    Route::delete('/watches/{watch}', [WatchController::class, 'destroy'])
        ->name('watches.destroy');

    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])
        ->name('categories.destroy');

    Route::get('/admin/dashboard', function () {
        return redirect()->route('dashboard');
    })->name('admin_dashboard');
});

// ============================
// Dashboard editor
// ============================
Route::middleware(['auth', 'editor'])->group(function () {
    Route::get('/editor/dashboard', function () {
        return redirect()->route('dashboard');
    })->name('editor_dashboard');
});

require __DIR__ . '/auth.php';