@php
    use App\Enums\UserRole;
    $role = auth()->user()?->role;
@endphp
<aside id="sidebar" class="sidebar">
    <div class="logo-area">
        <a href="{{ url('/') }}" class="d-inline-flex">
            <img src="{{ asset('assets/images/logo-icon.svg') }}" alt="" width="24">
            <span class="logo-text ms-2"><img src="{{ asset('assets/images/logo.svg') }}" alt=""></span>
        </a>
    </div>

    <ul class="nav flex-column">
        @if ($role === UserRole::Admin)
            <li class="px-4 py-2"><small class="nav-text text-uppercase">Admin</small></li>
            <li><a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i><span class="nav-text">Dashboard</span></a></li>
            <li><a class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}" href="{{ route('admin.products.index') }}"><i class="ti ti-box-seam"></i><span class="nav-text">Products</span></a></li>
            <li><a class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}"><i class="ti ti-category"></i><span class="nav-text">Categories</span></a></li>
            <li><a class="nav-link" href="#"><i class="ti ti-building-store"></i><span class="nav-text">Vendors</span></a></li>
            <li><a class="nav-link" href="#"><i class="ti ti-receipt"></i><span class="nav-text">Orders</span></a></li>
            <li><a class="nav-link" href="#"><i class="ti ti-users"></i><span class="nav-text">Customers</span></a></li>

        @elseif ($role === UserRole::Vendor)
            <li class="px-4 py-2"><small class="nav-text text-uppercase">Vendor</small></li>
            <li><a class="nav-link {{ request()->routeIs('vendor.dashboard') ? 'active' : '' }}" href="{{ route('vendor.dashboard') }}"><i class="ti ti-home"></i><span class="nav-text">Dashboard</span></a></li>
            <li><a class="nav-link {{ request()->routeIs('vendor.products.index') ? 'active' : '' }}" href="{{ route('vendor.products.index') }}"><i class="ti ti-box-seam"></i><span class="nav-text">My Products</span></a></li>
            <li><a class="nav-link {{ request()->routeIs('vendor.products.create') ? 'active' : '' }}" href="{{ route('vendor.products.create') }}"><i class="ti ti-plus"></i><span class="nav-text">Add Product</span></a></li>
            <li><a class="nav-link" href="#"><i class="ti ti-receipt"></i><span class="nav-text">Orders</span></a></li>
            <li><a class="nav-link" href="#"><i class="ti ti-currency-dollar"></i><span class="nav-text">Earnings</span></a></li>

        @elseif ($role === UserRole::Customer)
            <li class="px-4 py-2"><small class="nav-text text-uppercase">My Account</small></li>
            <li><a class="nav-link {{ request()->routeIs('customer.dashboard') ? 'active' : '' }}" href="{{ route('customer.dashboard') }}"><i class="ti ti-home"></i><span class="nav-text">Dashboard</span></a></li>
            <li><a class="nav-link" href="{{ url('/') }}"><i class="ti ti-box-seam"></i><span class="nav-text">Browse Shop</span></a></li>
            <li><a class="nav-link" href="#"><i class="ti ti-shopping-cart"></i><span class="nav-text">My Cart</span></a></li>
            <li><a class="nav-link" href="#"><i class="ti ti-receipt"></i><span class="nav-text">My Orders</span></a></li>
            <li><a class="nav-link" href="#"><i class="ti ti-map-pin"></i><span class="nav-text">Addresses</span></a></li>
        @endif

        <li class="px-4 pt-4 pb-2"><small class="nav-text text-uppercase">Account</small></li>
        <li>
            <a class="nav-link" href="{{ route('profile.edit') }}">
                <i class="ti ti-user"></i><span class="nav-text">Profile</span>
            </a>
        </li>
        <li>
            <form method="POST" action="{{ route('logout') }}" class="m-0">
                @csrf
                <button type="submit" class="nav-link w-100 text-start bg-transparent border-0">
                    <i class="ti ti-logout"></i><span class="nav-text">Log out</span>
                </button>
            </form>
        </li>
    </ul>
</aside>
