<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use App\Models\BOM;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\Stok;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataController extends Controller
{
    public function Stok()
    {
        $stok = Stok::all();
        return view('data.stok', compact('stok'));
    }
    public function BOM()
    {
        $bom = BOM::all();
        return view('data.bom', compact('bom'));
    }

    public function createBOM()
    {
        $produk = Produk::all();
        $bahan_baku = BahanBaku::all();
        return view('form.bom', compact('produk', 'bahan_baku'));
    }

    public function storeBOM(Request $request)
    {
        $request->validate([
            'id_produk' => 'required|array',
            'id_bahan_baku' => 'required|array',
            'jumlah_bahan' => 'required|numeric',
            'satuan' => 'required|string',
            'harga_satuan' => 'required|numeric',
        ]);

        $total = $request->harga_satuan * $request->jumlah_bahan;

        BOM::create([
            'id_produk' => $request->id_produk,
            'id_bahan_baku' => $request->id_bahan_baku,
            'jumlah_bahan' => $request->jumlah_bahan,
            'satuan' => $request->satuan,
            'harga_satuan' => $request->harga_satuan,
            'total_harga' => $total,
            'id_stok' => null
        ]);

        return redirect()->route('data.bom')->with('success', 'Data BOM berhasil ditambahkan!');
    }


    public function Penjualan()
    {
        $penjualan = Penjualan::all();
        return view('data.penjualan', compact('penjualan'));
    }
    public function BahanBaku()
    {
        $bahan_baku = BahanBaku::all();
        return view('data.bahan_baku', compact('bahan_baku'));
    }
    public function Produk()
    {
        $produk = Produk::all();
        return view('data.produk', compact('produk'));
    }
    public function Transaksi()
    {
        $transaksi = Transaksi::all();
        return view('data.transaksi', compact('transaksi'));
    }
}
