<div class="tab-pane fade" id="password" wire:ignore.self>
    <div class="uk-width">
        <div class="setting-card">
            <h2>Password Setting</h2>
            <div class="set-address">
                <form wire:submit.prevent="updatePassword()">
                    <fieldset class="row merged-10">
                        <div class="mb-4 col-lg-6 col-md-6 col-sm-6">
                            <input wire:model.defer="currentPassword" class="uk-input" type="password" placeholder="Current Password">
                        </div>

                        <div class="mb-4 col-lg-6 col-md-6 col-sm-6">
                            <input wire:model.defer="newPassword" class="uk-input" type="password" placeholder="New Password">
                            @error('newPassword') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4 col-lg-6 col-md-6 col-sm-6">
                            <input wire:model="confirmPassword" class="uk-input" type="password" placeholder="Confirm Password">
                            @error('confirmPassword') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-0 col-lg-12">
                            <button type="submit" class="button primary circle">Save
                                Changes</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

