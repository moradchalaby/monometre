@extends('frontend.layout')



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
  <div class="container ">
    <div class="row " id="paginate">

@foreach ($data['product'] as $product)

<div class="card mb-4">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6">
            <a href="#">
              <img class="img-fluid rounded" src="/images/products/{{ $product->product_file }}" alt="">
            </a>
          </div>
          <div class="col-lg-6">
            <h2 class="card-title">{{$product->product_title}}</h2>
            <p class="card-text">{!! substr($product->product_content,0,200).'...'!!}</p>
            <a href="{{route('product.Detail',$product->id)}}" class="btn btn-primary">Ürün Sayfası &rarr;</a>
          </div>
        </div>
      </div>
      <div class="card-footer text-muted {{$product->product_stock ==0 ? 'text-danger' : 'text-light'}}  bg-primary">

          <strong class=" {{$product->product_stock >0 ? 'text-light' : 'text-danger'}}"> Stok: {{$product->product_stock >0 ? 'Var' : 'Yok'}}</strong>

       @foreach ($data['category']->where('id',$product->product_category) as $category)

                                <a class="text-light float-right" href="{{route('product.Index', $category->id)}}">{{ $category->category_title}}</a>

                                  @endforeach


      </div>
    </div>

@endforeach

    </div><!-- Main row end -->
  </div><!-- Conatiner end -->
</section><!-- Main container end -->


@endsection

@section('css') @endsection
@section('js') @endsection
