<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'dashboard')->name('dashboard');

Route::prefix('data')->group(function () {
    Route::view('stok', 'data.stok.index')->name('data.stok');
    Route::view('penjualan', 'data.penjualan.index')->name('data.penjualan');
});

Route::view('perhitungan', 'perhitungan')->name('perhitungan');

Route::prefix('laporan')->group(function () {
    Route::view('stok', 'laporan.stok')->name('laporan.stok');
    Route::view('penjualan', 'laporan.penjualan')->name('laporan.penjualan');
});


