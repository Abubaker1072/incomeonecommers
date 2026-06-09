@extends('layouts.admin')

@section('title', 'New Product')

@section('content')
    <div class="mb-4">
        <h1 class="fs-3 mb-1">New product</h1>
    </div>

    <x-card>
        @include('vendor.products._form', [
            'action' => route('vendor.products.store'),
            'vendor' => $vendor,
            'categories' => $categories,
        ])
    </x-card>
@endsection
