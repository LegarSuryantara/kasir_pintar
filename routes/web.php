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
use App\Http\Controllers\SupplierController;



Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::post('/kategorii', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{kategori}', [KategoriController::class, 'delete'])->name('kategori.delete');
Route::get('/kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');

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

Route::get('/kasir', [KasirController::class, 'index'])->name('kasir.index');
Route::post('/kasirs', [KasirController::class, 'store'])->name('kasir.store');
Route::get('/kasir/create', [KasirController::class, 'create'])->name('kasir.create');
Route::post('/kasir/{kasir}', [KasirController::class, 'update'])->name('kasir.update');
Route::delete('/kasir/{kasir}', [KasirController::class, 'delete'])->name('kasir.delete');
Route::get('/kasir/{kasir}/edit', [KasirController::class, 'edit'])->name('kasir.edit');

Route::get('/diskon', [DiskonController::class, 'index'])->name('diskon.index');
Route::post('/diskons', [DiskonController::class, 'store'])->name('diskon.store');
Route::get('/diskon/create', [DiskonController::class, 'create'])->name('diskon.create');
Route::post('/diskon/{diskon}', [DiskonController::class, 'update'])->name('diskon.update');
Route::delete('/diskon/{diskon}', [DiskonController::class, 'delete'])->name('diskon.delete');
Route::get('/diskon/{diskon}/edit', [DiskonController::class, 'edit'])->name('diskon.edit');

Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
Route::post('/suppliers', [SupplierController::class, 'store'])->name('supplier.store');
Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
Route::post('/supplier/{supplier}', [SupplierController::class, 'update'])->name('supplier.update');
Route::delete('/supplier/{supplier}', [SupplierController::class, 'delete'])->name('supplier.delete');
Route::get('/supplier/{supplier}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');


Route::get('/cekkasir', [KasirController::class, 'get_all']);
Route::get('/cekkategori',[KategoriController::class,'get_all']);
Route::get('/cekpajak',[PajakController::class,'get_all']);
Route::get('/cekdiskon', [DiskonController::class, 'get_all']);
Route::get('/cekbarang', [BarangController::class, 'get_all']);
Route::get('/cekdetailpengadaan', [DetailPengadaanController::class, 'get_all']);
Route::get('/cekstok', [StokController::class, 'stok']);