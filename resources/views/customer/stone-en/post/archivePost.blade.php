@extends('layouts.customer.runy.runyTemplate')
@section('title' , $id -> name    )
@section('content')
    <section id="show-product">

        <div class="container">
            <div class="bgInfo">
                <div class="row">
                    <div class="col-12">
                        <div class="infoArchive">
                            <h1 class="h1 title">{{ $id -> name }}</h1>
                            <p class="description">
                                {{ $id -> description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bgInfo">
                <div class="row">
                    <div class="col-12">
                        <div class="row recentPosts">
                            @foreach($posts as $post)
                                <div class="col-4">
                                    <div class="box-product">
                                        <a class="item" href="{{ asset('blog/post/i/'.$post->id) }}">
                                            <img class="imgPostRecent" src="{{ asset($post -> picture) }}" alt="{{ $post -> name }}">
                                            <h4 class="link-subject" title="{{ $post -> name }}">{{ $post -> name }}</h4>
                                            <div class="box-infos">
                                                <div class="category">

                                                </div>

                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
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
