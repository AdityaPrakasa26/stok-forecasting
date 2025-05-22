@extends('layouts.main')

@section('title')
Data Build Of Material (BOM)
@endsection

@section('content')
<div class="card">
    <div>
        <h5 class="card-header">Data Build Of Material (BOM)</h5>
        <div class="card-body">
            <a href="{{ route('data.bom.create') }}" class="btn btn-success">Tambah Data</a>
        </div>
    </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="bomTable" class="table table-bordered table-striped">
        <thead class="table-success">
          <tr>
            <th>No</th>
            <th>Produk</th>
            <th>Bahan Baku</th>
            <th>Satuan</th>
            <th>Jumlah Bahan</th>
            <th>Terakhir Di Perbarui</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($bom as $index => $item)
                <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    @foreach ((array) $item->id_produk as $id_produk)
                    @php
                        $produk = \App\Models\Produk::find($id_produk);
                    @endphp
                    <span class="badge bg-primary">{{ $produk->nama_produk ?? 'Produk Tidak Ditemukan' }}</span><br>
                    @endforeach
                </td>
                <td>
                    @foreach ((array) $item->id_bahan_baku as $id_bahan)
                    @php
                        $bahan = \App\Models\BahanBaku::find($id_bahan);
                    @endphp
                    <span class="badge bg-warning text-dark">{{ $bahan->nama_bahan ?? 'Bahan Tidak Ditemukan' }}</span><br>
                    @endforeach
                </td>
                <td>{{ $item->satuan }}</td>
                <td>{{ $item->jumlah_bahan }}</td>
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
    $('#bomTable').DataTable();
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
  });
</script>
@endsection
