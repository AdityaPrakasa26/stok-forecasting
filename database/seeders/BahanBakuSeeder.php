<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BahanBaku;

class BahanBakuSeeder extends Seeder
{
    public function run(): void
    {
        BahanBaku::insert([
            ['nama_bahan' => 'Kentang', 'harga_satuan' => 15000, 'satuan' => 'gram'],
            ['nama_bahan' => 'Daging Ayam', 'harga_satuan' => 25000, 'satuan' => 'gram'],
            ['nama_bahan' => 'Daging Sapi', 'harga_satuan' => 40000, 'satuan' => 'gram'],
            ['nama_bahan' => 'Saus BBQ', 'harga_satuan' => 10000, 'satuan' => 'ml'],
            ['nama_bahan' => 'Saus Tartar', 'harga_satuan' => 12000, 'satuan' => 'ml'],
        ]);
    }
}
