@extends('layouts.main')

@section('title')
Data Penjualan
@endsection

@section('content')
<div class="card">
    <div>
        <h5 class="card-header">Data Penjualan</h5>
        <div class="card-body">
            <a href="" class="btn btn-success">Tambah Data</a>
        </div>
    </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="penjualanTable" class="table table-bordered table-striped">
        <thead class="table-success">
          <tr>
            <th>No</th>
            <th>Transaksi</th>
            <th>Produk</th>
            <th>Jumlah Produk</th>
            <th>Harga Satuan</th>
            <th>Total Harga</th>
            <th>Tanggal Transaksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($penjualan as $index => $item)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->id_transaksi }}</td>
                <td>{{ $item->id_produk }}</td>
                <td>{{ $item->jumlah_produk }}</td>
                <td>{{ $item->harga_satuan }}</td>
                <td>{{ $item->updated_at->format('d-m-Y H:i') }}</td>
              </tr>
            @endforeach
          </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  $(document).ready(function () {
    $('#penjualanTable').DataTable();
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
  });
</script>
@endsection
