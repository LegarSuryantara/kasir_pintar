<?php


use App\Http\Controllers\Barang;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StokController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\PajakController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DiskonController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailPengadaanController;
use App\Http\Controllers\TransaksiPenjualanController;

Route::get('transaksi-penjualan', [TransaksiPenjualanController::class, 'index'])->name('transaksi-penjualan.index');
Route::post('transaksi-penjualan', [TransaksiPenjualanController::class, 'store'])->name('transaksi-penjualan.store');
Route::get('/transaksi-penjualan/create', [TransaksiPenjualanController::class, 'create'])->name('transaksi_penjualan.create');
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{id}', [KategoriController::class, 'delete'])->name('kategori.delete');

Route::get('/pajak', [PajakController::class, 'index'])->name('pajak.index');
Route::post('/pajaks', [PajakController::class, 'store'])->name('pajak.store');
Route::get('/pajak/create', [PajakController::class, 'create'])->name('pajak.create');
Route::post('/pajak/{pajak}', [PajakController::class, 'update'])->name('pajak.update');
Route::delete('/pajak/{pajak}', [PajakController::class, 'delete'])->name('pajak.delete');
Route::get('/pajak/{pajak}/edit', [PajakController::class, 'edit'])->name('pajak.edit');

Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
Route::post('/barangs', [BarangController::class, 'store'])->name('barang.store');
Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
Route::post('/barang/{barang}', [BarangController::class, 'update'])->name('barang.update');
Route::delete('/barang/{barang}', [BarangController::class, 'delete'])->name('barang.delete');
Route::get('/barang/{barang}/edit', [BarangController::class, 'edit'])->name('barang.edit');

Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
Route::post('/customers', [CustomerController::class, 'store'])->name('customer.store');
Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
Route::post('/customer/{customer}', [CustomerController::class, 'update'])->name('customer.update');
Route::delete('/customer/{customer}', [CustomerController::class, 'delete'])->name('customer.delete');
Route::get('/customer/{customer}/edit', [CustomerController::class, 'edit'])->name('customer.edit');

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


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/shift', [ShiftController::class, 'index'])->name('shift.index');
Route::post('/shifts', [ShiftController::class, 'store'])->name('shift.store');
Route::get('/shift/create', [ShiftController::class, 'create'])->name('shift.create');
Route::post('/shift/{shift}', [ShiftController::class, 'update'])->name('shift.update');
Route::delete('/shift/{shift}', [ShiftController::class, 'delete'])->name('shift.delete');
Route::get('/shift/{shift}/edit', [ShiftController::class, 'edit'])->name('shift.edit');