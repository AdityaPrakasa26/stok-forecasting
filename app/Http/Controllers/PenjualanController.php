<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::all();
        return view('penjualan.index', compact('penjualan'));
    }

    public function create()
    {
        return view('penjualan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'total_penjualan' => 'required|numeric',
        ]);

        Penjualan::create($request->all());

        return redirect()->route('penjualan.index')->with('success', 'Data penjualan berhasil ditambahkan.');
    }

    public function edit(Penjualan $penjualan)
    {
        return view('penjualan.edit', compact('penjualan'));
    }

    public function update(Request $request, Penjualan $penjualan)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'total_penjualan' => 'required|numeric',
        ]);

        $penjualan->update($request->all());

        return redirect()->route('penjualan.index')->with('success', 'Data penjualan berhasil diupdate.');
    }

    public function destroy(Penjualan $penjualan)
    {
        $penjualan->delete();

        return redirect()->route('penjualan.index')->with('success', 'Data penjualan berhasil dihapus.');
    }
}

