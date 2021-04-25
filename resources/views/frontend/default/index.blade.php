
@extends('frontend.layout')

@section('title', "AnaSayfa BAŞLIĞI")

@section('content')
{{-- SLİDER START --}}
<div class="banner-carousel banner-carousel-1 mb-0">
    @php
     $slidersay=0;
 @endphp
 @foreach ($data['slider'] as $slider )



@if ($slidersay==0)
      <div class="banner-carousel-item" style="background-image:url(/images/sliders/{{$slider->slider_file}})">
    <div class="slider-content text-right">
        <div class="container h-100">
          <div class="row align-items-center h-100">
              <div class="col-md-12">
                <h2 class="slide-title" data-animation-in="slideInDown">{{$slider->slider_title}}</h2>

                <div class="slider-description lead" data-animation-in="slideInRight">{!!substr($slider->slider_content,0,100).'...'!!}</div>
                <div data-animation-in="slideInLeft">
                    <a href="contact.html" class="slider btn btn-primary" aria-label="contact-with-us">Get Free Quote</a>
                    <a href="about.html" class="slider btn btn-primary border" aria-label="learn-more-about-us">Learn more</a>
                </div>
              </div>
          </div>
        </div>
    </div>
  </div>
@elseif($slidersay==1)
 <div class="banner-carousel-item" style="background-image:url(/images/sliders/{{$slider->slider_file}})">
    <div class="slider-content">
        <div class="container h-100">
          <div class="row align-items-center h-100">
              <div class="col-md-12 text-center">
                <h2 class="slide-title" data-animation-in="slideInLeft">{{$slider->slider_title}}</h2>
                 <div class="slider-description lead" data-animation-in="slideInRight">{!!substr($slider->slider_content,0,100).'...'!!}</div>

                <p data-animation-in="slideInLeft" data-duration-in="1.2">
                    <a href="services.html" class="slider btn btn-primary">Our Services</a>
                    <a href="contact.html" class="slider btn btn-primary border">Contact Now</a>
                </p>
              </div>
          </div>
        </div>
    </div>
  </div>
@elseif($slidersay==2)


  <div class="banner-carousel-item" style="background-image:url(/images/sliders/{{$slider->slider_file}})">
    <div class="slider-content text-left">
        <div class="container h-100">
          <div class="row align-items-center h-100">
              <div class="col-md-12">

                <h3 class="slide-title" data-animation-in="fadeIn">{{$slider->slider_title}}</h3>
                                 <div class="slider-description lead" data-animation-in="slideInRight">{!!substr($slider->slider_content,0,100).'...'!!}</div>


                <p data-animation-in="slideInRight">
                    <a href="services.html" class="slider btn btn-primary border">Our Services</a>
                </p>
              </div>
          </div>
        </div>
    </div>
  </div>

@endif


@php
   if ($slidersay<=2) {
        $slidersay++;
   } else {
       $slidersay=0;
   }

@endphp




  @endforeach


</div>
{{-- SLİDER END --}}
<section class="call-to-action-box no-padding">
  <div class="container">
    <div class="action-style-box">
        <div class="row align-items-center">
          <div class="col-md-8 text-center text-md-left">
              <div class="call-to-action-text">
                <h3 class="action-title">ihtiyacınız olan kaliteli malzemeler için </h3>
              </div>
          </div><!-- Col end -->
          <div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
              <div class="call-to-action-btn">
                <a class="btn btn-dark" href="#">Teklif İste</a>
              </div>
          </div><!-- col end -->
        </div><!-- row end -->
    </div><!-- Action style box -->
  </div><!-- Container end -->
</section><!-- Action end -->


<section id="ts-team" class="ts-team">
  <div class="container">
    <div class="row text-center">
        <div class="col-12">
          <h2 class="section-title">Blogmuş gibi</h2>
          <h3 class="section-sub-title">Blog</h3>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
          <div id="team-slide" class="team-slide">

             @foreach ($data['blog'] as $blog )
            <div class="item">
                <a href="{{route('blog.Detail',$blog->blog_slug)}}">
                <div class="ts-team-wrapper">
                    <div class="team-img-wrapper">
                      <img loading="lazy" class="w-100" src="/images/blogs/{{$blog->blog_file}}" alt="team-img">
                    </div>
                    <div class="ts-team-content">
                      <h3 class="ts-name">{{trim($blog->blog_title)}}</h3>
                       <p class="ts-description">{!!substr($blog->blog_content,0,50).'...'!!}</p>
                      <p class="ts-designation">{{date_format(date_create($blog->created_at),'l jS F Y')}}</p>


                    </div>
                </div><!--/ Team wrapper end -->
                </a>
              </div><!-- Team 1 end -->

             @endforeach

          </div><!-- Team slide end -->
        </div>
    </div><!--/ Content row end -->
    <div class="general-btn text-center mt-4">
        <a class="btn btn-primary" href="{{route('blog.Index')}}">Hepsini Gör</a>
    </div>
  </div><!--/ Container end -->
</section><!--/ Team end -->

<section id="facts" class="facts-area dark-bg">
  <div class="container">
    <div class="facts-wrapper">

LOGO
    </div>
    <!--/ Content row end -->
  </div>
  <!--/ Container end -->
</section><!-- Facts end -->



<section id="project-area" class="project-area solid-bg">
  <div class="container">
    <div class="row text-center">
      <div class="col-lg-12">
        <h2 class="section-title">Sağlam ve Kaliteli</h2>
        <h3 class="section-sub-title">Tesisat Ürünleri</h3>
      </div>
    </div>
    <!--/ Title row end -->

    <div class="row">
      <div class="col-12">
        <div class="shuffle-btn-group">
          <label class="active" for="all">
            <input type="radio" name="shuffle-filter" id="all" value="all" checked="checked">Hepsi
          </label>
          <label for="commercial">
            <input type="radio" name="shuffle-filter" id="commercial" value="commercial">Ölçüm Cihazları
          </label>
          <label for="education">
            <input type="radio" name="shuffle-filter" id="education" value="education">L Boru
          </label>
          <label for="government">
            <input type="radio" name="shuffle-filter" id="government" value="government">Boru
          </label>
          <label for="infrastructure">
            <input type="radio" name="shuffle-filter" id="infrastructure" value="infrastructure">Petek
          </label>
          <label for="residential">
            <input type="radio" name="shuffle-filter" id="residential" value="residential">Kombi
          </label>
          <label for="healthcare">
            <input type="radio" name="shuffle-filter" id="healthcare" value="healthcare">Vana
          </label>
        </div><!-- project filter end -->


        <div class="row shuffle-wrapper">
          <div class="col-1 shuffle-sizer"></div>

          <div class="col-lg-4 col-md-6 shuffle-item" data-groups="[&quot;government&quot;,&quot;healthcare&quot;]">
            <div class="project-img-container">
              <a class="gallery-popup" href="images/projects/project1.jpg" aria-label="project-img">
                <img class="img-fluid" src="images/projects/project1.jpg" alt="project-img">
                <span class="gallery-icon"><i class="fa fa-plus"></i></span>
              </a>
              <div class="project-item-info">
                <div class="project-item-info-content">
                  <h3 class="project-item-title">
                    <a href="projects-single.html">Capital Teltway Building</a>
                  </h3>
                  <p class="project-cat">Monometre</p>
                </div>
              </div>
            </div>
          </div><!-- shuffle item 1 end -->

          <div class="col-lg-4 col-md-6 shuffle-item" data-groups="[&quot;healthcare&quot;]">
            <div class="project-img-container">
              <a class="gallery-popup" href="images/projects/project2.jpg" aria-label="project-img">
                <img class="img-fluid" src="images/projects/project2.jpg" alt="project-img">
                <span class="gallery-icon"><i class="fa fa-plus"></i></span>
              </a>
              <div class="project-item-info">
                <div class="project-item-info-content">
                  <h3 class="project-item-title">
                    <a href="projects-single.html">Ghum Touch Hospital</a>
                  </h3>
                  <p class="project-cat">L Boru</p>
                </div>
              </div>
            </div>
          </div><!-- shuffle item 2 end -->

          <div class="col-lg-4 col-md-6 shuffle-item" data-groups="[&quot;infrastructure&quot;,&quot;commercial&quot;]">
            <div class="project-img-container">
              <a class="gallery-popup" href="images/projects/project3.jpg" aria-label="project-img">
                <img class="img-fluid" src="images/projects/project3.jpg" alt="project-img">
                <span class="gallery-icon"><i class="fa fa-plus"></i></span>
              </a>
              <div class="project-item-info">
                <div class="project-item-info-content">
                  <h3 class="project-item-title">
                    <a href="projects-single.html">TNT East Facility</a>
                  </h3>
                  <p class="project-cat">Petek</p>
                </div>
              </div>
            </div>
          </div><!-- shuffle item 3 end -->

          <div class="col-lg-4 col-md-6 shuffle-item" data-groups="[&quot;education&quot;,&quot;infrastructure&quot;]">
            <div class="project-img-container">
              <a class="gallery-popup" href="images/projects/project4.jpg" aria-label="project-img">
                <img class="img-fluid" src="images/projects/project4.jpg" alt="project-img">
                <span class="gallery-icon"><i class="fa fa-plus"></i></span>
              </a>
              <div class="project-item-info">
                <div class="project-item-info-content">
                  <h3 class="project-item-title">
                    <a href="projects-single.html">Narriot Headquarters</a>
                  </h3>
                  <p class="project-cat">Vana</p>
                </div>
              </div>
            </div>
          </div><!-- shuffle item 4 end -->

          <div class="col-lg-4 col-md-6 shuffle-item" data-groups="[&quot;infrastructure&quot;,&quot;education&quot;]">
            <div class="project-img-container">
              <a class="gallery-popup" href="images/projects/project5.jpg" aria-label="project-img">
                <img class="img-fluid" src="images/projects/project5.jpg" alt="project-img">
                <span class="gallery-icon"><i class="fa fa-plus"></i></span>
              </a>
              <div class="project-item-info">
                <div class="project-item-info-content">
                  <h3 class="project-item-title">
                    <a href="projects-single.html">Kalas Metrorail</a>
                  </h3>
                  <p class="project-cat">Boru</p>
                </div>
              </div>
            </div>
          </div><!-- shuffle item 5 end -->

          <div class="col-lg-4 col-md-6 shuffle-item" data-groups="[&quot;residential&quot;]">
            <div class="project-img-container">
              <a class="gallery-popup" href="images/projects/project6.jpg" aria-label="project-img">
                <img class="img-fluid" src="images/projects/project6.jpg" alt="project-img">
                <span class="gallery-icon"><i class="fa fa-plus"></i></span>
              </a>
              <div class="project-item-info">
                <div class="project-item-info-content">
                  <h3 class="project-item-title">
                    <a href="projects-single.html">Ancraft Avenue House</a>
                  </h3>
                  <p class="project-cat">Kombi</p>
                </div>
              </div>
            </div>
          </div><!-- shuffle item 6 end -->
        </div><!-- shuffle end -->
      </div>

      <div class="col-12">
        <div class="general-btn text-center">
          <a class="btn btn-primary" href="projects.html">Bütün Ürünler</a>
        </div>
      </div>

    </div><!-- Content row end -->
  </div>
  <!--/ Container end -->
</section><!-- Project area end -->



<section class="subscribe no-padding">
  <div class="container">
    <div class="row">
        <div class="col-lg-4">
          <div class="subscribe-call-to-acton">
              <h3>Can We Help?</h3>
              <h4>(+9) 847-291-4353</h4>
          </div>
        </div><!-- Col end -->

        <div class="col-lg-8">
          <div class="ts-newsletter row align-items-center">
              <div class="col-md-5 newsletter-introtext">
                <h4 class="text-white mb-0">Newsletter Sign-up</h4>
                <p class="text-white">Latest updates and news</p>
              </div>

              <div class="col-md-7 newsletter-form">
                <form action="#" method="post">
                    <div class="form-group">
                      <label for="newsletter-email" class="content-hidden">Newsletter Email</label>
                      <input type="email" name="email" id="newsletter-email" class="form-control form-control-lg" placeholder="Your your email and hit enter" autocomplete="off">
                    </div>
                </form>
              </div>
          </div><!-- Newsletter end -->
        </div><!-- Col end -->

    </div><!-- Content row end -->
  </div>
  <!--/ Container end -->
</section>
<!--/ subscribe end -->

<section class="content">
  <div class="container">
    <div class="row">


        <div class="col-lg-12 mt-5 mt-lg-0">

          <h3 class="column-title text-center">Markalar</h3>

          <div class="row all-clients">

            @foreach($data['brand'] as $marka)
 <div class="col-sm-4 col-6">
                <figure class="clients-logo">
                    <a href="{{$marka->brand_url}}"><img loading="lazy" class="img-fluid" src="/images/brands/{{$marka->brand_file}}" alt="{{Str::slug($marka->brand_title)}}" /></a>
                </figure>
              </div>
            @endforeach




          </div><!-- Clients row end -->

        </div><!-- Col end -->

    </div>
    <!--/ Content row end -->
  </div>
  <!--/ Container end -->
</section><!-- Content end -->



@endsection

@section('css') @endsection
@section('js') @endsection
