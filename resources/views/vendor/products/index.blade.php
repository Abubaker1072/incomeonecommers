@extends('layouts.admin')

@section('title', 'My Products')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="fs-3 mb-1">My products</h1>
            <p class="text-muted mb-0">Products from your store that appear in the marketplace when active and in stock.</p>
        </div>
        <a href="{{ route('vendor.products.create') }}" class="btn btn-primary">
            <i class="ti ti-plus me-1"></i> New product
        </a>
    </div>

    <x-card>
        <x-data-table :columns="['', 'Name', 'Category', 'Price', 'Stock', 'Status', 'Actions']"
                      empty="No products yet.">
            @foreach ($products as $product)
                <tr>
                    <td style="width: 56px;">
                        @if ($product->image_path)
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($product->image_path) }}"
                                 alt="" class="rounded" width="40" height="40" style="object-fit:cover;">
                        @else
                            <div class="icon-shape icon-md bg-light text-muted rounded">
                                <i class="ti ti-box-seam"></i>
                            </div>
                        @endif
                    </td>
                    <td>
                        <div class="fw-medium">{{ $product->name }}</div>
                        <div class="text-muted small"><code>{{ $product->slug }}</code></div>
                    </td>
                    <td>{{ $product->category?->name ?? '--' }}</td>
                    <td>${{ number_format((float) $product->price, 2) }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        @if ($product->is_active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                        @if ($product->is_featured)
                            <span class="badge bg-warning text-dark">Featured</span>
                        @endif
                    </td>
                    <td class="text-end">
                        <a href="{{ route('vendor.products.edit', $product) }}" class="btn btn-sm btn-outline-secondary">
                            <i class="ti ti-pencil"></i>
                        </a>
                        <form method="POST" action="{{ route('vendor.products.destroy', $product) }}" class="d-inline"
                              onsubmit="return confirm('Delete this product?');">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" type="submit">
                                <i class="ti ti-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </x-data-table>
    </x-card>

    <div class="mt-3">{{ $products->links() }}</div>
@endsection
