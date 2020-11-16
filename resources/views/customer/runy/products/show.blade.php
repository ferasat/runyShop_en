@extends('layouts.customer.runy.runyTemplate')
@section('title' , $id -> name    )
@section('content')
    <section id="show-product">

        <div class="container-fluid">
            <div class="bgInfo">
                @if(session()->has('success'))
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                محصول به سبد خرید اضافه شد. <strong> <a href="{{ asset('/cart') }}"> مشاهده سبد
                                        خرید </a></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-4">
                        <img class="picture img-thumbnail" src="{{ asset($id -> picture) }}" alt="{{ $id -> name }}">
                    </div>
                    <div class="col-md-5">

                        <h1 title="{{ $id -> name }}">{{ $id -> name }}</h1>
                        <div class="short">
                            {!! $id -> short !!}
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="quantyBox">
                            تعداد: <input type="number" name="quantity" id="quantity" value="1">
                        </div>
                        <br>
                        @if($id -> customShow == 'فروش آنلاین')
                            <a onclick="addToCart({{ $id -> id }})"
                               class="w-100 btn btn-outline-dark" id="btn-kharid">
                                اضافه کردن به سبد خرید
                            </a>
                        @else
                            <div class="btnBlokKharid text-center ">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-border-th w-100" data-toggle="modal"
                                        data-target="#modelCall">
                                    تماس و استعلام قیمت
                                    <svg class="svgIcon" version="1.1" id="iconcallKharid" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                         viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<path style="fill:#2196F3;" d="M255.136,413.76c-66.048-36.448-120.704-90.752-157.216-156.736c0,0,24.928-15.008,45.696-29.408
	c12.32-8.512,15.936-24.544,10.048-38.304c-13.12-30.656-21.632-63.712-24.544-98.4C127.84,75.488,114.176,64,98.656,64H16
	C7.328,64,0,71.104,0,79.776C-0.128,318.144,193.856,512.128,432.224,512c8.672,0,15.776-7.328,15.776-16v-82.656
	c0-15.488-11.488-29.152-26.944-30.464c-34.656-2.912-67.712-11.424-98.336-24.544c-13.76-5.888-29.76-2.272-38.272,10.048
	C270.08,389.056,255.136,413.76,255.136,413.76z"/>
                                        <path style="fill:#4CAF50;" d="M352,0c-88.224,0-160,57.408-160,128c0,33.248,15.264,63.872,43.2,87.232L224.32,268.8
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
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg" color="#28b873">
                                                        <path fill-rule="evenodd" d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.47 17.47 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969z"/>
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
                        <div class="alert  text-center top-20" role="alert">
                            <svg version="1.1" class="svgIcon" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
    <path style="fill:#FFC107;" d="M128,160c0-8.832-7.168-16-16-16H16c-8.832,0-16,7.168-16,16s7.168,16,16,16h96
		C120.832,176,128,168.832,128,160z"/>
    <path style="fill:#FFC107;" d="M112,208H48c-8.832,0-16,7.168-16,16s7.168,16,16,16h64c8.832,0,16-7.168,16-16S120.832,208,112,208
		z"/>
    <path style="fill:#FFC107;" d="M112,272H80c-8.832,0-16,7.168-16,16s7.168,16,16,16h32c8.832,0,16-7.168,16-16S120.832,272,112,272
		z"/>
</g>
                                <path style="fill:#F44336;" d="M509.728,263.776l-48-80C458.848,178.944,453.632,176,448,176H336c-8.832,0-16,7.168-16,16v160
	c0,8.832,7.168,16,16,16h160c8.832,0,16-7.168,16-16v-80C512,269.088,511.232,266.24,509.728,263.776z"/>
                                <polygon style="fill:#FAFAFA;" points="384,208 438.944,208 477.344,272 384,272 "/>
                                <path style="fill:#FFC107;" d="M336,112H112c-8.832,0-16,7.168-16,16v224c0,8.832,7.168,16,16,16h240V128
	C352,119.168,344.832,112,336,112z"/>
                                <circle style="fill:#FAFAFA;" cx="432" cy="352" r="32"/>
                                <path style="fill:#455A64;" d="M432,400c-26.464,0-48-21.536-48-48s21.536-48,48-48s48,21.536,48,48S458.464,400,432,400z M432,336
	c-8.8,0-16,7.2-16,16s7.2,16,16,16s16-7.2,16-16S440.8,336,432,336z"/>
                                <path style="fill:#F44336;" d="M352,368H112c-8.832,0-16-7.168-16-16v-48h256V368z"/>
                                <circle style="fill:#FAFAFA;" cx="208" cy="352" r="32"/>
                                <path style="fill:#455A64;" d="M208,400c-26.464,0-48-21.536-48-48s21.536-48,48-48s48,21.536,48,48S234.464,400,208,400z M208,336
	c-8.832,0-16,7.2-16,16s7.168,16,16,16s16-7.2,16-16S216.832,336,208,336z"/>
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
                            ارسال به کل کشور
                        </div>

                    </div>
                </div>
            </div>
            <div class="bgInfo">
                <div class="row">
                    <div class="col-md-12">
                        <div class="description">
                            <h4 class="h4">جزییات محصول</h4>
                            {!! $id -> description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <script>
        function addToCart(id) {
            console.log(id);
            var quantity = document.getElementById('quantity').value;
            console.log(quantity);
            var request = new XMLHttpRequest();
            request.open('GET', '/cart/addToCart/?id=' + id + '&quantity=' + quantity);
            request.onreadystatechange = function () {
                if ((request.readyState === 4) && (request.status === 200)) {
                    console.log(request);
                    document.writeln(request.responseText);
                    document.getElementById('btn-kharid').innerHTML = 'خرید شد  ';
                }
            };

            console.log(request);
            request.send();
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
