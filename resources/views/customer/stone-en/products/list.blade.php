@extends('layouts.customer.runy.runyTemplate')
@section('title' , 'گلپاکالا')
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

    <section id="recent-product">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <img class="banner-home" src="https://www.digikala.com/static/files/d9b15d68.png" alt="">
                </div>
                <div class="col-9">
                    <div class="owl-carousel owl-theme">
                        @foreach($allProducts as $product)
                            <div class="box-product">
                                <a class="item" href="{{ asset('') }}">
                                    <img src="https://dkstatics-public.digikala.com/digikala-products/111769747.jpg"
                                         alt="test">
                                    <h4 class="link-subject">{{ $product -> name }}</h4>
                                    <div class="box-infos">
                                        <div class="price">
                                            {{ $product -> price }} تومان
                                        </div>
                                        <a  onclick="addToCart({{ $product -> id }})" class="btn btn-cart w-100" id="btn-kharid" value="خرید">خرید</a>
                                        {{--<a  onclick="return callmymethod()" class="btn btn-cart w-100" id="btn-kharid" value="خرید">خرید</a>
                                        <input  onclick="addToCart(event)" class="btn btn-cart w-100" id="btn-kharid" value="خرید">--}}
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="banner">
        <div class="container">
            <div class="row">
                <div class="col-12">

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
                    document.getElementById('btn-kharid').innerHTML = 'خرید شد  ' ;
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
