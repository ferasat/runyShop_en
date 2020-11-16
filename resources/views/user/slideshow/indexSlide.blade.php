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

                    <h4 class="mt-0 header-title">{{ $titlePage }}</h4>
                    <p class="text-muted m-b-30">
                        اسلاید های ساخته شده .
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th scope="col">نام اسلاید</th>
                            <th scope="col">شناسه</th>
                            <th scope="col">تصویر</th>
                        </tr>
                        </thead>


                        <tbody>
                        @if($slides !== null)
                            @foreach( $slides as $slide)
                                <tr>
                                    <td>
                                        <a href="{{ asset('/dashboard/slideshow/edit/'.$slide -> id)}}">{{ $slide -> subject }}</a><br>
                                        <small>
                                            <a href="{{ asset('/dashboard/slideshow/edit/'.$slide -> id)}}"
                                               class="badge badge-primary waves-effect waves-light">ویرایش</a>
                                            <a href="{{ asset('/dashboard/slideshow/delete/'.$slide -> id) }}"
                                               class="badge badge-danger waves-effect waves-light">حذف</a>
                                        </small>
                                    </td>
                                    <td>
                                        {{ $slide -> id }}
                                    </td>
                                    <td>
                                        <img src="{{ asset($slide -> urlpic) }}" class="thumb-lg" alt="">
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


@endsection
