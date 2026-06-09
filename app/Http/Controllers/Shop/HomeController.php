<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(): View
    {
        $products = Product::with(['category', 'vendor'])
            ->where('is_active', true)
            ->where('stock', '>', 0)
            ->latest()
            ->get();

        $categories = Category::withCount(['products' => function ($query) {
            $query->where('is_active', true)->where('stock', '>', 0);
        }])
            ->whereHas('products', function ($query) {
                $query->where('is_active', true)->where('stock', '>', 0);
            })
            ->orderBy('name')
            ->get();

        return view('websitemarketplace.views.products.index', compact('products', 'categories'));
    }
}
