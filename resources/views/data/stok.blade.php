@extends('layouts.main')

@section('title')
Data Stok
@endsection

@section('content')
<div class="card">
    <div>
        <h5 class="card-header">Data Stok</h5>
        <div class="card-body">
            <a href="{{ route('data.stok.create') }}" class="btn btn-success">Tambah Data</a>
        </div>
    </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="stokTable" class="table table-bordered table-striped">
        <thead class="table-success">
           <tr>
                <th>No</th>
                <th>BOM</th>
                <th>Jumlah Ketersediaan</th>
                <th>Jumlah Minimum</th>
                <th>Terakhir Diupdate</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stok as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            @foreach ((array) $item->id_bom as $bom_id)
                                @php
                                    $bomItem = \App\Models\BOM::find($bom_id);
                                    $produkList = \App\Models\Produk::findMany((array) ($bomItem->id_produk ?? []));
                                    $bahanList = \App\Models\BahanBaku::findMany((array) ($bomItem->id_bahan_baku ?? []));
                                @endphp
                            <div class="mb-2 p-2 border rounded bg-light">
                                <strong>BOM ID {{ $bom_id }}</strong><br>
                                Produk:
                                @foreach ($produkList as $p)
                                    <span class="badge bg-primary">{{ $p->nama_produk }}</span>
                                @endforeach
                                <br>
                                Bahan:
                                @foreach ($bahanList as $b)
                                    <span class="badge bg-warning text-dark">{{ $b->nama_bahan }}</span>
                                @endforeach
                            </div>
                        @endforeach
                    </td>
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
