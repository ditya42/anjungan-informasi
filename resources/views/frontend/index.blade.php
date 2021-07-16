
@extends('frontend.layout')

@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-top">
    <div class="position-absolute full" style="margin-left: 20px; margin-top: 70px" data-aos="zoom-in" data-aos-delay="100">
      <h1>Selamat Datang Di <br></h1>
      <h1>Anjungan Informasi BKPP Tabalong</h1><br><br>


      <h2>Menu</h2>
      <div class ="wrapper">

        <div class ="item col-2">
            <a href="" >
            <div>
            <img src="{{ asset('assets/img/map.jpg') }}" alt="" width="80" height="80">
            <h5>Denah BKPP</h5>
            <h6>Gambar Denah BKPP Tabalong<h6>
            </div>
            </a>
        </div>


        <div class ="item col-2">
            <a href="" >
            <div>
            <img src="{{ asset('assets/img/antrian.jpg') }}" alt="" width="100" height="100">
            <h5>Informasi Antrian</h5>
            <h6>Layanan BKPP Tabalong<h6>
            </div>
            </a>
        </div>



      </div>

      <br>
      <h2>Layanan BKPP</h2>
      <div class ="wrapper">


        @foreach ($subbidang as $bidang)
                <div class ="item col-2">
                    <a href="{{ route('frontend.layanan', ['id'=> $bidang->subbidang_id]) }}" >
                    <div>
                    <img src="{{ asset('images/anjungan/' . $bidang->avatar) }}" alt="" width="75" height="75">

                    <h6>{{ $bidang->nama_subbidang }}<h6>
                    </div>
                    </a>
                </div>
        @endforeach



        {{-- <div class ="item col-2">
            <a href="{{ route('layanan', ['id'=> 2]) }}" >
            <div>
            <img src="{{ asset('assets/img/data.jpg') }}" alt="" width="75" height="75">

            <h6>Sub Bidang Pengadaan Data dan Informasi<h6>
            </div>
            </a>
        </div>

        <div class ="item col-2">
            <a href="{{ route('layanan', ['id'=> 1]) }}" >
            <div>
            <img src="{{ asset('assets/img/hukum.jpg') }}" alt="" width="75" height="75">

            <h6>Sub Bidang Pembinaan Kedudukan Hukum dan Pensiun<h6>
            </div>
            </a>
        </div>

        <div class ="item col-2">
            <a href="" >
            <div>
            <img src="{{ asset('assets/img/jasa-pindah-rumah-1.jpg') }}" alt="" width="90" height="75">

            <h6>Sub Bidang Mutasi<h6>
            </div>
            </a>
        </div>

        <div class ="item col-2">
            <a href="" >
            <div>
            <img src="{{ asset('assets/img/kompetensi2.jpg') }}" alt="" width="90" height="75">

            <h6>Sub Bidang Pengembangan dan Kompetensi<h6>
            </div>
            </a>
        </div>

        <div class ="item col-2">
            <a href="" >
            <div>
            <img src="{{ asset('assets/img/kesejahteraan.jpg') }}" alt="" width="90" height="75">

            <h6>Sub Bidang Kesejahteraan dan Fasilitasi Profesi ASN<h6>
            </div>
            </a>
        </div>

        <div class ="item col-2">
            <a href="" >
            <div>
            <img src="{{ asset('assets/img/diklat.jpg') }}" alt="" width="90" height="75">

            <h6>Sub Bidang Pendidikan dan Pelatihan<h6>
            </div>
            </a>
        </div> --}}

    </div>















      </div>


    </div>



  </section><!-- End Hero -->




  @stop
