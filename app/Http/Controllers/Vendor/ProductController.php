<?php

namespace App\Http\Controllers\Vendor;

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
        $vendor = $this->currentVendor();

        return view('vendor.products.index', [
            'products' => Product::query()
                ->with('category')
                ->where('vendor_id', $vendor->id)
                ->latest('id')
                ->paginate(15),
        ]);
    }

    public function create(): View
    {
        return view('vendor.products.create', [
            'vendor' => $this->currentVendor(),
            'categories' => Category::orderBy('name')->pluck('name', 'id'),
        ]);
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $data = $request->safe()->except('image');
        $data['vendor_id'] = $this->currentVendor()->id;

        $this->products->create($data, $request->file('image'));

        return redirect()->route('vendor.products.index')->with('status', 'Product created.');
    }

    public function edit(Product $product): View
    {
        $vendor = $this->currentVendor();
        $this->ensureOwnsProduct($product, $vendor);

        return view('vendor.products.edit', [
            'product' => $product,
            'vendor' => $vendor,
            'categories' => Category::orderBy('name')->pluck('name', 'id'),
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $vendor = $this->currentVendor();
        $this->ensureOwnsProduct($product, $vendor);

        $data = $request->safe()->except('image');
        $data['vendor_id'] = $vendor->id;

        $this->products->update($product, $data, $request->file('image'));

        return redirect()->route('vendor.products.index')->with('status', 'Product updated.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $vendor = $this->currentVendor();
        $this->ensureOwnsProduct($product, $vendor);

        $this->products->delete($product);

        return redirect()->route('vendor.products.index')->with('status', 'Product deleted.');
    }

    private function currentVendor(): Vendor
    {
        return auth()->user()->vendor()->firstOrFail();
    }

    private function ensureOwnsProduct(Product $product, Vendor $vendor): void
    {
        abort_unless((int) $product->vendor_id === (int) $vendor->id, 403);
    }
}
