<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TrendyolController;
use App\Http\Controllers\FacesController;
use App\Http\Controllers\FpriceController;

Route::get('/', [ProductController::class, 'product_all']);
Route::get('/allproducts', [ProductController::class, 'allproducts'])->name('import-view');
Route::post('/import', [ProductController::class, 'import'])->name('import');
Route::get('/export', [ProductController::class, 'export'])->name('export');
Route::get('/exportf', [ProductController::class, 'exportf'])->name('exportf');
Route::get('/delete', [ProductController::class, 'delete']);

Route::get('/trendyolurl', [TrendyolController::class, 'trendyolurl']);
Route::get('/trendyolpro', [TrendyolController::class, 'trendyolpro']);

Route::get('/haircaredb', [FacesController::class, 'haircaredb']);
Route::get('/hairmistdb', [FacesController::class, 'hairmistdb']);
Route::get('/makeupdb', [FacesController::class, 'makeupdb']);
Route::get('/privatedb', [FacesController::class, 'privatedb']);
Route::get('/skincaredb', [FacesController::class, 'skincaredb']);


Route::get('/price', [FpriceController::class]);
Route::get('/create', [FpriceController::class, 'create'])->name('fprice.create');
Route::post('/store', [FpriceController::class, 'store']);
Route::get('/price/{{fprice}}/edit', [FpriceController::class, 'edit'])->name('fprice.edit');
