
@extends('frontend.layoutlayanan')

@section('content')
<!-- ======= Cource Details Section ======= -->
<section id="course-details" class="course-details">
    <div class="container" data-aos="fade-up">

      <div class="row" style="margin-top: 40px">

        <div class="col-lg-12">
            <img src="assets/img/course-details.jpg" class="img-fluid" alt="">
            <h3>Nama Layanan</h3>
             <h4 style="color:rgb(0, 155, 59)">{{ $layanan->nama_layanan }}</h4>
          </div>
          <div class="col-lg-4">
          </div>


        <div class="col-lg-12">
          <img src="assets/img/course-details.jpg" class="img-fluid" alt="">
          <h3>Persyaratan</h3>
          <ol type = "1">
              @foreach ($persyaratan as $syarat)
              <li>{{ $syarat->uraian_persyaratan }}</li>
              @endforeach
         </ol>
        </div>
        <div class="col-lg-4">
        </div>
      </div>



      <div class="row" style="margin-top: 0px">
        <div class="col-lg-12">
          <img src="assets/img/course-details.jpg" class="img-fluid" alt="">
          <h3>Sistem Mekanisme Prosedur</h3>
          <ol type = "1">

            @foreach ($prosedur as $dur)
            <li>{{ $dur->uraian_prosedur }}</li>
            @endforeach
         </ol>

        </div>
        <div class="col-lg-4">
        </div>
      </div>



      <div class="row" style="margin-top: 0px">
        <div class="col-lg-12">
          <img src="assets/img/course-details.jpg" class="img-fluid" alt="">
          <h3>Dasar Hukum</h3>
          <ol type = "1">
            @foreach ($dasarhukum as $kum)
            <li>{{ $kum->nama_peraturan }} {{ $kum->tentang }}</li>
            @endforeach
         </ol>

        </div>
        <div class="col-lg-4">
        </div>
      </div>

      <div class="row" style="margin-top: 0px">
        <div class="col-lg-12">
          <img src="assets/img/course-details.jpg" class="img-fluid" alt="">
          <h3>Waktu Penyelesaian</h3>
          <ul>
            @foreach ($penyelesaian as $sai)
            <li>{{ $sai->uraian_penyelesaian }}</li>
            @endforeach
          </ul>

        </div>
        <div class="col-lg-4">
        </div>
      </div>




      <div class="row" style="margin-top: 0px">
        <div class="col-lg-12">
          <img src="assets/img/course-details.jpg" class="img-fluid" alt="">
          <h3>Tarif/Biaya</h3>
          <ul>

            <li>{{ $layanan->biaya }}</li>

          </ul>
        </div>
        <div class="col-lg-4">
        </div>
      </div>


      <div class="row" style="margin-top: 0px">
        <div class="col-lg-12">
          <img src="assets/img/course-details.jpg" class="img-fluid" alt="">
          <h3>Kompetensi Pelaksana</h3>
          <ol type = "1">
            @foreach ($pelaksana as $sana)
            <li>{{ $sana->uraian_kompetensi_pelaksana }} </li>
            @endforeach
         </ol>

        </div>
        <div class="col-lg-4">
        </div>
      </div>


      <div class="row" style="margin-top: 0px">
        <div class="col-lg-12">
          <img src="assets/img/course-details.jpg" class="img-fluid" alt="">
          <h3>Pelayanan Aduan</h3>
          <ol type = "1">
            @foreach ($aduan as $ad)
            <li>{{ $ad->uraian_pengelolaan_aduan }} </li>
            @endforeach
         </ol>
        </div>
        <div class="col-lg-4">
        </div>
      </div>


      <div class="row" style="margin-top: 0px">
        <div class="col-lg-12">
          <img src="assets/img/course-details.jpg" class="img-fluid" alt="">
          <h3>Produk Layanan</h3>
          <ul>
            @foreach ($produk as $prod)
            <li>{{ $prod->uraian_produk }} </li>
            @endforeach
          </ul>
        </div>
        <div class="col-lg-4">
        </div>
      </div>


    </div>


    <div class="text-center" style="margin-top: 50px">


        <a href="{{ route('frontend.layanan', ['id'=> $subbidang->subbidang_id]) }}" style="height: 70px; padding-top:23px; " class="back-btn"><i class="bx bx-chevron-left"></i>Kembali</a>

        <a onclick="window.print()" style="height: 70px; padding-top:23px;" class="back-btn"><i class="icofont-print"></i>Cetak</a>
      </div>


  </section><!-- End Cource Details Section -->





  @stop
