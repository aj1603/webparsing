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

Route::get('/womencoaturl', [TrendyolController::class, 'womencoaturl']);
Route::get('/womencoatproducts', [TrendyolController::class, 'womencoatproducts']);
Route::get('/pullbearurl', [TrendyolController::class, 'pullbearurl']);
Route::get('/pullbearproducts', [TrendyolController::class, 'pullbearproducts']);
Route::get('/mencoaturl', [TrendyolController::class, 'mencoaturl']);
Route::get('/mencoatproducts', [TrendyolController::class, 'mencoatproducts']);
Route::get('/pumaurl1', [TrendyolController::class, 'pumaurl1']);
Route::get('/pumaproducts1', [TrendyolController::class, 'pumaproducts1']);
Route::get('/pumaurl1', [TrendyolController::class, 'pumaurl2']);
Route::get('/pumaproducts1', [TrendyolController::class, 'pumaproducts2']);
Route::get('/pumaurl1', [TrendyolController::class, 'pumaurl3']);
Route::get('/pumaproducts1', [TrendyolController::class, 'pumaproducts3']);


Route::get('/haircaredb', [FacesController::class, 'haircaredb']);
Route::get('/hairmistdb', [FacesController::class, 'hairmistdb']);
Route::get('/makeupdb', [FacesController::class, 'makeupdb']);
Route::get('/privatedb', [FacesController::class, 'privatedb']);
Route::get('/skincaredb', [FacesController::class, 'skincaredb']);


Route::get('/price', [FpriceController::class]);
Route::get('/create', [FpriceController::class, 'create'])->name('fprice.create');
Route::post('/store', [FpriceController::class, 'store']);
Route::get('/edit/{fprice}', [FpriceController::class, 'edit'])->name('edit.fprice');
Route::get('/delete/{fprice}', [FpriceController::class, 'delete'])->name('delete.fprice');
Route::put('/update/{fprice}', [FpriceController::class, 'update'])->name('update.fprice');


