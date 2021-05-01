<!DOCTYPE html>
<html lang="tr">

<head>

    <!-- Basic Page Needs
================================================== -->
    <meta charset="utf-8">
    <title>@yield('title')</title>

    <!-- Mobile Specific Metas
================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="{{ $description }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

    <!-- Favicon
================================================== -->
    <link rel="icon" type="image/png" href="/images/settings/{{$icon}}">

    <!-- CSS
================================================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/frontend/plugins/bootstrap/bootstrap.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="/frontend/plugins/fontawesome/css/all.min.css">
    <!-- Animation -->
    <link rel="stylesheet" href="/frontend/plugins/animate-css/animate.css">
    <!-- slick Carousel -->
    <link rel="stylesheet" href="/frontend/plugins/slick/slick.css">
    <link rel="stylesheet" href="/frontend/plugins/slick/slick-theme.css">
    <!-- Colorbox -->
    <link rel="stylesheet" href="/frontend/plugins/colorbox/colorbox.css">
    <!-- Template styles-->
    <link rel="stylesheet" href="/frontend/css/style.css">


    <link rel="stylesheet" href="/frontend/css/jquery.paginate.css" />

    <script data-ad-client="ca-pub-3500157718156258" async
        src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>

<body>
    <div class="body-inner">

        <div id="top-bar" class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <ul class="top-info text-center text-md-left">
                            <li><i class="fas fa-map-marker-alt"></i>
                                <p class="info-text"> {{ $adres . ' ' . $ilce . '/' . $il }}</p>
                            </li>
                        </ul>
                    </div>
                    <!--/ Top info end -->

                    <div class="col-lg-4 col-md-4 top-social text-center text-md-right">
                        <ul class="list-unstyled">
                            <li>
                                <a title="Facebook" target="_blank" href="{{ $facebook }}">
                                    <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                                </a>
                                <a title="Twitter" target="_blank" href="{{ $twitter }}">
                                    <span class="social-icon"><i class="fab fa-twitter"></i></span>
                                </a>
                                <a title="Instagram" target="_blank" href="{{ $instagram }}">
                                    <span class="social-icon"><i class="fab fa-instagram"></i></span>
                                </a>
                                <a title="Youtube" target="_blank" href="{{ $youtube }}">
                                    <span class="social-icon"><i class="fab fa-youtube"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--/ Top social end -->
                </div>
                <!--/ Content row end -->
            </div>
            <!--/ Container end -->
        </div>
        <!--/ Topbar end -->
        <!-- Header start -->
        <header id="header" class="header-one">
            <div class="bg-white">
                <div class="container">
                    <div class="logo-area">
                        <div class="row align-items-center">
                            <div class="logo col-lg-3 text-center text-lg-right mb-3 mb-md-5 mb-lg-0">
                                <a class="d-block" href="{{ route('home.Index') }}">
                                    <strong class="logo-lg text-center "><b class="text-warning"
                                            style="font-size: 2.0rem;">MONOMETRE </b> YAPI</strong>

                                </a>
                            </div><!-- logo end -->

                            <div class="col-lg-9 header-right">
                                <ul class="top-info-box">
                                    <li>
                                        <div class="info-box">
                                            <div class="info-box-content">
                                                <p class="info-box-title">Bizi Ara</p>
                                                <p class="info-box-subtitle">{{ $phone_gsm }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="info-box">
                                            <div class="info-box-content">
                                                <p class="info-box-title">Bize Email At</p>
                                                <p class="info-box-subtitle">{{ $mail }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="last">
                                        <div class="info-box last">
                                            <div class="info-box-content">
                                                <p class="info-box-title">Bizi Takip Et</p>
                                                <a title="Facebook" target="_blank" href="{{ $facebook }}">
                                                    <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                                                </a>
                                                <a title="Twitter" target="_blank" href="{{ $twitter }}">
                                                    <span class="social-icon"><i class="fab fa-twitter"></i></span>
                                                </a>
                                                <a title="Instagram" target="_blank" href="{{ $instagram }}">
                                                    <span class="social-icon"><i class="fab fa-instagram"></i></span>
                                                </a>
                                                <a title="Youtube" target="_blank" href="{{ $youtube }}">
                                                    <span class="social-icon"><i class="fab fa-youtube"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="header-get-a-quote">
                                        <a class="btn btn-primary" href="{{route('contact.Detail')}}">İletişim
                                        </a>
                                    </li>
                                </ul><!-- Ul end -->
                            </div><!-- header right end -->
                        </div><!-- logo area end -->

                    </div><!-- Row end -->
                </div><!-- Container end -->
            </div>

            <div class="site-navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <nav class="navbar navbar-expand-lg navbar-dark p-0">
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div id="navbar-collapse" class="collapse navbar-collapse">
                                    <ul class="nav navbar-nav mr-auto">
                                        <li class="nav-item"><a class="nav-link"
                                                href="{{ route('home.Index') }}">Anasayfa</a></li>
                                        <li class="nav-item"><a class="nav-link"
                                                href="{{ route('blog.Index') }}">Blog</a></li>


                                        @foreach ($slug as $page)


                                            <li class="nav-item"><a class="nav-link"
                                                    href="/page/{{ $page->page_slug }}">{{ $page->page_title }}</a>
                                            </li>
                                        @endforeach

                                        <li class="nav-item dropdown">
                                            <a href="#" class="nav-link dropdown-toggle"
                                                data-toggle="dropdown">Kategoriler
                                                <i class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown-menu" role="menu">

                                                @foreach ($cat as $category)

                                                    <li><a
                                                            href="{{ route('product.Index', $category->id) }}">{{ $category->category_title }}</a>
                                                    </li>

                                                @endforeach
                                                <li><a href="{{ route('product.Index', '0') }}">Tüm Ürünler</a></li>

                                            </ul>
                                        </li>

                                        <li class="nav-item"><a class="nav-link"
                                                href="{{ route('contact.Detail') }}">İletişim</a></li>
                                        {{-- <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li> --}}
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <!--/ Col end -->
                    </div>
                    <!--/ Row end -->

                    <div class="nav-search">
                        <span id="search"><i class="fa fa-search"></i></span>
                    </div><!-- Search end -->

                    <div class="search-block" style="display: none;">
                        <form action="{{ route('search') }}" method="GET">
                            <label for="search-field" class="w-100 mb-0">
                                <input type="text" class="form-control" name="search" id="search-field"
                                    placeholder="Type what you want and enter">
                            </label>
                        </form>
                        <span class="search-close">&times;</span>
                    </div><!-- Site search end -->
                </div>
                <!--/ Container end -->

            </div>
            <!--/ Navigation end -->
        </header>
        <!--/ Header end -->
        @yield('content')

        <footer id="footer" class="footer bg-overlay">
            <div class="footer-main">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-4 col-md-6 footer-widget footer-about">
                            <h3 class="widget-title">Hakkımızda</h3>
                            <strong class="logo-lg text-center "><b class="text-warning"
                                    style="font-size: 2.0rem;">MONOMETRE </b> YAPI</strong>
                            <br>
                            <br>
                            <p>{{ $description }}</p>

                        </div><!-- Col end -->

                        <div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
                            <h3 class="widget-title">Sosyal Medya</h3>
                            <div class="footer-social">
                                <ul>
                                    <li><a title="Facebook" target="_blank" href="{{ $facebook }}">
                                            <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                                        </a></li>
                                    <li> <a title="Twitter" target="_blank" href="{{ $twitter }}">
                                            <span class="social-icon"><i class="fab fa-twitter"></i></span>
                                        </a></li>
                                    <li> <a title="Instagram" target="_blank" href="{{ $instagram }}">
                                            <span class="social-icon"><i class="fab fa-instagram"></i></span>
                                        </a></li>
                                    <li> <a title="Youtube" target="_blank" href="{{ $youtube }}">
                                            <span class="social-icon"><i class="fab fa-youtube"></i></span>
                                        </a></li>

                                </ul>
                            </div><!-- Footer social end -->
                        </div><!-- Col end -->

                        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
                            <h3 class="widget-title">Ürünler</h3>
                            <ul class="list-arrow">@php
                                $catsay = 0;
                            @endphp
                                @foreach ($cat as $category)

                                    <li><a
                                            href="{{ route('product.Index', $category->id) }}">{{ $category->category_title }}</a>
                                    </li>
                                    @if ($catsay == 4)
                                    @break
                                @endif
                                @php
                                    $catsay++;
                                @endphp
                                @endforeach
                                <li><a href="{{ route('product.Index', '0') }}">Tüm Ürünler</a></li>

                            </ul>
                        </div><!-- Col end -->
                    </div><!-- Row end -->
                </div><!-- Container end -->
            </div><!-- Footer main end -->

            <div class="copyright">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="copyright-info">
                                <span>Copyright &copy; <script>
                                        document.write(new Date().getFullYear());

                                    </script>, Designed by <a href="https://themefisher.com">Themefisher</a> &amp;
                                    Developed by MORADCHALABY </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="footer-menu text-center text-md-right">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="{{ route('home.Index') }}">Anasayfa</a></li>
                                    <li><a href="{{ route('blog.Index') }}">Blog</a></li>

                                    @foreach ($slug as $page)


                                        <li><a href="/page/{{ $page->page_slug }}">{{ $page->page_title }}</a>
                                        </li>
                                    @endforeach
                                    <li><a href="{{ route('contact.Detail') }}">İletişim</a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- Row end -->

                    <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
                        <button class="btn btn-primary" title="Back to Top">
                            <i class="fa fa-angle-double-up"></i>
                        </button>
                    </div>

                </div><!-- Container end -->
            </div><!-- Copyright end -->
        </footer><!-- Footer end -->


        <!-- Javascript Files
  ================================================== -->



        <!-- initialize jQuery Library -->
        <script src="/frontend/plugins/jQuery/jquery.min.js"></script>
        <!-- Bootstrap jQuery -->
        <script src="/frontend/plugins/bootstrap/bootstrap.min.js" defer></script>
        <!-- Slick Carousel -->
        <script src="/frontend/plugins/slick/slick.min.js"></script>
        <script src="/frontend/plugins/slick/slick-animation.min.js"></script>
        <!-- Color box -->
        <script src="/frontend/plugins/colorbox/jquery.colorbox.js"></script>

        <script src="/frontend/js/jquery.paginate.js"></script>

        <!-- shuffle -->
        <script src="/frontend/plugins/shuffle/shuffle.min.js" defer></script>


        <!-- Google Map API Key-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer>
        </script>
        <!-- Google Map Plugin-->
        <script src="/frontend/plugins/google-map/map.js" defer></script>
        <script src="/js/custom.js"></script>
        <!-- Template custom -->
        <script src="/frontend/js/script.js"></script>
        <script>
            //call paginate
            $('#paginate').paginate();

        </script>
    </div><!-- Body inner end -->
</body>

</html>
