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

    <link rel="stylesheet" href="{{ asset('themes/customer/stone/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/customer/stone/css/hover.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/customer/stone/css/runyStyle.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" media="all">


    <!-- Scripts -->
    <script src="{{ asset('themes/customer/stone/js/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('themes/customer/stone/js/popper.min.js') }}"></script>
    <script src="{{ asset('themes/customer/stone/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="">
    </script>



</head>
<body>

@include('layouts.customer.stone-en.menu.topMenu')
@yield('content')

<section class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="widget">
                    <div class="title">PRODUCTS</div>
                    <div class="contentItem">
                        <div class="shortcuts-content">
                            <ul>
                                <li><a href="https://www.levantina.com/en/product/crema-marfil-coto/"
                                       title="Crema Marfil Coto®" class="text09" >Crema Marfil
                                        Coto®</a></li>
                                <li><a href="https://www.levantina.com/en/product/marble/" title="Marble" class="text09"
                                       >Marble</a></li>
                                <li><a href="https://www.levantina.com/en/product/naturamia-collection/"
                                       title="Naturamia®" class="text09" >Naturamia®</a></li>
                                <li><a href="https://www.levantina.com/en/product/naturamia-quartzites/"
                                       title="Naturamia® Quartzites" class="text09" >Naturamia®
                                        Quartzites</a></li>
                                <li><a href="https://www.levantina.com/en/product/granite/" title="Granite"
                                       class="text09" >Granite</a></li>
                                <li><a href="https://www.levantina.com/en/product/techlam/" title="Techlam®"
                                       class="text09" >Techlam®</a></li>
                                <li><a href="https://www.levantina.com/en/product/techlam-top/" title="Techlam® Top"
                                       class="text09" >Techlam® Top</a></li>
                                <li><a href="https://www.levantina.com/en/product/tile-collection/"
                                       title="Tiles for Bathrooms, Kitchens and Walls" class="text09"
                                       >Tiles for Bathrooms, Kitchens and Walls</a></li>
                                <li><a href="https://www.levantina.com/en/product/limestone-and-sandstone/"
                                       title="Limestone and Sandstone" class="text09" >Limestone and
                                        Sandstone</a></li>
                                <li><a href="https://www.levantina.com/en/product/travertine/" title="Travertine"
                                       class="text09" >Travertine</a></li>
                                <li><a href="https://www.levantina.com/en/product/pavex/" title="PAVEX" class="text09"
                                       >PAVEX</a></li>
                            </ul>
                            <a href="/en/products" title="All the products" class="link" >All the
                                products</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row bottomNav">

            <div class="col-md-8">
                <ul class="bottomLinks">
                    <li><a href="/en/contact" title="Contact" class="bottomLink">Contact</a></li>
                    <li><a href="/en/site-map" title="Sitemap" class="bottomLink">Sitemap</a></li>
                    <li><a href="/en/legal-notice" title="Legal Notice" class="bottomLink">Legal Notice</a></li>
                    <li class="endLi"><a href="/en/downloads" title="Downloads" class="bottomLink">Downloads</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <div class="siteName title">GEOX Stone</div>
                <div class="des">The Natural Stone Company</div>
            </div>

        </div>
    </div>
</section>

<a onclick="window.open('https://wa.me/+34683316226')" class="whatsapp-button" >
    <img src="{{ asset('themes/customer/stone/img/whatsapp.png') }}" alt="whatsapp">
</a>
</body>
</html>
