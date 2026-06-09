@extends('layouts.auth')

@section('title', 'Confirm password')
@section('heading', 'Confirm your password')

@section('content')
    <p class="small text-muted mb-3">
        This is a secure area. Please confirm your password before continuing.
    </p>

    <form method="POST" action="{{ route('password.confirm') }}" novalidate>
        @csrf

        <x-form.input name="password" type="password" label="Password"
            autocomplete="current-password" required />

        <button class="btn btn-primary w-100" type="submit">Confirm</button>
    </form>
@endsection
