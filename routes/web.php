<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TrendyolController;
use App\Http\Controllers\FacesController;

Route::get('/allproducts', [ProductController::class, 'allproducts'])->name('import-view');
Route::post('/import', [ProductController::class, 'import'])->name('import');
Route::get('/export', [ProductController::class, 'export'])->name('export');
Route::get('/trendyolurl', [ProductController::class, 'trendyolurl']);
Route::get('/', [ProductController::class, 'product_all']);
Route::get('/delete', [ProductController::class, 'delete']);

Route::get('/products', [TrendyolController::class, 'products']);

Route::get('/getfaces', [FacesController::class, 'getfaces']);
Route::get('/getFacesProducts', [FacesController::class, 'getFacesProducts']);