@extends('layouts.app')

@section('title', 'Blog - Electro Store')

@section('content')
<!-- SECTION -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Latest Blogs</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{ asset('img/product01.png') }}" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Top 10 Gaming Laptops 2024</h3>
                        <p style="font-size: 12px; color: #666; margin: 10px 0;">By Admin | Jun 08, 2024</p>
                        <p>Discover the best gaming laptops available this year with RTX 4060 and latest processors.</p>
                        <a href="#" class="cta-btn">Read More <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{ asset('img/product02.png') }}" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Best Wireless Headphones</h3>
                        <p style="font-size: 12px; color: #666; margin: 10px 0;">By Admin | Jun 07, 2024</p>
                        <p>Complete guide to choosing the right wireless headphones with noise cancellation.</p>
                        <a href="#" class="cta-btn">Read More <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{ asset('img/product03.png') }}" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>USB-C Technology Explained</h3>
                        <p style="font-size: 12px; color: #666; margin: 10px 0;">By Admin | Jun 06, 2024</p>
                        <p>Understanding USB-C: The future of charging and data transfer technology.</p>
                        <a href="#" class="cta-btn">Read More <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{ asset('img/product04.png') }}" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Smartphone Buying Guide</h3>
                        <p style="font-size: 12px; color: #666; margin: 10px 0;">By Admin | Jun 05, 2024</p>
                        <p>Tips and tricks to choose the best smartphone that fits your needs and budget.</p>
                        <a href="#" class="cta-btn">Read More <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /SECTION -->
@endsection
