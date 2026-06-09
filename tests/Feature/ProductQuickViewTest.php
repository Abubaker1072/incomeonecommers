<?php

namespace Tests\Feature;

use App\Enums\UserRole;
use App\Enums\VendorStatus;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductQuickViewTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_fetch_product_quickview_modal_html(): void
    {
        // Create user and vendor
        $user = User::create([
            'name' => 'Acme Vendor User',
            'email' => 'acme@vendor.test',
            'password' => bcrypt('password'),
            'role' => UserRole::Vendor,
        ]);

        $vendor = Vendor::create([
            'user_id' => $user->id,
            'store_name' => 'Acme Goods',
            'slug' => 'acme-goods',
            'status' => VendorStatus::Approved,
        ]);

        // Create category and product
        $category = Category::create([
            'name' => 'Diagnostics',
            'slug' => 'diagnostics',
        ]);

        $product = Product::create([
            'vendor_id' => $vendor->id,
            'category_id' => $category->id,
            'name' => 'Stethoscope Elite',
            'slug' => 'stethoscope-elite',
            'description' => 'A highly precise acoustic stethoscope.',
            'price' => 129.99,
            'stock' => 15,
            'is_active' => true,
        ]);

        $response = $this->get(route('products.quickview', $product));

        $response->assertStatus(200);
        $response->assertViewIs('products.quickview_partial');
        $response->assertSee('Stethoscope Elite');
        $response->assertSee('Diagnostics');
        $response->assertSee('$129.99');
        $response->assertSee('A highly precise acoustic stethoscope.');
    }
}
