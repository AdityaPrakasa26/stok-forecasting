<?php

use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\TrendMomentController;
Route::view('/', 'layouts.main')->name('main');

Route::view('/home-admin', 'home.admin')->name('home.admin');
Route::view('/home-staff', 'home.staff')->name('home.staff');

// Sumber Data
Route::get('/data-penjualan', [DataController::class, 'Penjualan'])->name('data.penjualan');


Route::get('/data-stok', [DataController::class, 'Stok'])->name('data.stok');
Route::get('/data-stok/create', [DataController::class, 'createStok'])->name('data.stok.create');
Route::post('/data-stok/store', [DataController::class, 'storeStok'])->name('data.stok.store');


Route::get('/data-bom', [DataController::class, 'BOM'])->name('data.bom');
Route::get('/data-bom/create', [DataController::class, 'createBOM'])->name('data.bom.create');
Route::post('/data-bom/store', [DataController::class, 'storeBOM'])->name('data.bom.store');


Route::get('/data-bahan-baku', [DataController::class, 'BahanBaku'])->name('data.bahan.baku');
Route::get('/data-produk', [DataController::class, 'Produk'])->name('data.produk');
Route::get('/data-transaksi', [DataController::class, 'Transaksi'])->name('data.transaksi');

Route::view('/laporan-penjualan', 'laporan.penjualan')->name('laporan.penjualan');
Route::view('/laporan-stok', 'laporan.stok')->name('laporan.stok');
Route::view('/produk-knowledge', 'produk.knowledge')->name('produk.knowledge');
Route::view('/produk-BOM', 'produk.BOM')->name('produk.BOM');
Route::view('/user-index', 'user.index')->name('user.index');
Route::view('/login-page', 'auth.login')->name('auth.login');
Route::view('/kasir-index', 'kasir.index')->name('kasir.index');

Route::get('/kasir', [App\Http\Controllers\KasirController::class, 'showKasir'])->name('kasir.index');
Route::post('/kasir', [App\Http\Controllers\KasirController::class, 'prosesKasir'])->name('kasir.proses');

use App\Http\Controllers\PerhitunganController;
Route::get('/perhitungan', [PerhitunganController::class, 'index'])->name('perhitungan.index');
