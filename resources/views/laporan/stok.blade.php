@extends('layouts.main')

@section('title')
Data Stok
@endsection

@section('content')
<div class="card">
  <div class="card-body">
    <div class="table-responsive">
      <table id="stokTable" class="table table-bordered table-striped">
        <thead class="table-success">
          <tr>
            <th>No</th>
            <th>ID BOM</th>
            <th>Jumlah Ketersediaan</th>
            <th>Jumlah Minimum</th>
            <th>Tanggal Update Data</th>
          </tr>
        </thead>
        <tbody>
          {{-- Kosongan dulu --}}
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
