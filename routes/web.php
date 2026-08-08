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
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/watches/{watch}', [WatchController::class, 'show'])->name('watches.show');

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
// Gestion (admin uniquement) — accès complet, y compris suppression
// ============================
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('watches', WatchController::class)->except(['show']);
    Route::resource('categories', CategoryController::class)->except(['show']);

    Route::get('/admin/dashboard', function () {
        return 'Hi Administrator';
    })->name('admin_dashboard');
});

// ============================
// Gestion (editor) — création/modification, PAS de suppression
// ============================
Route::middleware(['auth', 'editor'])->group(function () {
    Route::resource('watches', WatchController::class)->except(['show', 'destroy']);
    Route::resource('categories', CategoryController::class)->except(['show', 'destroy']);

    Route::get('/editor/dashboard', function () {
        return 'Hi Editor';
    })->name('editor_dashboard');
});

require __DIR__.'/auth.php';