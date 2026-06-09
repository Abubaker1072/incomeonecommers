<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page not found — {{ config('app.name') }}</title>

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon_io/favicon-32x32.png') }}">

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div style="max-width: 500px; width: 100%;">
            <div class="text-center">
                <div class="mb-4">
                    <a href="{{ url('/') }}" class="d-inline-block mb-4">
                        <img src="{{ asset('assets/images/logo-icon.svg') }}" alt="" width="36">
                        <span class="ms-2"><img src="{{ asset('assets/images/logo.svg') }}" alt=""></span>
                    </a>
                </div>

                <h1 class="display-1 fw-bold text-primary mb-2">404</h1>
                <h2 class="card-title h4 mb-3">Page Not Found</h2>
                <p class="text-muted mb-4">Sorry, the page you're looking for doesn't exist or has been moved.</p>

                <a href="{{ url('/') }}" class="btn btn-primary">Go to home</a>
            </div>
        </div>
    </div>
</body>
</html>
