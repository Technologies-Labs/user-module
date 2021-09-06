<div>
    <div class="central-meta">
        <div class="editing-info">
            <h5 class="f-title"><i class="ti-info-alt"></i>{{__('edit-basic-information')}}</h5>

            <form wire:submit.prevent="updateUserInfo()">
                <div class="form-group">
                    <input wire:model="name" type="text" id="input" required="required"/>
                    <label class="control-label" for="input">{{__('name')}}</label><i class="mtrl-select"></i>
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <input wire:model="full_name" type="text" required="required"/>
                    <label class="control-label" for="input">{{__('full-name')}}</label><i class="mtrl-select"></i>
                    @error('full_name') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <input wire:model="email" type="text" required="required"/>
                    <label class="control-label" for="input"><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="4b0e262a22270b">[email&#160;protected]</a></label><i class="mtrl-select"></i>
                    @error('email') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <input wire:model="phone" type="text" required="required"/>
                    <label class="control-label" for="input">{{__('phone-no.')}}</label><i class="mtrl-select"></i>
                    @error('phone') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="submit-btns">
                    <button type="button" class="mtr-btn"><span>{{__('cancel')}}</span></button>
                    <button type="submit" class="mtr-btn"><span>{{__('update')}}</span></button>
                </div>
            </form>
        </div>
    </div>
    <div class="central-meta">
        <div class="editing-info">
            <h5 class="f-title"><i class="ti-info-alt"></i>{{__('edit-password')}}</h5>
            <form wire:submit.prevent="updatePassword()">
                <span class="form-group">
                    <input wire:model="currentPassword" type="password" required="required"/>
                    <label class="control-label" for="input">{{__('current-password')}}</label><i class="mtrl-select"></i>
                    @if (session()->has('currentPassword'))
                        <span class="error red"> {{ session('currentPassword') }} </span>
                    @endif
                </div>
                <div class="form-group">
                    <input wire:model="newPassword" type="password" id="input" required="required"/>
                    <label class="control-label" for="input">{{__('new-password')}}</label><i class="mtrl-select"></i>
                    @error('newPassword') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <input wire:model="confirmPassword" type="password" required="required" />
                    <label class="control-label" for="input">{{__('confirm-password')}}</label><i class="mtrl-select"></i>
                    @if (session()->has('confirmPassword'))
                        <span class="error red"> {{ session('confirmPassword') }} </span>
                    @endif
                </div>
                <div class="submit-btns">
                    <button type="button" class="mtr-btn"><span>{{__('cancel')}}</span></button>
                    <button type="submit" class="mtr-btn"><span>{{__('update')}}</span></button>
                </div>
            </form>
        </div>
    </div>
</div>
