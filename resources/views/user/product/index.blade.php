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

                    <h4 class="mt-0 header-title">محصولات</h4>
                    <p class="text-muted m-b-30">
                        آخرین محصولات خود را می توانید در لیست زیر ببینید و آنها را مدیریت کنید .
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>نام محصول</th>
                            <th>دستبندی</th>
                            <th>قیمت</th>
                            <th>موجودی</th>
                            <th>تاریخ انتشار</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($allProducts as $product)
                        <tr>
                            <td>
                                <a href="{{ asset('/dashboard/product/edit/'.$product -> id)  }}">{{ $product -> name }}</a><br>
                                <small>
                                    <a href="{{ asset('/dashboard/product/edit/'.$product -> id)  }}" class="badge badge-primary waves-effect waves-light" >ویرایش</a>
                                    <a href="{{ asset('/dashboard/product/delete/'.$product -> id) }}" class="badge badge-danger waves-effect waves-light" >حذف</a>
                                    <a href="{{ asset('/dashboard/product/copy/'.$product -> id) }}" class="badge badge-warning waves-effect waves-light">رونوشت از محصول</a>
                                    <a target="_blank" href="{{ asset('/product?id='.$product -> id) }}" class="badge badge-warning waves-effect waves-light">دیدن محصول</a>

                                </small>
                            </td>
                            <td>
                                @foreach ($allCatsProducts as $cat)
                                    @if($cat ->id == $product -> category)
                                        {{ $cat -> name }}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $product -> price }}</td>
                            <td>{{ $product -> statusStock }} ({{$product -> numStock}})</td>
                            <td>{{ $product -> created_at }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
