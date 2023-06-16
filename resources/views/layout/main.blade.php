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
        const hargaJual = hargabeli + untung + (hargabeli + untung) * ppn;

        // Menetapkan nilai harga jual pada input dengan 3 digit desimal
        hargajualInput.value = hargaJual.toFixed(3);
    }
</script>

  <script src="{{ asset('asset/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('asset/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('asset/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('asset/js/app.min.js') }}"></script>
  <script src="{{ asset('asset/libs/simplebar/dist/simplebar.js') }}"></script>
</body>

</html>

{{-- <!doctype html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Propeller Admin Dashboard">
    <meta content="width=device-width, initial-scale=1, user-scalable=no" name="viewport">

    <title>Toko Bobie</title>

    <!-- Google icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/css/propeller.min.css">
    <!-- /build -->


    <!-- Propeller date time picker css-->
    <!-- build:[href] components/datetimepicker/css/ -->
    <link rel="stylesheet" type="text/css" href="/components/datetimepicker/css/bootstrap-datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="/components/datetimepicker/css/pmd-datetimepicker.css" />
    <!-- /build -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- Propeller theme css-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Propeller admin theme css-->
    <link rel="stylesheet" type="text/css" href="/themes/css/propeller-admin.css">
    <link rel="stylesheet" href="{{ asset('r.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/cf4dce0a52.js" crossorigin="anonymous"></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!--Google Analytics code-->
    @stack('css')
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-124615-22', 'auto');
        ga('send', 'pageview');
    </script>
</head>

<!-- Styles Ends -->

<body>
    <!-- Header Starts -->
    <!--Start Nav bar -->
    @include('components.navbar')
    <!--End Nav bar -->
    <!-- Header Ends -->

    <!-- Sidebar Starts -->

    @include('sweetalert::alert')

    <!-- Left sidebar -->
    @include('components.sidebar')
    <!-- End Left sidebar -->
    <!-- Sidebar Ends -->

    <!--content area start-->
    <div id="content" class="pmd-content content-area dashboard">

        <div class="container-fluid">
            <div class="row " id="card-masonry">

                <!-- Today's Site Activity -->
                @yield('content')
            </div>
        </div>

    </div>
    <!--end content area-->

    <!-- Footer Starts -->
    <!--footer start-->

    <!--footer end-->
    <!-- Footer Ends -->

    <!-- Scripts Starts -->
    <!-- build:[src] assets/js/ -->
    <script src="/assets/js/jquery-1.12.2.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/bootstrap.js"></script>
    <!-- /build -->

    <!-- build:[src] assets/js/ -->
    <script src="/assets/js/propeller.min.js"></script>
    <!-- /build -->

    <!-- Javascript for revenue progressbar animation effect-->

    <!-- Javascript for revenue progressbar animation effect-->


    <!--circle chart-->
    <script src="themes/js/circles.min.js"></script>


    <!--staked column chart for payment-->
    <script src="/themes/js/highcharts.js"></script>
    <script src="/themes/js/highcharts-more.js"></script>

    <!-- Payment chart js-->

    <!-- Scripts Ends -->
    <!-- Javascript for Datepicker -->
    <!-- build:[src] components/datetimepicker/js/ -->
    <script type="text/javascript" language="javascript" src="/components/datetimepicker/js/moment-with-locales.js">
    </script>
    <script type="text/javascript" language="javascript" src="/components/datetimepicker/js/bootstrap-datetimepicker.js">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <!-- /build -->
    <script>
        // Linked date and time picker
        // start date date and time picker
        $('#datepicker-default').datetimepicker();
        $(".auto-update-year").html(new Date().getFullYear());
    </script>

    sta

</body>

</html> --}}
