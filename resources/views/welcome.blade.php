<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} — Marketplace</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon_io/favicon-16x16.png') }}">

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-white border-bottom px-4 py-3">
        <a class="navbar-brand d-inline-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('assets/images/logo-icon.svg') }}" alt="" width="28">
            <span class="ms-2"><img src="{{ asset('assets/images/logo.svg') }}" alt=""></span>
        </a>
        <div class="ms-auto d-flex gap-2">
            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-primary">Go to dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-secondary">Sign in</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Sign up</a>
            @endauth
        </div>
    </nav>

    <main class="container py-10 text-center">
        <h1 class="display-5 fw-bold mb-3">Welcome to {{ config('app.name') }}</h1>
        <p class="lead text-muted mb-4">
            A multi-vendor marketplace. Browse products from many vendors, or open your own shop.
        </p>
        <div class="d-flex gap-2 justify-content-center">
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Get started</a>
            <a href="#" class="btn btn-outline-secondary btn-lg">Browse the shop</a>
        </div>

        <div class="row g-3 mt-8">
            <div class="col-md-4">
                <x-stat-card title="Vendors" value="0" trend="Coming soon" icon="ti ti-building-store" color="primary" />
            </div>
            <div class="col-md-4">
                <x-stat-card title="Products" value="0" trend="Coming soon" icon="ti ti-box-seam" color="success" />
            </div>
            <div class="col-md-4">
                <x-stat-card title="Categories" value="0" trend="Coming soon" icon="ti ti-category" color="info" />
            </div>
        </div>
    </main>
</body>
</html>
