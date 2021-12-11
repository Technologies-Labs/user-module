<div class="main-wraper">
    <h5 class="main-title">Banner
        @if ($isCurrantUser && Auth::user()->can("banner-edit"))
        <div class="more">
            <div class="more-post-optns">
                <i class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-more-horizontal">
                        <circle cx="12" cy="12" r="1"></circle>
                        <circle cx="19" cy="12" r="1"></circle>
                        <circle cx="5" cy="12" r="1"></circle>
                    </svg></i>
                <ul>
                    <li class="company-banner">
                        <a><i class="icofont-pen-alt-1"></i>Update</a>

                    </li>
                </ul>
            </div>
        </div>
        @endif
    </h5>
    @can('banner-list')
    <div class="info-block-list">
        <div class="info-block">
            <h6>Title</h6>
            <p>{{$title}}</p>
        </div>
        <div class="info-block">
            <h6>Description</h6>
            <p>{{$description}}</p>
        </div>
    </div>
    @endcan


    @can('banner-edit')
    <div class="company-banner-popup" wire:ignore.self>
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
                        <input type="text" wire:model.defer="title" placeholder="Enter Title ..">
                        @error('title')<span class="text-danger">{{ $message }}</span>@enderror

                        <input type="text" wire:model.defer="description" placeholder="Enter Description">
                        @error('description')<span class="text-danger">{{ $message }}</span>@enderror

                        <button wire:click.prevent="{{$modal['route']}}" type="submit" class="main-btn">
                            <div wire:loading wire:target="{{$modal['route']}}" class="sp sp-circle"></div>
                            {{$modal['name']}}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endcan

</div>
