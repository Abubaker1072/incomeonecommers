@extends('layouts.auth')

@section('title', 'Reset password')
@section('heading', 'Set a new password')

@section('content')
    <form method="POST" action="{{ route('password.store') }}" novalidate>
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <x-form.input name="email" type="email" label="Email address"
            :value="$request->email" autocomplete="username" required />

        <x-form.input name="password" type="password" label="New password"
            autocomplete="new-password" required />

        <x-form.input name="password_confirmation" type="password" label="Confirm new password"
            autocomplete="new-password" required />

        <button class="btn btn-primary w-100" type="submit">Reset password</button>
    </form>
@endsection
