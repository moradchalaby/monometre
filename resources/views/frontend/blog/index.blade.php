@extends('frontend.layout')

@section('title', "AnaSayfa BAŞLIĞI")

@section('content')

<div id="banner-area" class="banner-area" style="background-image:url(/images/blogs/banner3.jpg)">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">Blog</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                      <li class="breadcrumb-item"><a href="#">Blog</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Tüm Bloglar</li>
                    </ol>
                </nav>
              </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Banner text end -->
</div><!-- Banner area end -->

<section id="main-container" class="main-container pb-2">
  <div class="container">
    <div class="row" id="paginate">

@foreach ($data['blog'] as $blog)


      <div class="col-lg-4 col-md-6 mb-5">
        <div class="ts-service-box">
            <div class="ts-service-image-wrapper mh-100" style=" height: 180px;"">
              <img loading="lazy" class="w-100" src="/images/blogs/{{$blog->blog_file}}" alt="{{$blog->blog_slug}}-image">
            </div>
            <div class="d-flex">

              <div class="ts-service-info">

                  <h3 class="service-box-title"><a href="service-single.html">{{$blog->blog_title}}</a></h3>
                  <span class="post-item-date">
                      <i class="fa fa-clock-o"></i> {{date_format(date_create($blog->created_at),'l jS F Y')}}
                    </span>
                  <div class="mh-100" style=" height: 200px;"">{!! substr($blog->blog_content,0,150).'...'!!}</div>

                  <a class="learn-more d-inline-block" href="{{route('blog.Detail',$blog->blog_slug)}}" aria-label="service-details"><i class="fa fa-caret-right"></i> Devamını Oku</a>

                </div>
            </div>
        </div><!-- Service3 end -->
      </div><!-- Col 6 end -->
@endforeach
    </div><!-- Main row end -->
  </div><!-- Conatiner end -->
</section><!-- Main container end -->

@endsection

@section('css') @endsection
@section('js') @endsection
