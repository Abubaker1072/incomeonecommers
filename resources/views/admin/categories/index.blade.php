@extends('layouts.admin')

@section('title', 'Categories')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="fs-3 mb-1">Categories</h1>
            <p class="text-muted mb-0">Organize products into browsable groups.</p>
        </div>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
            <i class="ti ti-plus me-1"></i> New category
        </a>
    </div>

    <x-card>
        <x-data-table :columns="['Name', 'Slug', 'Parent', 'Products', 'Actions']" empty="No categories yet.">
            @foreach ($categories as $category)
                <tr>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            @if ($category->image_path)
                                <img src="{{ $category->image_url }}"
                                     alt="" class="rounded" width="36" height="36" style="object-fit:cover;">
                            @endif
                            <span class="fw-medium">{{ $category->name }}</span>
                        </div>
                    </td>
                    <td><code class="small">{{ $category->slug }}</code></td>
                    <td>{{ $category->parent?->name ?? '—' }}</td>
                    <td>{{ $category->products_count }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-outline-secondary">
                            <i class="ti ti-pencil"></i>
                        </a>
                        <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" class="d-inline"
                              onsubmit="return confirm('Delete this category?');">
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

    <div class="mt-3">{{ $categories->links() }}</div>
@endsection
