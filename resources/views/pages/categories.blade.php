@extends('layouts.app')

@section('title', 'Categories - Electro Store')

@section('content')
<!-- SECTION -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Browse Categories</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{ asset('marketplace/img/shop01.png') }}" alt="Laptops">
                    </div>
                    <div class="shop-body">
                        <h3>Laptop<br>Collection</h3>
                        <a href="{{ route('categories.show', 'laptops') }}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{ asset('marketplace/img/shop03.png') }}" alt="Accessories">
                    </div>
                    <div class="shop-body">
                        <h3>Accessories<br>Collection</h3>
                        <a href="{{ route('categories.show', 'accessories') }}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{ asset('marketplace/img/shop02.png') }}" alt="Cameras">
                    </div>
                    <div class="shop-body">
                        <h3>Cameras<br>Collection</h3>
                        <a href="{{ route('categories.show', 'cameras') }}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{ asset('marketplace/img/shop01.png') }}" alt="Smartphones">
                    </div>
                    <div class="shop-body">
                        <h3>Smartphones<br>Collection</h3>
                        <a href="{{ route('categories.show', 'smartphones') }}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /SECTION -->
@endsection
