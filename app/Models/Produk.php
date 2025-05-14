<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk'; // Sesuaikan dengan nama tabel kamu (bukan default 'stoks')

    protected $fillable = [
        'id_stok',
        'nama_produk',
        'deskripsi',
        'harga_jual',
    ];
}
