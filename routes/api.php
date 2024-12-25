<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/barang', [\App\Http\Controllers\BarangController::class, 'index']);
Route::post('/barang', [\App\Http\Controllers\BarangController::class, 'store']);
Route::get('/pajak', [\App\Http\Controllers\PajakController::class, 'index']);
Route::get('/kategori', [\App\Http\Controllers\KategoriController::class, 'index']);
Route::post('/kategori', [\App\Http\Controllers\KategoriController::class, 'store']);

