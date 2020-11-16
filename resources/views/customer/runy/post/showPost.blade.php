@extends('layouts.customer.runy.runyTemplate')
@section('title' , $id -> name    )
@section('content')
    <section id="show-product">

        <div class="container-fluid">
            <div class="bgInfoPost">
                <div class="row">
                    <div class="col-12">
                        <div class="featureBox">
                            <div class="featureImgBox">
                                <img src="{{ asset($id -> picture) }}" alt="{{ $id -> name }}" class="featureImg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bgInfo">
                <div class="row">
                    <div class="col-12">

                        <div class="description">
                            <h4 class="h4 margin-bottom-10">{{ $id -> name }}</h4>
                            {!! $id -> texts !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <script>
        function addToCart(id) {
            console.log(id);
            var quantity = document.getElementById('quantity').value;
            console.log(quantity);
            var request = new XMLHttpRequest();
            request.open('GET', '/cart/addToCart/?id=' + id + '&quantity=' + quantity);
            request.onreadystatechange = function () {
                if ((request.readyState === 4) && (request.status === 200)) {
                    console.log(request);
                    document.writeln(request.responseText);
                    document.getElementById('btn-kharid').innerHTML = 'خرید شد  ';
                }
            };

            console.log(request);
            request.send();
        }

        /*        function addToCart(e) {
                    e.preventDefault ();
                    console.log('okey');
                }

                function callmymethod() {
                    console.log('test ');
                }*/
    </script>
@stop
