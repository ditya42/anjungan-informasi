
@extends('frontend.layout')

@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-top">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>Selamat Datang Di <br></h1>
      <h1>WHISTLE BLOWING SYSTEM</h1><br>
      <h1>BKPP Tabalong</h1>
      {{-- <a href="courses.html" class="btn-get-started">Get Started</a> --}}
    </div>
  </section><!-- End Hero -->

  <main id="main">


<!-- ======= About Section ======= -->
<section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>About</h2>
        <p>WHISTLE BLOWING SYSTEM</p>
      </div>

      <div class="row">
        <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
          <img src="{{ asset('assets/img/tugas-pokok-bkpp-image.jpg') }}" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
          <h3>Sekilas Tentang Whistle Blowing System BKPP.</h3><br>
          <p class="font-italic">
            Aplikasi WBS BKPP Tabalong adalah aplikasi pengelolaan dan tindak lanjut pengaduan serta pelaporan hasil pengelolaan pengaduan yang disediakan oleh Badan Kepegawaian Pendidikan dan Pelatihan Kabupaten Tabalong sebagai salah satu sarana bagi setiap pejabat/pegawai BKPP Kabupaten Tabalong sebagai pihak internal maupun masyarakat luas/PNS pengguna layanan BKPP Kabupaten Tabalong sebagai pihak eksternal untuk melaporkan dugaan adanya pelanggaran dan/atau ketidakpuasan terhadap pelayanan yang dilakukan/diberikan oleh pejabat/pegawai BKPP Tabalong.
          </p>
          <p>Untuk anda (pegawai/masyarakat) yang mengetahui dan ingin melaporkan indikasi pelanggaran di lingkungan BKPP Tabalong, tapi merasa sungkan atau takut identitasnya terungkap, anda bisa menggunakan fasilitas ini, karena kerahasiaan identitas dan pelaporan anda akan dijamin.</p>




          {{-- <ul>
            <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
            <li><i class="icofont-check-circled"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
            <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
          </ul>
          <p>
            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
          </p> --}}



        </div>
      </div>

    </div>
  </section><!-- End About Section -->


    <!-- ======= Trainers Section ======= -->
    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up" id="layanan">

        <div class="section-title">
          <h2>Layanan</h2>
          <p>Tentang Layanan WBS BKPP</p>
        </div>

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="{{ asset('assets/img/easy.png') }}"  width="300" height="300" alt="">
              <div class="member-content">
                <h4>MUDAH DIGUNAKAN</h4>
                {{-- <span>Web Development</span> --}}
                <p>
                    Layanan WBS sangat mudah digunakan, Anda tinggal login ke dalam aplikasi dan masukkan kejadian yang mengindikasikan kecurangan di lingkup BKPP Tabalong.
                </p>
                {{-- <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div> --}}
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="{{ asset('assets/img/secret.png') }}"  width="300" height="300" alt="">
              <div class="member-content">
                <h4>KERAHASIAAN DATA</h4>
                {{-- <span>Marketing</span> --}}
                <p>
                    Data Anda akan dijamin kerahasiaannya oleh kami. Anda boleh menggunakan nama samaran dalam melakukan laporan agar data Anda tetap rahasia.
                </p>
                {{-- <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div> --}}
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="{{ asset('assets/img/help.png') }}"  width="300" height="300" alt="">
              <div class="member-content">
                <h4>MEMBANTU PEMERINTAH</h4>
                {{-- <span>Content</span> --}}
                <p>
                    Dengan menggunakan layanan ini, maka Anda ikut membantu pemerintah dalam meminimalisir penyelewangan tugas dan wewenang yang terjadi di lingkup BKPP Tabalong.
                </p>
                {{-- <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div> --}}
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Trainers Section -->

<!-- ======= Cara Melapor Section ======= -->
<section id="trainers" class="trainers">
    <div class="container" data-aos="fade-up" id="cara-lapor">

      <div class="section-title">
        <h2>Cara Melapor</h2>
        <p>CARA MEMBUAT LAPORAN</p>
      </div>

      <div class="row" data-aos="zoom-in" data-aos-delay="100">
        <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
          <div class="member">
            <img src="{{ asset('assets/img/register.png') }}"  width="250" height="250" alt="">
            <div class="member-content">
              <h4>BUAT AKUN</h4>
              {{-- <span>Web Development</span> --}}
              <p>
                Pertama silahkan daftarkan diri Anda ke layanan WBS, Anda boleh menggunakan identitas samaran.
              </p>
              {{-- <div class="social">
                <a href=""><i class="icofont-twitter"></i></a>
                <a href=""><i class="icofont-facebook"></i></a>
                <a href=""><i class="icofont-instagram"></i></a>
                <a href=""><i class="icofont-linkedin"></i></a>
              </div> --}}
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
          <div class="member">
            <img src="{{ asset('assets/img/login.jpg') }}"  width="250" height="250" alt="">
            <div class="member-content">
              <h4>LOGIN</h4>
              {{-- <span>Marketing</span> --}}
              <p>
                Setelah melakukan pendaftaran, langkah selanjutnya silahkan melakukan login ke dalam layanan!
              </p>
              {{-- <div class="social">
                <a href=""><i class="icofont-twitter"></i></a>
                <a href=""><i class="icofont-facebook"></i></a>
                <a href=""><i class="icofont-instagram"></i></a>
                <a href=""><i class="icofont-linkedin"></i></a>
              </div> --}}
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
          <div class="member">
            <img src="{{ asset('assets/img/laporan.png') }}"  width="250" height="250" alt="">
            <div class="member-content">
              <h4>BUAT LAPORAN</h4>
              {{-- <span>Content</span> --}}
              <p>
                  Isi formulir yang telah disediakan beserta bukti laporan dan klik kirim
              </p>
              {{-- <div class="social">
                <a href=""><i class="icofont-twitter"></i></a>
                <a href=""><i class="icofont-facebook"></i></a>
                <a href=""><i class="icofont-instagram"></i></a>
                <a href=""><i class="icofont-linkedin"></i></a>
              </div> --}}
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="{{ asset('assets/img/tunggu.png') }}"  width="250" height="250" alt="">
              <div class="member-content">
                <h4>TUNGGU</h4>
                {{-- <span>Content</span> --}}
                <p>
                    Data Anda kemudian kami tindaklanjuti tanpa mengabaikan kerahasiaan dan identitas Anda.
                </p>
                {{-- <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div> --}}
              </div>
            </div>
          </div>

      </div>

    </div>
  </section><!-- End Trainers Section -->


  </main><!-- End #main -->


  @stop
