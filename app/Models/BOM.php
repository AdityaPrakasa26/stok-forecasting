<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BOM extends Model
{
    protected $table = 'bom'; // Sesuaikan dengan nama tabel kamu (bukan default 'stoks')

    protected $fillable = [
        'id_produk',
        'id_bahan_baku',
        'jumlah_bahan',
        'satuan',
        'harga_satuan',
        'total_harga',
        'id_stok',
    ];

    protected $casts = [
        'id_produk' => 'array',
        'id_bahan_baku' => 'array',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id');
    }

    public function bahanBaku()
    {
        return $this->belongsTo(BahanBaku::class, 'id_bahan_baku', 'id');
    }

    public function stok()
    {
        return $this->belongsTo(Stok::class, 'id_stok', 'id');
    }

}
