@extends('layouts.user.template')
@section('title' , $titlePage)
@section('content')

    <!-- Page-Title -->
    @include('layouts.user.breadcrumb')
    <!-- end page title end breadcrumb -->




    <form class="form-row w-100 d-block" action="{{ asset('/dashboard/slideshow/update/'.$id -> id) }}" method="post"
          enctype="multipart/form-data">@csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="leftSamt">
                            <button class="btn btn-indigo"><a title="ساخت اسلاید جدید"
                                                           href="{{ asset('/dashboard/slidshows/new') }}">ساخت اسلاید
                                    جدید</a></button>
                        </div>
                    </div>
                    <div class="card-body">


                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label> عنوان : </label> <label class="float-right text-right slideid"> شناسه اسلاید
                                    : {{ $id -> id }}</label>
                                <input name="subject" type="text" class="form-control" value="{{ $id -> subject }}"
                                       required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>توضیحات : </label>
                                <textarea name="text" type="text" class="form-control">
                                        {!!  $id -> text !!}
                                    </textarea>
                            </div>
                        </div>

                        <div id="repeaterSlid">
                            <div class="repeater-heading">
                                <input class="btn btn-primary repeater-add-btn" type="button"
                                       value="اضافه کردن اسلاید" onclick="slidJs.Addslid();"/>
                            </div>

                            <div class="div_slids_host">

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div id="boxPicSlid" class="row">
            @foreach($picsSlide as $slid)
                <div class="col-xl-3 col-md-6">
                    <div class="pricing-box bg-white mt-4 p-2">
                        <div class="pricing-title pt-4 text-center">
                            <div class="mb-5">
                                <img class="thumb-lg radius-6" src="{{ asset($slid -> urlpic) }}" alt="">
                            </div>
                            <h5 class="mt-0">{{ $slid -> text }}</h5>
                        </div>

                        <div class="plan-features mb-4 text-left">
                            <p><span>ویرایش متن :</span></p>
                            <input type="text" value="{{ $slid -> text }}" class="form-control">
                        </div>
                        <div class="pt-3">
                            <a onclick="removePicOfSlide({{ $slid -> id }})" class="btn btn-danger btn-block"
                               name="remove">حذف شود</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <script>
            function removePicOfSlide(id) {
                var request = new XMLHttpRequest();
                request.open('get', '{{ asset(route('removePicOfSlide').'/?pic_id=') }}' + id);
                console.log(request);
                request.onreadystatechange = function () {
                    if ((request.readyState === 4) && (request.status === 200)) {
                        var boxPicSlid = document.getElementById('boxPicSlid');
                        boxPicSlid.innerHTML = request.responseText;
                    }
                };

                request.send();

            }
        </script>

        <div class="form-group col-md-12">
            <input type="hidden" name="slideShow_id" value="{{ $id -> id }}">
            <input type="submit" class="btn btn-w btn-primary" value="ذخیره">
        </div>
    </form>

    <!-- end row -->
@endsection
