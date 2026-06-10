<?php

use Illuminate\Support\Facades\Route;

// Import controller
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HelpController;

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
| Halaman utama aplikasi
|--------------------------------------------------------------------------
*/

Route::get('/', [DashboardController::class, 'index'])
     ->name('dashboard');

/*
|--------------------------------------------------------------------------
| CRUD Barang
|--------------------------------------------------------------------------
*/
Route::resource('products', ProductController::class);

/*
|--------------------------------------------------------------------------
| CRUD Kategori
|--------------------------------------------------------------------------
*/
Route::resource('categories', CategoryController::class);

/*
|--------------------------------------------------------------------------
| Bantuan
|--------------------------------------------------------------------------
*/
Route::get(
     '/help',
     [HelpController::class, 'index']
)->name('help');
