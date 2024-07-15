<div class="profil">
    <header>
        <h2 class="judul-profil">Update Password</h2>

        <p class="teks-profil">Ensure your account is using a long, random password to stay secure.</p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password">Current Password</label><br>
            <input type="password" id="update_password_current_password" name="current_password" required autocomplete="current-password"><br><br>
            @if($errors->has('password'))
                <div class="mt-2">
                    @foreach ($errors->get('password') as $message)
                        <p>{{ $message }}</p>
                    @endforeach
                </div>
            @endif
        </div>

        <div>
            <label for="update_password_password">New Password</label><br>
            <input type="password" id="update_password_password" name="password" required autocomplete="new-password"><br><br>
            @if($errors->has('password'))
                <div class="mt-2">
                    @foreach ($errors->get('password') as $message)
                        <p>{{ $message }}</p>
                    @endforeach
                </div>
            @endif
        </div>

        <div>
            <label for="update_password_password_confirmation">Confirm Password</label><br>
            <input type="password" id="update_password_password_confirmation" name="password_confirmation" required autocomplete="new-password"><br><br>
            @if($errors->has('password'))
                <div class="mt-2">
                    @foreach ($errors->get('password') as $message)
                        <p>{{ $message }}</p>
                    @endforeach
                </div>
            @endif
        </div>
        
        <div class="d-flex align-items-center gap-4">
            <button class="btn btn-primary">Save</button>
            @if (session('status') === 'profile-updated')
                <p class="text-sm text-gray-500">Saved</p>
            @endif
        </div>
    </form>
</div>
