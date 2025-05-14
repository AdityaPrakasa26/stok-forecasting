@extends('layouts.main')

@section('title')
Data Stok
@endsection

@section('content')
<div class="card">
    <div>
        <h5 class="card-header">Data Stok</h5>
        <div class="card-body">
            <a href="" class="btn btn-success">Tambah Data</a>
        </div>
    </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="stokTable" class="table table-bordered table-striped">
        <thead class="table-success">
          <tr>
            <th>No</th>
            {{-- <th>BOM</th> --}}
            <th>Jumlah Ketersediaan</th>
            <th>Jumlah Minimum</th>
            <th>Tanggal Update Data</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($stok as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              {{-- <td>{{ $item->bom }}</td> --}}
              <td>{{ $item->jumlah_ketersediaan }}</td>
              <td>{{ $item->jumlah_minimum }}</td>
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
    $('#stokTable').DataTable();
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
  });
</script>
@endsection
