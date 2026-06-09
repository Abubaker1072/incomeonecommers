@extends('layouts.admin')

@section('title', 'Product Details - ' . $product->name)

@section('content')
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h1 class="fs-3 mb-1">{{ $product->name }}</h1>
            <p class="text-muted mb-0">Product ID: {{ $product->id }}</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-primary">
                <i class="ti ti-pencil"></i> Edit
            </a>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                <i class="ti ti-arrow-left"></i> Back
            </a>
        </div>
    </div>

    <div class="row g-4">
        <!-- Images Section -->
        <div class="col-md-6">
            <x-card title="Product Images">
                @if($product->images->count() > 0)
                    <div class="mb-3">
                        <img 
                            id="mainImage" 
                            src="{{ asset($product->images->first()->path) }}" 
                            alt="{{ $product->name }}"
                            class="img-fluid rounded"
                            style="max-height: 400px; object-fit: cover; width: 100%;"
                        >
                    </div>
                    @if($product->images->count() > 1)
                        <div class="d-flex gap-2 flex-wrap">
                            @foreach($product->images as $image)
                                <img 
                                    src="{{ asset($image->path) }}" 
                                    alt="{{ $product->name }}"
                                    class="img-thumbnail cursor-pointer"
                                    style="width: 80px; height: 80px; object-fit: cover;"
                                    onclick="document.getElementById('mainImage').src = '{{ asset($image->path) }}'"
                                >
                            @endforeach
                        </div>
                    @endif
                @else
                    <div class="alert alert-warning mb-0">
                        <i class="ti ti-alert-circle"></i> No images available
                    </div>
                @endif
            </x-card>
        </div>

        <!-- Details Section -->
        <div class="col-md-6">
            <!-- Basic Info -->
            <x-card title="Basic Information" class="mb-4">
                <div class="mb-3">
                    <label class="form-label text-muted small">Status</label>
                    <div>
                        <span class="badge {{ $product->is_active ? 'bg-success' : 'bg-danger' }}">
                            {{ $product->is_active ? 'Active' : 'Inactive' }}
                        </span>
                        @if($product->is_featured)
                            <span class="badge bg-warning text-dark">Featured</span>
                        @endif
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label text-muted small">Category</label>
                    <p class="mb-0">
                        <strong>{{ $product->category->name ?? 'N/A' }}</strong>
                        <code class="ms-2">{{ $product->category->slug ?? 'N/A' }}</code>
                    </p>
                </div>

                <div class="mb-3">
                    <label class="form-label text-muted small">Vendor</label>
                    <p class="mb-0">
                        <strong>{{ $product->vendor->store_name ?? 'N/A' }}</strong>
                    </p>
                </div>

                <div class="mb-3">
                    <label class="form-label text-muted small">SKU</label>
                    <p class="mb-0">
                        <code>{{ $product->slug }}</code>
                    </p>
                </div>
            </x-card>

            <!-- Pricing & Stock -->
            <x-card title="Pricing & Stock" class="mb-4">
                <div class="row g-3">
                    <div class="col-6">
                        <label class="form-label text-muted small">Price</label>
                        <h3 class="mb-0">${{ number_format($product->price, 2) }}</h3>
                    </div>
                    <div class="col-6">
                        <label class="form-label text-muted small">Stock</label>
                        <h3 class="mb-0">{{ $product->stock }} units</h3>
                    </div>
                </div>
            </x-card>

            <!-- Description -->
            <x-card title="Description">
                <p class="mb-0">{{ $product->description ?? 'No description provided.' }}</p>
            </x-card>
        </div>
    </div>

    <!-- Timestamps -->
    <x-card title="Metadata" class="mt-4">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label text-muted small">Created</label>
                <p class="mb-0">{{ $product->created_at->format('M d, Y H:i A') }}</p>
            </div>
            <div class="col-md-6">
                <label class="form-label text-muted small">Last Updated</label>
                <p class="mb-0">{{ $product->updated_at->format('M d, Y H:i A') }}</p>
            </div>
        </div>
    </x-card>
@endsection
