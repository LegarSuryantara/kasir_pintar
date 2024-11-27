<?php


use App\Http\Controllers\KasirController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PajakController;
use App\Http\Controllers\TokoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/cekkasir', [KasirController::class, 'get_all']);
Route::get('/cekkategori',[KategoriController::class,'get_all']);

Route::get('/cekpajak',[PajakController::class,'get_all']);

