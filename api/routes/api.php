<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



/** Customer Routes */
Route::post('/login', [AuthenticatedSessionController::class, 'login'])
    ->middleware('guest')
    ->name('api.login');

Route::post('/logout', [AuthenticatedSessionController::class, 'logout'])
    ->middleware('auth')
    ->name('api.logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/user', fn (Request $request) => $request->user());

    Route::get('/product/{product}', [ProductController::class, 'show']);
    Route::get('/product', [ProductController::class, 'index']);
});


