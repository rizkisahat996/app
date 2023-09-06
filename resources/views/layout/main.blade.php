<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Toko Bobie</title>
  <link rel="shortcut icon" type="image/png" href="../asset/images/logos/favicon.png" />
  <link rel="stylesheet" href="{{ asset('/asset/css/styles.min.css') }}" />
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
  
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
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
    const kategoriSelect = document.getElementById('id_kategori');
    const ppnSelect = document.getElementById('ppn');

    // Mendengarkan perubahan pada input harga beli, untung, dan kategori
    hargabeliInput.addEventListener('input', hitungHargaJual, updateUntung);
    untungInput.addEventListener('input', hitungHargaJual);
    kategoriSelect.addEventListener('change', updateUntung);
    ppnSelect.addEventListener('input', hitungHargaJual);

    // Fungsi untuk menghitung harga jual
    function hitungHargaJual() {
      // Mengambil nilai harga beli dan untung
      const hargabeli = parseFloat(hargabeliInput.value);
      const untung = parseFloat(untungInput.value);

        const hargaa = hargabeli + untung;
        const hargappn = ppnSelect.checked ? hargabeli * 0.11 : 0;
        const harga = hargaa + hargappn;
        const hargaJual = Math.ceil(harga / 100) * 100;

        hargajualInput.value = hargaJual;

    }

    // Fungsi untuk memperbarui nilai "untung" berdasarkan kategori yang dipilih
    function updateUntung() {
      const selectedCategory = kategoriSelect.value;
      const hargabeli = parseFloat(hargabeliInput.value);

      if (selectedCategory === '1') {
        untungInput.value = 1800;
      } else if (selectedCategory === '2') {
        untungInput.value = 1800;
      } else {
        untungInput.value = 10000;
      }

      hitungHargaJual(); // Update harga jual based on the new "untung" value
    }
  </script>

  <script src="{{ asset('asset/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('asset/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('asset/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('asset/js/app.min.js') }}"></script>
  <script src="{{ asset('asset/libs/simplebar/dist/simplebar.js') }}"></script>
  <!-- Page level plugins -->
  <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  
  <!-- Page level custom scripts -->
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
</body>

</html>