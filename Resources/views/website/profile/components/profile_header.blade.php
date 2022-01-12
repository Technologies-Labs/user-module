<ul class="nav nav-tabs post-detail-btn" style="padding-right: 0">

    <li class="nav-item"><a class="active" href="#timeline" wire:ignore data-toggle="tab">Timeline</a></li>

    {{-- @if($isCurrantUser && Auth::user()->can("group-list"))
    <li class="nav-item"><a class=""  wire:click="$emit('loadGroups')" href="#groups" wire:ignore data-toggle="tab">Groups</a> <span style="background-color: #ea0d0d; color: white" >5</span></li>
    @endif

    @can('offer-list')
    <li class="nav-item"><a class="" wire:click="$emit('loadOffers')" href="#Offers" wire:ignore data-toggle="tab">Offers</a></li>
    @endcan


    @if($isCurrantUser && Auth::user()->can("suggestions-list"))
    <li class="nav-item"><a class="" wire:click="$emit('loadSuggestions')" href="#suggestions" wire:ignore data-toggle="tab">Suggestions</a></li>
    @endif

    @if (Auth::user()->can("address-list") || Auth::user()->can("information-list") || Auth::user()->can("social-media-list-list"))
    <li class="nav-item"><a class="" wire:click="$emit('loadUserContactUs')" href="#contact" wire:ignore data-toggle="tab">Contact Us</a></li>
    @endif --}}


    @if($isCurrantUser)
    <li class="nav-item"><a class=""  wire:click="$emit('loadGroups')" href="#groups" wire:ignore data-toggle="tab">المجموعات</a>
        {{-- <span style="background-color: #ea0d0d; color: white" >5</span> --}}
    </li>
    @endif

    <li class="nav-item"><a class=""  href="#Offers" wire:ignore data-toggle="tab">العروض</a></li>

    @if($isCurrantUser)
    <li class="nav-item"><a class=""  href="#suggestions" wire:ignore data-toggle="tab">المقترحات</a></li>
    @endif

    <li class="nav-item"><a class="" wire:click="$emit('loadUserContactUs')" href="#contact" wire:ignore data-toggle="tab">تواصل معنا</a></li>

    <li class="nav-item"><a class="" href="@if($isCurrantUser)#company @else{{ route('user.company', ['user' => $user]) }}@endif" wire:ignore @if ($isCurrantUser) data-toggle="tab" @endif>About Company</a></li>

</ul>
