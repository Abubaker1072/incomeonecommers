@extends('layouts.app')

@section('title', 'Featured Products - Electro Store')

@section('content')
<!-- SECTION -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">⭐ Featured Products</h3>
                </div>
            </div>
        </div>

        <div class="row">
            @forelse($products as $product)
            <div class="col-md-3 col-sm-6">
                <div class="product">
                    <div class="product-img">
                        <img src="{{ asset('marketplace/img/product01.png') }}" alt="{{ $product->name }}">
                        <div class="product-label">
                            <span class="new">FEATURED</span>
                        </div>
                    </div>
                    <div class="product-body">
                        <p class="product-category">{{ $product->category->name ?? 'Category' }}</p>
                        <h3 class="product-name"><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></h3>
                        <h4 class="product-price">${{ number_format($product->price, 2) }}</h4>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product-btns">
                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                            <button class="quick-view" data-url="{{ route('products.quickview', $product->id) }}"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                        </div>
                    </div>
                    <div class="add-to-cart">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-md-12">
                <p class="text-center">No featured products available.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
<!-- /SECTION -->
@endsection
