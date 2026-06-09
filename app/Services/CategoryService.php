<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryService
{
    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return Category::query()
            ->with('parent')
            ->withCount('products')
            ->latest('id')
            ->paginate($perPage);
    }

    public function create(array $data, ?UploadedFile $image = null): Category
    {
        $data['slug'] = $this->uniqueSlug($data['name'], $data['slug'] ?? null);

        if ($image) {
            $data['image_path'] = $image->store('categories', 'public');
        }

        return Category::create($data);
    }

    public function update(Category $category, array $data, ?UploadedFile $image = null): Category
    {
        $data['slug'] = $this->uniqueSlug($data['name'], $data['slug'] ?? null, $category->id);

        if ($image) {
            if ($category->image_path) {
                Storage::disk('public')->delete($category->image_path);
            }
            $data['image_path'] = $image->store('categories', 'public');
        }

        $category->update($data);

        return $category;
    }

    public function delete(Category $category): void
    {
        $category->delete();
    }

    private function uniqueSlug(string $name, ?string $slug, ?int $ignoreId = null): string
    {
        $base = Str::slug($slug ?: $name);
        $candidate = $base;
        $i = 2;

        while (Category::where('slug', $candidate)
            ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
            ->exists()) {
            $candidate = "{$base}-{$i}";
            $i++;
        }

        return $candidate;
    }
}
