<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Toko Bobie</title>
  <link rel="shortcut icon" type="image/png" href="../asset/images/logos/favicon.png" />
  <link rel="stylesheet" href="{{ asset('/asset/css/styles.min.css') }}" />
</head>

<body>
  <!--  Body Wrapper -->
  <div style="background-color: #E8E8E8; min-height: 100vh" class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      @include('components.sidebar')
        </aside>
        <!--  Sidebar End -->

        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
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
        <div class="row">
          @yield('content')
        </div>
      </div>
    </div>
  </div>
  @include('sweetalert::alert')
  <script>
    // Mengambil elemen input harga beli, untung, dan harga jual
    const hargabeliInput = document.getElementById('hargabeli');
    const untungInput = document.getElementById('untung');
    const hargajualInput = document.getElementById('hargajual');
  
    // Mendengarkan perubahan pada input harga beli dan untung
    hargabeliInput.addEventListener('input', hitungHargaJual);
    untungInput.addEventListener('input', hitungHargaJual);
  
    // Fungsi untuk menghitung harga jual
    function hitungHargaJual() {
      // Mengambil nilai harga beli dan untung
      const hargabeli = parseFloat(hargabeliInput.value);
      const untung = parseFloat(untungInput.value);
  
      // Menghitung harga jual termasuk PPN
      const ppn = 0.11; // 11% atau 11 / 100
      const harga = hargabeli + untung + (hargabeli + untung) * ppn;
      const hargaJual = Math.ceil(harga / 10) * 10;
  
      // Menetapkan nilai harga jual pada input
      hargajualInput.value = hargaJual;
    }
  </script>

  <script src="{{ asset('asset/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('asset/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('asset/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('asset/js/app.min.js') }}"></script>
  <script src="{{ asset('asset/libs/simplebar/dist/simplebar.js') }}"></script>
</body>

</html>