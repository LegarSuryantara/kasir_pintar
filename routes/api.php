<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/barang', [\App\Http\Controllers\BarangController::class, 'indexAPI']);
Route::post('/barang', [\App\Http\Controllers\BarangController::class, 'storeAPI']);
Route::get('/barang/{barang}', [\App\Http\Controllers\BarangController::class, 'getSingleData']);
Route::put('/barang/{barang}', [\App\Http\Controllers\BarangController::class, 'updateAPI']);
Route::delete('/barang/{barang}', [\App\Http\Controllers\BarangController::class, 'deleteAPI']);

Route::get('/pajak', [\App\Http\Controllers\PajakController::class, 'indexAPI']);
Route::post('/pajak', [\App\Http\Controllers\PajakController::class, 'storeAPI']);
Route::get('/pajak/{pajak}', [\App\Http\Controllers\PajakController::class, 'getSingleData']);
Route::put('/pajak/{pajak}', [\App\Http\Controllers\PajakController::class, 'updateAPI']);
Route::delete('/pajak/{pajak}', [\App\Http\Controllers\PajakController::class, 'deleteAPI']);

Route::get('/kategori', [\App\Http\Controllers\KategoriController::class, 'indexAPI']);
Route::post('/kategori', [\App\Http\Controllers\KategoriController::class, 'storeAPI']);
Route::get('/kategori/{kategori}', [\App\Http\Controllers\KategoriController::class, 'getSingleData']);
Route::put('/kategori/{kategori}', [\App\Http\Controllers\KategoriController::class, 'updateAPI']);
Route::delete('/kategori/{kategori}', [\App\Http\Controllers\KategoriController::class, 'deleteAPI']);

Route::get('/kasir', [\App\Http\Controllers\KasirController::class, 'indexAPI']);
Route::post('/kasir', [\App\Http\Controllers\KasirController::class, 'storeAPI']);
Route::get('/kasir/{kasir}', [\App\Http\Controllers\KasirController::class, 'getSingleData']);
Route::put('/kasir/{kasir}', [\App\Http\Controllers\KasirController::class, 'updateAPI']);
Route::delete('/kasir/{kasir}', [\App\Http\Controllers\KasirController::class, 'deleteAPI']);


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

//supplier
Route::get('/supplier', [\App\Http\Controllers\SupplierController::class, 'indexAPI']);
Route::post('/supplier', [\App\Http\Controllers\SupplierController::class, 'storeAPI']);
Route::get('/supplier/{supplier}', [\App\Http\Controllers\SupplierController::class, 'getSingleData']);
Route::put('/supplier/{supplier}', [\App\Http\Controllers\SupplierController::class, 'updateAPI']);
Route::delete('/supplier/{supplier}', [\App\Http\Controllers\SupplierController::class, 'deleteAPI']);
