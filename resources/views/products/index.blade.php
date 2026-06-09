@extends('layouts.app')

@section('title', 'Beauty & Wellness Marketplace')

@section('content')

<!-- HERO LANDING BANNER SECTION -->
<div id="custom-hero-banner" class="section" style="background-color: #1a1a1a; padding: 70px 0; color: #ffffff; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;">
    <div class="container">
        <div class="row" style="display: flex; align-items: center; flex-wrap: wrap;">
            
            <!-- LEFT COLUMN: Content & CTA Buttons -->
            <div class="col-md-6 col-sm-12" style="margin-bottom: 40px;">
                <h1 style="font-size: 56px; font-weight: 800; line-height: 1.1; margin-bottom: 20px; color: #ffffff; letter-spacing: -1px;">
                    Premium Beauty &<br>
                    <span style="color: #e5a913;">Wellness Products.</span>
                </h1>
                <p style="color: #a6a6a6; font-size: 16px; line-height: 1.6; max-width: 480px; margin-bottom: 35px;">
                    Discover our curated collection of premium beauty care, wellness products, and personal care essentials. Trusted by professionals, loved by customers worldwide.
                </p>
                
                <!-- Action Buttons -->
                <div class="hero-actions" style="margin-bottom: 35px; display: flex; gap: 15px; flex-wrap: wrap;">
                    <a href="#new-products" class="btn" style="background-color: #e5a913; color: #000000; font-weight: bold; padding: 12px 28px; border-radius: 6px; font-size: 15px; border: none; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
                        <i class="fa fa-shopping-bag"></i> Shop Now
                    </a>
                    <a href="#featured" class="btn" style="background-color: transparent; color: #ffffff; font-weight: bold; padding: 12px 28px; border-radius: 6px; font-size: 15px; border: 1px solid #333333; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
                        View Featured <i class="fa fa-arrow-right" style="font-size: 12px;"></i>
                    </a>
                </div>
                
                <!-- Feature Pill Tags -->
                <div class="hero-tags" style="display: flex; gap: 10px; flex-wrap: wrap;">
                    <span style="background-color: #262626; color: #a6a6a6; padding: 6px 14px; border-radius: 20px; font-size: 13px; border: 1px solid #333333;"><i class="fa fa-check" style="color: #e5a913; margin-right: 5px;"></i> Premium Quality</span>
                    <span style="background-color: #262626; color: #a6a6a6; padding: 6px 14px; border-radius: 20px; font-size: 13px; border: 1px solid #333333;"><i class="fa fa-truck" style="color: #e5a913; margin-right: 5px;"></i> Fast Shipping</span>
                    <span style="background-color: #262626; color: #a6a6a6; padding: 6px 14px; border-radius: 20px; font-size: 13px; border: 1px solid #333333;"><i class="fa fa-shield" style="color: #e5a913; margin-right: 5px;"></i> 100% Authentic</span>
                </div>
            </div>
            
            <!-- RIGHT COLUMN: Visual Cards Grid Layout -->
            <div class="col-md-6 col-sm-12">
                <div class="row" style="display: flex; gap: 15px;">
                    
                    <!-- Main Large Block -->
                    <div class="col-sm-6" style="padding: 0;">
                        <div style="background: linear-gradient(135deg, #e5a913 0%, #d4921a 100%); height: 420px; border-radius: 12px; position: relative; padding: 20px; display: flex; align-items: flex-end; overflow: hidden;">
                            <span style="position: absolute; top: 15px; right: 15px; background-color: #ffffff; color: #000000; font-size: 11px; font-weight: bold; padding: 4px 10px; border-radius: 4px; text-transform: uppercase;">Trending</span>
                            <h3 style="color: #000000; font-size: 14px; font-weight: bold; text-transform: uppercase; margin: 0; letter-spacing: 0.5px;">Beauty Care</h3>
                        </div>
                    </div>
                    
                    <!-- Stacked Right Block Elements -->
                    <div class="col-sm-6" style="padding: 0; display: flex; flex-direction: column; gap: 15px;">
                        <!-- Wellness Card -->
                        <div style="background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%); height: 202px; border-radius: 12px; padding: 20px; display: flex; align-items: flex-end; overflow: hidden;">
                            <h3 style="color: #ffffff; font-size: 14px; font-weight: bold; text-transform: uppercase; margin: 0; letter-spacing: 0.5px;">Wellness</h3>
                        </div>
                        
                        <!-- Personal Care Card -->
                        <div style="background: linear-gradient(135deg, #9C27B0 0%, #8b1fa0 100%); height: 202px; border-radius: 12px; padding: 20px; display: flex; align-items: flex-end; overflow: hidden;">
                            <h3 style="color: #ffffff; font-size: 14px; font-weight: bold; text-transform: uppercase; margin: 0; letter-spacing: 0.5px;">Personal Care</h3>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<!-- /HERO LANDING BANNER SECTION -->

<!-- CATEGORIES SECTION -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Browse by Category</h3>
                </div>
            </div>

            @php
                $categories = \App\Models\Category::all();
                $colors = ['#e5a913', '#4CAF50', '#9C27B0', '#2196F3', '#FF6B6B', '#FFC107'];
            @endphp

            @forelse($categories as $index => $category)
                <div class="col-md-4 col-xs-6 mb-3">
                    <div class="shop" style="background-color: {{ $colors[$index % count($colors)] }}20; border: 2px solid {{ $colors[$index % count($colors)] }};">
                        <div class="shop-body" style="padding: 30px; text-align: center;">
                            <h3 style="margin-bottom: 15px;">{{ $category->name }}</h3>
                            <p class="text-muted mb-3">{{ $category->products()->count() }} products</p>
                            <a href="{{ route('categories.show', $category->slug) }}" class="cta-btn" style="background-color: {{ $colors[$index % count($colors)] }}; color: white; padding: 8px 16px; border-radius: 4px; text-decoration: none;">
                                Shop now <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <p class="text-center">No categories available.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
<!-- /CATEGORIES SECTION -->

<!-- FEATURED PRODUCTS SECTION -->
<div id="featured" class="section">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Featured Products</h3>
                </div>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <div class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-2">
                                @forelse($products->where('is_featured', true) as $product)
                                <!-- product -->
                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" style="height: 250px; object-fit: cover;">
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
                                <!-- /product -->
                                @empty
                                <div class="col-md-12">
                                    <p class="text-center">No featured products available.</p>
                                </div>
                                @endforelse
                            </div>
                            <div id="slick-nav-2" class="products-slick-nav"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /FEATURED PRODUCTS SECTION -->

<!-- NEW PRODUCTS SECTION -->
<div id="new-products" class="section">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">All Products</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            @foreach($categories->take(4) as $category)
                            <li @if($loop->first) class="active" @endif><a data-toggle="tab" href="#tab1">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                @forelse($products as $product)
                                <!-- product -->
                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" style="height: 250px; object-fit: cover;">
                                        <div class="product-label">
                                            <span class="sale">{{ rand(10, 40) }}%</span>
                                            <span class="new">NEW</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">{{ $product->category->name ?? 'Category' }}</p>
                                        <h3 class="product-name"><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></h3>
                                        <h4 class="product-price">${{ number_format($product->price, 2) }} <del class="product-old-price">${{ number_format($product->price * 1.3, 2) }}</del></h4>
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
                                <!-- /product -->
                                @empty
                                <div class="col-md-12">
                                    <p class="text-center">No products available.</p>
                                </div>
                                @endforelse
                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /NEW PRODUCTS SECTION -->

@endsection
