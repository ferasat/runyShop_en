@extends('layouts.user.template')
@section('title' , $titlePage)
@section('content')
    <!-- Page-Title -->
    @include('layouts.user.breadcrumb')
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Edit : {{$id -> name}}</h4>
                    <p class="text-muted m-b-30">.</p>

                    <form action="{{ asset(route('updateCatPro')) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" name="name" class="form-control" value="{{$id -> name}}">
                        </div>
                        <div class="form-group">
                            <label>slug :</label>
                            <input type="text" name="slug" class="form-control" value="{{$id -> slug}}">
                        </div>
                        <div class="form-group">
                            <label>description </label>
                            <textarea type="text" name="description" class="form-control" >{!! $id -> description !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label> ارث بری (سردسته) </label>
                            <select name="Inherited" class="form-control">
                                <option value="{{$id -> Inherited}}">{{$id -> Inherited}}</option>
                                @foreach($allCategory as $cat )
                                    <option value="{{ $cat -> id }}">{{ $cat -> name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Picture : <span class="small">1300*400</span></label>

                            @if($id -> picture !== null)
                                <img src="{{ asset($id -> picture) }}" class="max-w100" alt="">
                                <input type="file" name="picture" class="form-control" value="">
                            @else
                                <input type="file" name="picture" class="form-control" value="">
                            @endif

                        </div>
                        <input type="hidden" name="id" value="{{$id -> id}}">
                        <button type="submit" class="btn btn-primary btn-lg btn-block waves-effect waves-light">ذخیره کن</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-body">
                    @foreach($allCategory as $cats)
                        @if($cats-> Inherited == 'masterCat')
                            <div class="catg">
                                <a target="_blank" class="maincat" href="{{ asset('/cat-product?id='.$cats -> id) }}">{{ $cats -> name }}</a>
                                <span>
                                        <a style="color: red ;" class="small" href="{{ asset('/dashboard/category/delete/'.$cats -> id) }}">حذف</a>
                                        <a style="color: #4A148C" class="small" href="{{ asset('/dashboard/category/edit/'.$cats -> id) }}"> <b> ویرایش</b></a>
                                    </span>
                            </div>
                            <ul class="subcatul">
                                @foreach($allCategory as $subCats)

                                    @if( $subCats -> Inherited == $cats -> id )
                                        <li class="subcatli">
                                            <a target="_blank" href="{{ asset('/cat-product?id='.$cats -> id) }}">{{ $subCats -> name }}</a>
                                            <span class="subcata">
                                                    <a style="color: red ;" class="small" href="{{ asset('/dashboard/category/delete/'.$subCats -> id) }}">حذف</a>
                                                    <a style="color: #4A148C" class="small" href="{{ asset('/dashboard/category/edit/'.$subCats -> id) }}"> <b> ویرایش</b></a>
                                            </span>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
