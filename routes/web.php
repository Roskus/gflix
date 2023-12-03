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

//@ŧodo move to logged section
Route::get('/watch/{id}', [\App\Http\Controllers\WatchController::class, 'player']);

Auth::routes();
