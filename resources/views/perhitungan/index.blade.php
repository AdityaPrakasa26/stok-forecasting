@extends('layouts.main')

@section('title')
Perhitungan
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="#" method="GET">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="bahan_baku" class="form-label">Pilih Bahan Baku</label>
                    <select name="bahan_baku" id="bahan_baku" class="form-select" required>
                        <option value="">-- Pilih Bahan Baku --</option>
                        <option value="beef">Beef</option>
                        <option value="chicken">Chicken</option>
                        <option value="oxtongue">Oxtongue</option>
                        <option value="sosis">Sosis</option>
                        <option value="bombay">Bombay</option>
                        <option value="wortel">Wortel</option>
                        <option value="buncis">Buncis</option>
                        <option value="baby-potato">Baby Potato</option>
                        <option value="potato">Potato</option>
                        <option value="beras">Beras</option>
                        <!-- Tambah opsi sesuai kebutuhan -->
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="periode" class="form-label">Pilih Periode</label>
                    <select name="periode" id="periode" class="form-select" required>
                        <option value="">-- Pilih Periode --</option>
                        <option value="5">3 Minggu Terakhir</option>
                        <option value="10">10 Minggu Terakhir</option>
                        <option value="25">15 Minggu Terakhir</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Lakukan Perhitungan</button>
        </form>
    </div>
</div>
@endsection
