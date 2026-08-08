<section>
    <header>
        <h2>{{ __('Update Password') }}</h2>
        <p class="subtitle">{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>
    </header>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="field">
            <label for="update_password_current_password">{{ __('Current Password') }}</label>
            <input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password">
            @error('current_password', 'updatePassword')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="field">
            <label for="update_password_password">{{ __('New Password') }}</label>
            <input id="update_password_password" name="password" type="password" autocomplete="new-password">
            @error('password', 'updatePassword')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="field">
            <label for="update_password_password_confirmation">{{ __('Confirm Password') }}</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password">
            @error('password_confirmation', 'updatePassword')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div style="display:flex; align-items:center;">
            <button type="submit" class="btn-save">{{ __('Save') }}</button>

            @if (session('status') === 'password-updated')
                <span class="saved-msg">{{ __('Saved.') }}</span>
            @endif
        </div>
    </form>
</section>