@extends('layouts.admin')

@section('title', 'Vendor Dashboard')

@section('content')
    <div class="mb-6">
        <h1 class="fs-3 mb-1">My store</h1>
        <p class="text-muted">Your products, orders, and earnings.</p>
    </div>

    <div class="row g-3 mb-3">
        <div class="col-lg-3 col-sm-6">
            <x-stat-card title="My Products" value="12" trend="+2 this month"
                icon="ti ti-box-seam" color="primary" />
        </div>
        <div class="col-lg-3 col-sm-6">
            <x-stat-card title="Orders" value="34" trend="+8 this week"
                icon="ti ti-receipt" color="success" />
        </div>
        <div class="col-lg-3 col-sm-6">
            <x-stat-card title="Earnings (mo.)" value="$1,840" trend="+12% MoM"
                icon="ti ti-currency-dollar" color="info" />
        </div>
        <div class="col-lg-3 col-sm-6">
            <x-stat-card title="Low stock" value="3" trend="Restock soon"
                icon="ti ti-alert-triangle" color="warning" />
        </div>
    </div>

    <div class="row g-3">
        <div class="col-12">
            <x-card title="Recent orders">
                <x-data-table :columns="['Order #', 'Product', 'Qty', 'Total', 'Status']">
                    <tr>
                        <td>#12345</td>
                        <td>Wireless Headphones</td>
                        <td>1</td>
                        <td>$89.99</td>
                        <td><span class="badge bg-warning text-dark">Processing</span></td>
                    </tr>
                    <tr>
                        <td>#12344</td>
                        <td>USB-C Hub</td>
                        <td>2</td>
                        <td>$99.98</td>
                        <td><span class="badge bg-primary">Shipped</span></td>
                    </tr>
                    <tr>
                        <td>#12342</td>
                        <td>Gaming Laptop</td>
                        <td>1</td>
                        <td>$1,299.99</td>
                        <td><span class="badge bg-success">Delivered</span></td>
                    </tr>
                </x-data-table>
            </x-card>
        </div>
    </div>
@endsection
