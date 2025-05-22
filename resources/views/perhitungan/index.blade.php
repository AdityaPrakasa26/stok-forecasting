@extends('layouts.app')

@section('title', 'Perhitungan Stok - Trend Moment')

@section('content')
<div class="container">
  <h3 class="mb-4">Perhitungan Stok Mingguan (Trend Moment)</h3>

  {{-- Tabel Konversi Penjualan ke Bahan Baku --}}
  <div class="card mb-4">
    <div class="card-header bg-primary text-white">Konversi Penjualan ke Bahan Baku</div>
    <div class="card-body table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Tanggal</th>
            <th>Nama Bahan</th>
            <th>Total Gramasi (gram)</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($konversiData as $item)
            <tr>
              <td>{{ $item['tanggal'] }}</td>
              <td>{{ $item['nama_bahan'] }}</td>
              <td>{{ $item['total_gramasi'] }}</td>
            </tr>
          @empty
            <tr>
              <td colspan="3" class="text-center">Data belum tersedia.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  {{-- Tabel Perhitungan Trend Moment --}}
  <div class="card mb-4">
    <div class="card-header bg-warning text-dark">Perhitungan Forecast (Trend Moment)</div>
    <div class="card-body table-responsive">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Minggu</th>
            <th>Y (Total Pemakaian)</th>
            <th>X</th>
            <th>X²</th>
            <th>X·Y</th>
            <th>Forecast</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($trendMoment['data'] as $row)
            <tr>
              <td>{{ $row['minggu'] }}</td>
              <td>{{ $row['y'] }}</td>
              <td>{{ $row['x'] }}</td>
              <td>{{ $row['x2'] }}</td>
              <td>{{ $row['xy'] }}</td>
              <td>{{ number_format($row['forecast'], 2) }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>

      <p><strong>Rumus:</strong> Ŷ = a + bX</p>
      <p>a = {{ number_format($trendMoment['a'], 2) }}, b = {{ number_format($trendMoment['b'], 2) }}</p>
    </div>
  </div>

  {{-- Tabel Evaluasi Error --}}
  <div class="card mb-4">
    <div class="card-header bg-danger text-white">Evaluasi Error</div>
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Metode</th>
            <th>Nilai</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>RMSE</td>
            <td>{{ number_format($errorEvaluation['rmse'], 2) }}</td>
          </tr>
          <tr>
            <td>MAPE</td>
            <td>{{ number_format($errorEvaluation['mape'], 2) }}%</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  {{-- Grafik Real vs Forecast --}}
  <div class="card mb-4">
    <div class="card-header bg-success text-white">Grafik Perbandingan Data Real & Forecast</div>
    <div class="card-body">
      <canvas id="chartForecast"></canvas>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('chartForecast').getContext('2d');
  const chart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: @json(array_column($chartData, 'minggu')),
      datasets: [
        {
          label: 'Data Real',
          data: @json(array_column($chartData, 'real')),
          borderColor: 'blue',
          backgroundColor: 'transparent',
          tension: 0.4
        },
        {
          label: 'Forecast',
          data: @json(array_column($chartData, 'forecast')),
          borderColor: 'red',
          backgroundColor: 'transparent',
          tension: 0.4
        }
      ]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top'
        },
        tooltip: {
          mode: 'index',
          intersect: false
        }
      },
      interaction: {
        mode: 'nearest',
        axis: 'x',
        intersect: false
      }
    }
  });
</script>
@endpush
