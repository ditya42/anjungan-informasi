@extends('frontend.layout')

  @section('content')




  <main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">

        <h2>Berita Terbaru</h2>
        <p>Kumpulan berita-berita terbaru mengenai BKPP dan Kepegawaian Kabupaten Tabalong. </p>


    </div><!-- End Breadcrumbs -->

    <!-- ======= Courses Section ======= -->
    <section id="courses" class="courses">
      <div class="container" data-aos="fade-up">



            <div class="col-lg-8 float-left" >
                @foreach ($latest as $late)
                <div class="course-item">


                    <table>
                        <tr>
                        <td>
                            <a href="{{ route('artikel.post', ['post' => $late->id]) }}">
                            <img src="{{ asset('images/featured-image-post/'.$late->featured_image) }}" style="border-radius: 5px" width="350" height="260" alt="">
                            </a>
                        </td>
                        <td style="vertical-align: top">

                            @foreach($late->categories as $item)
                            <div style="margin-top: 5px" class="d-flex justify-content-between align-items-center mb-3">
                            <h5 style="margin-left: 5px">{{ $item->name }}</h5>
                            </div>
                            @endforeach

                        <a href="{{ route('artikel.post', ['post' => $late->id]) }}">
                        <h3 style="margin-left: 5px">{{ $late->title }}</h3>
                        </a>

                        <p style="margin-left: 5px">{{ $late->created_at }}</p>

                        <div style="margin-left: 5px">{!!  \Illuminate\Support\Str::limit($late->content, 100, $end='...') !!}</div>

                        <a href="{{ route('artikel.post', ['post' => $late->id]) }}">
                        <p style="margin-left: 5px">Read More...</p>
                        </a>
                        </td>
                        </tr>
                    </table>



                </div>
                @endforeach

                <div class="col-lg-2 ">
                    {{ $latest->links() }}
                    </div>
            </div>


           <div class="col-lg-4 col-md-6 float-left sidebar" >
                <h3>Follow Us</h3>

                <div class="course-info justify-content-between align-items-center">
                    <div class="social-links text-center pt-4 pt-md-0">

                        <a href="https://www.facebook.com/groups/1384931055093898/" class="facebook" style="margin: 7px"><i class="bx bxl-facebook"></i>Facebook</a>
                        <a href="https://www.instagram.com/bkpp_tabalong/" class="instagram" style="margin: 7px"><i class="bx bxl-instagram"></i>Instagram</a>
                        <a href="https://www.youtube.com/channel/UCQXHZdQ72apDyOfU1nZ3YnQ" class="youtube" style="margin: 7px"><i class="bx bxl-youtube"></i>Youtube</a>


                      </div>

                </div>

                <h3>Link BKPP</h3>
                <div class="course-info justify-content-between align-items-center">

                    <a href="https://www.menpan.go.id/">
                        <img src="{{ asset('assets/img/menpan-gambar.jpeg') }}" style="border-radius: 5px; margin:5px" width="255" height="60" alt="...">
                    </a>
                    <a href="https://sapk.bkn.go.id/">
                        <img src="{{ asset('assets/img/SAPK.jpg') }}" style="border-radius: 5px; margin:5px" width="255" height="60" alt="...">
                    </a>
                    <a href="https://e-kinerja.tabalongkab.go.id/login">
                        <img src="{{ asset('assets/img/EKINERJA.jpeg') }}" style="border-radius: 5px; margin:5px" width="255" height="55" alt="...">
                    </a>
                    <a href="https://e-skp.tabalongkab.go.id/login">
                        <img src="{{ asset('assets/img/ESKP.jpeg') }}" style="border-radius: 5px; margin:5px" width="255" height="55" alt="...">
                    </a>
                    <a href="https://simpeg.tabalongkab.go.id/login">
                        <img src="{{ asset('assets/img/SIMPEG.jpeg') }}" style="border-radius: 5px; margin:5px" width="255" height="55" alt="...">
                    </a>

                </div>

                <h3>Video</h3>
                <div class="course-info justify-content-between align-items-center">
                    <iframe width="350" height="215"
                        src="https://www.youtube.com/embed/7EKglgi5Vec">
                    </iframe>

                    <a href="#">
                    <p style="margin-left: 5px">Video Lainnya...</p>
                    </a>
                </div>
            </div>



      </div>
    </section><!-- End Courses Section -->

  </main><!-- End #main -->

@endsection
