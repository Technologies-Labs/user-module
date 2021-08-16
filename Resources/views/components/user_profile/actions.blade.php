<span>{{$followersCount}} followers</span>
<a href="javascript:void(0)" wire:click="follow()" title="" data-ripple="">
    @if($isFollower)
        Follow
    @else
        unFollow
    @endif </a>
<a href="#suggestion_modal" data-toggle="modal" title="" data-ripple="">Add Suggestion</a>
<a href="#announcement_modal" data-toggle="modal" title="" data-ripple="">Add Announcement</a>
