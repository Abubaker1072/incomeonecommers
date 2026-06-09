@extends('layouts.app')

@section('title', 'All Brands - Electro Store')

@section('content')
<!-- SECTION -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Top Brands</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{ asset('marketplace/img/shop01.png') }}" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Apple<br>Products</h3>
                        <a href="#" class="cta-btn">View <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{ asset('marketplace/img/shop02.png') }}" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Samsung<br>Electronics</h3>
                        <a href="#" class="cta-btn">View <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{ asset('marketplace/img/shop03.png') }}" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Sony<br>Gadgets</h3>
                        <a href="#" class="cta-btn">View <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{ asset('marketplace/img/shop01.png') }}" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Dell<br>Computers</h3>
                        <a href="#" class="cta-btn">View <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /SECTION -->
@endsection
