<div class="profil">
    <header>
        <h2 class="judul-profil">Delete Account</h2>
        <p class="teks-profil">Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</p>
    </header>

    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmUserDeletionModal">Delete Account</button>

    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form method="post" action="{{ route('profile.destroy') }}" class="modal-content">
                @csrf
                @method('delete')

                <div class="modal-header">
                    <h2 class="modal-title" id="confirmUserDeletionModalLabel">Are you sure you want to delete your account?</h2>
                </div>

                <div class="modal-body">
                    <p>Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.</p>

                    <div class="mt-6">
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" type="password" placeholder="Password"/>

                        @if($errors->userDeletion->has('password'))
                            <div class="mt-2">
                                @foreach ($errors->userDeletion->get('password') as $message)
                                    <p class="text-danger">{{ $message }}</p>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <button type="submit" class="btn btn-danger">
                        Delete Account
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
