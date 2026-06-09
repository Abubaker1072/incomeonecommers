@extends('layouts.admin')

@section('title', 'New Product')

@section('content')
    <div class="mb-4">
        <h1 class="fs-3 mb-1">New product</h1>
    </div>

    <x-card>
        @include('admin.products._form', [
            'action' => route('admin.products.store'),
            'vendors' => $vendors,
            'categories' => $categories,
        ])
    </x-card>
@endsection
