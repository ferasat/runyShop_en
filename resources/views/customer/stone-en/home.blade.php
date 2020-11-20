@extends('layouts.customer.stone-en.stoneTemplate')
@section('title' , $settings['siteName'] )
@section('content')
    <section id="slideshow" class="slideshow">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @php $y = 0 ; @endphp
                @foreach( $picsSlideshow as $pic )
                    <li data-target="#carouselExampleIndicators" data-slide-to="@php echo $y ; @endphp"
                        class="@php if($y == 0){echo 'active';} @endphp"></li>
                    @php $y = $y + 1 ; @endphp
                @endforeach
            </ol>
            <div class="carousel-inner">
                @php $x = 1 ; @endphp
                @foreach( $picsSlideshow as $pic )
                    <div class="carousel-item @php if($x == 1){echo 'active';} @endphp">
                        <img src="{{asset($pic -> urlpic)}}" class="d-block w-100"
                             alt="{{ $pic -> text }}">
                        @if($pic -> text !== null)
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{ $pic -> text }}</h5>
                            </div>
                        @endif
                    </div>
                    @php $x = $x + 1 ; @endphp
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
               data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
               data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </section>

    <section class="desCompany">
        <div class="container">
            <div class="row">

                <div class="col-md-12 pad-80">
                    <div class="desCompanyBox">
                        <span class="subtitle">GEOX Stone</span>
                        <h2 class="title">GEOX Stone NATURAL STONE FOR ARCHITECTURE AND INTERIOR DESIGN</h2>
                        <div class="text">
                            <p>GEOX Stone is an international company of Spanish origin, a world reference in the field
                                of
                                Natural Stone and a pioneer in the commitment to large-format porcelain tiles and fine
                                thickness
                                Techlam®. Since its origins in 1959, the company has grown progressively and has
                                expanded
                                with
                                great force in the international market, becoming a clear reference in the field of
                                construction
                                materials, and coatings for any type of surface for architecture and interior design .
                                Design-oriented innovation</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="videos">
        <div class="video">
            <iframe width="100%" height="315" src="https://www.youtube-nocookie.com/embed/6RXTcdvS0-w" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
        </div>
    </section>

    <section class="catProduct">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title">PRODUCTS THAT CREATE AMBIENCES</h2>
                </div>
                <div class="col-md-12">
                    <div class="text">
                        <p>Levantina offers a wide portfolio in Natural Stone and Techlam® porcelain in unique and
                            trend-setting collections, facilitating the ideal choice of materials for professionals in
                            the
                            world of architecture, interior design and kitchen and bathroom design. Know here all the
                            brands, products and their different applications:</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 pad-0">
                    <div class="flex-container">
                        <div class="boxLeft textBox bgGrean">
                            <!-- normal -->
                            <div class="ih-item square effect11 left_to_right">
                                <a href="#">
                                    <div class="img whAuto">
                                        <div class="itemBox">
                                            <h3 class="titleBox">Techlam</h3>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <h3>Heading here</h3>
                                        <p class="text-black-50">Description goes here</p>
                                    </div>
                                </a>
                            </div>
                            <!-- end normal -->
                        </div>
                        <div class="boxRight imgBox">
                            <div alt="" class="imgParalax" style="background-image: url('../themes/customer/stone/img/cremamarfilcoto_portada_distribuidor.jpg')"></div>
                            <!--<img src="img/techlam_dark_cabecera.jpg" alt="" class="imgP">-->
                        </div>
                    </div>
                </div>

                <div class="col-md-12 pad-0">
                    <div class="flex-container">

                        <div class="boxRight imgBox">
                            <div alt="" class="imgParalax " style="background-image: url('../themes/customer/stone/img/naturamia_portada_distribuidor.jpg')"></div>
                            <!--<img src="img/techlam_dark_cabecera.jpg" alt="" class="imgP">-->
                        </div>
                        <div class="boxLeft textBox bgGrean">
                            <!-- normal -->
                            <div class="ih-item square effect11 right_to_left">
                                <a href="#">
                                    <div class="img whAuto">
                                        <div class="itemBox">
                                            <h3 class="titleBox">Techlam</h3>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <h3>Heading here</h3>
                                        <p class="text-black-50">Description goes here</p>
                                    </div>
                                </a>
                            </div>
                            <!-- end normal -->
                        </div>
                    </div>
                </div>

                <div class="col-md-12 pad-0">
                    <div class="flex-container">

                        <div class="boxLeft textBox bgGrean">
                            <!-- normal -->
                            <div class="ih-item square effect11 left_to_right">
                                <a href="#">
                                    <div class="img whAuto">
                                        <div class="itemBox">
                                            <h3 class="titleBox">Techlam</h3>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <h3>Heading here</h3>
                                        <p class="text-black-50">Description goes here</p>
                                    </div>
                                </a>
                            </div>
                            <!-- end normal -->
                        </div>

                        <div class="boxRight imgBox">
                            <div alt="" class="imgParalax " style="background-image: url('../themes/customer/stone/img/KALOS-Cocina-INTEGRACION-v2-1.jpg')"></div>
                            <!--<img src="img/techlam_dark_cabecera.jpg" alt="" class="imgP">-->
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <button class="btn padd-20">
                        <a href="" class="hvr-icon-wobble-horizontal">SEE ALL THE PRODUCTS
                        <i class="fa fa-arrow-right hvr-icon"></i>
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="application">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h3 class="bigTitle">
                        <strong>GEOX Stone</strong><br>
                        Xperience
                    </h3>
                    <h3>DO YOU WANT TO SEE HOW OUR MATERIALS LOOK IN REAL SPACES?</h3>
                    <div class="description">Download now and get to know our new virtual reality app. Experiment and
                        design
                        your own spaces playing with our Natural Stone and Techlam® materials. Levantina Stone Xperience
                        will make you feel your inspirations and help you turn them into projects.
                    </div>
                </div>
                <div class="col-md-3">

                </div>
            </div>
        </div>
    </section>

    <section class="news">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="title">LATEST NEWS</h4>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3">
                @foreach($allPosts as $post)
                    <div class="col mb-4">
                        <div class="card">
                            <a class="cBlack" href="{{ asset('blog/post/'.$post->slug) }}"><img src="{{ asset($post -> picture) }}" class="card-img-top" alt="{{ $post -> name }}"></a>
                            <div class="card-body">
                                <h3 class="card-title"><a class="cBlack" href="{{ asset('blog/post/'.$post->slug) }}"> {{ $post -> name }} </a></h3>
                                <div class="card-text">

                                    {{  mb_substr($post -> texts, 0, 150 , mb_detect_encoding($post -> texts)) }}

                                </div>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">
                                    {{ $post->created_at }}
                                </small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@stop
