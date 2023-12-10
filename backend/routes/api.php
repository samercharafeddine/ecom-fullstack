<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\LaravelController;
use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/insert_product', [ProductsController::class, 'insert_product']);
Route::post('/update_product', [ProductsController::class, 'update_product']);
Route::get('/products', [ProductsController::class, 'get_products']);
Route::post('/delete_product', [ProductsController::class,'delete_product']);

Route::post('/insert_order', [ProductsController::class, 'insert_order']);
Route::post('/update_order', [ProductsController::class, 'update_order']);
Route::get('/orders', [ProductsController::class, 'orders']);
Route::post('/delete_order', [ProductsController::class,'delete_order']);

Route::post('auth/register', [AuthController::class,'register']);
Route::post('auth/login', [AuthController::class,'login']);
