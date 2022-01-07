<div class="tab-pane fade" id="password" wire:ignore.self>
    <div class="uk-width">
        <div class="setting-card">
            <h2>ضبط كلمة السر</h2>
            <div class="set-address">
                <form wire:submit.prevent="updatePassword()">
                    <fieldset class="row merged-10">
                        <div class="mb-4 col-lg-6 col-md-6 col-sm-6">
                            <input wire:model.defer="currentPassword" class="uk-input" type="password" placeholder="كلمة السر الحالية">
                        </div>

                        <div class="mb-4 col-lg-6 col-md-6 col-sm-6">
                            <input wire:model.defer="newPassword" class="uk-input" type="password" placeholder="كلمة السر الجديدة">
                            @error('newPassword') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4 col-lg-6 col-md-6 col-sm-6">
                            <input wire:model="confirmPassword" class="uk-input" type="password" placeholder="تأكيد كلمة السر">
                            @error('confirmPassword') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-0 col-lg-12">
                            <button type="submit" class="button primary circle">حفظ</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

