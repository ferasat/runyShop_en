@extends('layouts.user.template')
@section('title' , $titlePage)
@section('content')
    <!-- Page-Title -->
    @include('layouts.user.breadcrumb')
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">تنظیمات کلی و عمومی سایت</h4>
                    <p class="text-muted m-b-30 font-14">

                    </p>
                    <form action="{{ asset(route('saveHomePage')) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="slide_id"
                                   class="col-sm-2 col-form-label">شناسه اسلاید را وارد کنید</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="slide_id" type="number"
                                       value="{{ $setting -> slide_id }}" id="slide_id">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="service1"
                                   class="col-sm-2 col-form-label">تصویر سرویس اول</label>
                            <div class="col-sm-10">
                                @if($setting -> service1 !== null)
                                    <img src="{{ asset($setting -> service1) }}" class="thumb-lg" alt="">
                                @endif
                                <input class="form-control" name="service1" type="file"
                                       value="{{ $setting -> service1 }}" id="service1">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="service1url"
                                   class="col-sm-2 col-form-label">لینک سرویس اول</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="service1url" type="text"
                                       value="{{ $setting -> service1url }}" id="service1url">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="service2"
                                   class="col-sm-2 col-form-label">تصویر سرویس دوم</label>
                            <div class="col-sm-10">
                                @if($setting -> service2 !== null)
                                    <img src="{{ asset($setting -> service2) }}" class="thumb-lg" alt="">
                                @endif
                                <input class="form-control" name="service2" type="file"
                                       value="{{ $setting -> service2 }}" id="service2">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="service2url"
                                   class="col-sm-2 col-form-label">لینک سرویس دوم</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="service2url" type="text"
                                       value="{{ $setting -> service2url }}" id="service2url">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="service3"
                                   class="col-sm-2 col-form-label">تصویر سرویس سوم</label>
                            <div class="col-sm-10">
                                @if($setting -> service3 !== null)
                                    <img src="{{ asset($setting -> service3) }}" class="thumb-lg" alt="">
                                @endif
                                <input class="form-control" name="service3" type="file"
                                       value="{{ $setting -> service3 }}" id="service3">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="service3url"
                                   class="col-sm-2 col-form-label">لینک سرویس سوم</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="service3url" type="text"
                                       value="{{ $setting -> service3url }}" id="service3url">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="service4"
                                   class="col-sm-2 col-form-label">تصویر سرویس چهارم</label>
                            <div class="col-sm-10">
                                @if($setting -> service3 !== null)
                                    <img src="{{ asset($setting -> service4) }}" class="thumb-lg" alt="">
                                @endif
                                <input class="form-control" name="service4" type="file"
                                       value="{{ $setting -> service4 }}" id="service4">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="service4url"
                                   class="col-sm-2 col-form-label">لینک سرویس چهارم</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="service4url" type="text"
                                       value="{{ $setting -> service3url }}" id="service4url">

                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="banner1url"
                                   class="col-sm-2 col-form-label">شناسه اسلایدخدماتی</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="banner1url" type="text"
                                       value="{{ $setting -> banner1url }}" id="banner1url">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="banner2"
                                   class="col-sm-2 col-form-label">تصویر بنر دوم</label>
                            <div class="col-sm-10">
                                @if($setting -> banner2 !== null)
                                    <img src="{{ asset($setting -> banner2) }}" class="thumb-lg" alt="">
                                @endif
                                <input class="form-control" name="banner2" type="file"
                                       value="{{ $setting -> banner2 }}" id="banner2">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="banner2url"
                                   class="col-sm-2 col-form-label">لینک بنر دوم</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="banner2url" type="text"
                                       value="{{ $setting -> banner2url }}" id="banner2url">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="banner3"
                                   class="col-sm-2 col-form-label">تصویر بنر سوم</label>
                            <div class="col-sm-10">
                                @if($setting -> banner3 !== null)
                                    <img src="{{ asset($setting -> banner3) }}" class="thumb-lg" alt="">
                                @endif
                                <input class="form-control" name="banner3" type="file"
                                       value="{{ $setting -> banner3 }}" id="banner3">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="banner3url"
                                   class="col-sm-2 col-form-label">لینک بنر سوم</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="banner3url" type="text"
                                       value="{{ $setting -> banner3url }}" id="banner3url">

                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary btn-lg btn-block waves-effect waves-light">ذخیره
                            اطلاعات
                        </button>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
