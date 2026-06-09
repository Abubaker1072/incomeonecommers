@extends('layouts.auth')

@section('title', 'Forgot password')
@section('heading', 'Reset your password')

@section('content')
    <p class="small text-muted mb-3">
        Enter your email and we'll send you a link to reset your password.
    </p>

    <form method="POST" action="{{ route('password.email') }}" novalidate>
        @csrf

        <x-form.input name="email" type="email" label="Email address"
            placeholder="name@example.com" autofocus required />

        <button class="btn btn-primary w-100" type="submit">Email password reset link</button>
    </form>

    <div class="text-center mt-3 small text-muted">
        <a href="{{ route('login') }}" class="link-primary">Back to sign in</a>
    </div>
@endsection
