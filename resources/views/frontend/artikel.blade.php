
  @extends('frontend.layout')

  @section('content')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>{{ $data->title }}</h2>
        <p>{{ $data->caption }}</p>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Cource Details Section ======= -->
    <section id="course-details" class="course-details">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-8">
            <img src="{{ asset('images/featured-image-post/'.$data->featured_image) }}" width="700" height="450" alt="">
            <h3>{{ $data->title }}</h3>
            <p>{!! $data->content !!}</p>


          @if($data->file)
            <a href="{{ asset('files/file_upload_post/'.$data->file) }}" download>{{ $data->file }}</a>



          @endif


          </div>

          <div class="col-lg-4">
            <h3>Artikel Lainnya</h3>
            @foreach ($latest as $late)
                {{-- <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>{{ $late->title }}</h5>

                </div> --}}

                <div class="course-info justify-content-between align-items-center">
                    <a href="{{ route('artikel.post', ['post' => $late->id]) }}"><h4>{{ $late->title }}</h4></a>

                    <div><a href="{{ route('artikel.post', ['post' => $late->id]) }}">
                        <img src="{{ asset('images/featured-image-post/'.$late->featured_image) }}" width="320" height="225"  alt="">
                        </a>
                    </div>
                    <div>{!!  \Illuminate\Support\Str::limit($late->content, 100, $end='...') !!}</div><br>
                    <div>
                        <a href="{{ route('artikel.post', ['post' => $late->id]) }}" style="color: mediumseagreen">Read More -></a></div>
                    {{-- <div><a href="{{ route('artikel.post', ['post' => $late->id]) }}" class="selengkapnya">Selengkapnya...</a></div> --}}

                </div>

                {{-- <div class="course-info d-flex justify-content-between align-items-center">
                    {!! $late->caption !!}
                </div> --}}
            @endforeach



          </div>
        </div>

      </div>
    </section><!-- End Cource Details Section -->


  @endsection
