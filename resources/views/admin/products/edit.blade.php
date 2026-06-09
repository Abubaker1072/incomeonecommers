@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')
    <div class="mb-4">
        <h1 class="fs-3 mb-1">Edit product</h1>
    </div>

    <x-card>
        @include('admin.products._form', [
            'product' => $product,
            'action' => route('admin.products.update', $product),
            'method' => 'PATCH',
            'vendors' => $vendors,
            'categories' => $categories,
        ])
    </x-card>
@endsection
