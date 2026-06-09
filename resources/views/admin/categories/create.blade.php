@extends('layouts.admin')

@section('title', 'New Category')

@section('content')
    <div class="mb-4">
        <h1 class="fs-3 mb-1">New category</h1>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <x-card>
                @include('admin.categories._form', [
                    'action' => route('admin.categories.store'),
                    'parents' => $parents,
                ])
            </x-card>
        </div>
    </div>
@endsection
