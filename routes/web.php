<?php


use App\Http\Controllers\Barang;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StokController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\PajakController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DiskonController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DetailPengadaanController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/cekkasir', [KasirController::class, 'get_all']);
Route::get('/cekkategori',[KategoriController::class,'get_all']);
Route::get('/cekpajak',[PajakController::class,'get_all']);
Route::get('/cekdiskon', [DiskonController::class, 'get_all']);
Route::get('/cekbarang', [BarangController::class, 'get_all']);
Route::get('/cekdetailpengadaan', [DetailPengadaanController::class, 'get_all']);
Route::get('/cekstok', [StokController::class, 'stok']);
