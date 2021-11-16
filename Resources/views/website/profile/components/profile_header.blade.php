<ul class="nav nav-tabs post-detail-btn">
    <li class="nav-item"><a class="active" href="#timeline" wire:ignore data-toggle="tab">Timeline</a></li>
    @if($isCurrantUser)
    <li class="nav-item"><a class="" href="#groups" wire:ignore data-toggle="tab">Groups</a><span>5</span></li>
    @endif

    <li class="nav-item"><a class="" href="#Offers" wire:ignore data-toggle="tab">Offers</a></li>
    @if($isCurrantUser)
    <li class="nav-item"><a class="" href="#suggestions" wire:ignore data-toggle="tab">Suggestions</a></li>
    @endif

    <li class="nav-item"><a class="" href="#contact" wire:ignore data-toggle="tab">Contact Us</a></li>
    <li class="nav-item"><a class="" href="#company" wire:ignore data-toggle="tab">About</a></li>
</ul>
