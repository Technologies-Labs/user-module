<div>
<a data-ripple="" title="" href="javascript:void(0)"  wire:click="follow()" class="invite" style="right: 324px;">
    @if($isFollower)
        Follow
    @else
        UnFollow
    @endif

    <div wire:loading wire:target="isFollower" class="sp sp-circle"></div>
</a>

<a data-ripple="" title="" href="#" class="add-suggestion">Add Suggestion</a>
<a data-ripple="" title="" href="#" class="add-announcement" style="right: 162px;">Add Announcement</a>
</div>

{{-- <span>{{$followersCount}} followers</span> --}}
{{-- <a href="javascript:void(0)" wire:click="follow()" title="" data-ripple="">
    @if($isFollower)
        Follow
    @else
        unFollow
    @endif </a> --}}
