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
                    <h4 class="mt-0 header-title">دستبندی های نوشته ها</h4>
                    <p class="text-muted m-b-30">.</p>

                    <form action="{{ asset(route('saveCatPost')) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>category</label>
                            <input type="text" name="name" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label>slug</label>
                            <input type="text" name="url" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label>description </label>
                            <input type="text" name="description" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label> Inherited </label>
                            <select name="Inherited" class="form-control">
                                <option value="masterCat">سردسته</option>
                                @foreach($allCategory as $cat )
                                    <option value="{{ $cat -> id }}">{{ $cat -> name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>برچسب دستبندی <span class="small">( کلمات را با / از هم جدا کنید)</span></label>
                            <input type="text" name="focusKeyword" class="form-control" value="">
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg btn-block waves-effect waves-light">Save</button>
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
                                <a target="_blank" class="maincat" href="{{ asset('/blog/post/category/'.$cats -> id) }}">{{ $cats -> name }}</a>
                                <span>
                                        <a style="color: red ;" class="small" href="{{ asset('/dashboard/posts/category/delete/'.$cats -> id) }}">حذف</a>
                                        <a style="color: #4A148C" class="small" href="{{ asset('/dashboard/posts/category/edit/'.$cats -> id) }}"> <b> ویرایش</b></a>
                                    </span>
                            </div>
                            <ul class="subcatul">
                                @foreach($allCategory as $subCats)

                                    @if( $subCats -> Inherited == $cats -> id )
                                        <li class="subcatli">
                                            <a target="_blank" href="{{ asset('/blog/post/category/'.$subCats -> id) }}">{{ $subCats -> name }}</a>
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
