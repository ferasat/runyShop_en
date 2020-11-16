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
                    <form action="{{ asset(route('publicSettingsSave')) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @foreach($settings as $setting)
                            <div class="form-group row">
                                <label for="{{ $setting -> id }}"
                                       class="col-sm-2 col-form-label">{{ $setting -> settingTextName }}</label>
                                <div class="col-sm-10">
                                    @if($setting -> settingName == 'siteLogo' or $setting -> settingName == 'siteIcon')
                                        <img src="{{ asset($setting -> value) }}" class="img-thumbnail">
                                        <input class="form-control" name="{{ $setting -> id }}" type="file"
                                               id="{{ $setting -> id }}">
                                    @else
                                        <input class="form-control" name="{{ $setting -> id }}" type="text"
                                               value="{{ $setting -> value }}" id="{{ $setting -> id }}">
                                    @endif
                                </div>
                            </div>
                        @endforeach

                        <button type="submit" class="btn btn-primary btn-lg btn-block waves-effect waves-light">ذخیره
                            اطلاعات
                        </button>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
