<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaravelController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\TransactionController;
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

Route::controller(ProductsController::class)->group(function () {
    Route::post('/insert_product', 'insert_product');
    Route::post('/update_product','update_product');
    Route::get('/products', 'get_products');
    Route::delete('/delete_product','delete_product');
});

Route::post('/insert_order', [OrderController::class, 'insert_order']);
Route::post('/update_order', [OrderController::class, 'update_order']);
Route::get('/get_order', [OrderController::class, 'get_order']);
Route::delete('/delete_order', [OrderController::class,'delete_order']);

Route::post('/insert_order_item', [OrderItemsController::class,'insert_order_item']);
Route::post('/update_order_item', [OrderItemsController::class,'update_order_item']);
Route::delete('/delete_order_item', [OrderItemsController::class,'delete_order_item']);
Route::get('/get_order_item', [OrderItemsController::class,'get_order_item']);

Route::get('/transactions', [TransactionController::class,'get_transactions']);

Route::post('auth/register', [AuthController::class,'register']);
Route::post('auth/login', [AuthController::class,'login']);
