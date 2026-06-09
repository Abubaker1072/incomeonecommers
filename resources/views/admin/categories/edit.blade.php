@extends('layouts.admin')

@section('title', 'Edit Category')

@section('content')
    <div class="mb-4">
        <h1 class="fs-3 mb-1">Edit category</h1>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <x-card>
                @include('admin.categories._form', [
                    'category' => $category,
                    'action' => route('admin.categories.update', $category),
                    'method' => 'PATCH',
                    'parents' => $parents,
                ])
            </x-card>
        </div>
    </div>
@endsection
