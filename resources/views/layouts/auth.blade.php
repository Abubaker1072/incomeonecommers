<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') — {{ config('app.name') }}</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon_io/favicon-16x16.png') }}">

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card" style="max-width: 460px; width: 100%;">
            <div class="card-body p-5">
                <div class="text-center mb-3">
                    <a href="{{ url('/') }}" class="mb-4 d-inline-block">
                        <img src="{{ asset('assets/images/logo-icon.svg') }}" alt="" width="36">
                        <span class="ms-2"><img src="{{ asset('assets/images/logo.svg') }}" alt=""></span>
                    </a>
                    <h1 class="card-title mb-4 h5">@yield('heading')</h1>
                </div>

                @if (session('status'))
                    <x-alert type="success">{{ session('status') }}</x-alert>
                @endif

                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
