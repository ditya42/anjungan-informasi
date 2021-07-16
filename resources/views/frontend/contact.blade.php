
  @extends('frontend.layoutkontak')

  @section('content')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Kontak BKPP Tabalong</h2>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div data-aos="fade-up">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1616.8640651552093!2d115.40435102959697!3d-2.1767186865229227!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dfab3766be99901%3A0x927f1c7994e868!2sBKD%20Tabalong!5e0!3m2!1sen!2sid!4v1594884989369!5m2!1sen!2sid" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Alamat:</h4>
                <p>Jl. Tanjung Selatan, Mabuun, Murung Pudak, Kabupaten Tabalong, Kalimantan Selatan 71571</p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>bkpptabalon@gmail.com</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Telepon:</h4>
                <p>(0526) 2021511</p>
              </div>

              <br><br>
              <div class="tombol">
              <a href="{{ route('index') }}"><button type="button" class="btn btn-success"><i class="icofont-arrow-left"></i>
                <p class="terang">Kembali</p>
                <p class="terang">ke Halaman Utama</p>

            </button></a>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                <img src="{{ asset('assets/img/BKPP2.jpg') }}" alt="" width="700" height="400">
              </div>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  @endsection
