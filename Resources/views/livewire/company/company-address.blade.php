<div class="central-meta">
    <div class="editing-info">
        <h5 class="f-title"><i class="ti-info-alt"></i>{{__('company-address')}}</h5>
        <div class="edit-contact-info">
            @foreach($userCompanyAddress as $address)
                <livewire:usermodule::company.user-company-address :address="$address" />
            @endforeach
        </div>
        <div class="add-more">
            <form>
                <div class="form-group half">
                    <input type="text"  wire:model="country" id="input" required="required"/>
                    <label class="control-label" for="input">{{__('country')}}</label><i class="mtrl-select"></i>
                    @error('country')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group half">
                    <input type="text"  wire:model="city" required="required"/>
                    <label class="control-label" for="input">{{__('city')}}</label><i class="mtrl-select"></i>
                    @error('city')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <input type="text"  wire:model="street" required="required"/>
                    <label class="control-label" for="input">{{__('street')}}</label><i class="mtrl-select"></i>
                    @error('street')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <button wire:click.prevent="createCompanyAddress()" class="mtr-btn"><span>{{__('add-more')}}</span></button>
            </form>
        </div>
    </div>
</div>
