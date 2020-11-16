@extends('layouts.user.template')
@section('title' , 'پیشخوان')
@section('content')
    <!-- Page-Title -->
    @include('layouts.user.breadcrumb')
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary mini-stat text-white">
                <div class="p-3 mini-stat-desc">
                    <div class="clearfix">
                        <h6 class="text-uppercase mt-0 float-left text-white-50">کل سفارشات</h6>
                        <h4 class="mb-3 mt-0 float-right">587</h4>
                    </div>
                    <div>
                        <span class="badge badge-light text-info"> 11 </span> <span class="ml-2">عدد سفارش جدید</span>
                    </div>

                </div>
                <div class="p-3">
                    <div class="float-right">
                        <a href="#" class="text-white-50"><i class="mdi mdi-cube-outline h5"></i></a>
                    </div>
                    <p class="font-14 m-0">ارزش سفارشات جدید : 1447</p>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-info mini-stat text-white">
                <div class="p-3 mini-stat-desc">
                    <div class="clearfix">
                        <h6 class="text-uppercase mt-0 float-left text-white-50">کل موجودی انبار</h6>
                        <h4 class="mb-3 mt-0 float-right">46,785</h4>
                    </div>
                    <div>
                        <span class="badge badge-light text-danger"> -29 </span> <span class="ml-2">تعداد کسری انبار</span>
                    </div>
                </div>
                <div class="p-3">
                    <div class="float-right">
                        <a href="#" class="text-white-50"><i class="mdi mdi-buffer h5"></i></a>
                    </div>
                    <p class="font-14 m-0">ارزش کسری : $47,596</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-pink mini-stat text-white">
                <div class="p-3 mini-stat-desc">
                    <div class="clearfix">
                        <h6 class="text-uppercase mt-0 float-left text-white-50">تعداد کل نوشته ها</h6>
                        <h4 class="mb-3 mt-0 float-right">15</h4>
                    </div>
                    <div>
                        <span class="badge badge-light text-primary"> 2 </span> <span class="ml-2"> دیدگاه تایید نشده</span>
                    </div>
                </div>
                <div class="p-3">
                    <div class="float-right">
                        <a href="#" class="text-white-50"><i class="mdi mdi-tag-text-outline h5"></i></a>
                    </div>
                    <p class="font-14 m-0">کل دیدگاه ها : 158</p>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-success mini-stat text-white">
                <div class="p-3 mini-stat-desc">
                    <div class="clearfix">
                        <h6 class="text-uppercase mt-0 float-left text-white-50">کل اعضای خبرنامه</h6>
                        <h4 class="mb-3 mt-0 float-right">90</h4>
                    </div>
                    <div>
                        <span class="badge badge-light text-info"> 2 </span> <span class="ml-2">اعضای جدید</span>
                    </div>
                </div>
                <div class="p-3">
                    <div class="float-right">
                        <a href="#" class="text-white-50"><i class="mdi mdi-briefcase-check h5"></i></a>
                    </div>
                    <p class="font-14 m-0">کل اعضا : 90</p>
                </div>
            </div>
        </div>
    </div>
@endsection
