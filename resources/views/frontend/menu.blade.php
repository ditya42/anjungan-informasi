

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="d-flex align-items-center" style="margin-left: 20px; margin-right:20px">



      <h1 class="logo mr-auto"><img src="{{ asset('assets/img/tabalong.jpg') }}" width="35" height="40" />
        <a href="{{ route('index') }}">BKPP TABALONG</a></h1>
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
          {{-- <li class=""><a href="https://bkpp.tabalongkab.go.id/">Website BKPP</a></li> --}}
          {{-- <li class=""><a href="#layanan">Layanan</a></li>
          <li class=""><a href="#cara-lapor">Cara Lapor</a></li> --}}
          <li class="{{ (request()->is('contact')) ? 'active' : '' }}"><a href="{{ route('contact') }}">Kontak kami</a></li>

        </ul>
      </nav><!-- .nav-menu -->

        {{-- @if (Auth::check())
            <a href="{{ route('pengaduan.index') }}" class="get-started-btn">Halaman Pengaduan</a> --}}
            {{-- <a href="#" class="get-started-btn">Halo {{ Auth::user()->name }}</a> --}}
        {{-- @else
            <a href="{{ url('login') }}" class="get-started-btn">Login</a>
        @endif --}}


    </div>
  </header><!-- End Header -->

