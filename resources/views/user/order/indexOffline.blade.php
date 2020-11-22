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
                        آخرین سفارشات خود را می توانید در لیست زیر ببینید و آنها را مدیریت کنید .
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Name </th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>product</th>
                            <th>Date</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($allOrder as $order)
                        <tr class="btnModel"  data-toggle="modal" data-target="#modal{{$order->id}}">
                            <td >{{ $order -> name }}</td>
                            <td>{{ $order -> phone }} </td>
                            <td id="status{{$order->id}}">{{ $order -> status }} </td>
                            <td>{{ $order -> product }} </td>
                            <td>{{ $order -> created_at }}</td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="modal{{$order->id}}" tabindex="-1" aria-labelledby="modal{{$order->id}}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal{{$order->id}}Label">Customer : {{ $order -> name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <ul>
                                            <li>Phone : {{ $order -> phone }} </li>
                                            <li>Product : <a target="_blank" href="{{ asset('/product?id='.$order->product_id) }}">{{ $order -> product }}</a> </li>
                                            <li>Value : {{ $order -> value }} </li>
                                        </ul>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-success" onclick="calledd({{$order->id}})">Was called</button>
                                        <button type="button" class="btn btn-danger" onclick="notcall({{$order->id}})">Not called</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
