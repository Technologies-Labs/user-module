<a data-ripple="" title="" href="javascript:void(0)"  wire:click="follow()">
    @if($isFollower)
        Follow
    @else
        UnFollow
    @endif

    <div wire:loading wire:target="isFollower" class="sp sp-circle"></div>
</a>
