<p class="text-muted small mb-3">Use a long, random password to keep your account secure.</p>

<form method="POST" action="{{ route('password.update') }}">
    @csrf
    @method('put')

    <x-form.input name="current_password" type="password" label="Current password"
        autocomplete="current-password" required />
    <x-form.input name="password" type="password" label="New password"
        autocomplete="new-password" required />
    <x-form.input name="password_confirmation" type="password" label="Confirm password"
        autocomplete="new-password" required />

    <div class="d-flex gap-2 align-items-center">
        <button type="submit" class="btn btn-primary">Save</button>
        @if (session('status') === 'password-updated')
            <small class="text-muted">Saved.</small>
        @endif
    </div>
</form>
