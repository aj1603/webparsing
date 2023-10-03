<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BershkaController;
use App\Http\Controllers\PullBearController;
use App\Http\Controllers\KotonController;
use App\Http\Controllers\AsicsController;
use App\Http\Controllers\StradivariusController;
use App\Http\Controllers\DefactoController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/allproducts',[ProductController::class, 'allproducts'])->name('import-view');
Route::post('/import',[ProductController::class, 'import'])->name('import');
Route::get('/export',[ProductController::class, 'export'])->name('export');

Route::get('/dbbershka', [BershkaController::class, 'dbbershka']);
Route::get('/getbershka', [BershkaController::class, 'getbershka']);

Route::get('/dbpullbear', [PullBearController::class, 'dbpullbear']);
Route::get('/getpullbear', [PullBearController::class, 'getpullbear']);

Route::get('/dbstradivarius', [StradivariusController::class, 'dbstradivarius']);
Route::get('/getstradivarius', [StradivariusController::class, 'getstradivarius']);

Route::get('/dbkoton', [KotonController::class, 'dbkoton']);
Route::get('/getkoton', [KotonController::class, 'getkoton']);

Route::get('/dbasics', [AsicsController::class, 'dbasics']);
Route::get('/getasics', [AsicsController::class, 'getasics']);

Route::get('/dbdefacto', [DefactoController::class, 'dbdefacto']);
Route::get('/getdefacto', [DefactoController::class, 'getdefacto']);

