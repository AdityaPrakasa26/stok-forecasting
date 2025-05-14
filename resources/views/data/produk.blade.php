@extends('layouts.main')

@section('title')
Data Produk
@endsection

@section('content')
<div class="card">
    <div>
        <h5 class="card-header">Data Produk</h5>
        <div class="card-body">
            <a href="" class="btn btn-success">Tambah Data</a>
        </div>
    </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="produkTable" class="table table-bordered table-striped">
        <thead class="table-success">
          <tr>
            <th>No</th>
            {{-- <th>BOM</th> --}}
            <th>Nama Produk</th>
            <th>Deskripsi</th>
            <th>Tanggal Update</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($produk as $index => $item)
              <tr>
                <td>{{ $index + 1 }}</td>
                {{-- <td>{{ $item->id_bom }}</td> --}}
                <td>{{ $item->nama_produk }}</td>
                <td>{{ $item->deskripsi }}</td>
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
    $('#produkTable').DataTable();
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
  });
</script>
@endsection
