@extends('frontend.layout')

@section('title', 'AnaSayfa BAŞLIĞI')

@section('content')



    <div id="banner-area" class="banner-area" style="background-image:url(/images/blogs/banner3.jpg)">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title">{{ $page->page_title }}</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>

                                    <li class="breadcrumb-item active" aria-current="page">{{ $page->page_title }}</li>
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

                <div class="col-lg-12">
                    <h3 class="column-title">{{ $page->page_title }}</h3>
                    {!! $page->page_content !!}






                </div><!-- Col end -->


            </div><!-- Content row end -->

        </div><!-- Container end -->
    </section><!-- Main container end -->


    <section id="facts" class="facts-area" style="background-color: #ffb90821;"">
      <div class=" container">

        <div class="row text-center">
           <p>ADS</p>
            <!-- Facts end -->
        </div>
        <!--/ Content row end -->
        </div>
        <!--/ Container end -->
    </section><!-- Facts end -->

    <section class="content">
        <div class="container">
            <div class="row">


                <div class="col-lg-12 mt-5 mt-lg-0">

                    <h3 class="column-title text-center">Markalar</h3>

                    <div class="row all-clients">
                        <div class="col-sm-4 col-6">
                            <figure class="clients-logo">
                                <a href="#!"><img loading="lazy" class="img-fluid" src="images/clients/client1.png"
                                        alt="clients-logo" /></a>
                            </figure>
                        </div><!-- Client 1 end -->

                        <div class="col-sm-4 col-6">
                            <figure class="clients-logo">
                                <a href="#!"><img loading="lazy" class="img-fluid" src="images/clients/client2.png"
                                        alt="clients-logo" /></a>
                            </figure>
                        </div><!-- Client 2 end -->

                        <div class="col-sm-4 col-6">
                            <figure class="clients-logo">
                                <a href="#!"><img loading="lazy" class="img-fluid" src="images/clients/client3.png"
                                        alt="clients-logo" /></a>
                            </figure>
                        </div><!-- Client 3 end -->

                        <div class="col-sm-4 col-6">
                            <figure class="clients-logo">
                                <a href="#!"><img loading="lazy" class="img-fluid" src="images/clients/client4.png"
                                        alt="clients-logo" /></a>
                            </figure>
                        </div><!-- Client 4 end -->

                        <div class="col-sm-4 col-6">
                            <figure class="clients-logo">
                                <a href="#!"><img loading="lazy" class="img-fluid" src="images/clients/client5.png"
                                        alt="clients-logo" /></a>
                            </figure>
                        </div><!-- Client 5 end -->

                        <div class="col-sm-4 col-6">
                            <figure class="clients-logo">
                                <a href="#!"><img loading="lazy" class="img-fluid" src="images/clients/client6.png"
                                        alt="clients-logo" /></a>
                            </figure>
                        </div><!-- Client 6 end -->

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
