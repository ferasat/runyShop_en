@extends('layouts.user.template')
@section('title' , 'ویرایش محصول ')
@section('content')
    <!-- Page-Title -->
    @include('layouts.user.breadcrumb')
    <!-- end page title end breadcrumb -->
    <form action="{{asset('/dashboard/product/update')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="text-muted">نام محصول </h6>
                        <p class="text-muted m-b-15">
                            نام محصول را در 175 واژه بنویسید :
                        </p>
                        <input type="text" class="form-control" maxlength="175" name="name" value="{{ $id -> name }}"
                               required/>
                        <p class="text-muted m-b-15">
                            لینک محصول :
                        </p>
                        <input type="text" class="form-control" maxlength="175" name="slug" value="{{ $id -> slug }}"/>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="text-muted">توضیحاتی کوتاه برای محصول </h6>
                        <textarea name="short" id="short" class="summernote">{!! $id -> short !!}</textarea>

                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="col-form-label">نوع نمایش محصول :
                                    <i type="button" class="ion ion-md-information-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="در صورت انتخاب محصول نمایشی نیاز به وارد کردن اطلاعات قیمت و موجودی و .. نیست ." aria-describedby="tooltip958893"></i>
                                </label>
                                <select class="custom-select"  name="customShow">
                                    @if($id -> customShow == 'فروش آنلاین')
                                        <option selected value="فروش آنلاین">فروش آنلاین</option>
                                        <option value="محصول نمایشی">محصول نمایشی</option>
                                    @elseif($id -> customShow == 'محصول نمایشی')
                                        <option selected value="محصول نمایشی">محصول نمایشی</option>
                                        <option value="فروش آنلاین">فروش آنلاین</option>
                                    @endif
                                </select>

                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-form-label">تعداد موجودی :</label>
                                <input class="form-control form-control-sm" type="number"
                                       name="numStock" value="{{ $id -> numStock }}">

                            </div>

                            <div class="form-group col-md-4">
                                <label class="col-form-label">قیمت خرید :</label>
                                <input class="form-control form-control-sm" type="number"
                                       name="purchasePrice" value="{{ $id -> purchasePrice }}">

                            </div>

                            <div class="form-group col-md-4">
                                <label class="col-form-label">قیمت فروش :</label>
                                <input class="form-control form-control-sm" type="number"
                                       name="price" value="{{ $id -> price }}" >

                            </div>

                            <div class="form-group col-md-4">
                                <label class="col-form-label">قیمت فروش ویژه :</label>
                                <input class="form-control form-control-sm" type="number"
                                       name="salesPrice" value="{{ $id -> salesPrice }}">

                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label class="col-form-label">شناسه محصول :</label>
                                <input class="form-control form-control-sm" type="text"
                                       name="sku" value="{{ $id -> sku }}">

                            </div>

                            <div class="form-group col-md-2">
                                <label class="col-form-label">وزن محصول :(g گرم) </label>
                                <input class="form-control form-control-sm" type="number"
                                       name="weight" value="{{ $id -> weight }}">

                            </div>

                            <div class="form-group col-md-2">
                                <label class="col-form-label">طول محصول :</label>
                                <input class="form-control form-control-sm" type="number"
                                       name="length" value="{{ $id -> length }}">

                            </div>

                            <div class="form-group col-md-2">
                                <label class="col-form-label">عرض محصول :</label>
                                <input class="form-control form-control-sm" type="number"
                                       name="width" value="{{ $id -> width }}">

                            </div>

                            <div class="form-group col-md-2">
                                <label class="col-form-label">ارتفاع محصول :</label>
                                <input class="form-control form-control-sm" type="number"
                                       name="height" value="{{ $id -> height }}">

                            </div>

                            <div class="form-group col-md-2">
                                <label class="col-form-label">آستانه کم شدن موجوی کالا :</label>
                                <input class="form-control form-control-sm" type="number"
                                       name="lowStockAmount" value="{{ $id -> lowStockAmount }}">

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">تصویر محصول</h4>
                        <p class="text-muted m-b-30">
                            تصویر محصول را بهتر است که در ابعاد 800*800 پیکسل (بصورت مربعی) بارگزاری کنید .
                        </p>

                        <div class="m-b-30">
                            <div class="fallback">
                                @if(isset($id -> picture))
                                    <img class="img-thumbnail" alt="200x200" style="width: 200px; height: 200px;"
                                         src="{{ asset($id -> picture) }}" data-holder-rendered="true">
                                @endif
                                <input name="picture" type="file" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">گالری تصاویر محصول</h4>
                        <p class="text-muted m-b-30">
                            تصاویر محصول را بهتر است که در ابعاد 800*800 پیکسل (بصورت مربعی) بارگذاری کنید .
                        </p>

                        <div class="row">
                            <div class="col-4">
                                <p class="text-muted m-b-10">
                                    تصویر 1
                                </p>
                                <div class="fallback">
                                    @if(isset($galleryPics[1]))
                                        <img class="img-thumbnail" alt="200x200" style="width: 200px; height: 200px;"
                                             src="{{ asset($galleryPics[1]) }}" data-holder-rendered="true">
                                        <input type="hidden" name="oldGallery1" value="{{ $galleryPics[1] }}">
                                    @endif
                                    <input name="gallery1" multiple="multiple" type="file" class="form-control"
                                           placeholder="شماره 1">
                                </div>

                            </div>
                            <div class="col-4">
                                <p class="text-muted m-b-10">
                                    تصویر 2
                                </p>
                                <div class="fallback">
                                    @if(isset($galleryPics[2]))
                                        <img class="img-thumbnail" alt="200x200" style="width: 200px; height: 200px;"
                                             src="{{ asset($galleryPics[2]) }}" data-holder-rendered="true">
                                        <input type="hidden" name="oldGallery2" value="{{ $galleryPics[2] }}">
                                    @endif
                                    <input name="gallery2" multiple="multiple" type="file" class="form-control"
                                           placeholder="شماره 2">
                                </div>

                            </div>

                            <div class="col-4">
                                <p class="text-muted m-b-10">
                                    تصویر 3
                                </p>
                                <div class="fallback">
                                    @if(isset($galleryPics[3]))
                                        <img class="img-thumbnail" alt="200x200" style="width: 200px; height: 200px;"
                                             src="{{ asset($galleryPics[3]) }}" data-holder-rendered="true">
                                        <input type="hidden" name="oldGallery3" value="{{ $galleryPics[3] }}">
                                    @endif
                                    <input name="gallery3" multiple="multiple" type="file" class="form-control"
                                           placeholder="شماره 3">
                                </div>

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
                        <h6 class="text-muted">توضیحات کامل برای محصول </h6>
                        <textarea name="description" id="description"
                                  class="summernote">{!! $id -> description !!}</textarea>

                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">دستبندی محصول</h4>
                        <p class="text-muted m-b-30">
                            دستبندی محصول را مشخص کنید .
                        </p>
                        <div class="form-group row">
                            <select class="custom-select" name="category">
                                @foreach($allCatsProducts as $cat)
                                    @if($id -> category == $cat -> id)
                                        <option selected value="{{ $cat -> id }}">{{ $cat -> name }}</option>
                                    @else
                                        <option value="{{ $cat -> id }}">{{ $cat -> name }}</option>
                                    @endif
                                @endforeach
                            </select>

                        </div>
                        <hr>
                        <h4 class="mt-0 header-title">برچسب محصول</h4>
                        <p class="text-muted m-b-30">
                            کلمات مرتبط با محصول را نوشته و با / از هم جدا کنید .<br>
                            <small>مثلا : دستبند / گردنبند / سنگ </small>
                        </p>
                        <div class="form-group row">
                            <input type="text" class="form-control" name="tag" value="{{ $id -> tag }}">
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
                                <input class="form-control form-control-lg" type="text" name="titleSeo"
                                       value="{{ $id -> titleSeo }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input-lg" class="col-sm-2 col-form-label">توضیح متا</label>
                            <div class="col-sm-10">
                                <input class="form-control form-control-lg" type="text" name="metaDescription"
                                       value="{{ $id -> metaDescription }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input-lg" class="col-sm-2 col-form-label">نامک (لینک)</label>
                            <div class="col-sm-10">
                                <input class="form-control form-control-lg" name="link" type="text"
                                       value="{{ $id -> link  }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input-lg" class="col-sm-2 col-form-label">عبارت کلیدی
                                کانونی</label>
                            <div class="col-sm-10">
                                <input class="form-control form-control-lg" type="text" name="focusKeyword"
                                       value="{{ $id -> focusKeyword }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">انتشار</h4>
                        <p class="text-muted m-b-30">
                            وضعیت انتشار را مشخص کنید . در وضعیت های "برای برسی" و "پیش نویس" محصول در سایت نمایش داده
                            نمی شود و فقط برای شما قابل نمایش هست .
                        </p>
                        <div class="form-group row">
                            <div class="col-sm-2 col-form-label ">در چه وضعیتی منشر شود :</div>
                            <div class="col-sm-10">
                                <select class="custom-select" name="statusPublish">
                                    <option selected="{{ $id -> statusPublish }}">{{ $id -> statusPublish }}</option>
                                    <option value="انتشار">انتشار</option>
                                    <option value="برای بررسی">برای بررسی</option>
                                    <option value="پیش نویس">پیش نویس</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 ">
                                <input type="submit" class="btn btn-success" value="ذخیره کن">
                                <input type="hidden" value="{{ $product_id }}" name="product_id">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>

@endsection
