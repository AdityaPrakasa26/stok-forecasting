<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="Light">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
      <!--begin::Brand Link-->
      <a href="{{ route('home.admin') }}" class="brand-link">
        <!--begin::Brand Image-->
        <img
          src="{{ asset('image/logo.png')}}"
          alt="AdminLTE Logo"
          class="brand-image opacity-75 shadow"
        />
        <!--end::Brand Image-->
        <!--begin::Brand Text-->
        <span class="brand-text fw-light">HUNDRED SMOKE</span>
        <!--end::Brand Text-->
      </a>
      <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
      <nav class="mt-2">
        <!--begin::Sidebar Menu-->
        <ul
          class="nav sidebar-menu flex-column"
          data-lte-toggle="treeview"
          role="menu"
          data-accordion="false"
        >
        <li class="nav-item">
            <a href="{{ route('user.index') }}"
                       class="nav-link {{ request()->routeIs('user.index') ? 'active' : '' }}">
              <i class="nav-icon bi bi-people"></i>
              <p>Pengguna</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-database"></i>
              <p>
                Data
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('data.stok') }}"
                     class="nav-link {{ request()->routeIs('data.stok') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Stok</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('data.penjualan') }}"
                     class="nav-link {{ request()->routeIs('data.penjualan') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Penjualan</p>
                  </a>
                </li>
              </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('perhitungan.index') }}"
                       class="nav-link {{ request()->routeIs('perhitungan.index') ? 'active' : '' }}">
              <i class="nav-icon bi bi-pie-chart"></i>
              <p>Perhitungan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-basket"></i>
              <p>
                Produk
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('produk.knowledge') }}"
                     class="nav-link {{ request()->routeIs('produk.knowledge') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Product Knowledge</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('produk.BOM') }}"
                     class="nav-link {{ request()->routeIs('produk.BOM') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>BOM</p>
                  </a>
                </li>
              </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-table"></i>
              <p>
                Laporan
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('laporan.stok') }}"
                       class="nav-link {{ request()->routeIs('laporan.stok') ? 'active' : '' }}">
                      <i class="nav-icon bi bi-circle"></i>
                  <p>Stok</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('laporan.penjualan') }}"
                   class="nav-link {{ request()->routeIs('laporan.penjualan') ? 'active' : '' }}">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Penjualan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('auth.login') }}"
                class="nav-link{{ request()->routeIs('auth.login') ? 'active' : '' }}"">
              <i class="nav-icon bi bi-box-arrow-in-right" style="color: red"></i>
              <p>Keluar</p>
            </a>
          </li>
        </ul>
        <!--end::Sidebar Menu-->
      </nav>
    </div>
    <!--end::Sidebar Wrapper-->
  </aside>
