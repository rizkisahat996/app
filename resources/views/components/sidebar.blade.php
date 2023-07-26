<!-- Sidebar scroll-->
<div style="background-color: #273248; height: 100%; overflow-y: scroll;">
    <div class="brand-logo d-flex align-items-center justify-content-between">
      <a href="/dashboard" class="text-nowrap logo-img">
        <img src="../asset/images/logos/bobie-logo.png" width="100%" alt="" />
      </a>
      <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
        <i class="ti ti-x fs-8"></i>
      </div>
    </div>
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav" class="mt-4">
          @if (auth()->user()->jabatan == 'superadmin')
            <li class="sidebar-item">
              <a style="color: white;" class="sidebar-link" href="/dashboard" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a  style="color: white;" class="sidebar-link" href="/barang" aria-expanded="false">
                <span>
                  <i class="ti ti-building-warehouse"></i>
                </span>
                <span class="hide-menu">Stok Barang</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a style="color: white;" class="sidebar-link" href="/penjualan" aria-expanded="false">
                <span>
                  <i class="ti ti-building-bank"></i>
                </span>
                <span class="hide-menu">Kasir</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a style="color: white;" class="sidebar-link" href="/piutang" aria-expanded="false">
                <span>
                  <i class="ti ti-brand-cashapp"></i>
                </span>
                <span class="hide-menu">Hutang-Piutang</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a style="color: white;" class="sidebar-link" href="/histori" aria-expanded="false">
                <span>
                  <i class="ti ti-history"></i>
                </span>
                <span class="hide-menu">History Data</span>
              </a>
            </li>
            {{-- <li class="sidebar-item">
              <a style="color: white;" class="sidebar-link" href="suratjalann" aria-expanded="false">
                <span>
                  <i class="ti ti-book-2"></i>
                </span>
                <span class="hide-menu">Surat Perjalanan</span>
              </a>
            </li> --}}
            <li class="sidebar-item">
              <a style="color: white;" class="sidebar-link" href="/pengguna" aria-expanded="false">
                <span>
                  <i class="ti ti-user"></i>
                </span>
                <span class="hide-menu">Data Karyawan</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a style="color: white;" class="sidebar-link" href="/pelanggan" aria-expanded="false">
                <span>
                  <i class="ti ti-user"></i>
                </span>
                <span class="hide-menu">Data Pelanggan</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a style="color: white;" class="sidebar-link" href="/laporan" aria-expanded="false">
                <span>
                  <i class="ti ti-checkup-list"></i>
                </span>
                <span class="hide-menu">Manajemen Laporan</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a style="color: white;" class="sidebar-link" href="/logout" aria-expanded="false">
                <span>
                  <i class="ti ti-door-exit"></i>
                </span>
                <span class="hide-menu">Logout</span>
              </a>
            </li>
          @else
            <li class="sidebar-item">
              <a style="color: white;" class="sidebar-link" href="/penjualan" aria-expanded="false">
                <span>
                  <i class="ti ti-building-bank"></i>
                </span>
                <span class="hide-menu">Kasir</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a style="color: white;" class="sidebar-link" href="/piutang" aria-expanded="false">
                <span>
                  <i class="ti ti-brand-cashapp"></i>
                </span>
                <span class="hide-menu">Hutang-Piutang</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a style="color: white;" class="sidebar-link" href="/logout" aria-expanded="false">
                <span>
                  <i class="ti ti-door-exit"></i>
                </span>
                <span class="hide-menu">Logout</span>
              </a>
            </li>
          @endif
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->