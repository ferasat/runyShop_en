@extends('layouts.user.template')
@section('title' , $titlePage)
@section('content')

    <!-- Page-Title -->
    @include('layouts.user.breadcrumb')
    <!-- end page title end breadcrumb -->
    <div class="row ">

        <div class="col-md-12">
            <div class="card m-b-30">

                <div class="card-body">
                    <form class="" action="{{ asset(route('saveNewSlide')) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label> عنوان : </label>
                                <input name="subject" type="text" class="form-control" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>توضیحات : </label>
                                <textarea name="text" type="text" class="form-control" placeholder="اختیاری"></textarea>
                            </div>
                        </div>

                        <div id="picSlid">
                            <div class="card-body">

                                <h4 class="mt-0 header-title">تصاویر اسلاید</h4>
                                <p class="text-muted m-b-30">
                                    لطفا تصاویر اسلاید شو را بارگزاری کنید
                                </p>

                                <div id="repeaterSlid">
                                    <div class="repeater-heading">
                                        <input class="btn btn-primary repeater-add-btn" type="button"
                                               value="اضافه کردن اسلاید" onclick="slidJs.Addslid();"/>
                                    </div>
                                    <div class="div_slids_host"></div>
                                </div>


                            </div>
                        </div>

                        <div class="form-row">
                            <input name="submit" type="submit" class="btn btn-info w-100" value="ذخیره کن">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
