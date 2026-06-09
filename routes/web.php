<?php

use App\Enums\UserRole;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Customer;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Shop;
use App\Http\Controllers\Vendor;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public storefront — App\Http\Controllers\Shop\*
|--------------------------------------------------------------------------
*/
Route::get('/', [Shop\HomeController::class, 'index'])->name('products.index');
Route::get('/product/{product}', [Shop\ProductController::class, 'show'])->name('products.show');
Route::get('/product/{product}/quickview', [Shop\ProductController::class, 'quickview'])->name('products.quickview');

Route::get('/hot-deals', function () {
    $products = App\Models\Product::with('category')->where('is_active', true)->get();
    return view('pages.hot-deals', compact('products'));
})->name('hot-deals');

Route::get('/featured', function () {
    $products = App\Models\Product::with('category')->where('is_active', true)->where('is_featured', true)->get();
    return view('pages.featured', compact('products'));
})->name('featured');

Route::get('/category/{slug}', function ($slug) {
    $category = App\Models\Category::where('slug', $slug)->firstOrFail();
    $products = App\Models\Product::with('category')
        ->where('category_id', $category->id)
        ->where('is_active', true)
        ->get();
    return view('products.index', compact('products'));
})->name('categories.show');

Route::get('/categories', function () {
    $categories = App\Models\Category::whereNull('parent_id')
        ->orderBy('name')
        ->get();
    return view('pages.categories', compact('categories'));
})->name('categories');
Route::view('/brands', 'pages.brands')->name('brands');
Route::view('/blog', 'pages.blog')->name('blog');
Route::get('/cart', function () {
    return view('cart');
})->name('cart');
Route::get('/wishlist', function () {
    return view('wishlist');
})->name('wishlist');

/*
|--------------------------------------------------------------------------
| Authenticated profile (any role) — added by Breeze
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Post-login landing — redirect to the role-specific dashboard
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    $route = match (auth()->user()->role) {
        UserRole::Admin => 'admin.dashboard',
        UserRole::Vendor => 'vendor.dashboard',
        UserRole::Customer => 'customer.dashboard',
    };

    return redirect()->route($route);
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Admin area
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('categories', Admin\CategoryController::class)->except('show');
        Route::resource('products', Admin\ProductController::class);
    });

/*
|--------------------------------------------------------------------------
| Vendor area
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:vendor', 'vendor.approved'])
    ->prefix('vendor')
    ->name('vendor.')
    ->group(function () {
        Route::get('/', [Vendor\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('products', Vendor\ProductController::class)->except('show');
    });

/*
|--------------------------------------------------------------------------
| Customer area
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:customer'])
    ->prefix('account')
    ->name('customer.')
    ->group(function () {
        Route::get('/', [Customer\DashboardController::class, 'index'])->name('dashboard');
    });

require __DIR__.'/auth.php';
