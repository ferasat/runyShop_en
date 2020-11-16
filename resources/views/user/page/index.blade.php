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
                        آخرین نوشته خود را می توانید در لیست زیر ببینید و آنها را مدیریت کنید .
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>عنوان</th>
                            <th>کاربر</th>
                            <th>تاریخ انتشار</th>
                            <th>تصویر</th>
                        </tr>
                        </thead>


                        <tbody>
                        @if($allPosts == null)
                            <tr>پستی وجود ندارد</tr>
                        @else
                            @foreach($allPages as $post)
                                <tr>
                                    <td>
                                        <a href="{{ asset('/dashboard/pages/edit/'.$post -> id)  }}"><h4>{{ $post -> name }}</h4></a><br>
                                        <small>
                                            <a href="{{ asset('/dashboard/pages/edit/'.$post -> id)  }}"
                                               class="badge badge-primary waves-effect waves-light">ویرایش</a>
                                            <a href="{{ asset('/dashboard/pages/delete/'.$post -> id) }}"
                                               class="badge badge-danger waves-effect waves-light">حذف</a>
                                            <a href="{{ asset('/dashboard/pages/copy/'.$post -> id) }}"
                                               class="badge badge-warning waves-effect waves-light">رونوشت از نوشته</a>
                                            <a href="{{ asset('/'.$post -> slug) }}" target="_blank"
                                               class="badge badge-warning waves-effect waves-light">دیدن نوشته</a>

                                        </small>
                                    </td>
                                    <td>
                                        @php
                                            $user_id = $post -> user_id ;
                                            $name_user = \App\User::where('id' , $user_id)-> first('name');
                                            echo $name_user->name ;
                                        @endphp
                                    </td>
                                    <td>{{ $post -> created_at }}</td>
                                    <td class="text-center">
                                        @if($post -> picture !== null)
                                            <img src="{{ asset( $post -> picture ) }}" class="thumb200">
                                        @else
                                            <img src="{{ asset('themes/user/horizontal-rtl/assets/images/sample.png') }}" class="thumb200">
                                        @endif
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
