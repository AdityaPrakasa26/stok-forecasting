<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use Illuminate\Http\Request;

class StokController extends Controller
{
    public function index()
    {
        $stok = Stok::all();
        return view('data.stok', compact('stok'));
    }

    public function create()
    {
        return view('stok.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bahan' => 'required',
            'jumlah' => 'required|numeric',
            'satuan' => 'required',
        ]);

        Stok::create($request->all());

        return redirect()->route('stok.index')->with('success', 'Data stok berhasil ditambahkan.');
    }

    public function edit(Stok $stok)
    {
        return view('stok.edit', compact('stok'));
    }

    public function update(Request $request, Stok $stok)
    {
        $request->validate([
            'nama_bahan' => 'required',
            'jumlah' => 'required|numeric',
            'satuan' => 'required',
        ]);

        $stok->update($request->all());

        return redirect()->route('stok.index')->with('success', 'Data stok berhasil diupdate.');
    }

    public function destroy(Stok $stok)
    {
        $stok->delete();

        return redirect()->route('stok.index')->with('success', 'Data stok berhasil dihapus.');
    }
}
