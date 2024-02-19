<?php

use App\Http\Controllers\Dashboard\BukuController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\KategoriController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UlasanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LandingPageController::class, 'index'])
    ->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::middleware('role:admin,pustakawan')->group(function () {
            Route::prefix('perpustakaan')->group(function () {
                Route::resource('kategori', KategoriController::class);

                Route::resource('buku', BukuController::class);
            });
        });

        Route::middleware('role:admin')->group(function () {
            Route::prefix('pengaturan')->group(function () {
                Route::resource('user', UserController::class);
            });
        });
    });
});

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::prefix('perpustakaan')->group(function () {
            Route::resource('ulasan', UlasanController::class);
        });

        Route::prefix('pengaturan')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });
    });
});

require __DIR__.'/auth.php';
