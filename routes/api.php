<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('barang', BarangController::class);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/barangs', [BarangController::class, 'index']);
Route::get('/barangs/{id}', [BarangController::class, 'show']);
route::post('/tambahkeranjang', [KeranjangController::class, 'store']);
route::get('/keranjang', [KeranjangController::class, 'index']);
route::get('/keranjang/{id}', [KeranjangController::class, 'show']);
route::post('/updatekeranjang/{id}', [KeranjangController::class, 'update']);
route::delete('/hapuskeranjang/{id}', [KeranjangController::class, 'destroy']);
route::get('/orders', [OrderController::class, 'index']);
route::delete('/hapusorders/{id}', [OrderController::class, 'destroy']);
route::post('/checkout', [CheckoutController::class, 'store']);

//protected routes
route::middleware('auth:sanctum')->group(function (){
    Route::post('/logout', [AuthController::class, 'logout']);
    route::middleware('admin') -> group(function() {
        route::get('/barang', [BarangController::class, 'index']);
        route::post('/tambahbarang', [BarangController::class, 'store']);
        route::post('/updatebarang/{id}', [BarangController::class, 'update']);
        route::get('/order', [OrderController::class, 'index']);
        route::get('/order/{id}', [OrderController::class, 'show']);
        route::post('/tambahorder', [OrderController::class, 'store']);
        route::put('/updateorder/{id}', [OrderController::class, 'update']);
        route::delete('/hapusbarang/{id}', [BarangController::class, 'destroy']);
        route::delete('/hapusorder/{id}', [OrderController::class, 'destroy']);
    });
});