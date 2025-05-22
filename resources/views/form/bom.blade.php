@extends('layouts.main')

@section('title')
Form Tambah Data BOM
@endsection

@section('content')
<div class="card">
  <div class="card-header">
    <h5>Form Tambah Data BOM</h5>
  </div>
  <div class="card-body">
    <form action="{{ route('data.bom.store') }}" method="POST">
      @csrf

      {{-- Produk --}}
      <div class="mb-3">
        <label for="id_produk" class="form-label">Pilih Produk</label>
        <select name="id_produk[]" class="form-control select2-multiple" multiple="multiple">
          @foreach($produk as $p)
            <option value="{{ $p->id }}">{{ $p->nama_produk }}</option>
          @endforeach
        </select>
        @error('id_produk') <div class="text-danger">{{ $message }}</div> @enderror
      </div>

      {{-- Bahan Baku --}}
      <div class="mb-3">
        <label for="id_bahan_baku" class="form-label">Pilih Bahan Baku</label>
        <select name="id_bahan_baku[]" class="form-control select2-multiple" multiple="multiple">
          @foreach($bahan_baku as $bb)
            <option value="{{ $bb->id }}">{{ $bb->nama_bahan }}</option>
          @endforeach
        </select>
        @error('id_bahan_baku') <div class="text-danger">{{ $message }}</div> @enderror
      </div>

      {{-- Jumlah Bahan --}}
      <div class="mb-3">
        <label for="jumlah_bahan" class="form-label">Jumlah Bahan</label>
        <input type="number" name="jumlah_bahan" class="form-control" required>
        @error('jumlah_bahan') <div class="text-danger">{{ $message }}</div> @enderror
      </div>

      {{-- Satuan --}}
      <div class="mb-3">
        <label for="satuan" class="form-label">Satuan</label>
        <input type="text" name="satuan" class="form-control" required>
        @error('satuan') <div class="text-danger">{{ $message }}</div> @enderror
      </div>

      {{-- Harga Satuan --}}
      <div class="mb-3">
        <label for="harga_satuan" class="form-label">Harga Satuan</label>
        <input type="number" name="harga_satuan" class="form-control" required>
        @error('harga_satuan') <div class="text-danger">{{ $message }}</div> @enderror
      </div>

      {{-- Harga Satuan --}}
      <div class="mb-3">
        <label for="total_harga" class="form-label">Harga Total</label>
        <input type="number" name="total_harga" class="form-control" required>
        @error('total_harga') <div class="text-danger">{{ $message }}</div> @enderror
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="{{ route('data.bom') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
@endsection

@section('scripts')
<script>
  $(document).ready(function () {
    $('.select2-multiple').select2({
      placeholder: "Pilih item...",
      allowClear: true,
      tags: false,
      width: '100%'
    });
  });
</script>
@endsection
