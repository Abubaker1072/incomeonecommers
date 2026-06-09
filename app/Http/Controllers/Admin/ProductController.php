<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Vendor;
use App\Services\ProductService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function __construct(private readonly ProductService $products) {}

    public function index(): View
    {
        return view('admin.products.index', [
            'products' => $this->products->paginate(),
        ]);
    }

    public function create(): View
    {
        return view('admin.products.create', [
            'vendors' => Vendor::orderBy('store_name')->pluck('store_name', 'id'),
            'categories' => Category::orderBy('name')->pluck('name', 'id'),
        ]);
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $this->products->create($request->safe()->except('image'), $request->file('image'));

        return redirect()->route('admin.products.index')->with('status', 'Product created.');
    }

    public function edit(Product $product): View
    {
        return view('admin.products.edit', [
            'product' => $product,
            'vendors' => Vendor::orderBy('store_name')->pluck('store_name', 'id'),
            'categories' => Category::orderBy('name')->pluck('name', 'id'),
        ]);
    }

    public function show(Product $product): View
    {
        return view('admin.products.show', [
            'product' => $product->load('images', 'vendor', 'category'),
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $this->products->update($product, $request->safe()->except('image'), $request->file('image'));

        return redirect()->route('admin.products.index')->with('status', 'Product updated.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $this->products->delete($product);

        return redirect()->route('admin.products.index')->with('status', 'Product deleted.');
    }
}
