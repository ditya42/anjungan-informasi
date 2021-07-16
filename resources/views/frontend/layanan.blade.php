
@extends('frontend.layoutlayanan')

@section('content')
<section id="why-us" class="why-us">
    <div class="container" data-aos="fade-up">


      <div class="row" style="margin-top: 50px">

        @foreach ($layanan as $l)
            <div class="col-lg-4 d-flex " style="margin-top: 20px">
                <div class="content">
                <h4 class="text-center">{{ $l->nama_layanan }}</h4>

                <div class="text-center" style="margin-top: 20px;">
                    <a href="{{ route('syarat', ['id'=> $l->layanan_id , 'subbidang' => $l->subbidang_id ]) }}" style="height: 70px; padding-top:23px; color:darkblue" class="more-btn">Pelajari Persyaratan <i class="bx bx-chevron-right"></i></a>
                </div>
                </div>
            </div>
        @endforeach




      </div>
      <br>
          <div class="text-center">
            <a href="/" style="height: 70px; padding-top:23px; margin-top:30px" class="back-btn"><i class="bx bx-chevron-left"></i>Kembali Ke Halaman Utama </a>
          </div>

    </div>
  </section>


  @stop
