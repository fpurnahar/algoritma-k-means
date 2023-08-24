<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AromaBijiKopiController;
use App\Http\Controllers\WarnaBijiKopiController;
use App\Http\Controllers\FisikBijiKopiController;
use App\Http\Controllers\KadarAirBijiKopiController;

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
})->name('welcome');

Auth::routes();

Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('coffee-beans')->group(
    function () {
        Route::get('/search', [DashboardController::class, 'search'])->name('search');
        Route::get('/create-biji-kopi', [DashboardController::class, 'createBijiKopi'])->name('create.biji.kopi');
        Route::post('/store-biji-kopi', [DashboardController::class, 'storeBijiKopi'])->name('store.biji.kopi');
        Route::get('/edit-biji-kopi/{id}', [DashboardController::class, 'editBijiKopi'])->name('edit.biji.kopi');
        Route::post('/update-biji-kopi/{id}', [DashboardController::class, 'updateBijiKopi'])->name('update.biji.kopi');
        Route::delete('/delete-biji-kopi/{id}', [DashboardController::class, 'destroyBijiKopi'])->name('delete.biji.kopi');
    }
);

Route::prefix('coffee-beans/atribut/aroma')->group(
    function () {
        Route::get('/list', [AromaBijiKopiController::class, 'index'])->name('list.aroma');
        Route::get('/create', [AromaBijiKopiController::class, 'create'])->name('create.aroma');
        Route::post('/store', [AromaBijiKopiController::class, 'store'])->name('store.aroma');
        Route::get('/edit/{id}', [AromaBijiKopiController::class, 'edit'])->name('edit.aroma');
        Route::post('/update/{id}', [AromaBijiKopiController::class, 'update'])->name('update.aroma');
        Route::delete('/delete/{id}', [AromaBijiKopiController::class, 'destroy'])->name('delete.aroma');
    }
);

Route::prefix('coffee-beans/atribut/warna')->group(
    function () {
        Route::get('/list', [WarnaBijiKopiController::class, 'index'])->name('list.warna');
        Route::get('/create', [WarnaBijiKopiController::class, 'create'])->name('create.warna');
        Route::post('/store', [WarnaBijiKopiController::class, 'store'])->name('store.warna');
        Route::get('/edit/{id}', [WarnaBijiKopiController::class, 'edit'])->name('edit.warna');
        Route::post('/update/{id}', [WarnaBijiKopiController::class, 'update'])->name('update.warna');
        Route::delete('/delete/{id}', [WarnaBijiKopiController::class, 'destroy'])->name('delete.warna');
    }
);

Route::prefix('coffee-beans/atribut/fisik')->group(
    function () {
        Route::get('/list', [FisikBijiKopiController::class, 'index'])->name('list.fisik');
        Route::get('/create', [FisikBijiKopiController::class, 'create'])->name('create.fisik');
        Route::post('/store', [FisikBijiKopiController::class, 'store'])->name('store.fisik');
        Route::get('/edit/{id}', [FisikBijiKopiController::class, 'edit'])->name('edit.fisik');
        Route::post('/update/{id}', [FisikBijiKopiController::class, 'update'])->name('update.fisik');
        Route::delete('/delete/{id}', [FisikBijiKopiController::class, 'destroy'])->name('delete.fisik');
    }
);

Route::prefix('coffee-beans/atribut/kadar-air')->group(
    function () {
        Route::get('/list', [KadarAirBijiKopiController::class, 'index'])->name('list.kadar.air');
        Route::get('/create', [KadarAirBijiKopiController::class, 'create'])->name('create.kadar.air');
        Route::post('/store', [KadarAirBijiKopiController::class, 'store'])->name('store.kadar.air');
        Route::get('/edit/{id}', [KadarAirBijiKopiController::class, 'edit'])->name('edit.kadar.air');
        Route::post('/update/{id}', [KadarAirBijiKopiController::class, 'update'])->name('update.kadar.air');
        Route::delete('/delete/{id}', [KadarAirBijiKopiController::class, 'destroy'])->name('delete.kadar.air');
    }
);

Route::prefix('k-measn')->group(
    function () {
        Route::post('/cluster', [App\Http\Controllers\KMeansController::class, 'cluster'])->name('cluster');
        Route::post('/display-cluster', [App\Http\Controllers\KMeansController::class, 'displayClusteringResults'])->name('display.cluster');
    }
);
