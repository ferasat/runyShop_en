@extends('layouts.customer.runy.runyTemplate')
@section('title' , $settings['siteName'] )
@section('content')
    <section id="slider">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{asset('themes/customer/runy/img/1000023283.jpg')}}" class="d-block w-100"
                                     alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('themes/customer/runy/img/1000023327.jpg')}}" class="d-block w-100"
                                     alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('themes/customer/runy/img/1000023501.jpg')}}" class="d-block w-100"
                                     alt="...">
                            </div>
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
                </div>
                <div class="col-4">
                    <div class="card">
                        <img src="{{asset('themes/customer/runy/img/1000023528.gif')}}" class="card-img-top" alt="...">
                    </div>
                    <div class="card">
                        <img src="{{asset('themes/customer/runy/img/1000023525.jpg')}}" class="card-img-top" alt="...">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="banner">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <div class="bannerHome">
                        <a href="#">
                        <img src="http://live.hamkarwp.com/Sigma/wp-content/uploads/2020/04/banner04-1.jpeg" alt=""
                             class="imgBannerHome">
                        </a>
                    </div>
                </div>

                <div class="col-3">
                    <div class="bannerHome">
                        <a href="#">
                        <img src="http://live.hamkarwp.com/Sigma/wp-content/uploads/2020/04/banner04-1.jpeg" alt=""
                             class="imgBannerHome">
                        </a>
                    </div>
                </div>

                <div class="col-3">
                    <div class="bannerHome">
                        <a href="#">
                        <img src="http://live.hamkarwp.com/Sigma/wp-content/uploads/2020/04/banner04-1.jpeg" alt=""
                             class="imgBannerHome">
                        </a>
                    </div>
                </div>

                <div class="col-3">
                    <div class="bannerHome">
                        <a href="#">
                        <img src="http://live.hamkarwp.com/Sigma/wp-content/uploads/2020/04/banner04-1.jpeg" alt=""
                             class="imgBannerHome">
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="recent-product">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4 class="title h4"> تازه ترین مطالب :</h4>
                </div>

                <div class="col-12">
                    <div class="row recentPosts">
                        @foreach($allPosts as $post)
                            <div class="col-4">
                            <div class="box-product">
                                <a class="item" href="{{ asset('blog/post/i/'.$post->id) }}">
                                    <img class="imgPostRecent" src="{{ asset($post -> picture) }}" alt="{{ $post -> name }}">
                                    <h4 class="link-subject" title="{{ $post -> name }}">{{ $post -> name }}</h4>
                                    <div class="box-infos">
                                        <div class="category">

                                        </div>

                                    </div>
                                </a>
                            </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="banner">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="bannerHome">
                        <a href="#">
                            <img src="http://live.hamkarwp.com/Sigma/wp-content/uploads/2020/04/banner05-1.jpeg" alt=""
                                 class="imgBannerHome">
                        </a>
                    </div>
                </div>

                <div class="col-6">
                    <div class="bannerHome">
                        <a href="#">
                            <img src="http://live.hamkarwp.com/Sigma/wp-content/uploads/2020/04/banner05-1.jpeg" alt=""
                                 class="imgBannerHome">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function addToCart(id) {
            console.log(id);
            var request = new XMLHttpRequest();
            request.open('GET', '/test/t');
            request.onreadystatechange = function () {
                if ((request.readyState === 4) && (request.status === 200)) {
                    console.log(request);
                    document.writeln(request.responseText);
                    document.getElementById('btn-kharid').innerHTML = 'خرید شد  ';
                }
            }

            console.log(request);
            // request.send();
        }

        /*        function addToCart(e) {
                    e.preventDefault ();
                    console.log('okey');
                }

                function callmymethod() {
                    console.log('test ');
                }*/
    </script>
@stop
