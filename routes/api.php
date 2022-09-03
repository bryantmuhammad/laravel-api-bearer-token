<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::post('/register', [AuthController::class, 'register']);
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{product}', [ProductController::class, 'show']);
Route::post('/token', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::put('product/{product}', [ProductController::class, 'update']);
    Route::post('product', [ProductController::class, 'store']);
    Route::delete('product/{produk}', [ProductController::class, 'destroy']);
    Route::get('logout', [AuthController::class, 'logout']);
});
