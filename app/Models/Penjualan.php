<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan'; // Sesuaikan dengan nama tabel kamu (bukan default 'stoks')

    protected $fillable = [
        'id_transaksi',
        'id_produk',
        'jumlah_produk',
        'harga_satuan',
        'total_harga',
        'tanggal_transaksi',
    ];
}
