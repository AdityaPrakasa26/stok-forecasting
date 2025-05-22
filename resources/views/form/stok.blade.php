@extends('layouts.main')

@section('title', 'Form Tambah Stok')

@section('content')
<div class="card">
    <div class="card-header">Form Tambah Stok</div>
    <div class="card-body">
        <form action="{{ route('data.stok.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="id_bom" class="form-label">Pilih BOM (Boleh Lebih dari Satu)</label>
                <select name="id_bom[]" id="id_bom" class="form-control" multiple>
                    @foreach ($bom as $item)
                        @php
                            $produkList = \App\Models\Produk::findMany((array) $item->id_produk);
                            $bahanList = \App\Models\BahanBaku::findMany((array) $item->id_bahan_baku);
                        @endphp
                        <option value="{{ $item->id }}">
                            BOM ID: {{ $item->id }} |
                            Produk:
                            @foreach ($produkList as $p)
                                {{ $p->nama_produk }},
                            @endforeach
                            |
                            Bahan:
                            @foreach ($bahanList as $b)
                                {{ $b->nama_bahan }},
                            @endforeach
                        </option>
                    @endforeach
                </select>
                <small class="text-muted">Tekan Ctrl (atau Cmd di Mac) untuk memilih lebih dari satu</small>
            </div>

            <div class="mb-3">
                <label for="jumlah_ketersediaan" class="form-label">Jumlah Ketersediaan</label>
                <input type="number" name="jumlah_ketersediaan" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="jumlah_minimum" class="form-label">Jumlah Minimum</label>
                <input type="number" name="jumlah_minimum" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>
@endsection
