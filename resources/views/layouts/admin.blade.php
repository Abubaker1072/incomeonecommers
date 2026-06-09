<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') — {{ config('app.name') }}</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon_io/favicon-16x16.png') }}">

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="overlay" class="overlay"></div>

    <x-admin.topbar />
    <x-admin.sidebar />

    <main id="content" class="content py-10">
        <div class="container-fluid">
            @if (session('status'))
                <x-alert type="success">{{ session('status') }}</x-alert>
            @endif

            @yield('content')
        </div>

        <x-admin.footer />
    </main>
</body>
</html>
