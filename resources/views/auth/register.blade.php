@extends('layouts.auth')

@section('title', 'Sign up')
@section('heading', 'Create your account')

@section('content')
    {{-- NOTE: the role radio is visible UI only. RegisteredUserController has not been
         taught to consume it yet — that goes into the auth/business-logic phase. --}}
    <form method="POST" action="{{ route('register') }}" novalidate>
        @csrf

        <x-form.input name="name" label="Full name" placeholder="Jane Doe" autofocus required />
        <x-form.input name="email" type="email" label="Email address"
            placeholder="name@example.com" autocomplete="username" required />
        <x-form.input name="password" type="password" label="Password"
            placeholder="Create a password" autocomplete="new-password" required />
        <x-form.input name="password_confirmation" type="password" label="Confirm password"
            placeholder="Repeat password" autocomplete="new-password" required />

        <div class="mb-3">
            <label class="form-label d-block">Register as</label>
            <div class="d-flex gap-3">
                <div class="form-check">
                    <input id="role-customer" name="role" type="radio" value="customer"
                        class="form-check-input" {{ old('role', 'customer') === 'customer' ? 'checked' : '' }}>
                    <label for="role-customer" class="form-check-label">Customer</label>
                </div>
                <div class="form-check">
                    <input id="role-vendor" name="role" type="radio" value="vendor"
                        class="form-check-input" {{ old('role') === 'vendor' ? 'checked' : '' }}>
                    <label for="role-vendor" class="form-check-label">Vendor</label>
                </div>
            </div>
        </div>

        <button class="btn btn-primary w-100" type="submit">Sign up</button>
    </form>

    <div class="text-center mt-3 small text-muted">
        Already have an account? <a href="{{ route('login') }}" class="link-primary">Sign in</a>
    </div>
@endsection
