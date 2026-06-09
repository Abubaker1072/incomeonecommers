@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="mb-6">
        <h1 class="fs-3 mb-1">Dashboard</h1>
        <p class="text-muted">Marketplace overview at a glance.</p>
    </div>

    {{-- KPI cards (dummy values until business logic is wired) --}}
    <div class="row g-3 mb-3">
        <div class="col-lg-3 col-sm-6">
            <x-stat-card title="Total Sales" value="$25,000" trend="+5% since last month"
                icon="ti ti-report-analytics" color="primary" />
        </div>
        <div class="col-lg-3 col-sm-6">
            <x-stat-card title="Total Orders" value="320" trend="+22% since last month"
                icon="ti ti-receipt" color="success" />
        </div>
        <div class="col-lg-3 col-sm-6">
            <x-stat-card title="Active Vendors" value="48" trend="+10% since last month"
                icon="ti ti-building-store" color="info" />
        </div>
        <div class="col-lg-3 col-sm-6">
            <x-stat-card title="Pending Approvals" value="7" trend="+3 this week"
                icon="ti ti-clock" color="warning" />
        </div>
    </div>

    <div class="row g-3">
        <div class="col-lg-8">
            <x-card title="Sales vs Purchases">
                <div id="salesPurchaseChart"></div>
            </x-card>
        </div>
        <div class="col-lg-4">
            <x-card title="Recent activity">
                <ul class="list-unstyled small mb-0">
                    <li class="d-flex gap-3 mb-3">
                        <div class="icon-shape icon-sm bg-primary bg-opacity-10 text-primary rounded-circle">
                            <i class="ti ti-shopping-cart"></i>
                        </div>
                        <div>
                            <div class="fw-medium">New order placed</div>
                            <div class="text-muted">Order #12345 • 5 min ago</div>
                        </div>
                    </li>
                    <li class="d-flex gap-3 mb-3">
                        <div class="icon-shape icon-sm bg-success bg-opacity-10 text-success rounded-circle">
                            <i class="ti ti-user-plus"></i>
                        </div>
                        <div>
                            <div class="fw-medium">New vendor signed up</div>
                            <div class="text-muted">Acme Goods • 30 min ago</div>
                        </div>
                    </li>
                    <li class="d-flex gap-3">
                        <div class="icon-shape icon-sm bg-warning bg-opacity-10 text-warning rounded-circle">
                            <i class="ti ti-alert-circle"></i>
                        </div>
                        <div>
                            <div class="fw-medium">Vendor pending approval</div>
                            <div class="text-muted">PinePeak • 1 hr ago</div>
                        </div>
                    </li>
                </ul>
            </x-card>
        </div>
    </div>

    <div class="row g-3 mt-1">
        <div class="col-12">
            <x-card title="Latest orders">
                <x-data-table :columns="['Order #', 'Customer', 'Items', 'Total', 'Status']">
                    <tr>
                        <td>#12345</td>
                        <td>Jane Doe</td>
                        <td>3</td>
                        <td>$129.00</td>
                        <td><span class="badge bg-success">Paid</span></td>
                    </tr>
                    <tr>
                        <td>#12344</td>
                        <td>Acme Corp</td>
                        <td>1</td>
                        <td>$45.50</td>
                        <td><span class="badge bg-warning text-dark">Pending</span></td>
                    </tr>
                    <tr>
                        <td>#12343</td>
                        <td>John Smith</td>
                        <td>5</td>
                        <td>$299.00</td>
                        <td><span class="badge bg-primary">Shipped</span></td>
                    </tr>
                </x-data-table>
            </x-card>
        </div>
    </div>
@endsection
