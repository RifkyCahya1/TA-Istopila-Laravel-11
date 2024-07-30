<div class="profil">
    <header>
        <h2 class="judul-profil">Profile Information</h2>
        <p class="teks-profil">Update your account's profile information and email address.</p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <!-- Error Massage -->
        @if($errors->has('name'))
            <div class="error-message">
                @foreach ($errors->get('name') as $message)
                    <p>{{ $message }}</p>
                @endforeach
            </div>
        @endif

        @if($errors->has('email'))
            <div class="error-message">
                @foreach ($errors->get('email') as $message)
                    <p>{{ $message }}</p>
                @endforeach
            </div>
        @endif

        <div>
            <label for="name">Name</label><br>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" pattern="[A-Za-z\s]+" title="Name should only contain letters and spaces."><br>
        </div>

        <div>
            <label for="email">Email</label><br>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$" title="Please enter a valid email address."><br><br>
        </div>

        <div class="d-flex align-items-center gap-4">
            <button class="btn btn-primary">Save</button>
            @if (session('status') === 'profile-updated')
                <p class="text-sm text-gray-600">Saved</p>
            @endif
        </div>
    </form>
</div>
