<div class="address-op-popup" wire:ignore.self>
    <div class="popup">
        <span class="popup-closed"><i class="icofont-close"></i></span>
        <div class="popup-meta">
            <div class="popup-head">
                <h5><i>
                        <svg class="feather feather-message-square" stroke-linejoin="round" stroke-linecap="round"
                            stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="24"
                            width="24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                        </svg></i> {{$modal['title']}}</h5>
            </div>
            <div class="send-message">
                <form method="post" class="c-form">
                    <input type="text" wire:model.defer="address" placeholder="Enter Adrress..">
                    @error('address')<span class="text-danger">{{ $message }}</span>@enderror
                    <input type="text" wire:model.defer="phones" placeholder="Enter Phones with comme..">
                    @error('phones')<span class="text-danger">{{ $message }}</span>@enderror
                    <button wire:click.prevent="{{$modal['route']}}" type="submit" class="main-btn">
                        <div wire:loading wire:target="{{$modal['route']}}" class="sp sp-circle"></div>
                        {{$modal['name']}}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="edit-contact-us-popup" wire:ignore.self>
    <div class="popup">
        <span class="popup-closed"><i class="icofont-close"></i></span>
        <div class="popup-meta">
            <div class="popup-head">
                <h5><i>
                        <svg class="feather feather-message-square" stroke-linejoin="round" stroke-linecap="round"
                            stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="24"
                            width="24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                        </svg></i> Edit Infomation</h5>
            </div>
            <div class="send-message">}}
                <form method="post" class="c-form">

                    <input type="url" wire:model.defer="website" placeholder="Enter Website..">
                    <input type="email" wire:model.defer="email" placeholder="Enter Email..">
                    <input type="number" wire:model.defer="phone" placeholder="Enter Phone..">

                    <button wire:click.prevent="updateContactUs()" type="submit" class="main-btn">
                        <div wire:loading wire:target="updateContactUs()" class="sp sp-circle"></div>
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="edit-social-media-popup" wire:ignore.self>
    <div class="popup">
        <span class="popup-closed"><i class="icofont-close"></i></span>
        <div class="popup-meta">
            <div class="popup-head">
                <h5><i>
                        <svg class="feather feather-message-square" stroke-linejoin="round" stroke-linecap="round"
                            stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="24"
                            width="24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                        </svg></i> Edit Infomation</h5>
            </div>
            <div class="send-message">
                <form method="post" class="c-form">
                    <input type="text" wire:model.defer="facebook" placeholder="Enter Facebook UserName">

                    <input type="text" wire:model.defer="twitter" placeholder="Enter Twitter UserName">
                    <input type="text" wire:model.defer="instegram" placeholder="Enter Instegram UserName">
                    <input type="text" wire:model.defer="whatsApp" placeholder="Enter WhatsApp Number">

                    <button wire:click.prevent="updateSocialMedia()" type="submit" class="main-btn">
                        <div wire:loading wire:target="updateSocialMedia()" class="sp sp-circle"></div>
                        Save
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
