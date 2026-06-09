@php
    $product ??= null;
    $method ??= 'POST';
    $vendors ??= [];
    $categories ??= [];
@endphp

<form method="POST" action="{{ $action }}" enctype="multipart/form-data" novalidate>
    @csrf
    @if ($method !== 'POST') @method($method) @endif

    <div class="row">
        <div class="col-md-8">
            <x-form.input name="name" label="Product name" :value="$product?->name" required />
            <x-form.input name="slug" label="Slug" :value="$product?->slug"
                placeholder="Leave blank to auto-generate from name" />
            <x-form.textarea name="description" label="Description" :value="$product?->description" rows="5" />
        </div>

        <div class="col-md-4">
            <x-form.select name="vendor_id" label="Vendor"
                :options="$vendors" :selected="$product?->vendor_id"
                placeholder="— Select vendor —" required />
            <x-form.select name="category_id" label="Category"
                :options="$categories" :selected="$product?->category_id"
                placeholder="— None —" />

            <div class="row">
                <div class="col-6">
                    <x-form.input name="price" type="number" step="0.01" min="0" label="Price"
                        :value="$product?->price" required />
                </div>
                <div class="col-6">
                    <x-form.input name="stock" type="number" min="0" label="Stock"
                        :value="$product?->stock" required />
                </div>
            </div>

            <x-form.file name="image" label="Image (max 2MB)" accept="image/*" />

            @if ($product?->image_path)
                <div class="mb-3">
                    <small class="text-muted">Current image:</small><br>
                    <img src="{{ $product->image_url }}"
                         class="rounded mt-1" width="120" alt="">
                </div>
            @endif

            <div class="form-check mb-2">
                <input type="hidden" name="is_active" value="0">
                <input id="is_active" name="is_active" type="checkbox" value="1" class="form-check-input"
                    {{ old('is_active', $product?->is_active ?? true) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">Active (visible to customers)</label>
            </div>

            <div class="form-check mb-3">
                <input type="hidden" name="is_featured" value="0">
                <input id="is_featured" name="is_featured" type="checkbox" value="1" class="form-check-input"
                    {{ old('is_featured', $product?->is_featured ?? false) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_featured">Feature on homepage</label>
            </div>
        </div>
    </div>

    <div class="d-flex gap-2 mt-3">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">Cancel</a>
    </div>
</form>
