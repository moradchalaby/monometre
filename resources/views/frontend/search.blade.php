@extends('frontend.layout')



@section('content')

<section id="main-container" class="main-container pb-2">
  <div class="container ">
    <div class="row " id="paginate">

    @if ($products->isNotEmpty() or $blogs->isNotEmpty())

        @foreach ($products as $product)
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="#">
                                <img class="img-fluid rounded" src="/images/products/{{ $product->product_file }}" alt="">
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <h2 class="card-title">{{ $product->product_title }}</h2>
                            <p class="card-text">{!! substr($product->product_content, 0, 200) . '...' !!}</p>
                            <a href="{{ route('product.Detail', $product->id) }}" class="btn btn-primary">Ürün Sayfası
                                &rarr;</a>
                        </div>
                    </div>
                </div>
                <div
                    class="card-footer text-muted {{ $product->product_stock == 0 ? 'text-danger' : 'text-light' }}  bg-primary">
                    @if ($product->product_stock > 0)
                        <strong class="text-light"> Stok: {{ $product->product_stock }}</strong>
                    @else
                        <strong class="text-danger"> Stok Yok</strong>
                    @endif



                </div>
            </div>

        @endforeach
        @foreach ($blogs as $blog)
             <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="#">
                                <img class="img-fluid rounded" src="/images/blogs/{{ $blog->blog_file }}" alt="">
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <h2 class="card-title">{{ $blog->blog_title }}</h2>
                            <p class="card-text">{!! substr($blog->blog_content, 0, 200) . '...' !!}</p>
                            <a href="{{ route('blog.Detail', $blog->blog_slug) }}" class="btn btn-primary">Devamını oku
                                &rarr;</a>
                        </div>
                    </div>
                </div>
                <div
                    class="card-footer text-muted {{ $blog->blog_ == 0 ? 'text-danger' : 'text-light' }}  bg-primary">

                        <strong class="text-light"> <i class="fa fa-clock-o"></i> {{date_format(date_create($blog->created_at),'l jS F Y')}}</strong>



                </div>
            </div>

        @endforeach

    @else
        <div>
            <h2>No posts found</h2>
        </div>

    @endif

    </div><!-- Main row end -->
  </div><!-- Conatiner end -->
</section><!-- Main container end -->


@endsection

@section('css') @endsection
@section('js') @endsection
