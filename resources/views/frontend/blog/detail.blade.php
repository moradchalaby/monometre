@extends('frontend.layout')

@section('title', 'AnaSayfa BAŞLIĞI')

@section('content')

    <div id="banner-area" class="banner-area" style="background-image:url(/images/blogs/banner3.jpg)">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title">{{ $blog->blog_title }}</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                                    <li class="breadcrumb-item"><a href="#">Blog</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $blog->blog_title }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div><!-- Banner area end -->

    <section id="main-container" class="main-container">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 mb-5 mb-lg-0">

                    <div class="post-content post-single">
                        <div class="post-media post-image">
                            <img loading="lazy" src="/images/blogs/{{ $blog->blog_file }}" class="img-fluid"
                                alt="post-image">
                        </div>

                        <div class="post-body">
                            <div class="entry-header">
                                <div class="post-meta">

                                    <span class="post-cat">
                                        <i class="far fa-folder-open"></i><a href="#"> Blog</a>
                                    </span>
                                    <span class="post-meta-date"><i class="far fa-calendar"></i>
                                        {{ date_format(date_create($blog->created_at), 'l jS F Y') }}</span>

                                </div>
                                <h2 class="entry-title">
                                    {{ $blog->blog_title }} </h2>
                            </div><!-- header end -->

                            <div class="entry-content">
                                {!! $blog->blog_content !!}
                            </div>
                            <div id="fb-root"></div>
                            <script async defer crossorigin="anonymous"
                                src="https://connect.facebook.net/tr_TR/sdk.js#xfbml=1&version=v10.0" nonce="Jtk0bV5b">
                            </script>
                            <div class="tags-area d-flex align-items-center justify-content-between">

                                <div class="share-items">
                                    <ul class="post-social-icons list-unstyled">
                                        <li class="social-icons-head">Paylaş:</li>
                                        <li>
                                            <div data-href="http://monometre.test/blog/{{ $blog->blog_slug }}"
                                                data-layout="button_count" data-size="small"><a target="_blank"
                                                    href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse"
                                                    class="fb-xfbml-parse-ignore"><i class="fab fa-facebook-f"></i></a>
                                            </div>
                                        </li>
                                        <li><a href="https://twitter.com/share?ref_src=twsrc%5Etfw"
                                                class="twitter-share-button" data-show-count="false"><i
                                                    class="fab fa-twitter"></i></a></li>

                                    </ul>
                                </div>
                            </div>

                        </div><!-- post-body end -->
                    </div><!-- post content end -->

                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>




                </div><!-- Content Col end -->

                <div class="col-lg-4">

                    <div class="sidebar sidebar-right">
                        <div class="widget recent-posts">
                            <h3 class="widget-title">Popüler Bloglar</h3>
                            <ul class="list-unstyled">
                                @foreach ($blogList as $blogs)


                                    <li class="d-flex align-items-center">
                                        <div class="posts-thumb">
                                            <a href="#"><img loading="lazy" alt="img"
                                                    src="/images/blogs/{{ $blogs->blog_file }}"></a>
                                        </div>
                                        <div class="post-info">
                                            <h4 class="entry-title">
                                                <a
                                                    href="{{ route('blog.Detail', $blogs->blog_slug) }}">{{ $blogs->blog_title }}</a>
                                            </h4>
                                        </div>
                                    </li><!-- 1st post end-->

                                @endforeach



                            </ul>

                        </div><!-- Recent post end -->

                    </div><!-- Sidebar end -->
                </div><!-- Sidebar Col end -->

            </div><!-- Main row end -->

        </div><!-- Conatiner end -->
    </section><!-- Main container end -->

@endsection

@section('css') @endsection
@section('js') @endsection
