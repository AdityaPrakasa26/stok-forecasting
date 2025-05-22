@extends('layouts.main')

@section('content')
<div class="container">
    <h3 class="mb-4">Transaksi Kasir</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('kasir.proses') }}" method="POST">
        @csrf

        <div class="produk-item mb-4 p-3 border rounded">
            <h4 class="mb-3">Pilih Menu</h4>
            <div class="row row-cols-2 row-cols-md-3 g-4">
                @foreach ($produkData as $produk)
                <div class="col">
                    <div class="card h-100">
                        {{-- <img src="{{ asset('image/' . ($produk['gambar'] ?? 'Smoked Chicken.jpeg')) }}" class="card-img-top" alt="Gambar Produk"> --}}
                        <img src="{{ asset('image/' . ($produk['gambar'] ?? 'Smoked Beef.png')) }}" class="card-img-top" alt="Gambar Produk">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $produk['nama_produk'] }}</h5>
                            <p class="card-text">Rp{{ number_format($produk['harga']) }}</p>
                            <button type="button" class="btn btn-primary mt-auto"
                                data-bs-toggle="modal" data-bs-target="#detailModal"
                                onclick="showDetail({{ $produk['id'] }}, '{{ $produk['nama_produk'] }}', {{ $produk['harga'] }})">
                                Pilih Menu
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
<div class="mb-3">
    <label for="namaPelanggan" class="form-label">Nama Pelanggan</label>
    <input type="text" name="nama_pelanggan" id="namaPelanggan" class="form-control" required>
</div>

        <button type="submit" class="btn btn-success">Proses Transaksi</button>
        <h4 class="mt-5">Daftar Pesanan</h4>
<table class="table table-bordered" id="pesananTable">
    <thead>
        <tr>
            <th>Nama Produk</th>
            <th>Karbo</th>
            <th>Saus</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody id="pesananList"></tbody>
</table>

<!-- Hidden field to hold JSON string of all items -->
<input type="hidden" name="data_transaksi" id="dataTransaksi">

    </form>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('kasir.proses') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="produk_id[]" id="modalProdukId">
                    <input type="hidden" name="jumlah[]" value="1">

                    <div class="mb-3">
                        <label>Nama Produk</label>
                        <input type="text" class="form-control" id="modalNamaProduk" readonly>
                    </div>

                    <div class="mb-3">
                        <label>Harga</label>
                        <input type="text" class="form-control" id="modalHarga" readonly>
                    </div>

                    <div class="mb-3" id="karboSelect">
                        <label>Pilih Karbo</label>
                        <select name="karbo[]" class="form-select" id="karboDropdown">
                            <option value="Rice">Rice</option>
                            <option value="Mashed Potato">Mashed Potato</option>
                            <option value="Sauted Baby Potato">Sauted Baby Potato</option>
                        </select>

                    </div>

                    <div class="mb-3" id="sausSelect">
                        <label>Pilih Saus</label>
                        <div id="sausOptions" class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input saus-check" name="saus[]" value="BBQ"> BBQ
                            </label><br>
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input saus-check" name="saus[]" value="Tartar"> Tartar
                            </label><br>
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input saus-check" name="saus[]" value="Hot BBQ"> Hot BBQ
                            </label><br>
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input saus-check" name="saus[]" value="Hundred Sambal"> Hundred Sambal
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Tambah ke Transaksi</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    let pesanan = [];

    function showDetail(id, nama, harga) {
        document.getElementById('modalProdukId').value = id;
        document.getElementById('modalNamaProduk').value = nama;
        document.getElementById('modalHarga').value = 'Rp' + harga.toLocaleString('id-ID');

        const lowerNama = nama.toLowerCase();
        const karboDiv = document.getElementById('karboSelect');
        const sausChecks = document.querySelectorAll('.saus-check');

        sausChecks.forEach(el => {
            el.checked = false;
            el.disabled = false;
        });

        if (lowerNama.includes('personal') || lowerNama.includes('combo')) {
            karboDiv.style.display = 'block';
            limitSausSelection(sausChecks, 1);
        } else if (lowerNama.includes('platter couple')) {
            karboDiv.style.display = 'block';
            limitSausSelection(sausChecks, 2);
        } else if (lowerNama.includes('platter chicken beef')) {
            karboDiv.style.display = 'block';
            limitSausSelection(sausChecks, 3);
        else if (lowerNama.includes('platter chicken beef')) {
    karboDiv.style.display = 'block';
    sausChecks.forEach(el => {
        el.disabled = false;
        el.checked = false;
    });
    limitSausSelection(sausChecks, 3);
    }
    else {
            karboDiv.style.display = 'none';
            limitSausSelection(sausChecks, 0);
        }
    }

    function limitSausSelection(checks, max) {
        checks.forEach(el => {
            el.onchange = function () {
                const checked = Array.from(checks).filter(c => c.checked);
                if (checked.length > max) {
                    this.checked = false;
                    alert('Maksimal ' + max + ' saus dipilih');
                }
            };
        });
    }

    // Intercept submit from modal
    document.querySelector('#detailModal form').addEventListener('submit', function (e) {
        e.preventDefault();

        const id = document.getElementById('modalProdukId').value;
        const nama = document.getElementById('modalNamaProduk').value;
        const karbo = document.querySelector('select[name="karbo[]"]')?.value || '-';
        const saus = Array.from(document.querySelectorAll('.saus-check'))
            .filter(c => c.checked)
            .map(c => c.value);

        pesanan.push({ id, nama, karbo, saus });

        updatePesananTable();

        // Close modal
        const modal = bootstrap.Modal.getInstance(document.getElementById('detailModal'));
        modal.hide();
    });

    function updatePesananTable() {
        const tbody = document.getElementById('pesananList');
        tbody.innerHTML = '';

        pesanan.forEach((item, index) => {
            const row = `
                <tr>
                    <td>${item.nama}</td>
                    <td>${item.karbo}</td>
                    <td>${item.saus.join(', ')}</td>
                    <td><button type="button" class="btn btn-danger btn-sm" onclick="hapusItem(${index})">Hapus</button></td>
                </tr>`;
            tbody.innerHTML += row;
        });

        // Update hidden input
        document.getElementById('dataTransaksi').value = JSON.stringify(pesanan);
    }

    function hapusItem(index) {
        pesanan.splice(index, 1);
        updatePesananTable();
    }
</script>

@endsection
