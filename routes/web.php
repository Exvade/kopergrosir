<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\DashboardController;

// --- Route Publik ---
Route::get('/', [HomeController::class, 'index'])->name('home');

// --- Route Otentikasi ---
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->name('logout');
});

// --- Route Admin (Diproteksi Middleware Auth) ---
// Opsional: Tambahkan middleware 'isAdmin' jika ada peran user berbeda
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // Pastikan letaknya di dalam group middleware ['auth']
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Resource Routes
    Route::resource('banners', BannerController::class);
    Route::resource('products', ProductController::class);
    Route::resource('packages', PackageController::class);
    Route::resource('categories', CategoryController::class);

    // Settings Routes
    Route::controller(SettingController::class)->group(function () {
        Route::get('/settings', 'index')->name('settings.index');
        Route::put('/settings', 'update')->name('settings.update');
    });
});