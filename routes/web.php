<?php

use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\TrendMomentController;
Route::view('/', 'layouts.main')->name('main');
Route::view('/home-admin', 'home.admin')->name('home.admin');
Route::view('/home-staff', 'home.staff')->name('home.staff');
Route::view('/data-penjualan', 'data.penjualan')->name('data.penjualan');
Route::view('/data-stok', 'data.stok')->name('data.stok');
Route::view('/laporan-penjualan', 'laporan.penjualan')->name('laporan.penjualan');
Route::view('/laporan-stok', 'laporan.stok')->name('laporan.stok');
Route::view('/produk-knowledge', 'produk.knowledge')->name('produk.knowledge');
Route::view('/produk-BOM', 'produk.BOM')->name('produk.BOM');
Route::view('/user-index', 'user.index')->name('user.index');
Route::view('/perhitungan-index', 'perhitungan.index')->name('perhitungan.index');
Route::view('/login-page', 'auth.login')->name('auth.login');
Route::view('/kasir-index', 'kasir.index')->name('kasir.index');
// Route::prefix('data')->group(function () {
//     Route::view('stok', 'data.stok.index')->name('data.stok');
//     Route::view('penjualan', 'data.penjualan.index')->name('data.penjualan');
// });

// Route::view('perhitungan', 'perhitungan')->name('perhitungan');

// Route::prefix('laporan')->group(function () {
//     Route::view('stok', 'laporan.stok')->name('laporan.stok');
//     Route::view('penjualan', 'laporan.penjualan')->name('laporan.penjualan');
// });
// Route::prefix('trend-moment')->group(function () {
//     Route::get('/', [TrendMomentController::class, 'index'])->name('trend-moment.index');
//     Route::post('/calculate', [TrendMomentController::class, 'calculate'])->name('trend-moment.calculate');
//     Route::get('/chart', [TrendMomentController::class, 'chart'])->name('trend-moment.chart'); // opsional
// });

