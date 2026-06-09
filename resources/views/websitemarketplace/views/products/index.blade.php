@extends('layouts.app')

@section('title', 'Products - Electro Store')

@section('content')

@php
    $categories ??= collect();
@endphp

<!-- HERO LANDING BANNER SECTION -->
<div id="custom-hero-banner" class="section" style="background-color: #0d0d0d; padding: 70px 0; color: #ffffff; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;">
    <div class="container">
        <div class="row" style="display: flex; align-items: center; flex-wrap: wrap;">
            
            <!-- LEFT COLUMN: Content & CTA Buttons -->
            <div class="col-md-6 col-sm-12" style="margin-bottom: 40px;">
                <h1 style="font-size: 56px; font-weight: 800; line-height: 1.1; margin-bottom: 20px; color: #ffffff; letter-spacing: -1px;">
                    Advanced Healthcare,<br>
                    <span style="color: #dc1212;">Delivered Right.</span>
                </h1>
                <p style="color: #a6a6a6; font-size: 16px; line-height: 1.6; max-width: 480px; margin-bottom: 35px;">
                    Premium medical supplies, wellness equipment, home care essentials & professional diagnostic gear — all in one place. Certified quality, fast shipping, trusted by professionals.
                </p>
                
                <!-- Action Buttons -->
                <div class="hero-actions" style="margin-bottom: 35px; display: flex; gap: 15px; flex-wrap: wrap;">
                    <a href="#" class="btn" style="background-color: #d71d33; color: #000000; font-weight: bold; padding: 12px 28px; border-radius: 6px; font-size: 15px; border: none; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
                        <i class="fa fa-heartbeat"></i> Shop Medical Supplies
                    </a>
                    <a href="#" class="btn" style="background-color: transparent; color: #ffffff; font-weight: bold; padding: 12px 28px; border-radius: 6px; font-size: 15px; border: 1px solid #333333; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
                        Browse Equipment <i class="fa fa-arrow-right" style="font-size: 12px;"></i>
                    </a>
                </div>
                
                <!-- Feature Pill Tags -->
                <div class="hero-tags" style="display: flex; gap: 10px; flex-wrap: wrap;">
                    <span style="background-color: #1a1a1a; color: #a6a6a6; padding: 6px 14px; border-radius: 20px; font-size: 13px; border: 1px solid #262626;"><i class="fa fa-user-md" style="color: #e5a913; margin-right: 5px;"></i> FDA Approved</span>
                    <span style="background-color: #1a1a1a; color: #a6a6a6; padding: 6px 14px; border-radius: 20px; font-size: 13px; border: 1px solid #262626;"><i class="fa fa-hospital-o" style="color: #e5a913; margin-right: 5px;"></i> Clinic Essentials</span>
                    <span style="background-color: #1a1a1a; color: #a6a6a6; padding: 6px 14px; border-radius: 20px; font-size: 13px; border: 1px solid #262626;"><i class="fa fa-medkit" style="color: #e5a913; margin-right: 5px;"></i> Home Care</span>
                    <span style="background-color: #1a1a1a; color: #a6a6a6; padding: 6px 14px; border-radius: 20px; font-size: 13px; border: 1px solid #262626;"><i class="fa fa-refresh" style="color: #e5a913; margin-right: 5px;"></i> Bulk Refills</span>
                </div>
            </div>
            
            <!-- RIGHT COLUMN: Visual Cards Grid Layout -->
            <div class="col-md-6 col-sm-12">
                <div class="row" style="display: flex; gap: 15px;">
                    
                    <!-- Main Large Block (Medical Supplies) -->
                    <div class="col-sm-6" style="padding: 0;">
                        <div style="background-image: linear-gradient(to top, rgba(0,0,0,0.8), rgba(0,0,0,0)), url('https://placehold.co/400x550'); background-size: cover; background-position: center; height: 420px; border-radius: 12px; position: relative; padding: 20px; display: flex; align-items: flex-end; overflow: hidden;">
                            <span style="position: absolute; top: 15px; right: 15px; background-color: #e5a913; color: #000000; font-size: 11px; font-weight: bold; padding: 4px 10px; border-radius: 4px; text-transform: uppercase;">In Stock</span>
                            <h3 style="color: #ffffff; font-size: 14px; font-weight: bold; text-transform: uppercase; margin: 0; letter-spacing: 0.5px;">Medical Supplies</h3>
                        </div>
                    </div>
                    
                    <!-- Stacked Right Block Elements -->
                    <div class="col-sm-6" style="padding: 0; display: flex; flex-direction: column; gap: 15px;">
                        <!-- Diagnostic Equipment Card -->
                        <div style="background-image: linear-gradient(to top, rgba(0,0,0,0.8), rgba(0,0,0,0)), url('https://placehold.co/400x260'); background-size: cover; background-position: center; height: 202px; border-radius: 12px; padding: 20px; display: flex; align-items: flex-end; overflow: hidden;">
                            <h3 style="color: #ffffff; font-size: 14px; font-weight: bold; text-transform: uppercase; margin: 0; letter-spacing: 0.5px;">Diagnostics</h3>
                        </div>
                        
                        <!-- Wellness & Personal Care Card -->
                        <div style="background-image: linear-gradient(to top, rgba(0,0,0,0.8), rgba(0,0,0,0)), url('https://placehold.co/400x260'); background-size: cover; background-position: center; height: 202px; border-radius: 12px; padding: 20px; display: flex; align-items: flex-end; overflow: hidden;">
                            <h3 style="color: #ffffff; font-size: 14px; font-weight: bold; text-transform: uppercase; margin: 0; letter-spacing: 0.5px;">Wellness & Care</h3>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<!-- /HERO LANDING BANNER SECTION -->
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            @forelse($categories->take(3) as $category)
                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="{{ $category->image_url }}" alt="{{ $category->name }}">
                        </div>
                        <div class="shop-body">
                            <h3>{{ $category->name }}<br>Collection</h3>
                            <a href="{{ route('categories.show', $category->slug) }}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /shop -->
            @empty
                <div class="col-md-12">
                    <p class="text-center">No categories available.</p>
                </div>
            @endforelse
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                    <div class="section-title">
                    <h3 class="title">Available Products</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            @forelse($categories->take(4) as $category)
                                <li @class(['active' => $loop->first])>
                                    <a data-toggle="tab" href="#tab1">{{ $category->name }}</a>
                                </li>
                            @empty
                                <li class="active"><a data-toggle="tab" href="#tab1">Products</a></li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                @forelse($products as $product)
                                <!-- product -->
                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{ $product->image_url }}"
                                             alt="{{ $product->name }}"
                                             style="height: 250px; object-fit: cover;">
                                        @if($product->is_featured)
                                            <div class="product-label">
                                                <span class="new">FEATURED</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">{{ $product->category?->name ?? 'Uncategorized' }}</p>
                                        <h3 class="product-name"><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></h3>
                                        <h4 class="product-price">${{ number_format((float) $product->price, 2) }}</h4>
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
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- HOT DEAL SECTION -->
<div id="hot-deal" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="hot-deal">
                    <ul class="hot-deal-countdown">
                        <li>
                            <div>
                                <h3>02</h3>
                                <span>Days</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>10</h3>
                                <span>Hours</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>34</h3>
                                <span>Mins</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>60</h3>
                                <span>Secs</span>
                            </div>
                        </li>
                    </ul>
                    <h2 class="text-uppercase">hot deal this week</h2>
                    <p>New Collection Up to 50% OFF</p>
                    <a class="primary-btn cta-btn" href="#">Shop now</a>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /HOT DEAL SECTION -->

<!-- BRANDS / PARTNERS SECTION -->
<div id="brands-partners" class="section" style="padding: 70px 0; background-color: #f8f9fa;">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="text-align: center; margin-bottom: 45px;">
                <h3 style="font-size: 32px; font-weight: 800; color: #2b2d42; margin-bottom: 10px;">Trusted by Leading Brands</h3>
                <p style="color: #8d99ae; font-size: 16px; max-width: 600px; margin: 0 auto;">
                    We proudly partner with the world's most respected healthcare and medical equipment companies to bring you certified, premium products.
                </p>
            </div>
        </div>
        <div class="row" style="display: flex; flex-wrap: wrap; justify-content: center; align-items: center; gap: 20px;">
            @php
                $partners = [
                    ['name' => 'MediCorp',    'icon' => 'fa-heartbeat'],
                    ['name' => 'HealthPlus',  'icon' => 'fa-plus-square'],
                    ['name' => 'CareLabs',    'icon' => 'fa-flask'],
                    ['name' => 'PulseTech',   'icon' => 'fa-stethoscope'],
                    ['name' => 'VitaWell',    'icon' => 'fa-leaf'],
                    ['name' => 'BioGen',      'icon' => 'fa-medkit'],
                ];
            @endphp
            @foreach ($partners as $partner)
                <div style="flex: 0 0 30%; max-width: 180px; min-width: 140px; background: #ffffff; border: 1px solid #edf2f4; border-radius: 12px; padding: 25px 15px; text-align: center; box-shadow: 0 4px 14px rgba(0,0,0,0.04); transition: transform 0.2s;">
                    <i class="fa {{ $partner['icon'] }}" style="font-size: 34px; color: #d71d33; margin-bottom: 12px;"></i>
                    <h4 style="font-size: 16px; font-weight: 700; color: #2b2d42; margin: 0;">{{ $partner['name'] }}</h4>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- /BRANDS / PARTNERS SECTION -->

<!-- TESTIMONIALS SECTION -->
<div id="testimonials" class="section" style="padding: 80px 0; background-color: #ffffff;">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="text-align: center; margin-bottom: 50px;">
                <span style="display: inline-block; background: #fdeaed; color: #d71d33; font-size: 13px; font-weight: 700; padding: 6px 16px; border-radius: 20px; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 15px;">Testimonials</span>
                <h3 style="font-size: 32px; font-weight: 800; color: #2b2d42; margin-bottom: 10px;">What Our Customers Say</h3>
                <p style="color: #8d99ae; font-size: 16px; max-width: 620px; margin: 0 auto;">
                    Thousands of healthcare professionals, clinics and families trust us for their medical supply needs. Here's what they have to say.
                </p>
            </div>
        </div>
        <div class="row" style="display: flex; flex-wrap: wrap; gap: 25px; justify-content: center;">
            @php
                $testimonials = [
                    [
                        'name' => 'Dr. Sarah Khan',
                        'role' => 'General Physician, City Clinic',
                        'text' => 'The quality of the diagnostic equipment is outstanding. Delivery was fast and everything arrived perfectly packaged. My go-to supplier now.',
                        'rating' => 5,
                    ],
                    [
                        'name' => 'Ahmed Raza',
                        'role' => 'Pharmacy Owner',
                        'text' => 'Bulk ordering has never been easier. Great prices, reliable stock and excellent customer support. Highly recommended for any pharmacy.',
                        'rating' => 5,
                    ],
                    [
                        'name' => 'Fatima Noor',
                        'role' => 'Home Care Nurse',
                        'text' => 'I rely on them for home care essentials. Products are genuine, certified and always in stock. The whole experience feels professional.',
                        'rating' => 4,
                    ],
                ];
            @endphp
            @foreach ($testimonials as $t)
                <div style="flex: 0 0 31%; min-width: 280px; max-width: 380px; background: #f8f9fa; border-radius: 16px; padding: 32px 28px; box-shadow: 0 6px 20px rgba(0,0,0,0.05); position: relative;">
                    <i class="fa fa-quote-left" style="font-size: 28px; color: #d71d33; opacity: 0.25; margin-bottom: 15px;"></i>
                    <p style="color: #555; font-size: 15px; line-height: 1.7; margin-bottom: 22px;">"{{ $t['text'] }}"</p>
                    <div style="margin-bottom: 16px;">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="fa fa-star" style="color: {{ $i <= $t['rating'] ? '#f5a623' : '#dcdcdc' }}; font-size: 14px;"></i>
                        @endfor
                    </div>
                    <div style="display: flex; align-items: center; gap: 14px;">
                        <div style="width: 50px; height: 50px; border-radius: 50%; background: #d71d33; color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 18px;">
                            {{ strtoupper(substr($t['name'], 0, 1)) }}
                        </div>
                        <div>
                            <h4 style="font-size: 16px; font-weight: 700; color: #2b2d42; margin: 0;">{{ $t['name'] }}</h4>
                            <span style="font-size: 13px; color: #8d99ae;">{{ $t['role'] }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- /TESTIMONIALS SECTION -->
@endsection
