<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    BarangController, KategoriController, PajakController, CustomerController,
    TokoController, KasirController, DiskonController, SupplierController,
    CashDrawerController, ShiftController, TransaksiPenjualanController,
    LoginController, RegisterController, DashboardController
};

// Routes untuk pengguna tamu (guest)
Route::middleware('guest')->group(function () {
    // Register Routes
    Route::get('/', [RegisterController::class, 'index'])->name('register');
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register/store', [RegisterController::class, 'store'])->name('register.store');

    // Login Routes
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login/authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate');
});

// Routes untuk pengguna yang sudah login (authenticated)
Route::middleware('auth')->group(function () {
    Route::get('/', [RegisterController::class, 'index'])->name('register');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Resourceful Routes
    Route::get('/transaksi-penjualan', [TransaksiPenjualanController::class, 'index'])->name('transaksi-penjualan.index');
    Route::post('/transaksi-penjualan', [TransaksiPenjualanController::class, 'store'])->name('transaksi-penjualan.store');
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
    Route::get('/cashdrawer', [CashDrawerController::class, 'index'])->name('cashdrawer.index');
    Route::post('/cashdrawers', [CashDrawerController::class, 'store'])->name('cashdrawer.store');
    Route::get('/cashdrawer/create', [CashDrawerController::class, 'create'])->name('cashdrawer.create');
    Route::post('/cashdrawer/{cashdrawer}', [CashDrawerController::class, 'update'])->name('cashdrawer.update');
    Route::delete('/cashdrawer/{cashdrawer}', [CashDrawerController::class, 'delete'])->name('cashdrawer.delete');
    Route::get('/cashdrawer/{cashdrawer}/edit', [CashDrawerController::class, 'edit'])->name('cashdrawer.edit');
    
    Route::get('/shift', [ShiftController::class, 'index'])->name('shift.index');
    Route::post('/shifts', [ShiftController::class, 'store'])->name('shift.store');
    Route::get('/shift/create', [ShiftController::class, 'create'])->name('shift.create');
    Route::post('/shift/{shift}', [ShiftController::class, 'update'])->name('shift.update');
    Route::delete('/shift/{shift}', [ShiftController::class, 'delete'])->name('shift.delete');
    Route::get('/shift/{shift}/edit', [ShiftController::class, 'edit'])->name('shift.edit');


    // Logout Route
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

// dashboard Kasir
Route::get('/dashboardKasir', [DashboardKasirController::class, 'index'])->name('dashboardKasir.index');
Route::get('/listItems', [ItemsListController::class, 'index'])->name('addItems.index');
Route::get('/dashboardKasir/add/{id}', [DashboardKasirController::class, 'addItem'])->name('dashboardKasir.addItem');
Route::get('/dashboardKasir/remove/{id}', [DashboardKasirController::class, 'removeItem'])->name('removeItem');
Route::post('/dashboardKasir/bayar', [DashboardKasirController::class, 'bayar'])->name('dashboardKasir.bayar');
Route::get('/dashboardKasir/batal', [DashboardKasirController::class, 'batal'])->name('dashboardKasir.batal');
Route::get('/kasirTable', [DashboardKasirController::class, 'index'])->name('dashboardKasir.index');
Route::get('/shiftKasir', [ShiftKasirController::class, 'showShiftForm'])->name('shift.form');
Route::post('/shiftKasir/start', [ShiftKasirController::class, 'startShift'])->name('shift.start');
Route::post('/shiftKasir/end', [ShiftKasirController::class, 'endShift'])->name('shift.end');

