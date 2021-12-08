<div class="tab-pane active fade show" id="account" wire:ignore.self>
    <div class="uk-width">
        <div class="setting-card">
            <h2>Account Settings</h2>
            <p class="mb-4">This is your public presence on Socimo. You need a
                account to upload your paid courses, comment on courses, purchased
                by users, or earning.
            </p>
            <h6>Basic Profile</h6>
            <p>Add information about yourself</p>
            <form wire:submit.prevent="updateUserInfo()">
                <fieldset class="row merged-10">
                    <div class="mb-4 col-lg-6">
                        <input class="uk-input" wire:model.defer="name" type="text" readonly placeholder="Name">
                        @error('name') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4 col-lg-6">
                        <input class="uk-input" wire:model.defer="full_name" type="text" placeholder="Full Name">
                        @error('full_name') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4 col-lg-6">
                        <input class="uk-input" wire:model.defer="email" type="email" placeholder="Email">
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4 col-lg-6">
                        <input class="uk-input" wire:model.defer="phone" type="number" placeholder="Phone Number">
                        @error('phone') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4 col-lg-6">
                        <b>Profile Image</b>
                        {{-- <figure id="main">
                            <img src="{{ asset('storage/'.$image)}}" alt="">
                        </figure> --}}
                        <input class="uk-input" wire:model="image" type="file" placeholder="Logo">
                        @error('image') <span class="error">{{ $message }}</span> @enderror
                        <div wire:loading wire:target="image" class="sp sp-circle"></div>
                    </div>

                    <div class="mb-4 col-lg-6">
                        <b>Logo Image</b>
                        {{-- <figure id="main">
                            <img src="{{ asset('storage/'.$image)}}" alt="">
                        </figure> --}}
                        <input class="uk-input" wire:model="logo" type="file" placeholder="Logo">
                        @error('logo') <span class="error">{{ $message }}</span> @enderror
                        <div wire:loading wire:target="logo" class="sp sp-circle"></div>
                    </div>


                    <div class="mb-0 col-lg-12">
                        <button type="submit" class="button primary circle">Save Changes</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>

