@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Dashboard Staff</h2>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Kasir</h5>
                    <p class="card-text">Kelola transaksi kasir dengan mudah.</p>
                    <a href="{{ route('kasir.index') }}" class="btn btn-light btn-sm">Lihat Kasir</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success mb-3 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Data</h5>
                    <p class="card-text">Lihat dan kelola data-data penting.</p>
                    <a href="{{ route('data.stok') }}" class="btn btn-light btn-sm">Lihat Data</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Produk</h5>
                    <p class="card-text">Kelola produk yang tersedia di toko.</p>
                    <a href="{{ route('produk.knowledge') }}" class="btn btn-light btn-sm">Lihat Produk</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Laporan</h5>
                    <p class="card-text">Lihat laporan transaksi dan penjualan.</p>
                    <a href="{{ route('laporan.stok') }}" class="btn btn-light btn-sm">Lihat Laporan</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
