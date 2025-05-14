@extends('layouts.main')

@section('title', 'Perhitungan Trend Moment')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Peramalan Stok - Metode Trend Moment</h1>

    <!-- Form Input -->
    <form action="{{ route('trend-moment.calculate') }}" method="POST" class="bg-white p-4 rounded shadow mb-6">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium">Pilih Data:</label>
                <select name="jenis_data" class="w-full border rounded p-2" required>
                    <option value="stok">Stok</option>
                    <option value="penjualan">Penjualan</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium">Jumlah Periode yang Akan Diramal:</label>
                <input type="number" name="jumlah_periode" min="1" class="w-full border rounded p-2" required>
            </div>
        </div>
        <div class="mt-4">
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Hitung</button>
        </div>
    </form>

    <!-- Hasil Perhitungan -->
    @isset($hasil)
        <div class="bg-white p-4 rounded shadow mb-6">
            <h2 class="text-lg font-semibold mb-2">Hasil Peramalan:</h2>
            <p>Rumus: Ŷ = a + bX</p>
            <p>a = {{ $hasil['a'] }}, b = {{ $hasil['b'] }}</p>
            <p>Prediksi periode ke-{{ $hasil['periode'] }}: <strong>{{ $hasil['prediksi'] }}</strong></p>
        </div>
    @endisset

    <!-- Tabel Data -->
    @isset($data)
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-lg font-semibold mb-2">Data Perhitungan:</h2>
            <div class="overflow-auto">
                <table class="w-full table-auto border text-sm">
                    <thead>
                        <tr class="bg-red-600 text-white">
                            <th class="border px-2 py-1">Periode</th>
                            <th class="border px-2 py-1">Y (Nilai)</th>
                            <th class="border px-2 py-1">X</th>
                            <th class="border px-2 py-1">XY</th>
                            <th class="border px-2 py-1">X²</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                            <tr>
                                <td class="border px-2 py-1">{{ $loop->iteration }}</td>
                                <td class="border px-2 py-1">{{ $row['y'] }}</td>
                                <td class="border px-2 py-1">{{ $row['x'] }}</td>
                                <td class="border px-2 py-1">{{ $row['xy'] }}</td>
                                <td class="border px-2 py-1">{{ $row['x2'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endisset
</div>
@endsection
