@extends('layouts.main')

@section('title')
Data Bahan Baku
@endsection

@section('content')
<div class="card">
    <div>
        <h5 class="card-header">Data Bahan Baku</h5>
        <div class="card-body">
            <a href="" class="btn btn-success">Tambah Data</a>
        </div>
    </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="bahanbakuTable" class="table table-bordered table-striped">
        <thead class="table-success">
          <tr>
            <th>No</th>
            <th>Nama Bahan</th>
            <th>Harga Satuan</th>
            <th>Satuan</th>
            <th>Tanggal Update</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($bahan_baku as $index => $item)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->nama_bahan }}</td>
                <td>{{ $item->harga_satuan }}</td>
                <td>{{ $item->satuan }}</td>
                <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
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
    $('#bahanbakuTable').DataTable();
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
  });
</script>
@endsection
