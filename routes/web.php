<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TrendyolController;
use App\Http\Controllers\FacesController;

Route::get('/', [ProductController::class, 'product_all']);
Route::get('/allproducts', [ProductController::class, 'allproducts'])->name('import-view');
Route::post('/import', [ProductController::class, 'import'])->name('import');
Route::get('/export', [ProductController::class, 'export'])->name('export');
Route::get('/delete', [ProductController::class, 'delete']);

Route::get('/trendyolurl', [TrendyolController::class, 'trendyolurl']);
Route::get('/trendyolpro', [TrendyolController::class, 'trendyolpro']);

Route::get('/haircaredb', [FacesController::class, 'haircaredb']);
Route::get('/hairmistdb', [FacesController::class, 'hairmistdb']);
Route::get('/makeupdb', [FacesController::class, 'makeupdb']);
Route::get('/privatedb', [FacesController::class, 'privatedb']);
Route::get('/skincaredb', [FacesController::class, 'skincaredb']);