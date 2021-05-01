@extends('frontend.layout')



@section('content')

    <div id="banner-area" class="banner-area" style="background-image:url(/images/blogs/banner3.jpg)">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title">{{ $product->product_title }}</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                                    <li class="breadcrumb-item"><a href="#">Ürünler</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $product->product_title }}
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div><!-- Banner area end -->

    <section id="main-container " class="main-container">
        <div class="container col-lg-8">

            <div class="row">
                <div class="col-lg-8">
                    <div id="page-slider" class="page-slider small-bg">
                        <div class="item">
                            <img loading="lazy" class="img-fluid" src="/images/products/{{ $product->product_file }}"
                                alt="project-image" />
                        </div>
                    </div><!-- Page slider end -->
                </div><!-- Slider col end -->
                <div class="col-lg-4">

                    <div class="sidebar sidebar-right">
                        <div class="widget recent-posts">
                            <h3 class="widget-title">Önerimiz</h3>
                            <ul class="list-unstyled">
                                @foreach ($productList as $products)


                                    <li class="d-flex align-items-center">
                                        <div class="posts-thumb">
                                            <a href="#"><img loading="lazy" alt="img"
                                                    src="/images/products/{{ $products->product_file }}"></a>
                                        </div>
                                        <div class="post-info">
                                            <h4 class="entry-title">
                                                <a
                                                    href="{{ route('product.Detail', $products->id) }}">{{ $products->product_title }}</a>
                                            </h4>
                                        </div>
                                    </li><!-- 1st post end-->

                                @endforeach



                            </ul>

                        </div><!-- Recent post end -->

                    </div><!-- Sidebar end -->
                </div><!-- Sidebar Col end -->

                <div class="col-lg-12 mt-5 ">
                    <h2 class="column-title mrt-0">{{ $product->product_title }}</h2>
                    <br>
                    <h4 class="column-title mrt-0">Marka: @foreach ($data['brand']->where('id', $product->product_brand) as $brand)
                            <img loading="lazy" class="img-fluid" src="/images/brands/{{ $brand->brand_file }}"
                                alt="project-image" />
                        @endforeach </h4>
                    <br>

                    <h4 class="column-title mrt-0">Fiyat: {{ $product->product_price }} ₺</h4>
                    <br>
                    <h4 class="column-title mrt-0">Stok: <strong
                            class=" {{ $product->product_stock > 0 ? 'text-success' : 'text-danger' }}">{{ $product->product_stock > 0 ? 'Var' : 'Yok' }}</strong>
                    </h4>
                    <br>

                    <p>{!! $product->product_content !!}</p>



                </div><!-- Content col end -->

            </div><!-- Row end -->

        </div><!-- Conatiner end -->





@endsection

@section('css') @endsection
@section('js') @endsection
