<div class="profil">
    <header>
        <h2 class="judul-profil">Update Password</h2>

        <p class="teks-profil">Ensure your account is using a long, random password to stay secure.</p>
    </header>

    <form method="POST" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="current_password">Current Password</label>
            <input id="current_password" name="current_password" type="password"  autocomplete="current-password" />
            @if ($errors->updatePassword->has('current_password'))
                <p class="error-message">
                    @foreach ($errors->updatePassword->get('current_password') as $message)
                        {{ $message }}
                    @endforeach
                </p>
            @endif
        </div>

        <div>
            <label for="password">New Password</label>
            <input id="password" name="password" type="password"  autocomplete="new-password" />
            @if ($errors->updatePassword->has('password'))
                <p class="error-message">
                    @foreach ($errors->updatePassword->get('password') as $message)
                        {{ $message }}
                    @endforeach
                </p>
            @endif
        </div>

        <div>
            <label for="password_confirmation">Confirm Password</label>
            <input id="password_confirmation" name="password_confirmation" type="password"  autocomplete="new-password" />
            @if ($errors->updatePassword->has('password_confirmation'))
                <p class="error-message">
                    @foreach ($errors->updatePassword->get('password_confirmation') as $message)
                        {{ $message }}
                    @endforeach
                </p>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="btn btn-primary">
                Save
            </button>

            @if (session('status') === 'password-updated')
                <p class="text-sm text-gray-600 mt-2">
                    Saved.
                </p>
            @endif
        </div>
    </form>


</div>
