@extends('layouts.app')

@section('title', 'Hot Deals - Electro Store')

@section('content')
<!-- SECTION -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">🔥 Hot Deals Today</h3>
                </div>
            </div>
        </div>

        <div class="row">
            @forelse($products as $product)
            <div class="col-md-3 col-sm-6">
                <div class="product">
                    <div class="product-img">
                        <img src="{{ asset('img/product01.png') }}" alt="{{ $product->name }}">
                        <div class="product-label">
                            <span class="sale">-50%</span>
                            <span class="new">DEAL</span>
                        </div>
                    </div>
                    <div class="product-body">
                        <p class="product-category">{{ $product->category }}</p>
                        <h3 class="product-name"><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></h3>
                        <h4 class="product-price">${{ number_format($product->price * 0.5, 2) }} <del class="product-old-price">${{ number_format($product->price, 2) }}</del></h4>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                    </div>
                    <div class="add-to-cart">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-md-12">
                <p class="text-center">No deals available.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
<!-- /SECTION -->
@endsection
