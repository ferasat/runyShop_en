<!doctype html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset($settings['siteIcon']) }}" title="Favicon" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!----Slider owl 2------>
    <link rel="stylesheet" href="{{ asset('themes/customer/runy/plugins/owlcarousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/customer/runy/plugins/owlcarousel/css/owl.theme.default.min.css') }}">
    <!-- Bootstrap 4.4 CSS -->
    <link rel="stylesheet" href="{{ asset('themes/customer/runy/css/bootstrap.css') }}">
    <!--RunY Css-->
    <link rel="stylesheet" href="{{ asset('themes/customer/runy/css/runy.css') }}">
    <script src="{{ asset('themes/customer/runy/js/jquery-3.4.1.slim.min.js') }}"></script>


    {{-- owl carousel --}}
    <script src="{{ asset('themes/customer/runy/plugins/owlcarousel/js/owl.carousel.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(".owl-carousel").owlCarousel({
                rtl: true,
                nav: false,
                margin: 15,
                item : 5 ,
                autoPlay: 3000, //Set AutoPlay to 3 seconds
                itemsDesktop : [1199,3],
                itemsDesktopSmall : [979,3],
                responsive:
                            {
                                0:{items:1},
                                575:{items:2},
                                768:{items:3},
                                991:{items:4},
                                1199:{items:4}
                            }
            });
        });

    </script>

</head>
<body>
<div class="main">
    <div class="">
        @include('layouts.customer.runy.menu.topMenu')
        @yield('content')

    </div>
</div>
<footer>
    <div id="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="footerMenu">
                        <ul class="footerUlMenu">
                            <li class="linkFooterMenu">
                                <a href="{{ $settings['siteUrl'] }}">خانه</a>
                            </li>
                            <li class="linkFooterMenu">
                                <a href="{{ $settings['siteUrl'] }}">فروشگاه</a>
                            </li>
                            <li class="linkFooterMenu">
                                <a href="{{ $settings['siteUrl'] }}">تماس</a>
                            </li>
                            <li class="linkFooterMenu">
                                <a href="{{ $settings['siteUrl'] }}">درباره ما</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="footer footer1">
                        <div class="">
                            <img src="{{ asset($settings['siteLogo']) }}" alt="{{ $settings['siteName'] }}"
                                 title="{{ $settings['siteName'] }}" class="imgLogo">
                            <p>
                                {{ $settings['siteDescription'] }}
                            </p>
                            <div class="infoContactFooter">
                                <ul class="ulFooter">
                                    <li class="linkFooter">
                                        <a href="tel:+98{{ $settings['phoneNumber'] }}">{{ $settings['phoneNumber'] }}</a>
                                    </li>
                                    <li class="linkFooter">
                                        <a href="mail:{{ $settings['adminEmail'] }}">{{ $settings['adminEmail'] }}</a>
                                    </li>
                                    <li class="linkFooter">
                                        <p>
                                            {{ $settings['address'] }}
                                        </p>
                                    </li>
                                </ul>
                                <ul class="callbaxMenu">
                                    <li class="itemcal">
                                        <a href="{{ asset($settings['linkWhatsapp'] ) }}">
                                            <img
                                                src="{{asset('themes/customer/runy/img/whatsapp.png')}}"
                                                alt="whatsapp">
                                        </a>
                                    </li>
                                    <li class="itemcal">
                                        <a href="{{ asset($settings['linkTelegram'] ) }}">
                                            <img
                                                src="{{asset('themes/customer/runy/img/telegram.png')}}"
                                                alt="telegram">
                                        </a>
                                    </li>
                                    <li class="itemcal">
                                        <a href="{{ asset($settings['linkInstagram'] ) }}">
                                            <img
                                                src="{{asset('themes/customer/runy/img/instagram.png')}}"
                                                alt="instagram">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer footer2">
                        <div class="titleFooter">
                            <h5>تازه ترین محصولات</h5>
                        </div>
                        <div class="recentFooter">
                            <ul class="uiPost">
                                @foreach($recentProducts as $product)
                                    <li class="linkPost">
                                        <a href="{{ asset('/product/'.$product -> slug ) }}">{{ $product -> name }}</a><br>
                                        <span>{{ $product -> price }}  </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer footer3">
                        <div class="titleFooter">
                            <h5>تازه های وبلاگ</h5>
                        </div>
                        <div class="recentFooter">
                            <ul class="uiPost">
                                @foreach($allPosts as $post)
                                    <li class="linkPost">
                                        <a href="{{ asset('/blog/post/'.$post -> slug ) }}" title="{{ $post -> name }}">{{ $post -> name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer footer4"></div>
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->


<script src="{{ asset('themes/customer/runy/js/popper.min.js') }}"></script>
<script src="{{ asset('themes/customer/runy/js/bootstrap.min.js') }}"></script>
</body>
</html>
