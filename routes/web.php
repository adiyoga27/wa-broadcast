<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessageController;
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


Route::get('login', [AuthController::class, 'index']);
Route::post('login', [AuthController::class, 'login']);
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::group(['prefix' => 'messages'], function () {
        Route::get('/', [MessageController::class, 'index']);
        Route::post('/', [MessageController::class, 'addMessage']);

        Route::get('/queue/{id}', [MessageController::class, 'queue']);
    });
});


