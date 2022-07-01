<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\CartController;
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



Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);

//for update send along with key 'id'
Route::post('/cart', [CartController::class, 'store']);
Route::get('/cart/{session_id?}', [CartController::class, 'getCartItems']);
Route::delete('/cart/{id}', [CartController::class, 'destroy']);

Route::middleware('auth:sanctum')->group( function () {
    Route::resource('products', ProductController::class);
});
