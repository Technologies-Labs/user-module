<div>
    @can('follow-create')
    <a data-ripple="" title="" href="javascript:void(0)"  wire:click="follow()" class="invite" style="left: 238px;">
        @include('components.loading')
        @if($isFollower)
            متابعة
        @else
            إلغاء المتابعة
        @endif

        <div wire:loading wire:target="isFollower" class="sp sp-circle"></div>
    </a>
    @endcan

    @can('suggestion-create')
    <a data-ripple="" title="" href="#" class="add-suggestion">اضافة اقتراح</a>
    @endcan

    @can('announcement-create')
    <a data-ripple="" title="" href="#" class="add-announcement" style="left: 135px;">إضافة بلاغ</a>
    @endcan

    </div>

    {{-- <span>{{$followersCount}} followers</span> --}}
    {{-- <a href="javascript:void(0)" wire:click="follow()" title="" data-ripple="">
        @if($isFollower)
            Follow
        @else
            unFollow
        @endif </a> --}}
