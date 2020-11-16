@extends('layouts.customer.runy.runyTemplate')
@section('title' , $settings['siteName'] )
@section('content')
    <section id="slider">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @php $y = 0 ; @endphp
                @foreach( $picsSlideshow as $pic )
                    <li data-target="#carouselExampleIndicators" data-slide-to="@php echo $y ; @endphp" class="@php if($y == 0){echo 'active';} @endphp"></li>
                    @php $y = $y + 1 ; @endphp
                @endforeach
            </ol>
            <div class="carousel-inner">
                @php $x = 1 ; @endphp
                @foreach( $picsSlideshow as $pic )
                    <div class="carousel-item @php if($x == 1){echo 'active';} @endphp">
                        <img src="{{asset($pic -> urlpic)}}" class="d-block w-100"
                             alt="{{ $pic -> text }}">
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

    <section class="banner">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <div class="bannerHome">
                        <a href="{{ asset($homePage -> service1url) }}">
                            <img src="{{asset($homePage -> service1)}}"
                                 alt="service"
                                 class="imgBannerHome">
                        </a>
                    </div>
                </div>

                <div class="col-3">
                    <div class="bannerHome">
                        <a href="{{ asset($homePage -> service2url) }}">
                            <img src="{{asset($homePage -> service2)}}" alt="service"
                                 class="imgBannerHome">
                        </a>
                    </div>
                </div>

                <div class="col-3">
                    <div class="bannerHome">
                        <a href="{{ asset($homePage -> service3url) }}">
                            <img src="{{asset($homePage -> service3)}}" alt="service"
                                 class="imgBannerHome">
                        </a>
                    </div>
                </div>

                <div class="col-3">
                    <div class="bannerHome">
                        <a href="{{ asset($homePage -> service4url) }}">
                            <img src="{{asset($homePage -> service4)}}" alt="service"
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
                    <div class="title_warp_dgs">
                        <i aria-hidden="true" class="far fa-clock"></i>
                        <div class="title-warp">تازه ترین محصولات</div>
                        <small>Recent Products</small>
                    </div>
                    <div class="owl-carousel owl-theme">
                        @foreach($allProducts as $product)
                            <div class="box-product">
                                <a class="item" href="{{ asset('product/'.$product->slug) }}">
                                    <img class="mw-100" src="{{ asset($product -> picture) }}"
                                         alt="{{ $product -> name }}">
                                    <h4 class="link-subject"
                                        title="{{ $product -> name }}">{{ $product -> name }}</h4>
                                    <div class="box-infos">
                                        @if($product -> customShow == 'فروش آنلاین')
                                            <div class="price">
                                                {{ $product -> price }} تومان
                                            </div>
                                            <a onclick="addToCart({{ $product -> id }})" class="btn btn-cart w-100"
                                               id="btn-kharid" value="خرید">خرید</a>
                                            {{--<a  onclick="return callmymethod()" class="btn btn-cart w-100" id="btn-kharid" value="خرید">خرید</a>
                                            <input  onclick="addToCart(event)" class="btn btn-cart w-100" id="btn-kharid" value="خرید">--}}
                                        @else
                                            <div class="btnBlokKharid text-center ">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-border-th w-100" >
                                                    تماس و استعلام قیمت
                                                    <svg class="svgIcon" version="1.1" id="iconcallKharid"
                                                         xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                         viewBox="0 0 512 512"
                                                         style="enable-background:new 0 0 512 512;"
                                                         xml:space="preserve">
<path style="fill:#00758d;" d="M255.136,413.76c-66.048-36.448-120.704-90.752-157.216-156.736c0,0,24.928-15.008,45.696-29.408
	c12.32-8.512,15.936-24.544,10.048-38.304c-13.12-30.656-21.632-63.712-24.544-98.4C127.84,75.488,114.176,64,98.656,64H16
	C7.328,64,0,71.104,0,79.776C-0.128,318.144,193.856,512.128,432.224,512c8.672,0,15.776-7.328,15.776-16v-82.656
	c0-15.488-11.488-29.152-26.944-30.464c-34.656-2.912-67.712-11.424-98.336-24.544c-13.76-5.888-29.76-2.272-38.272,10.048
	C270.08,389.056,255.136,413.76,255.136,413.76z"/>
                                                        <path style="fill:#00758d;" d="M352,0c-88.224,0-160,57.408-160,128c0,33.248,15.264,63.872,43.2,87.232L224.32,268.8
	c-1.248,6.144,1.184,12.416,6.24,16.096c2.784,2.048,6.112,3.104,9.44,3.104c2.656,0,5.344-0.672,7.744-2.016l62.24-34.496
	C323.776,254.496,337.888,256,352,256c88.224,0,160-57.408,160-128S440.224,0,352,0z"/>
                                                        <g>
                                                        </g>
                                                        <g>
                                                        </g>
                                                        <g>
                                                        </g>
                                                        <g>
                                                        </g>
                                                        <g>
                                                        </g>
                                                        <g>
                                                        </g>
                                                        <g>
                                                        </g>
                                                        <g>
                                                        </g>
                                                        <g>
                                                        </g>
                                                        <g>
                                                        </g>
                                                        <g>
                                                        </g>
                                                        <g>
                                                        </g>
                                                        <g>
                                                        </g>
                                                        <g>
                                                        </g>
                                                        <g>
                                                        </g>
</svg>

                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="modelCall" tabindex="-1" role="dialog"
                                                     aria-labelledby="modelCallLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modelCallLabel">
                                                                    شماره تماس :
                                                                    <span>
                                                    <a href="tel:+98{{ $settings['phoneNumber'] }}">{{ $settings['phoneNumber'] }}</a>
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                         class="bi bi-telephone-fill" fill="currentColor"
                                                         xmlns="http://www.w3.org/2000/svg" color="#28b873">
                                                        <path fill-rule="evenodd"
                                                              d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.47 17.47 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969z"/>
                                                    </svg>
                                                </span></h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <ul class="callbax">
                                                                    <li class="itemcal">
                                                                        <a href="{{ asset($settings['linkWhatsapp'] ) }}">
                                                                            <img
                                                                                src="{{asset('themes/customer/runy/img/whatsapp.png')}}"
                                                                                alt="whatsapp">
                                                                            تماس در واتس آپ
                                                                        </a>
                                                                    </li>
                                                                    <li class="itemcal">
                                                                        <a href="{{ asset($settings['linkTelegram'] ) }}">
                                                                            <img
                                                                                src="{{asset('themes/customer/runy/img/telegram.png')}}"
                                                                                alt="telegram">
                                                                            ارتباط در تلگرام
                                                                        </a>
                                                                    </li>
                                                                    <li class="itemcal">
                                                                        <a href="{{ asset($settings['linkInstagram'] ) }}">
                                                                            <img
                                                                                src="{{asset('themes/customer/runy/img/instagram.png')}}"
                                                                                alt="instagram">
                                                                            پیج اینستاگرام
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <p>
                                                                    لطفا در ساعات کاری تماس بگیرید
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="servic-slider">

                    <div id="carouselServices" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @php $z = 0 ; @endphp
                            @foreach( $picsSlideBanner1url as $pic )
                                <li data-target="#carouselExampleIndicators" data-slide-to="@php echo $z ; @endphp" class="@php if($z == 0){echo 'active';} @endphp"></li>
                                @php $z = $z + 1 ; @endphp
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @php $i = 1 ; @endphp
                            @foreach( $picsSlideBanner1url as $pic )
                                <div class="carousel-item @php if($i == 1){echo 'active';} @endphp">
                                    <img src="{{asset($pic -> urlpic)}}" class="d-block w-100"
                                         alt="{{ $pic -> text }}">
                                </div>
                                @php $i = $i + 1 ; @endphp
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExample2" role="button"
                           data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExamp2" role="button"
                           data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

    </section>

    <section class="banner">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="bannerHome">
                        <a href="{{ asset($homePage -> banner2url) }}">
                            <img src="{{ asset($homePage -> banner2) }}" alt=""
                                 class="imgBannerHome">
                        </a>
                    </div>
                </div>

                <div class="col-6">
                    <div class="bannerHome">
                        <a href="{{ asset($homePage -> banner3url) }}">
                            <img src="{{ asset($homePage -> banner3) }}" alt=""
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
