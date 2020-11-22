@extends('layouts.customer.stone-en.stoneTemplate')
@section('title' , $id -> name )
@section('content')
    @if($id -> picture !== null)
        <section class="bgCat">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 pad-0">
                        <img src="{{ asset($id -> picture ) }}" alt="{{ $id -> name }}" class="w-100">
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="desCompany">
        <div class="container">
            <div class="row">

                <div class="col-md-12 pad-80">
                    <div class="desCompanyBox">
                        <span class="subtitle">GEOX Stone</span>
                        <h2 class="title" title="{{ $id -> name }}">{{ $id -> name }}</h2>
                        <div class="text">
                            {!! $id -> description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="ProductInCat">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">Product Categories :</div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3">
                {!! $subCatsBox !!}
            </div>


            <div class="row pad-80 row-cols-1 row-cols-md-3">
                <div class="col-md-12 ">
                    <h3>Products :</h3>
                </div>
               {!! $allProductsInCatBox !!}

            </div>
        </div>
    </section>



@stop
