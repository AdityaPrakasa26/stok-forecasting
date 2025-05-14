@extends('layouts.main')

@section('title')
Data Penjualan
@endsection

@section('content')
<a href="#" class="btn btn-success btn-lg rounded-circle shadow position-fixed d-flex align-items-center justify-content-center"
style="bottom: 30px; right: 30px; width: 60px; height: 60px; z-index: 9999;"
data-bs-toggle="tooltip" data-bs-placement="left" title="Tambah Baru">
<i class="bi bi-pencil-square fs-4"></i>
</a>
<div class="card">
  <div class="card-body">
    <div class="table-responsive">
      <table id="stokTable" class="table table-bordered table-striped">
        <thead class="table-success">
          <tr>
            <th>No</th>
            <th>ID PRODUK</th>
            <th>Jumlah</th>
            <th>Sub Total</th>
            <th>Total</th>
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
