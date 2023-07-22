<?php

use App\Http\Controllers\HelloController;
use App\Http\Middleware\HelloMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/hello', [HelloController::class, 'index']);

////名前つきルート
//Route::get('/hello', [HelloController::class, 'index'])->name('hello');
//Route::get('hello/other', [HelloController::class, 'other']);

////パラメータ設定
//Route::get('/hello/{id}', [HelloController::class, 'index'])->where('id', '[0-9]+');

Route::middleware([HelloMiddleware::class])->group(function () {
    Route::get('/hello', [HelloController::class, 'index']);
    Route::get('hello/other', [HelloController::class, 'other']);
});
