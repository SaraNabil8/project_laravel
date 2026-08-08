<section>
    <header>
        <h2>{{ __('Delete Account') }}</h2>
        <p class="subtitle">{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}</p>
    </header>

    <style>
        .btn-danger {
            background: #c15b3f;
            color: #fff;
            border: none;
            padding: 10px 24px;
            border-radius: 4px;
            font-size: 13px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            cursor: pointer;
        }
        .btn-danger:hover { background: #a3492f; }
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0,0,0,0.4);
            align-items: center;
            justify-content: center;
            z-index: 100;
        }
        .modal-overlay.open { display: flex; }
        .modal-box {
            background: #fff;
            border-radius: 8px;
            padding: 28px;
            max-width: 420px;
            width: 90%;
        }
        .modal-box h3 {
            font-family: 'Georgia', serif;
            font-weight: 400;
            font-size: 18px;
            margin: 0 0 10px;
        }
        .modal-box p {
            font-size: 13px;
            color: #6b6b6b;
            margin-bottom: 16px;
        }
        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
        }
        .btn-cancel {
            background: #fff;
            border: 1px solid #d9d4c8;
            color: #6b6b6b;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 13px;
            cursor: pointer;
        }
    </style>

    <button type="button" class="btn-danger" onclick="document.getElementById('delete-account-modal').classList.add('open')">
        {{ __('Delete Account') }}
    </button>

    <div class="modal-overlay {{ $errors->userDeletion->isNotEmpty() ? 'open' : '' }}" id="delete-account-modal">
        <div class="modal-box">
            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')

                <h3>{{ __('Are you sure you want to delete your account?') }}</h3>
                <p>{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}</p>

                <div class="field">
                    <input id="password" name="password" type="password" placeholder="{{ __('Password') }}">
                    @error('password', 'userDeletion')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="modal-actions">
                    <button type="button" class="btn-cancel" onclick="document.getElementById('delete-account-modal').classList.remove('open')">
                        {{ __('Cancel') }}
                    </button>
                    <button type="submit" class="btn-danger">
                        {{ __('Delete Account') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>