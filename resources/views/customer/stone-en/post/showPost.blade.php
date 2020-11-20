@extends('layouts.customer.stone-en.stoneTemplate')
@section('title' , $id -> name    )
@section('content')

    <section id="show-post">

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

        </div>
    </section>
    <section class="textPost">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 title="{{ $id -> name }}" class="h4 pad-top-80">{{ $id -> name }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="descriptionPost">
                        {!! $id -> texts !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
