@extends('layouts.customer.runy.runyTemplate')
@section('title' , 'سبد خرید')
@section('content')

    <section id="cart">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if($cart != null)
                    <form method="post" action="{{ asset(route('saveCart')) }}">
                        @csrf
                        <div class="card">
                            <h5 class="card-header">لیست خرید شما</h5>
                            <div class="card-body">

                                    <table class="table">
                                        <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">تصویر</th>
                                            <th scope="col">نام محصول</th>
                                            <th scope="col">قیمت</th>
                                            <th scope="col">تعداد</th>
                                            <th scope="col">.</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $x = 1 ; @endphp

                                        @foreach($cart as $order)

                                            <tr>
                                                <th scope="row">
                                                    @php echo $x ;  @endphp
                                                    <input type="hidden" name="product_id_{{ $x }}" value="{{ $order['id'] }}">
                                                </th>
                                                <td>
                                                    <img src="{{ $order['picture'] }}" width="100" height="100">
                                                    <input type="hidden" name="image_{{ $x }}" value="{{ $order['picture'] }}">
                                                </td>
                                                <td><input type="hidden" name="product_name_{{ $x }}"
                                                           id="product_name_{{ $x }}"
                                                           value="{{ $order['name'] }}"> {{ $order['name'] }} </td>
                                                <td><input type="hidden" name="price_{{ $x }}" id="price_{{ $x }}"
                                                           value="{{ $order['price'] }}"> {{ $order['price'] }} </td>
                                                <td><input type="number" name="quantity_{{ $x }}" id="quantity_{{ $x }}"
                                                           value="{{ $order['quantity'] }}"></td>
                                                <td>حذف</td>
                                                @php  $x = $x +1 ;  @endphp
                                            </tr>
                                        @endforeach
                                        <input type="hidden" id="xValue" name="count" value="@php echo $x @endphp">
                                        </tbody>
                                        <script>
                                            var xValue = '@php echo $x @endphp';
                                            var x = 1;
                                            var sum = [];
                                            var total = 0;
                                            var totalQTY = 0;
                                            for (x; x < xValue; x++) {
                                                var price = parseInt(document.getElementById('price_' + x).value);
                                                console.log(x + ' =' + price);
                                                var qty = parseInt(document.getElementById('quantity_' + x).value);

                                                sum[x] = qty * price;
                                                console.log(sum[x]);
                                                total = total + sum[x];
                                                totalQTY = totalQTY + qty;
                                            }

                                            console.log('sum = ' + sum);
                                            console.log('total = ' + total);
                                            console.log('totalQTY = ' + totalQTY);
                                        </script>
                                    </table>

                            </div>

                        </div>

                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-light">
                                    <tr>
                                        <th scope="col">تعداد کالا ها</th>
                                        <th scope="col">هزینه کالا</th>
                                        <th scope="col">بروز رسانی</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">
                                            <strong id="numberProduct"></strong>
                                        </th>
                                        <th><strong id="sumPrice"></strong></th>
                                        <th>
                                            <button class="btn btn-success">بروز رسانی</button>
                                        </th>
                                    </tr>
                                    </tbody>
                                    <script>
                                        document.getElementById('sumPrice').innerHTML = total;
                                        document.getElementById('numberProduct').innerHTML = totalQTY;
                                    </script>
                                </table>
                            </div>

                            <div class="card-header">
                                مشخصات :
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="fullName" class="col-sm-2 col-form-label">نام و نام خانوادگی</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="fullName" id="fullName" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cellPhone" class="col-sm-2 col-form-label">شماره تماس</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="cellPhone" class="form-control" id="cellPhone" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-2 col-form-label">آدرس </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="address" class="form-control" id="address" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="zipCode" class="col-sm-2 col-form-label">کدپستی </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="zipCode" class="form-control" id="zipCode" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">ایمیل </label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" id="email">
                                    </div>
                                </div>
                                <button class="btn btn-success" type="submit">
                                    ثبت سفارش
                                </button>
                            </div>
                        </div>

                    </form>
                    @else
                        <div class="card">
                            <h5 class="card-header">سبد خرید خالی هست .</h5>
                            <div class="card-body">
                            </div>
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </section>


    <script>

    </script>
@stop
