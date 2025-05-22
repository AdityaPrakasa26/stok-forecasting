<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\BahanBaku;
use App\Models\BOM;
use Carbon\Carbon;

class PerhitunganController extends Controller
{
    public function index()
    {
        // Ambil data penjualan 7 hari terakhir (atau bisa diatur)
        $penjualan = Penjualan::with('menu')->orderBy('tanggal', 'asc')->get();

        // Konversi ke pemakaian bahan baku
        $konversiStok = [];
        $bahanBakuHarian = []; // [tanggal][bahan_baku_id] => total gram

        foreach ($penjualan as $transaksi) {
            foreach ($transaksi->menu as $menu) {
                $bomItems = BOM::where('menu_id', $menu->id)->get();

                foreach ($bomItems as $item) {
                    $jumlah = $item->jumlah * $menu->pivot->jumlah;
                    $tanggal = $transaksi->tanggal;
                    $namaBahan = $item->bahan->nama;

                    $konversiStok[] = [
                        'tanggal' => $tanggal,
                        'bahan_baku' => $namaBahan,
                        'jumlah' => $jumlah,
                    ];

                    $bahanBakuHarian[$tanggal][$namaBahan] = ($bahanBakuHarian[$tanggal][$namaBahan] ?? 0) + $jumlah;
                }
            }
        }

        // Siapkan data untuk Trend Moment (misalnya untuk satu bahan baku saja dulu: Kentang)
        $bahanTarget = 'Kentang';
        $i = 0;
        $trendMoment = [];
        $dataReal = [];
        $dataForecast = [];
        $labels = [];

        // Ambil data untuk bahan tertentu dalam bentuk array tanggal -> jumlah
        $bahanData = [];
        foreach ($bahanBakuHarian as $tanggal => $data) {
            if (isset($data[$bahanTarget])) {
                $bahanData[] = [
                    'tanggal' => $tanggal,
                    'jumlah' => $data[$bahanTarget]
                ];
            }
        }

        $n = count($bahanData);
        if ($n == 0) return view('perhitungan.index')->with(compact('konversiStok'));

        $xList = [];
        $yList = [];
        $totalXY = 0;
        $totalX2 = 0;

        // Buat X dari -(n-1)/2 s/d (n-1)/2
        $start = -floor(($n - 1) / 2);

        for ($i = 0; $i < $n; $i++) {
            $x = $start + $i;
            $y = $bahanData[$i]['jumlah'];

            $xy = $x * $y;
            $x2 = $x * $x;

            $trendMoment[] = [
                'periode' => $bahanData[$i]['tanggal'],
                'y' => $y,
                'x' => $x,
                'xy' => $xy,
                'x2' => $x2,
                'forecast' => null, // Diisi nanti setelah b dan a dihitung
            ];

            $xList[] = $x;
            $yList[] = $y;
            $totalXY += $xy;
            $totalX2 += $x2;
            $labels[] = $bahanData[$i]['tanggal'];
            $dataReal[] = $y;
        }

        // Hitung nilai a dan b
        $b = $totalXY / $totalX2;
        $a = array_sum($yList) / $n;

        // Hitung forecast Y' = a + bX dan simpan
        foreach ($trendMoment as $index => $row) {
            $forecast = $a + ($b * $row['x']);
            $trendMoment[$index]['forecast'] = round($forecast);
            $dataForecast[] = round($forecast);
        }

        // Hitung RMSE dan MAPE
        $mse = 0;
        $mapeTotal = 0;

        for ($i = 0; $i < $n; $i++) {
            $error = $dataForecast[$i] - $dataReal[$i];
            $mse += pow($error, 2);

            if ($dataReal[$i] != 0) {
                $mapeTotal += abs($error) / $dataReal[$i];
            }
        }

        $rmse = sqrt($mse / $n);
        $mape = ($mapeTotal / $n) * 100;

        return view('perhitungan.index')->with([
            'konversiStok' => $konversiStok,
            'trendMoment' => $trendMoment,
            'rmse' => $rmse,
            'mape' => $mape,
            'labels' => $labels,
            'dataReal' => $dataReal,
            'dataForecast' => $dataForecast,
        ]);
    }
}
