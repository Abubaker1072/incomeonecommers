@php
    $category ??= null;
    $method ??= 'POST';
    $parents ??= [];
@endphp

<form method="POST" action="{{ $action }}" enctype="multipart/form-data" novalidate>
    @csrf
    @if ($method !== 'POST') @method($method) @endif

    <x-form.input name="name" label="Name" :value="$category?->name" required />
    <x-form.input name="slug" label="Slug" :value="$category?->slug"
        placeholder="Leave blank to auto-generate from name" />

    <x-form.select name="parent_id" label="Parent category"
        :options="$parents" :selected="$category?->parent_id"
        placeholder="— None —" />

    <x-form.file name="image" label="Image (optional, max 2MB)" accept="image/*" />

    @if ($category?->image_path)
        <div class="mb-3">
            <small class="text-muted">Current image:</small><br>
            <img src="{{ \Illuminate\Support\Facades\Storage::url($category->image_path) }}"
                 class="rounded mt-1" width="120" alt="">
        </div>
    @endif

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">Cancel</a>
    </div>
</form>
