<!-- Sidebar scroll-->
<div>
    <div class="brand-logo d-flex align-items-center justify-content-between">
      <a href="./index.html" class="text-nowrap logo-img">
        <img src="../asset/images/logos/bobie-logo.png" width="180" alt="" />
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
              <a class="sidebar-link" href="/dashboard" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/barang" aria-expanded="false">
                <span>
                  <i class="ti ti-building-warehouse"></i>
                </span>
                <span class="hide-menu">Barang</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/pengguna" aria-expanded="false">
                <span>
                  <i class="ti ti-user"></i>
                </span>
                <span class="hide-menu">Manajemen Pengguna</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/penjualan" aria-expanded="false">
                <span>
                  <i class="ti ti-building-bank"></i>
                </span>
                <span class="hide-menu">Kasir</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/piutang" aria-expanded="false">
                <span>
                  <i class="ti ti-brand-cashapp"></i>
                </span>
                <span class="hide-menu">Hutang-Piutang</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/laporan" aria-expanded="false">
                <span>
                  <i class="ti ti-checkup-list"></i>
                </span>
                <span class="hide-menu">Manajemen Laporan</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/histori" aria-expanded="false">
                <span>
                  <i class="ti ti-history"></i>
                </span>
                <span class="hide-menu">History Data</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/logout" aria-expanded="false">
                <span>
                  <i class="ti ti-door-exit"></i>
                </span>
                <span class="hide-menu">Logout</span>
              </a>
            </li>
          @else
            <li class="sidebar-item">
              <a class="sidebar-link" href="/barang" aria-expanded="false">
                <span>
                  <i class="ti ti-building-warehouse"></i>
                </span>
                <span class="hide-menu">Barang</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/penjualan" aria-expanded="false">
                <span>
                  <i class="ti ti-building-bank"></i>
                </span>
                <span class="hide-menu">Kasir</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/piutang" aria-expanded="false">
                <span>
                  <i class="ti ti-brand-cashapp"></i>
                </span>
                <span class="hide-menu">Hutang-Piutang</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/logout" aria-expanded="false">
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

   
   {{-- <aside
        class="pmd-sidebar sidebar-default pmd-sidebar-slide-push pmd-sidebar-left pmd-sidebar-open bg-fill-darkblue sidebar-with-icons   col-3"
        role="navigation" id="side" style="background-color: #4f4424 !important; widht: 100px !important; " >
        @if (auth()->user()->jabatan == 'superadmin')

        <ul class="nav pmd-sidebar-nav text-white py-4 px-2   gap-2   ">

            <!-- User info -->

            <a href="/dashboard" class="nav-link active" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-house-door-fill me-2 fs-4"></i><p class="mt-2">Dashboard</p></li>
            </a>
            <a href="/barang" class="nav-link active" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-basket3-fill me-2 fs-4"></i><p class="mt-2">Barang</p></li>
            </a>
            <a href="/pengguna" class="nav-link active" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-people-fill me-2 fs-4"></i><p class="mt-2">Manajemen Pengguna</p></li>
            </a>
            <a href="/penjualan" class="nav-link active d-inline" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-cart-fill me-2 fs-4"></i><p class="mt-2">Kasir</p></li>
            </a>
            <a href="/piutang" class="nav-link active d-inline" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-chat-left-dots-fill me-2 fs-4"></i><p class="mt-2">Hutang-Piutang</p></li>
            </a>
            <a href="/laporan" class="nav-link active d-inline" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-bag-check-fill me-2 fs-4"></i><p class="mt-2">Manajemen Laporan</p></li>
            </a>

            <a href="/histori" class="nav-link active d-inline" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-clock-history me-2 fs-4"></i><p class="mt-2">Histori Data </p></li>
            </a>
            <a href="/logout" class="nav-link active d-inline" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-box-arrow-left me-2 fs-4"></i><p class="mt-2">Logout</p></li>
            </a>





        </ul>
        @elseif(auth()->user()->jabatan == 'admin')
        <ul class="nav pmd-sidebar-nav text-white py-4 px-2   gap-2   ">

            <!-- User info -->

            <a href="/dashboard" class="nav-link active" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-house-door-fill me-2 fs-4"></i><p class="mt-2">Dashboard</p></li>
            </a>
            <a href="/barang" class="nav-link active" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-basket3-fill me-2 fs-4"></i><p class="mt-2">Barang</p></li>
            </a>
            <a href="/pengguna" class="nav-link active" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-people-fill me-2 fs-4"></i><p class="mt-2">Manajemen Pengguna</p></li>
            </a>
            <a href="/penjualan" class="nav-link active d-inline" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-cart-fill me-2 fs-4"></i><p class="mt-2">Kasir</p></li>
            </a>
            <a href="/piutang" class="nav-link active d-inline" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-chat-left-dots-fill me-2 fs-4"></i><p class="mt-2">Hutang-Piutang</p></li>
            </a>


            <a href="/logout" class="nav-link active d-inline" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-box-arrow-left me-2 fs-4"></i><p class="mt-2">Logout</p></li>
            </a>





        </ul>

        @else
        <ul class="nav pmd-sidebar-nav text-white py-4 px-2   gap-2   ">

            <!-- User info -->


            <a href="/barang" class="nav-link active" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-basket3-fill me-2 fs-4"></i><p class="mt-2">Manajemen Barang</p></li>
            </a>

            <a href="/penjualan" class="nav-link active d-inline" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-cart-fill me-2 fs-4"></i><p class="mt-2">Kasir</p></li>
            </a>
            <a href="/piutang" class="nav-link active d-inline" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-chat-left-dots-fill me-2 fs-4"></i><p class="mt-2">Hutang-Piutang</p></li>
            </a>


            <a href="/logout" class="nav-link active d-inline" id="nav" >
                <li class="d-flex gap-2"><i class="bi bi-box-arrow-left me-2 fs-4"></i><p class="mt-2">Logout</p></li>
            </a>





        </ul>
        @endif
    </aside> --}}
