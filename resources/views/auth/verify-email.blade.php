@extends('layouts.auth')

@section('title', 'Verify email')
@section('heading', 'Verify your email')

@section('content')
    <p class="small text-muted mb-3">
        Thanks for signing up! Please confirm your email by clicking the link we just emailed you.
        If you didn't get it, we'll send another.
    </p>

    @if (session('status') === 'verification-link-sent')
        <x-alert type="success">A fresh verification link has been sent to your email address.</x-alert>
    @endif

    <div class="d-flex gap-2">
        <form method="POST" action="{{ route('verification.send') }}" class="flex-grow-1">
            @csrf
            <button class="btn btn-primary w-100" type="submit">Resend verification email</button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-secondary">Log out</button>
        </form>
    </div>
@endsection
