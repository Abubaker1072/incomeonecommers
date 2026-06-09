<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Vendor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $vendors = Vendor::all();
        $categories = Category::all();

        if ($vendors->isEmpty() || $categories->isEmpty()) {
            return;
        }

        // Delete all existing products and images
        ProductImage::query()->delete();
        Product::query()->delete();

        // Product descriptions and prices
        $productData = [
            ['Premium Wellness Kit', 'A complete wellness package designed for health-conscious individuals.', 299.99],
            ['Essential Daily Care Set', 'Complete daily care essentials for modern lifestyle.', 149.99],
            ['Luxury Care Collection', 'Premium care products with natural ingredients.', 399.99],
            ['Natural Beauty Bundle', 'Organic beauty products for radiant skin.', 179.99],
            ['Complete Health Package', 'Comprehensive health and wellness products.', 249.99],
            ['Daily Essentials Pack', 'Everything you need for everyday care.', 129.99],
            ['Premium Skincare System', 'Advanced skincare with natural extracts.', 349.99],
            ['Wellness & Care Bundle', 'Integrated wellness solution for your family.', 199.99],
            ['Professional Care Kit', 'Professional-grade care products.', 279.99],
            ['Essential Wellness Box', 'Curated wellness products for holistic health.', 189.99],
            ['Deluxe Grooming Set', 'Premium grooming essentials for men and women.', 219.99],
            ['Natural Care Range', 'Pure natural products for comprehensive care.', 159.99],
            ['Health & Beauty Pack', 'Combined health and beauty solutions.', 239.99],
            ['Premium Wellness Bundle', 'Luxury wellness items for daily use.', 319.99],
            ['Daily Care Essentials', 'Must-have products for daily routine.', 139.99],
            ['Elite Wellness Collection', 'Top-tier wellness products.', 429.99],
            ['Smart Care System', 'Innovative care products for modern living.', 269.99],
            ['Complete Wellness Suite', 'Full spectrum wellness coverage.', 359.99],
            ['Everyday Care Bundle', 'Practical care solutions for busy lifestyle.', 169.99],
            ['Luxury Wellness Kit', 'Exclusive premium wellness items.', 389.99],
            ['Essential Beauty Care', 'Beauty and care combined effectively.', 199.99],
        ];

        $productsPath = public_path('marketplace/Products');
        $productFolders = glob($productsPath . '/Product Item *', GLOB_ONLYDIR);
        $productFolders = array_values($productFolders); // Re-index

        foreach ($productData as $index => $data) {
            [$name, $description, $price] = $data;

            $product = Product::create([
                'vendor_id' => $vendors[$index % $vendors->count()]->id,
                'category_id' => $categories[$index % $categories->count()]->id,
                'name' => $name,
                'slug' => Str::slug($name) . '-' . ($index + 1),
                'description' => $description,
                'price' => $price,
                'stock' => rand(10, 100),
                'is_active' => true,
                'is_featured' => $index < 5,
            ]);

            // Add images from product folder
            if (isset($productFolders[$index])) {
                $images = glob($productFolders[$index] . '/*.webp');
                $images = array_values($images);

                foreach ($images as $sortOrder => $imagePath) {
                    $fileName = basename($imagePath);
                    $relativePath = 'marketplace/Products/Product Item ' . ($index + 1) . '/' . $fileName;

                    ProductImage::create([
                        'product_id' => $product->id,
                        'path' => $relativePath,
                        'sort_order' => $sortOrder + 1,
                    ]);
                }
            }
        }
    }
}
