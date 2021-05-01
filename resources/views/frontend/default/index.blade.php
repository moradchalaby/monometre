@extends('frontend.layout')

@section('title', 'AnaSayfa BAŞLIĞI')

@section('content')
    {{-- SLİDER START --}}
<h1 style="display: none"> {{$title}}</h1>

    <div class="banner-carousel banner-carousel-1 mb-0">

        @foreach ($data['slider'] as $slider)



                <div class="banner-carousel-item"
                    style="background-image:url(/images/sliders/{{ $slider->slider_file }})">
                    <div class="slider-content text-right">
                        <div class="container h-100">
                            <div class="row align-items-center h-100">
                                <div class="col-md-12">
                                    <h2 class="slide-title" data-animation-in="slideInDown">{{ $slider->slider_title }}
                                    </h2>

                                    <div class="slider-description lead" data-animation-in="slideInRight">
                                        {!! substr($slider->slider_content, 0, 250) !!}</div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
                            <a class="btn btn-dark" href="{{route('contact.Detail')}}">Teklif İste</a>
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

                        @foreach ($data['blog'] as $blog)
                            <div class="item">
                                <a href="{{ route('blog.Detail', $blog->blog_slug) }}">
                                    <div class="ts-team-wrapper">
                                        <div class="team-img-wrapper">
                                            <img loading="lazy" class="w-100" src="/images/blogs/{{ $blog->blog_file }}"
                                                alt="team-img">
                                        </div>
                                        <div class="ts-team-content">
                                            <h3 class="ts-name">{{ trim($blog->blog_title) }}</h3>
                                            <p class="ts-description">{!! substr($blog->blog_content, 0, 50) . '...' !!}</p>
                                            <p class="ts-designation">
                                                {{ date_format(date_create($blog->created_at), 'l jS F Y') }}</p>


                                        </div>
                                    </div>
                                    <!--/ Team wrapper end -->
                                </a>
                            </div><!-- Team 1 end -->

                        @endforeach

                    </div><!-- Team slide end -->
                </div>
            </div>
            <!--/ Content row end -->
            <div class="general-btn text-center mt-4">
                <a class="btn btn-primary" href="{{ route('blog.Index') }}">Hepsini Gör</a>
            </div>
        </div>
        <!--/ Container end -->
    </section>
    <!--/ Team end -->

    <section class="subscribe no-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="subscribe-call-to-acton">
                        <h3>Yardımcı Olalım</h3>
                        <h4>{{$data['phone']->settings_value}}</h4>
                    </div>
                </div><!-- Col end -->

                <div class="col-lg-8">
                    <div class="ts-newsletter row align-items-center">
                        <div class="col-md-12 newsletter-introtext text-lg-right">
                             <strong class="logo-lg text-center " ><b class="text-warning" style="font-size: 4.0rem;">MONOMETRE </b> YAPI</strong>
                        </div>


                    </div><!-- Newsletter end -->
                </div><!-- Col end -->

            </div><!-- Content row end -->
        </div>
        <!--/ Container end -->
    </section>
    <!--/ subscribe end -->


    <section id="project-area" class="project-area solid-bg">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <h2 class="section-title">Ürünlerini Kullandığımız</h2>
                    <h3 class="section-sub-title">Markalar</h3>
                </div>
            </div>
            <!--/ Title row end -->

            <div class="row">
                <div class="col-12">
                    <div class="shuffle-btn-group">
                        <label class="active" for="all">
                            <input type="radio" name="shuffle-filter" id="all" value="all" checked="checked">Hepsi
                        </label>
                        @foreach ($data['category'] as $category)


                            <label for="{{ $category->category_slug }}">
                                <input type="radio" name="shuffle-filter" id="{{ $category->category_slug }}"
                                    value="{{ $category->category_slug }}">{{ $category->category_title }}
                            </label>
                        @endforeach
                    </div><!-- project filter end -->


                    <div class="row shuffle-wrapper">
                        <div class="col-1 shuffle-sizer"></div>

                        @foreach ($data['brand'] as $brand)

                            @foreach ($data['category']->where('id', $brand->brand_category) as $category)
                                <div class="col-lg-4 col-md-6 shuffle-item"
                                    data-groups="[&quot;{{ $category->category_slug }}&quot;]">
                            @endforeach

                            <div class="project-img-container">
                                 <a class="gallery-popup" href="/images/products/{{ $brand->brand_file }}"
                                    aria-label="{{ $brand->brand_slug }}-img">


                                        <img class="img-fluid" src="/images/brands/{{ $brand->brand_file }}"
                                            alt="{{ Str::slug($brand->brand_title) }}-img" />

                                    <span class="gallery-icon"><i class="fa fa-plus"></i></span>


                                    {{-- <img class="img-fluid" src="/images/products/{{ $product->product_file }}"
                                        alt="{{ $product->product_slug }}-img">
                                    <span class="gallery-icon"><i class="fa fa-plus"></i></span> --}}
                                </a>
                                <div class="project-item-info">
                                    <div class="project-item-info-content">
                                        <h3 class="project-item-title">

                                            <a href="{{ $brand->brand_url }}">
                                                {{ $brand->brand_title }}</a>
                                        </h3>
                                        @foreach ($data['category']->where('id', $brand->brand_category) as $category)
                                        <a href="/product/{{ $category->category_slug }}">
                                            <p class="project-cat">Ürünlere Git</p>
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                    </div><!-- shuffle item 1 end -->

                    @endforeach
                    </div><!-- shuffle end -->
                </div>

                <div class="col-12">
                    <div class="general-btn text-center">
                        <a class="btn btn-primary" href="{{ route('product.Index', '0') }}">Bütün Ürünler</a>
                    </div>
                </div>

            </div><!-- Content row end -->


        <!--/ Container end -->
    </section><!-- Project area end -->







@endsection

@section('css') @endsection
@section('js') @endsection
