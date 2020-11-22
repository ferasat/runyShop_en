<header id="topnav">
    <div class="topbar-main">
        <div class="container-fluid">

            <!-- Logo-->
            <div>

                <a href="{{asset('/')}}" class="logo">
                    <img src="{{ asset('themes/user/horizontal-rtl/assets/images/logo.png') }}" alt="" height="26">
                </a>

            </div>
            <!-- End Logo-->

            <div class="menu-extras topbar-custom navbar p-0">

                <ul class="list-inline d-none d-lg-block mb-0">
                    <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            ارتباط با مدیر <i class="mdi mdi-plus"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-animated">
                            <a class="dropdown-item" href="#">ارسال پیام جدید به مدیر </a>

                        </div>
                    </li>
                    <li class="list-inline-item notification-list">
                        <a href="#" class="nav-link waves-effect">
                            همه پیام ها
                        </a>
                    </li>

                </ul>

                <!-- Search input -->
                <div class="search-wrap" id="search-wrap">
                    <div class="search-bar">
                        <input class="search-input" type="search" placeholder="Search" />
                        <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                            <i class="mdi mdi-close-circle"></i>
                        </a>
                    </div>
                </div>

                <ul class="list-inline ml-auto mb-0">

                    <!-- notification-->

                    <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link waves-effect toggle-search" href="#"  data-target="#search-wrap">
                            <i class="mdi mdi-magnify noti-icon"></i>
                        </a>
                    </li>

                    <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <i class="mdi mdi-bell-outline noti-icon"></i>
                            <span class="badge badge-pill noti-icon-badge">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg dropdown-menu-animated">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5>اعلان ها (3)</h5>
                            </div>

                            <div class="slimscroll-noti">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                    <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                    <p class="notify-details"><b>محصول جدید منتشر شد</b><span class="text-muted">اولین محصول تست منتشر شد.</span></p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-danger"><i class="mdi mdi-message-text-outline"></i></div>
                                    <p class="notify-details"><b>پیام جدید دارید</b><span class="text-muted">شما یک پیام جدید از مدیر دارید </span></p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-info"><i class="mdi mdi-filter-outline"></i></div>
                                    <p class="notify-details"><b>سفارش جدید ثبت شد</b><span class="text-muted">یک سفارش جدید ثبت شده دارید </span></p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-danger"><i class="mdi mdi-message-text-outline"></i></div>
                                    <p class="notify-details"><b>پیام جدید دارید</b><span class="text-muted">شما یک پیام جدید از مدیر دارید </span></p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-danger"><i class="mdi mdi-message-text-outline"></i></div>
                                    <p class="notify-details"><b>پیام جدید دارید</b><span class="text-muted">شما یک پیام جدید از مدیر دارید </span></p>
                                </a>

                            </div>


                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item notify-all">
                                دیدن همه اعلان ها
                            </a>

                        </div>
                    </li>
                    <!-- User-->
                    <li class="list-inline-item dropdown notification-list nav-user">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <img src="{{ asset(Auth::user()->pic) }}" alt="user" class="rounded-circle">
                            <span class="d-none d-md-inline-block ml-1">{{ $name_user = Auth::user()->name }}<i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                            <a class="dropdown-item" href="#"><i class="dripicons-user text-muted"></i> حساب کاربری</a>
                            <a class="dropdown-item" href="#"><i class="dripicons-wallet text-muted"></i> تراکنش ها </a>
                            <a class="dropdown-item" href="#"><span class="badge badge-success float-right m-t-5">5</span><i class="dripicons-message text-muted"></i> پیام مشتریان</a>
                            <a class="dropdown-item" href="#"><i class="dripicons-gear text-muted"></i> تنظیمات</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="dripicons-exit text-muted"></i> خروج </a>
                        </div>
                    </li>
                    <li class="menu-item list-inline-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>

                </ul>

            </div>
            <!-- end menu-extras -->

            <div class="clearfix"></div>

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->

    <!-- MENU Start -->
    <div class="navbar-custom">
        <div class="container-fluid">

            <div id="navigation">

                <!-- Navigation Menu-->
                <ul class="navigation-menu">

                    <li class="has-submenu">
                        <a href="{{asset('/dashboard')}}"><i class="dripicons-home"></i> پیشخوان</a>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="dripicons-archive"></i>  فروشگاه <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                        <ul class="submenu">
                            <li><a href="{{ asset('/dashboard/product') }}">همه محصولات</a></li>
                            <li><a href="{{ asset('/dashboard/product/new') }}"> محصول جدید</a></li>
                            <li><a href="{{ asset(route('catPro')) }}">دستبندی محصولات</a></li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="dripicons-archive"></i>  سفارشات <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                        <ul class="submenu">
                            <li><a href="{{ asset(route('indexOffLine')) }}">همه سفارشات </a></li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="dripicons-archive"></i>  نوشته ها <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                        <ul class="submenu">
                            <li><a href="{{ asset('/dashboard/posts') }}">همه نوشته ها</a></li>
                            <li><a href="{{ asset('/dashboard/posts/new') }}"> نوشته جدید</a></li>
                            <li><a href="{{ asset(route('categoryPost')) }}">دستبندی نوشته ها</a></li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="dripicons-archive"></i>  برگه ها <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                        <ul class="submenu">
                            <li><a href="{{ asset(route('indexPage')) }}">همه برگه ها</a></li>
                            <li><a href="{{ asset(route('newPage')) }}"> برگه جدید</a></li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="dripicons-archive"></i>  اسلاید ساز <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                        <ul class="submenu">
                            <li><a href="{{ asset(route('listSlides')) }}">همه اسلاید ها</a></li>
                            <li><a href="{{ asset(route('newSlide')) }}"> اسلاید جدید</a></li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="dripicons-archive"></i>  تنظیمات <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                        <ul class="submenu">
                            <li><a href="{{ asset('/dashboard/settings') }}">تنظیمات عمومی </a></li>
                            <li><a href="{{ asset('/dashboard/settings/HomePage') }}"> تنظیمات صفحه اول </a></li>
                        </ul>
                    </li>

                </ul>
                <!-- End navigation menu -->
            </div> <!-- end #navigation -->
        </div> <!-- end container -->
    </div> <!-- end navbar-custom -->
</header>
