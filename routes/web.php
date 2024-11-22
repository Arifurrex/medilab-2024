<?php

use App\Http\Controllers\Frontend\ProductsController;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\ProfileController;
// use App\Models\Frontend\PagesController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// frontend
Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/shop', [PagesController::class, 'shop'])->name('shop');
Route::get('/shop_details/{slug}', [PagesController::class, 'shop_details'])->name('shop_details');
Route::get('/category/{slug}',[PagesController::class,'categoryIndex'])->name('category.index');

// product routes
Route::get('/product', [ProductsController::class, 'index'])->name('product.index');

// backend
