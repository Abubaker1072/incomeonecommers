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
            @forelse($categories as $category)
                <div class="col-md-4 col-sm-6">
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
            @empty
                <div class="col-md-12">
                    <p class="text-center">No categories available.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
<!-- /SECTION -->
@endsection
