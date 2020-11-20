@extends('layouts.customer.stone-en.stoneTemplate')
@section('title' , $id -> name    )
@section('content')


    <section class="">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-md-12 pad-0">
                    <div class="featureImgProductBox">
                        <img src="{{ asset($id -> bgProduct) }}" alt="{{ $id -> name }}" class="bgFeatureProduct">
                        <img src="{{ asset($id -> picture) }}" alt="{{ $id -> name }}" class="featureProduct">
                        <div class="shadow"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="desShortProduct">
        <div class="container">
            <div class="row">
                <div class="col-md-8 pad-80">
                    <div class="desCompanyBox">
                        <span class="subtitle">GEOX Stone</span>
                        <h1 class="title" title="{{ $id -> name }}">{{ $id -> name }}</h1>
                        <div class="text short">
                            {!! $id -> short !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pad-80">
                    <div class="w-100 text-center">
                        <button class="btn btn-brown hvr-outline-in purchaseOrder" data-toggle="modal"
                                data-target="#purchaseOrder">Purchase Order
                        </button>
                        <div class="modal fade text-left" id="purchaseOrder" tabindex="-1"
                             aria-labelledby="purchaseOrderLabel"
                             aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="purchaseOrderLabel">Purchase order registration
                                            form</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form>
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label for="fname">Full Name</label>
                                                <input type="text" class="form-control" id="fname">
                                            </div>
                                            <div class="form-group">
                                                <label for="cell">Cell Phone</label>
                                                <input type="number" class="form-control" id="cell">
                                            </div>
                                            <div class="form-check">
                                                <label>Does your number have WhatsApp?</label><br>
                                                <input type="radio" name="whatsAppNumber" id="ry" value="Yes">
                                                <label for="ry">Yes</label><br>
                                                <input type="radio" name="whatsAppNumber" id="rn" value="No">
                                                <label for="rn">No</label>
                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                            <button type="button" class="btn color2">Register the order.</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="desProduct1">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pad-80">
                    <div class="desCompanyBox">
                        <h3 class="title">ADVANTAGES</h3>
                        <div class="text desProduct1">
                            {!! $id -> description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="desProduct2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pad-80">
                    <div class="desCompanyBox">
                        <h3 class="title">FINISHES</h3>
                        <div class="text desProduct2">
                            {!! $id -> description2 !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@stop
