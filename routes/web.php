<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CollageController;
use App\Http\Controllers\CollageController as PublicCollageController;


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

Route::get('/', [CollageController::class, 'top'])->name('top');


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('works', CollageController::class)->except(['show']);
});

Auth::routes();

Route::get('/works', [PublicCollageController::class, 'index'])->name('works.index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/works/{id}', [PublicCollageController::class, 'show'])->name('works.show');
