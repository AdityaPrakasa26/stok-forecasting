<!-- Sidebar -->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="Light">
  <div class="sidebar-brand">
    <a href="{{ route('home.admin') }}" class="brand-link">
      <img src="{{ asset('image/logo.png')}}" alt="AdminLTE Logo" class="brand-image opacity-75 shadow" />
      <span class="brand-text fw-light"><strong>HUNDRED SMOKE</strong></span>
    </a>
  </div>

  <div class="sidebar-wrapper">
    <nav class="mt-2">
      <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
        <!-- Pengguna -->
        <li class="nav-item">
          <a href="{{ route('user.index') }}" class="nav-link {{ request()->routeIs('user.index') ? 'active' : '' }}">
            <i class="nav-icon bi bi-people"></i>
            <p>Pengguna</p>
          </a>
        </li>

        <!-- Kasir -->
        <li class="nav-item">
          <a href="{{ route('kasir.index') }}" class="nav-link {{ request()->routeIs('home.kasir') ? 'active' : '' }}">
            <i class="nav-icon bi bi-pc-display-horizontal"></i>
            <p>Kasir</p>
          </a>
        </li>

        <!-- Data -->
        @php
          $dataActive = request()->routeIs('data.stok') || request()->routeIs('data.transaksi') || request()->routeIs('data.penjualan') || request()->routeIs('data.bahan.baku');
        @endphp
        <li class="nav-item {{ $dataActive ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ $dataActive ? 'active' : '' }}">
            <i class="nav-icon bi bi-database"></i>
            <p>
              Data
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('data.stok') }}" class="nav-link {{ request()->routeIs('data.stok') ? 'active' : '' }}">
                <i class="nav-icon bi {{ request()->routeIs('data.stok') ? 'bi-circle-fill text-success' : 'bi-circle' }}"></i>
                <p>Stok</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('data.transaksi') }}" class="nav-link {{ request()->routeIs('data.transaksi') ? 'active' : '' }}">
                <i class="nav-icon bi {{ request()->routeIs('data.transaksi') ? 'bi-circle-fill text-success' : 'bi-circle' }}"></i>
                <p>Transaksi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('data.penjualan') }}" class="nav-link {{ request()->routeIs('data.penjualan') ? 'active' : '' }}">
                <i class="nav-icon bi {{ request()->routeIs('data.penjualan') ? 'bi-circle-fill text-success' : 'bi-circle' }}"></i>
                <p>Penjualan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('data.bahan.baku') }}" class="nav-link {{ request()->routeIs('data.bahan.baku') ? 'active' : '' }}">
                <i class="nav-icon bi {{ request()->routeIs('data.bahan.baku') ? 'bi-circle-fill text-success' : 'bi-circle' }}"></i>
                <p>Bahan Baku</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Perhitungan -->
        <li class="nav-item">
          <a href="{{ route('perhitungan.index') }}" class="nav-link {{ request()->routeIs('perhitungan.index') ? 'active' : '' }}">
            <i class="nav-icon bi bi-pie-chart-fill"></i>
            <p>Perhitungan</p>
          </a>
        </li>

        <!-- Produk -->
        @php
          $produkActive = request()->routeIs('data.produk') || request()->routeIs('data.bom');
        @endphp
        <li class="nav-item {{ $produkActive ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ $produkActive ? 'active' : '' }}">
            <i class="nav-icon bi bi-basket"></i>
            <p>
              Produk
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('data.produk') }}" class="nav-link {{ request()->routeIs('data.produk') ? 'active' : '' }}">
                <i class="nav-icon bi {{ request()->routeIs('data.produk') ? 'bi-circle-fill text-success' : 'bi-circle' }}"></i>
                <p>Product Knowledge</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('data.bom') }}" class="nav-link {{ request()->routeIs('data.bom') ? 'active' : '' }}">
                <i class="nav-icon bi {{ request()->routeIs('data.bom') ? 'bi-circle-fill text-success' : 'bi-circle' }}"></i>
                <p>BOM</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Laporan -->
        @php
          $laporanActive = request()->routeIs('laporan.stok') || request()->routeIs('laporan.penjualan');
        @endphp
        <li class="nav-item {{ $laporanActive ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ $laporanActive ? 'active' : '' }}">
            <i class="nav-icon bi bi-table"></i>
            <p>
              Laporan
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('laporan.stok') }}" class="nav-link {{ request()->routeIs('laporan.stok') ? 'active' : '' }}">
                <i class="nav-icon bi {{ request()->routeIs('laporan.stok') ? 'bi-circle-fill text-success' : 'bi-circle' }}"></i>
                <p>Stok</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('laporan.penjualan') }}" class="nav-link {{ request()->routeIs('laporan.penjualan') ? 'active' : '' }}">
                <i class="nav-icon bi {{ request()->routeIs('laporan.penjualan') ? 'bi-circle-fill text-success' : 'bi-circle' }}"></i>
                <p>Penjualan</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Keluar -->
        <li class="nav-item">
          <a href="{{ route('auth.login') }}" class="nav-link {{ request()->routeIs('auth.login') ? 'active' : '' }}">
            <i class="nav-icon bi bi-box-arrow-in-right" style="color: red"></i>
            <p>Keluar</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
