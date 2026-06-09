<p class="text-muted small mb-3">Update your account's name and email.</p>

<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('patch')

    <x-form.input name="name" label="Name" :value="$user->name" required />
    <x-form.input name="email" type="email" label="Email" :value="$user->email" required />

    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
        <p class="small text-warning mb-3">
            Your email address is unverified.
        </p>

        @if (session('status') === 'verification-link-sent')
            <x-alert type="success">A new verification link has been sent.</x-alert>
        @endif
    @endif

    <div class="d-flex gap-2 align-items-center">
        <button type="submit" class="btn btn-primary">Save</button>
        @if (session('status') === 'profile-updated')
            <small class="text-muted">Saved.</small>
        @endif
    </div>
</form>
