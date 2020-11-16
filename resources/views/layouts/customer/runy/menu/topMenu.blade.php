<div class="container-fluid header-home">
    <nav class="top-20 navbar navbar-expand-lg">
        <a class="navbar-brand" href="{{ url('http://'.$settings['siteUrl']) }}">
            @if(isset($settings['siteLogo']))
                <span class="logo">
                    <img src="{{ asset($settings['siteLogo']) }}" alt="{{ $settings['siteName'] }}"
                         title="{{ $settings['siteName'] }}" class="imgLogo">
                </span>
            @else
                {!! $settings['siteName'] !!}
            @endif
            {{--<strong class="golpa">گلپا</strong><strong class="kala">کالا</strong>--}}
        </a>


        <div class="w-100 d-flex justify-content-end">
            <form method="get" action="{{asset('/s')}}" class="topMenuSearch">
                <div class="col-auto">
                    <label class="sr-only" for="inlineFormInputGroup">Username</label>
                    <div class="input-group mb-2">

                        <input type="text" name="search" class="form-control"  placeholder="کلمه را وارد کنید">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><button class="btnSearch" type="submit" >جستجو</button></div>
                        </div>
                    </div>
                </div>
            </form>
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
    </nav>
    <nav class="main-nav navbar navbar-expand-lg navbar-light bg-white">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ asset('/') }}">خانه <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        محصولات
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ asset('/cat-product?id=7')  }}">سوئیچ</a>
                        <a class="dropdown-item" href="{{ asset('/cat-product?id=8') }}">روتر</a>
                        <a class="dropdown-item" href="{{ asset('/cat-product?id=9') }}">سرور</a>
                        <a class="dropdown-item" href="{{ asset('/cat-product?id=10') }}">تجهیزات وایرلس</a>
                        <a class="dropdown-item" href="{{ asset('/cat-product?id=11') }}">پسیو</a>
                        <a class="dropdown-item" href="{{ asset('/cat-product?id=12') }}">فیبر نوری</a>
                        <a class="dropdown-item" href="{{ asset('/cat-product?id=13') }}">تجهیزات voip</a>
                        <a class="dropdown-item" href="{{ asset('/cat-product?id=14') }}">مودم</a>
                        <a class="dropdown-item" href="{{ asset('/cat-product?id=14') }}">استوریج ذخیره سازها</a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ asset('/product/shop') }}">فروشگاه</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        خدمات
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ asset('/blog/post?id=12')  }}">پشتیبانی شبکه</a>
                        <a class="dropdown-item" href="{{ asset('/blog/post?id=9')  }}">پیاده سازی VOIP</a>
                        <a class="dropdown-item" href="{{ asset('/blog/post?id=16')  }}">سرور</a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ asset('/product/shop') }}">مشاوره رایگان</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{asset('/blog/cat-post?id=13')}}">مجله</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ asset('/blog/cat-post?id=9') }}">پروژه ها</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{asset('/blog/post?id=3')}}">ارتباط با ما</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{asset('/blog/post?id=13')}}">درباره ما</a>
                </li>

            </ul>

        </div>
    </nav>
</div>
