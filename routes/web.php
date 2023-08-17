<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::prefix('k-measn')->group(
    function () {
        Route::post('/cluster', [App\Http\Controllers\KMeansController::class, 'cluster'])->name('cluster');
    }
);
