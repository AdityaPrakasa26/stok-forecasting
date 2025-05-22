<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        Produk::insert([
            ['nama_produk' => 'Smoked Potato BBQ', 'deskripsi' => 'Kentang asap dengan saus BBQ', 'id_stok' => null],
            ['nama_produk' => 'Chicken Tartar', 'deskripsi' => 'Ayam goreng dengan saus tartar', 'id_stok' => null],
            ['nama_produk' => 'Beef Hot BBQ', 'deskripsi' => 'Daging sapi panggang dengan saus pedas', 'id_stok' => null],
        ]);
    }
}
