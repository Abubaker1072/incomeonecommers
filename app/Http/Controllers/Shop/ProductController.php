<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function show(Product $product): View
    {
        $product->load('category');
        return view('products.show', compact('product'));
    }

    public function quickview(Product $product): View
    {
        $product->load('category');
        return view('products.quickview_partial', compact('product'));
    }
}
