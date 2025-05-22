<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\BOM;
use App\Models\Stok;
use App\Models\Transaksi;
use App\Models\Penjualan;
use Illuminate\Support\Carbon;

class KasirController extends Controller
{

    public function showKasir()
    {
        $produk = Produk::all();

        $produkData = $produk->map(function ($p) {
            // Ambil data BOM yang mengandung id produk (pakai whereJsonContains)
            $bom = BOM::whereJsonContains('id_produk', (int)$p->id)->first();

            return [
                'id' => $p->id,
                'nama_produk' => $p->nama_produk,
                'harga' => $p->harga,
            ];
        });

        return view('home.kasir', compact('produkData'));
    }


public function prosesKasir(Request $request)
{
    $request->validate([
        'data_transaksi' => 'required|string'
    ]);

    $data = json_decode($request->input('data_transaksi'), true);

    if (!is_array($data) || empty($data)) {
        return redirect()->back()->with('error', 'Data transaksi tidak valid.');
    }

    $total = 0;
    $total_item_dibeli = 0;
    $detailPenjualan = [];

    foreach ($data as $item) {
        $produkId = $item['id'];
        $produk = Produk::findOrFail($produkId);

        $harga = $produk->harga;
        $jumlah = 1; // default 1, bisa diubah kalau nanti support kuantitas
        $subtotal = $harga * $jumlah;

        $total += $subtotal;
        $total_item_dibeli += $jumlah;

        $bom = BOM::whereJsonContains('id_produk', (int)$produkId)->first();

        $detailPenjualan[] = [
            'id_produk' => $produkId,
            'jumlah' => $jumlah,
            'harga' => $harga,
            'total' => $subtotal,
            'bom' => $bom,
        ];
    }

    // Simpan ke tabel transaksi
    $transaksi = Transaksi::create([
        'id_produk' => json_encode(array_column($detailPenjualan, 'id_produk')),
        'total_item_dibeli' => $total_item_dibeli,
        'sub_total' => $total,
        'total' => $total,
        'waktu_transaksi' => now(),
    ]);

    foreach ($detailPenjualan as $data) {
        // Simpan ke tabel penjualan
        Penjualan::create([
            'id_transaksi' => $transaksi->id,
            'id_produk' => $data['id_produk'],
            'jumlah_produk' => $data['jumlah'],
            'harga_satuan' => $data['harga'],
            'total_harga' => $data['total'],
            'tanggal_transaksi' => now()->toDateString(),
        ]);

        // Kurangi stok jika ada BOM
        if ($data['bom']) {
            $idBahanArray = is_array($data['bom']->id_bahan_baku)
                ? $data['bom']->id_bahan_baku
                : json_decode($data['bom']->id_bahan_baku, true);

            foreach ($idBahanArray as $idBahan) {
                $stok = Stok::where('id_bahan_baku', $idBahan)->first();
                if ($stok) {
                    $jumlah_pemakaian = $data['bom']->jumlah_bahan * $data['jumlah'];
                    $stok->jumlah_ketersediaan -= $jumlah_pemakaian;
                    $stok->save();
                }
            }
        }
    }

    return redirect()->back()->with('success', 'Transaksi berhasil disimpan!');
}



}
