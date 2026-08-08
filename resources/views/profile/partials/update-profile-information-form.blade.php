<section>
    <header>
        <h2>{{ __('Profile Information') }}</h2>
        <p class="subtitle">{{ __("Update your account's profile information and email address.") }}</p>
    </header>

    <style>
        .field { margin-bottom: 18px; }
        .field label {
            display: block;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #6b6b6b;
            margin-bottom: 6px;
        }
        .field input {
            width: 100%;
            padding: 11px 14px;
            border: 1px solid #d9d4c8;
            border-radius: 4px;
            font-size: 14px;
            background: #fdfcfa;
            color: #2b2b2b;
        }
        .field input:focus {
            outline: none;
            border-color: #a9762f;
            box-shadow: 0 0 0 3px rgba(169, 118, 47, 0.12);
        }
        .field-error { color: #c15b3f; font-size: 12px; margin-top: 6px; }
        .btn-save {
            background: #a9762f;
            color: #fff;
            border: none;
            padding: 10px 24px;
            border-radius: 4px;
            font-size: 13px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            cursor: pointer;
        }
        .btn-save:hover { background: #8a5f22; }
        .saved-msg { font-size: 13px; color: #3a6b3a; margin-left: 14px; }
        .verify-msg { font-size: 13px; color: #6b6b6b; margin-top: 10px; }
        .verify-msg button {
            background: none;
            border: none;
            color: #a9762f;
            text-decoration: underline;
            cursor: pointer;
            font-size: 13px;
            padding: 0;
        }
    </style>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div class="field">
            <label for="name">{{ __('Name') }}</label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            @error('name')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="field">
            <label for="email">{{ __('Email') }}</label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required autocomplete="username">
            @error('email')
                <div class="field-error">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="verify-msg">
                    {{ __('Your email address is unverified.') }}
                    <button form="send-verification">{{ __('Click here to re-send the verification email.') }}</button>

                    @if (session('status') === 'verification-link-sent')
                        <p style="color:#3a6b3a; margin-top:6px;">{{ __('A new verification link has been sent to your email address.') }}</p>
                    @endif
                </div>
            @endif
        </div>

        <div style="display:flex; align-items:center;">
            <button type="submit" class="btn-save">{{ __('Save') }}</button>

            @if (session('status') === 'profile-updated')
                <span class="saved-msg">{{ __('Saved.') }}</span>
            @endif
        </div>
    </form>
</section>