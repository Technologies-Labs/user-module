<form wire:submit.prevent="update()" >
    <div class="edit-social-media-info">

        <div class="form-group ">
            <input type="text" id="input" wire:model="facebook">
            <label class="control-label" for="input"><i class="fa fa-facebook-square"></i> Facebook URL</label><i class="mtrl-select"></i>
            @error('facebook')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-group ">
            <input type="text" id="input" wire:model="twitter">
            <label class="control-label" for="input"><i class="fa fa-twitter-square"></i> Twitter URL</label><i class="mtrl-select"></i>
            @error('twitter')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-group ">
            <input type="text" id="input" wire:model="whatsApp">
            <label class="control-label" for="input"><i class="fa fa-whatsapp"></i> whatsApp URL</label><i class="mtrl-select"></i>
            @error('whatsApp')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-group ">
            <input type="text" id="input" wire:model="instegram">
            <label class="control-label" for="input"><i class="fa fa-instagram"></i> Instegram URL</label><i class="mtrl-select"></i>
            @error('instegram')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-group ">
            <input type="text" id="input" wire:model="linkedIn">
            <label class="control-label" for="input"><i class="fa fa-linkedin-square"></i> linkedIn URL</label><i class="mtrl-select"></i>
            @error('linkedIn')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

    </div>
    <div class="submit-btns">
        <button type="submit" class="mtr-btn"><span>Update</span></button>
    </div>
</form>
