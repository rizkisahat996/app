<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gudang Bobie</title>
  <link rel="shortcut icon" type="image/png" href="../asset/images/logos/favicon.png" />
  <link rel="stylesheet" href="{{ asset('/asset/css/styles.min.css') }}" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
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
                <li class="sidebar-item">
                  <a class="sidebar-link" href="./index.html" aria-expanded="false">
                    <span>
                      <i class="ti ti-layout-dashboard"></i>
                    </span>
                    <span class="hide-menu">Dashboard</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a class="sidebar-link" href="./index.html" aria-expanded="false">
                    <span>
                      <i class="ti ti-building-warehouse"></i>
                    </span>
                    <span class="hide-menu">Barang</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a class="sidebar-link" href="./index.html" aria-expanded="false">
                    <span>
                      <i class="ti ti-user"></i>
                    </span>
                    <span class="hide-menu">Manajemen Pengguna</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a class="sidebar-link" href="./index.html" aria-expanded="false">
                    <span>
                      <i class="ti ti-building-bank"></i>
                    </span>
                    <span class="hide-menu">Kasir</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a class="sidebar-link" href="./index.html" aria-expanded="false">
                    <span>
                      <i class="ti ti-brand-cashapp"></i>
                    </span>
                    <span class="hide-menu">Hutang-Piutang</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a class="sidebar-link" href="./index.html" aria-expanded="false">
                    <span>
                      <i class="ti ti-checkup-list"></i>
                    </span>
                    <span class="hide-menu">Manajemen Laporan</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a class="sidebar-link" href="./index.html" aria-expanded="false">
                    <span>
                      <i class="ti ti-history"></i>
                    </span>
                    <span class="hide-menu">History Data</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a class="sidebar-link" href="./index.html" aria-expanded="false">
                    <span>
                      <i class="ti ti-door-exit"></i>
                    </span>
                    <span class="hide-menu">Logout</span>
                  </a>
                </li>
              </ul>
            </nav>
            <!-- End Sidebar navigation -->
          </div>
          <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->

        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
              <nav class="navbar navbar-expand-lg navbar-light">
                <ul class="navbar-nav">
                  <li class="nav-item d-block d-xl-none">
                    <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                      <i class="ti ti-menu-2"></i>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                      <i class="ti ti-bell-ringing"></i>
                      <div class="notification bg-primary rounded-circle"></div>
                    </a>
                  </li>
                </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Sample Page</h5>
            <p class="mb-0">This is a sample page </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../asset/libs/jquery/dist/jquery.min.js"></script>
  <script src="../asset/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../asset/js/sidebarmenu.js"></script>
  <script src="../asset/js/app.min.js"></script>
  <script src="../asset/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>
