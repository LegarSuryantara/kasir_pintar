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


Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::post('/kategorii', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::get('/stok', [BarangController::class, 'index'])->name('barang.index');
Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
Route::post('/barang/{barang}', [BarangController::class, 'update'])->name('barang.update');
Route::delete('/barang/{barang}', [BarangController::class, 'delete'])->name('barang.delete');
Route::get('/barang/{barang}/edit', [BarangController::class, 'edit'])->name('barang.edit');
Route::get('/toko', [TokoController::class, 'index'])->name('toko.index');
Route::post('/tokos', [TokoController::class, 'store'])->name('toko.store');
Route::get('/toko/create', [TokoController::class, 'create'])->name('toko.create');
Route::post('/toko/{toko}', [TokoController::class, 'update'])->name('toko.update');
Route::delete('/toko/{toko}', [TokoController::class, 'delete'])->name('toko.delete');
Route::get('/toko/{toko}/edit', [TokoController::class, 'edit'])->name('toko.edit');










Route::get('/cekkasir', [KasirController::class, 'get_all']);
Route::get('/cekkategori',[KategoriController::class,'get_all']);
Route::get('/cekpajak',[PajakController::class,'get_all']);
Route::get('/cekdiskon', [DiskonController::class, 'get_all']);
Route::get('/cekbarang', [BarangController::class, 'get_all']);
Route::get('/cekdetailpengadaan', [DetailPengadaanController::class, 'get_all']);
Route::get('/cekstok', [StokController::class, 'stok']);