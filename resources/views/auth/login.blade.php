@extends('layouts.auth')

@section('title', 'Sign in')
@section('heading', 'Sign in to your account')

@section('content')
    <form method="POST" action="{{ route('login') }}" novalidate>
        @csrf

        <x-form.input name="email" type="email" label="Email address"
            placeholder="name@example.com" autofocus autocomplete="username" required />

        <x-form.input name="password" type="password" label="Password"
            placeholder="Password" autocomplete="current-password" required />

        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="form-check">
                <input id="remember" name="remember" class="form-check-input" type="checkbox">
                <label class="form-check-label small" for="remember">Remember me</label>
            </div>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="small link-primary">Forgot Password?</a>
            @endif
        </div>

        <button class="btn btn-primary w-100" type="submit">Sign in</button>
    </form>

    <div class="text-center mt-3 small text-muted">
        Don't have an account? <a href="{{ route('register') }}" class="link-primary">Sign up</a>
    </div>
@endsection
