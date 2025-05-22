<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BOM;

class BOMSeeder extends Seeder
{
    public function run(): void
    {
        BOM::insert([
            [
                'id_produk' => 1, // Smoked Potato BBQ
                'id_bahan_baku' => 1, // Kentang
                'jumlah_bahan' => 150,
                'satuan' => 'gram',
                'harga_satuan' => 15000,
                'total_harga' => 2250,
            ],
            [
                'id_produk' => 1,
                'id_bahan_baku' => 4, // Saus BBQ
                'jumlah_bahan' => 20,
                'satuan' => 'ml',
                'harga_satuan' => 10000,
                'total_harga' => 2000,
            ],
            [
                'id_produk' => 2, // Chicken Tartar
                'id_bahan_baku' => 2, // Daging Ayam
                'jumlah_bahan' => 100,
                'satuan' => 'gram',
                'harga_satuan' => 25000,
                'total_harga' => 2500,
            ],
            [
                'id_produk' => 2,
                'id_bahan_baku' => 5, // Saus Tartar
                'jumlah_bahan' => 15,
                'satuan' => 'ml',
                'harga_satuan' => 12000,
                'total_harga' => 1800,
            ],
        ]);
    }
}
