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
                            <th>عنوان </th>
                            <th>دستبندی</th>
                            <th>برچسب</th>
                            <th>کاربر</th>
                            <th>تاریخ انتشار</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($allPosts as $post)
                        <tr>
                            <td>
                                <a href="{{ asset('/dashboard/posts/edit/'.$post -> id)  }}">{{ $post -> name }}</a><br>
                                <small>
                                    <a href="{{ asset('/dashboard/posts/edit/'.$post -> id)  }}" class="badge badge-primary waves-effect waves-light" >ویرایش</a>
                                    <a href="{{ asset('/dashboard/posts/delete/'.$post -> id) }}" class="badge badge-danger waves-effect waves-light" >حذف</a>
                                    <a href="{{ asset('/dashboard/posts/copy/'.$post -> id) }}" class="badge badge-warning waves-effect waves-light">رونوشت از نوشته</a>
                                    <a href="{{ asset('/blog/post/'.$post -> slug) }}" target="_blank" class="badge badge-warning waves-effect waves-light">دیدن نوشته</a>

                                </small>
                            </td>
                            <td>
                                @php
                                    $cat_id = $post -> category_id ;
                                    $name_cat = \App\CategoryPost::where('id' , $cat_id)-> first('name');
                                    if ($name_cat == null){
                                        echo 'دستبندی نشده';
                                    }else{
                                        echo $name_cat->name ;
                                    }

                                @endphp
                            </td>
                            <td>{{ $post -> price }}</td>
                            <td>
                                @php
                                $user_id = $post -> user_id ;
                                $name_user = \App\User::where('id' , $user_id)-> first('name');
                                echo $name_user->name ;
                                @endphp
                            </td>
                            <td>{{ $post -> created_at }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
