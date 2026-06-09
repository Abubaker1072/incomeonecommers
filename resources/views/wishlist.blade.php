@extends('layouts.app')

@section('title', 'Your Wishlist - Electro Store')

@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="{{ route('products.index') }}">Home</a></li>
                    <li class="active">Wishlist</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
    <div class="container">
        <div class="row">
            @php
                // Fetch some mock wishlist items
                $wishlistProducts = App\Models\Product::with('category')->where('is_featured', true)->get();
                if (count($wishlistProducts) === 0) {
                    $wishlistProducts = App\Models\Product::with('category')->limit(3)->get();
                }
            @endphp

            @if (count($wishlistProducts) > 0)
            <div class="col-md-12">
                <div style="background: white; border: 1px solid #e5e5e5; border-radius: 8px; padding: 25px; box-shadow: 0 5px 15px rgba(0,0,0,0.02);">
                    <h3 style="font-weight: bold; margin-bottom: 25px;">Your Wishlist</h3>
                    
                    <div class="table-responsive">
                        <table class="table" style="vertical-align: middle;">
                            <thead>
                                <tr>
                                    <th colspan="2">Product Details</th>
                                    <th>Price</th>
                                    <th>Stock Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wishlistProducts as $product)
                                <tr>
                                    <td style="width: 80px; vertical-align: middle;">
                                        <img src="{{ asset('marketplace/img/product01.png') }}" alt="{{ $product->name }}" style="width: 70px; border: 1px solid #eee; border-radius: 4px; padding: 5px;">
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <h5 style="margin: 0; font-weight: bold;"><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></h5>
                                        <small class="text-muted">{{ $product->category->name ?? 'Category' }}</small>
                                    </td>
                                    <td style="vertical-align: middle; font-weight: bold;">${{ number_format($product->price, 2) }}</td>
                                    <td style="vertical-align: middle;">
                                        <span class="label label-success" style="padding: 5px 10px; border-radius: 4px; font-weight: 500; font-size: 11px; text-transform: uppercase;">In Stock</span>
                                    </td>
                                    <td style="vertical-align: middle; width: 220px;">
                                        <div style="display: flex; gap: 10px;">
                                            <button class="primary-btn" style="padding: 8px 15px; border-radius: 4px; font-size: 12px; border: none; font-weight: bold;"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                            <button class="btn btn-default" style="padding: 8px 12px; border-radius: 4px; color: #999; border: 1px solid #ddd;" title="Remove Item"><i class="fa fa-times"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @else
            <!-- Empty Wishlist State -->
            <div class="col-md-12 text-center" style="padding: 80px 0;">
                <div style="font-size: 72px; color: #eee; margin-bottom: 25px;"><i class="fa fa-heart-o"></i></div>
                <h2 style="font-weight: bold; margin-bottom: 10px;">Your Wishlist is Empty</h2>
                <p class="text-muted" style="margin-bottom: 30px;">Save items you like to buy them later!</p>
                <a href="{{ route('products.index') }}" class="primary-btn" style="padding: 12px 35px; border-radius: 4px; font-weight: bold; text-decoration: none;">Explore Products</a>
            </div>
            @endif
        </div>
    </div>
</div>
<!-- /SECTION -->
@endsection
