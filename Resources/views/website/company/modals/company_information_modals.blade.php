<div class="servies-opearition-popup" wire:ignore.self>
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
                    <input type="text" wire:model.defer="serviceName" placeholder="Enter Service Name..">
                    @error('serviceName')<span class="text-danger">{{ $message }}</span>@enderror
                    <input type="text" wire:model.defer="serviceDescription" placeholder="Enter Service Description">
                    @error('serviceDescription')<span class="text-danger">{{ $message }}</span>@enderror
                    <button wire:click.prevent="{{$modal['route']}}" type="submit" class="main-btn">
                        <div wire:loading wire:target="{{$modal['route']}}" class="sp sp-circle"></div>
                        {{$modal['name']}}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="statistic-opearition-popup" wire:ignore.self>
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

                    <input type="text" wire:model.defer="statisticName" placeholder="Enter Statistic Name..">
                    @error('statisticName')<span class="text-danger">{{ $message }}</span>@enderror

                    <input type="text" wire:model.defer="statisticCount" placeholder="Enter Statistic Count">
                    @error('statisticCount')<span class="text-danger">{{ $message }}</span>@enderror

                    <button wire:click.prevent="{{$modal['route']}}" type="submit" class="main-btn">
                        <div wire:loading wire:target="{{$modal['route']}}" class="sp sp-circle"></div>
                        {{$modal['name']}}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


