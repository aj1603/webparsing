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
use App\Http\Controllers\BiancoLucciController;
use App\Http\Controllers\MangoController;
use App\Http\Controllers\GrimelangeController;
use App\Http\Controllers\MaviController;
use App\Http\Controllers\LCWaikikiController;


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

Route::get('/dbasics', [AsicsController::class, 'dbasics']);
Route::get('/getasics', [AsicsController::class, 'getasics']);

Route::get('/dbbershka', [BershkaController::class, 'dbbershka']);
Route::get('/getbershka', [BershkaController::class, 'getbershka']);

Route::get('/dbbiancolucci', [BiancoLucciController::class, 'dbbiancolucci']);
Route::get('/dbbiancolucci1', [BiancoLucciController::class, 'dbbiancolucci1']);
Route::get('/getbiancolucci', [BiancoLucciController::class, 'getbiancolucci']);

Route::get('/dbdefacto', [DefactoController::class, 'dbdefacto']);
Route::get('/dbdefacto1', [DefactoController::class, 'dbdefacto1']);
Route::get('/getdefacto', [DefactoController::class, 'getdefacto']);

Route::get('/dbgrimelange', [GrimelangeController::class, 'dbgrimelange']);
Route::get('/getgrimelange', [GrimelangeController::class, 'getgrimelange']);

Route::get('/dbkoton1', [KotonController::class, 'dbkoton1']);
Route::get('/dbkoton2', [KotonController::class, 'dbkoton2']);
Route::get('/dbkoton3', [KotonController::class, 'dbkoton3']);
Route::get('/dbkoton4', [KotonController::class, 'dbkoton4']);
Route::get('/getkoton', [KotonController::class, 'getkoton']);
Route::get('/url', [KotonController::class, 'url']);

Route::get('/dblcwaikiki', [LCWaikikiController::class, 'dblcwaikiki']);
Route::get('/dblcwaikiki1', [LCWaikikiController::class, 'dblcwaikiki1']);
Route::get('/dblcwaikiki2', [LCWaikikiController::class, 'dblcwaikiki2']);
Route::get('/dblcwaikiki3', [LCWaikikiController::class, 'dblcwaikiki3']);
Route::get('/getlcwaikiki', [LCWaikikiController::class, 'getlcwaikiki']);

Route::get('/dbmango', [MangoController::class, 'dbmango']);
Route::get('/dbmango1', [MangoController::class, 'dbmango1']);
Route::get('/getmango', [MangoController::class, 'getmango']);

Route::get('/dbmavi', [MaviController::class, 'dbmavi']);
Route::get('/getmavi', [MaviController::class, 'getmavi']);

Route::get('/dbpullbear', [PullBearController::class, 'dbpullbear']);
Route::get('/getpullbear', [PullBearController::class, 'getpullbear']);

Route::get('/dbstradivarius', [StradivariusController::class, 'dbstradivarius']);
Route::get('/dbstradivarius1', [StradivariusController::class, 'dbstradivarius1']);
Route::get('/getstradivarius', [StradivariusController::class, 'getstradivarius']);





