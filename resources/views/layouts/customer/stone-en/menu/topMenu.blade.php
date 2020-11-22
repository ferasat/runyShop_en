<header class="bg-dark">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark navPad">
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
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about-us">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/content-us">Content Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>

                </ul>
                <form class="iconsCell my-2 my-lg-0">
                    <ul class="social-area">
                        <li class="social-source-icon"><a onclick="window.open('https://wa.me/+34683316226')"><img src="{{ asset('themes/customer/stone/img/skype.jpg') }}" alt="Skype"></a></li>
                        <li class="social-source-icon"><a onclick="window.open('https://wa.me/+34683316226')"><img src="{{asset('themes/customer/stone/img/whatsapp.jpg')}}" alt="whatsapp"></a></li>
                    </ul>
                </form>
            </div>
        </nav>
    </div>
</header>
