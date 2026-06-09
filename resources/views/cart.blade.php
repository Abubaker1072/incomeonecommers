@extends('layouts.app')

@section('title', 'Shopping Cart - Electro Store')

@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="{{ route('products.index') }}">Home</a></li>
                    <li class="active">Shopping Cart</li>
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
                $cartItems = [];
                if (auth()->check()) {
                    $cart = auth()->user()->cart;
                    if ($cart) {
                        $cartItems = $cart->cartItems()->with('product')->get();
                    }
                }
                // Fallback to dummy data for preview
                if (count($cartItems) === 0) {
                    $dummyProducts = App\Models\Product::with('category')->limit(2)->get();
                    foreach ($dummyProducts as $i => $product) {
                        $cartItems[] = (object)[
                            'id' => $i + 1,
                            'product' => $product,
                            'quantity' => 1,
                        ];
                    }
                }
                $subtotal = 0;
                foreach ($cartItems as $item) {
                    if ($item->product) {
                        $subtotal += $item->product->price * $item->quantity;
                    }
                }
            @endphp

            @if (count($cartItems) > 0)
            <!-- Cart Items List -->
            <div class="col-md-8">
                <div style="background: white; border: 1px solid #e5e5e5; border-radius: 8px; padding: 25px; box-shadow: 0 5px 15px rgba(0,0,0,0.02);">
                    <h3 style="font-weight: bold; margin-bottom: 20px;">Your Shopping Cart</h3>
                    <div class="table-responsive">
                        <table class="table" style="vertical-align: middle;">
                            <thead>
                                <tr>
                                    <th colspan="2">Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                @if ($item->product)
                                <tr>
                                    <td style="width: 80px; vertical-align: middle;">
                                        <img src="{{ asset('marketplace/img/product01.png') }}" alt="{{ $item->product->name }}" style="width: 70px; border: 1px solid #eee; border-radius: 4px; padding: 5px;">
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <h5 style="margin: 0; font-weight: bold;"><a href="{{ route('products.show', $item->product->id) }}">{{ $item->product->name }}</a></h5>
                                        <small class="text-muted">{{ $item->product->category->name ?? 'Accessories' }}</small>
                                    </td>
                                    <td style="vertical-align: middle; font-weight: bold;">${{ number_format($item->product->price, 2) }}</td>
                                    <td style="vertical-align: middle; width: 120px;">
                                        <div class="input-number">
                                            <input type="number" value="{{ $item->quantity }}">
                                            <span class="qty-up">+</span>
                                            <span class="qty-down">-</span>
                                        </div>
                                    </td>
                                    <td style="vertical-align: middle; font-weight: bold; color: #D10024;">${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                                    <td style="vertical-align: middle; text-align: right;">
                                        <button class="btn btn-link" style="color: #999;" title="Remove Item"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Cart Summary Side Panel -->
            <div class="col-md-4">
                <div style="background: #15161D; color: white; border-radius: 8px; padding: 30px; box-shadow: 0 5px 15px rgba(0,0,0,0.15);">
                    <h3 style="font-weight: bold; margin-bottom: 25px; color: white; border-bottom: 1px solid #2A2B36; padding-bottom: 15px;">Summary</h3>
                    
                    <div style="display: flex; justify-content: space-between; margin-bottom: 15px;">
                        <span>Subtotal</span>
                        <span style="font-weight: bold;">${{ number_format($subtotal, 2) }}</span>
                    </div>

                    <div style="display: flex; justify-content: space-between; margin-bottom: 15px;">
                        <span>Shipping</span>
                        <span style="color: #2b96cc; font-weight: bold;">FREE</span>
                    </div>

                    <div style="border-top: 1px solid #2A2B36; margin-top: 25px; padding-top: 25px; display: flex; justify-content: space-between; margin-bottom: 30px; font-size: 18px;">
                        <span style="font-weight: bold;">Total</span>
                        <span style="font-weight: bold; color: #D10024; font-size: 22px;">${{ number_format($subtotal, 2) }}</span>
                    </div>

                    <a href="#" class="primary-btn w-100 text-center" style="display: block; font-weight: bold; padding: 15px 0; border-radius: 4px; text-transform: uppercase;">Proceed to Checkout</a>
                    <a href="{{ route('products.index') }}" class="btn btn-block" style="color: #ccc; margin-top: 15px; text-align: center; border: 1px dashed #2A2B36;">Continue Shopping</a>
                </div>
            </div>
            @else
            <!-- Empty Cart State -->
            <div class="col-md-12 text-center" style="padding: 80px 0;">
                <div style="font-size: 72px; color: #eee; margin-bottom: 25px;"><i class="fa fa-shopping-cart"></i></div>
                <h2 style="font-weight: bold; margin-bottom: 10px;">Your Cart is Empty</h2>
                <p class="text-muted" style="margin-bottom: 30px;">Looks like you haven't added anything to your cart yet.</p>
                <a href="{{ route('products.index') }}" class="primary-btn" style="padding: 12px 35px; border-radius: 4px; font-weight: bold; text-decoration: none;">Shop Now</a>
            </div>
            @endif
        </div>
    </div>
</div>
<!-- /SECTION -->
@endsection
