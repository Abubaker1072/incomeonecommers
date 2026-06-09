@extends('layouts.admin')

@section('title', 'My Account')

@section('content')
    <div class="mb-6">
        <h1 class="fs-3 mb-1">Welcome back, {{ auth()->user()->name }}</h1>
        <p class="text-muted">Your orders, addresses, and account at a glance.</p>
    </div>

    <div class="row g-3 mb-3">
        <div class="col-lg-3 col-sm-6">
            <x-stat-card title="Active orders" value="2" trend="In transit"
                icon="ti ti-truck-delivery" color="primary" />
        </div>
        <div class="col-lg-3 col-sm-6">
            <x-stat-card title="Cart items" value="3" trend="Waiting to check out"
                icon="ti ti-shopping-cart" color="success" />
        </div>
        <div class="col-lg-3 col-sm-6">
            <x-stat-card title="Wishlist" value="7" trend="Saved for later"
                icon="ti ti-heart" color="info" />
        </div>
        <div class="col-lg-3 col-sm-6">
            <x-stat-card title="Total spent" value="$540" trend="Across 8 orders"
                icon="ti ti-currency-dollar" color="warning" />
        </div>
    </div>

    <div class="row g-3">
        <div class="col-12">
            <x-card title="Recent orders">
                <x-data-table :columns="['Order #', 'Date', 'Items', 'Total', 'Status']">
                    <tr>
                        <td>#A-1042</td>
                        <td>5 Jun 2026</td>
                        <td>2</td>
                        <td>$129.00</td>
                        <td><span class="badge bg-primary">Shipped</span></td>
                    </tr>
                    <tr>
                        <td>#A-1031</td>
                        <td>1 Jun 2026</td>
                        <td>1</td>
                        <td>$49.99</td>
                        <td><span class="badge bg-success">Delivered</span></td>
                    </tr>
                </x-data-table>
            </x-card>
        </div>
    </div>
@endsection
