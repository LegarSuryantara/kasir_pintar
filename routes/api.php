<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/barang', [\App\Http\Controllers\BarangController::class, 'index']);
Route::post('/barang', [\App\Http\Controllers\BarangController::class, 'store']);
Route::get('/pajak', [\App\Http\Controllers\PajakController::class, 'index']);
Route::post('/pajak', [\App\Http\Controllers\PajakController::class, 'store']);
Route::get('/kategori', [\App\Http\Controllers\KategoriController::class, 'index']);
Route::post('/kategori', [\App\Http\Controllers\KategoriController::class, 'store']);
Route::get('/kasir', [\App\Http\Controllers\KasirController::class,'index']);
Route::post('/kasir', [\App\Http\Controllers\KasirController::class,'store']);
Route::get('/toko', [\App\Http\Controllers\TokoController::class,'index']);
Route::post('/toko', [\App\Http\Controllers\TokoController::class,'store']);
Route::get('/supplier', [\App\Http\Controllers\SupplierController::class,'index']);
Route::post('/supplier', [\App\Http\Controllers\SupplierController::class,'store']);


//diskon
Route::get('/diskon', [\App\Http\Controllers\DiskonController::class, 'indexApi']);
Route::get('/diskon/{diskon}', [\App\Http\Controllers\DiskonController::class, 'getSingleData']);
Route::post('/diskon', [\App\Http\Controllers\DiskonController::class, 'storeApi']);
Route::put('/diskon/{diskon}', [\App\Http\Controllers\DiskonController::class, 'updateApi']);
Route::delete('/diskon/{diskon}', [\App\Http\Controllers\DiskonController::class, 'deleteApi']);
