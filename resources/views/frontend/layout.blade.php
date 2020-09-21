<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BKPP Tabalong</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon2.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">




{{--

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet"> --}}

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

  {{-- <link href="assets/css/style.css" rel="stylesheet"> --}}

  <!-- =======================================================
  * Template Name: Mentor - v2.1.0
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">



      <h1 class="logo mr-auto"><img src="{{ asset('assets/img/tabalong.jpg') }}" width="35" height="40" />
        <a href="{{ route('index') }}">WBS-BKPP TABALONG</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="{{ (request()->is('/')) ? 'active' : '' }}" ><a href="{{ route('index') }}">Home</a></li>

          </li>
              {{-- <li><a href="#">Drop Down 1</a></li>
              <li class="drop-down"><a href="#">Deep Drop Down</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li> --}}

          </li>
          <li class=""><a href="https://bkpp.tabalongkab.go.id/">Website BKPP</a></li>
          <li class=""><a href="#layanan">Layanan</a></li>
          <li class=""><a href="#cara-lapor">Cara Lapor</a></li>
          <li class="{{ (request()->is('contact')) ? 'active' : '' }}"><a href="{{ route('contact') }}">Kontak kami</a></li>

        </ul>
      </nav><!-- .nav-menu -->

        @if (Auth::check())
            <a href="{{ route('pengaduan.index') }}" class="get-started-btn">Halaman Pengaduan</a>
            {{-- <a href="#" class="get-started-btn">Halo {{ Auth::user()->name }}</a> --}}
        @else
            <a href="{{ url('login') }}" class="get-started-btn">Login</a>
        @endif


    </div>
  </header><!-- End Header -->






  @yield('content')










   <!-- ======= Footer ======= -->
   <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>BKPP Tabalong</h3>

              <strong>Telepon:</strong> (0526) 2021511<br>
              <strong>Email:</strong> bkpptabalon@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Link</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('index') }}">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://bkpp.tabalongkab.go.id/">Website BKPP</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('contact') }}">Kontak BKPP</a></li>

            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>HyperLink</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#layanan">Layanan</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#cara-lapor">Cara Lapor</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Kembali ke atas</a></li>

            </ul>
          </div>



          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Alamat</h4>
            <p>
                Jl. Tanjung Selatan, <br>
                Mabuun, Murung Pudak, <br>
                Kabupaten Tabalong, <br>
                Kalimantan Selatan 71571. <br><br>

          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright <strong><span>BKPP Tabalong</span></strong>. All Rights Reserved
        </div>

    </div>
    <div class="social-links text-center text-md-right pt-3 pt-md-0">

      <a href="https://www.facebook.com/groups/1384931055093898/" class="facebook"><i class="bx bxl-facebook"></i></a>
      <a href="https://www.instagram.com/bkpp_tabalong/" class="instagram"><i class="bx bxl-instagram"></i></a>
      <a href="https://www.youtube.com/channel/UCQXHZdQ72apDyOfU1nZ3YnQ" class="youtube"><i class="bx bxl-youtube"></i></a>


    </div>

      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">



      </div>
    </div>
  </footer><!-- End Footer -->






  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
  <div id="preloader"></div>






  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>

  {{-- <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script> --}}

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

  {{-- <script src="assets/js/main.js"></script> --}}
</body>






</body>

</html>
