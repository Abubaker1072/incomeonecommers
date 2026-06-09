<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductService
{
    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return Product::query()
            ->with(['vendor', 'category'])
            ->latest('id')
            ->paginate($perPage);
    }

    public function create(array $data, ?UploadedFile $image = null): Product
    {
        $data['slug'] = $this->uniqueSlug($data['name'], $data['slug'] ?? null);
        $data['is_active'] = (bool) ($data['is_active'] ?? false);
        $data['is_featured'] = (bool) ($data['is_featured'] ?? false);

        if ($image) {
            $data['image_path'] = $image->store('products', 'public');
        }

        return Product::create($data);
    }

    public function update(Product $product, array $data, ?UploadedFile $image = null): Product
    {
        $data['slug'] = $this->uniqueSlug($data['name'], $data['slug'] ?? null, $product->id);
        $data['is_active'] = (bool) ($data['is_active'] ?? false);
        $data['is_featured'] = (bool) ($data['is_featured'] ?? false);

        if ($image) {
            if ($product->image_path) {
                Storage::disk('public')->delete($product->image_path);
            }
            $data['image_path'] = $image->store('products', 'public');
        }

        $product->update($data);

        return $product;
    }

    public function delete(Product $product): void
    {
        $product->delete();
    }

    private function uniqueSlug(string $name, ?string $slug, ?int $ignoreId = null): string
    {
        $base = Str::slug($slug ?: $name);
        $candidate = $base;
        $i = 2;

        while (Product::where('slug', $candidate)
            ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
            ->exists()) {
            $candidate = "{$base}-{$i}";
            $i++;
        }

        return $candidate;
    }
}
