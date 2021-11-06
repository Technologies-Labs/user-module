<div class="main-wraper" wire:click="setCreateModal">
    <span class="new-title">Create New Offer</span>
    <div class="add-offer">
        <form method="post" wire:click="setCreateModal">
            <i class="icofont-pen-alt-1"></i>
            <input type="text" placeholder="Create New Offer">
        </form>
        <ul class="upload-media" wire:click="setCreateModal">
            <li wire:click="setCreateModal">
                <i><img src="{{ asset('images/image.png') }}" alt=""></i>
                <span>Photo/Video</span>
            </li>
            <li wire:click="setCreateModal">
                <i><img src="{{ asset('images/file.png') }}" alt="" style="width: 22px;"></i>
                <span>File</span>
            </li>

        </ul>
    </div>
</div>
