@extends('layouts.user.template')
@section('title' , $titlePage)
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">{{ $titlePage }}</h4>
                    </div>
                    <div class="col-md-4">
                        <div class="float-right d-none d-md-block">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    <i class="ti-settings mr-1"></i> دسترسی بیشتر
                                </button>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated">
                                    <a class="dropdown-item" href="{{asset('/dashboard/product/new')}}">نوشته جدید
                                        </a>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{asset('/')}}">Separated link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->
    <form action="{{asset(route('savePage'))}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="text-muted">عنوان برگه</h6>
                        <p class="text-muted m-b-15">
                            عنوان را در 175 واژه بنویسید :
                        </p>
                        <input type="text" class="form-control" maxlength="175" name="name" required/>
                        <p class="text-muted m-b-15">
                            لینک عنوان :
                        </p>
                        <input type="text" class="form-control" maxlength="175" name="url"/>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="text-muted">متن برگه </h6>
                        <textarea name="texts" id="short" class="summernote"> </textarea>

                    </div>
                </div>
            </div>

        </div>


        <div class="row">
            <div class="col-4">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">تصویر برگه</h4>
                        <p class="text-muted m-b-30">
                            تصویر محصول را بهتر است که در ابعاد 800*800 پیکسل (بصورت مربعی) بارگزاری کنید .
                        </p>

                        <div class="m-b-30">

                            <div class="fallback">
                                <input name="picture" type="file" class="form-control">
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">سئو : (این بخش اختیاری هست)</h4>
                        <p class="text-muted m-b-30">

                        </p>

                        <div class="form-group row">
                            <label for="example-text-input-lg" class="col-sm-2 col-form-label">عنوان سئو</label>
                            <div class="col-sm-10">
                                <input class="form-control form-control-lg" type="text" name="titleSeo">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input-lg" class="col-sm-2 col-form-label">توضیح متا</label>
                            <div class="col-sm-10">
                                <input class="form-control form-control-lg" type="text" name="metaDescription">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input-lg" class="col-sm-2 col-form-label">عبارت کلیدی
                                کانونی</label>
                            <div class="col-sm-10">
                                <input class="form-control form-control-lg" type="text" name="focusKeyword">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">انتشار</h4>
                        <p class="text-muted m-b-30">
                            وضعیت انتشار را مشخص کنید . در وضعیت های "برای برسی" و "پیش نویس" محصول در سایت نمایش داده
                            نمی شود و فقط برای شما قابل نمایش هست .
                        </p>
                        <div class="form-group row">
                            <div class="col-sm-2 col-form-label ">در چه وضعیتی منتشر شود :</div>
                            <div class="col-sm-10">
                                <select class="custom-select" name="statusPublish" required>
                                    <option value="publish" selected>publish</option>
                                    <option value="forCheck">for Check</option>
                                    <option value="draft">draft</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 ">
                                <input type="submit" class="btn btn-success" value="ذخیره کن">
                                <input type="hidden" name="uniqid" value="@php echo uniqid() @endphp">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>

@endsection
