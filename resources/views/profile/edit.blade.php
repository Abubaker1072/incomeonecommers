@extends('layouts.admin')

@section('title', 'Profile')

@section('content')
    <div class="mb-6">
        <h1 class="fs-3 mb-1">Profile</h1>
        <p class="text-muted">Manage your account information and password.</p>
    </div>

    <div class="row g-3">
        <div class="col-12">
            <x-card title="Profile information">
                @include('profile.partials.update-profile-information-form')
            </x-card>
        </div>

        <div class="col-12">
            <x-card title="Update password">
                @include('profile.partials.update-password-form')
            </x-card>
        </div>

        <div class="col-12">
            <x-card title="Delete account">
                @include('profile.partials.delete-user-form')
            </x-card>
        </div>
    </div>
@endsection
