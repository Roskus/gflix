<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();
Route::get('/profile', [\App\Http\Controllers\Profile\ProfileDetailController::class, 'detail'])->name('profile')->middleware('auth');
Route::get('/{slug}', [\App\Http\Controllers\ContentController::class, 'detail'])->middleware('auth');
Route::get('/category/{type}', [\App\Http\Controllers\CategoryController::class, 'index'])->middleware('auth');
Route::get('/watch/{id}', [\App\Http\Controllers\WatchController::class, 'player'])->middleware('auth')
    ->name('watch');
